<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 function __construct(){
      parent::__construct();
      $this->load->model('M_Jadwal', '', TRUE);
      $this->load->model('M_Shift', '', TRUE);
      $this->load->model('M_MataPelajaran', '', TRUE);
      $this->load->model('M_Guru', '', TRUE);
      $this->load->model('M_Siswa', '', TRUE);
      $this->load->model('ModelDB', '', TRUE);
    }

		public function readDataJadwal(){
				$model= new ModelDB();
				$hari = $this->getHari();
				$result = $model->readDataWhere('hari', $hari, 't_jadwal_semua');
				if(!$result){
					$jadwalArr=null;
				} else {
					foreach ($result as $row) {
						# code...
						$jadwalArr[] = new M_Jadwal($row->id_jadwal, $row->kode_mapel, $row->nip, $row->jenjang, $row->kelas, $row->hari, $row->id_shift);
					}
				}
				return $jadwalArr;
		}

	 function getHari(){
		$hari = date ("D");

		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;

			case 'Mon':
				$hari_ini = "Senin";
			break;

			case 'Tue':
				$hari_ini = "Selasa";
			break;

			case 'Wed':
				$hari_ini = "Rabu";
			break;

			case 'Thu':
				$hari_ini = "Kamis";
			break;

			case 'Fri':
				$hari_ini = "Jumat";
			break;

			case 'Sat':
				$hari_ini = "Sabtu";
			break;

			default:
				$hari_ini = "Tidak di ketahui";
			break;
		}
		return $hari_ini;
	 }

	 public function getKodeGuru($nip){
			 $model = new ModelDB();
			 $result = $model->readDataWhere('nip', $nip, 't_guru');
			 foreach ($result as $row) {
				 # code...
				 $kode = $row->kode_guru;
			 }
			 return $kode;
	 }

	 public function getNamaMapel($kodemapel){
			 $model = new ModelDB();
			 $result = $model->readDataWhere('kode_mapel', $kodemapel, 't_mapel');
			 foreach ($result as $row) {
				 # code...
				 $mapel = $row->nama_mapel;
			 }
			 return $mapel;
	 }

	 public function dataJadwal(){
		 $result = $this->readDataJadwal();
		 if(!$result){
			  $dataJadwal = null;
		 } else {
			 foreach ($result as $as) {
	       if($as->getJenjang()=='0'){
	           $jenjang = "Taman Kanak-Kanak";
	       } else if ($as->getJenjang()=='1'){
	           $jenjang = "Madrasah Ibtidaiyah";
	       } else {
	           $jenjang = "Madrasah Tsanawiyah";
	       }
	       $model = new ModelDB();
	       $query = $model->readDataWhere('id_shift',$as->getJam(),'t_shift');
	       foreach ($query as $row ) {
	         $jam_mulai = date('H:i', strtotime($row->jam_mulai));
	         $jam_selesai = date('H:i', strtotime($row->jam_berakhir));
	         $keterangan = $row->keterangan;
	       }
	       $dataJadwal[] = array(
	         'id_jadwal'   => $as->getIdJadwal(),
	         'mapel'       => $this->getNamaMapel($as->getMapel()),
	         'kode_guru'   => $this->getKodeGuru($as->getGuru()),
	         'jenjang'     => $jenjang,
	         'kelas'       => $as->getKelas(),
	         'hari'        => $as->getHari(),
	         'jam_pel'     => $jam_mulai." s.d. ".$jam_selesai,
	       );
	     }
	 }
     return $dataJadwal;
	 }

	public function index()
	{

		if($this->session->userdata('logged_in'))
		   {
				 $data['jadwal'] = $this->dataJadwal();
				 $session_data = $this->session->userdata('logged_in');
				 $data['nip'] = $session_data['nip'];
				 $data['nama_guru'] = $session_data['nama_guru'];
				 $data['kode_guru'] = $session_data['kode_guru'];
				$this->load->view('HeaderFooter/Header', $data);
				$this->load->view('homeview', $data);
				$this->load->view('HeaderFooter/Footer', $data);
		   }
		   else
		   {
		     //If no session, redirect to login page
		     redirect(base_url(), 'refresh');
		   }
	}
}
