<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwalsiswa extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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

  public function getRandomSiswa(){
    $model = new ModelDB();
    $jenjang = $this->input->get('jenjang', TRUE);
    $kelas = $this->input->get('kelas', TRUE);
    $jumlah = $this->input->get('jumlah', TRUE);
    $tingkat = substr($kelas,0,1);
    $query1 = "SELECT t1.nis
              FROM t_siswa t1
              left JOIN t_jadwal_siswa t2 ON t2.nis = t1.nis
              WHERE t1.jenjang='$jenjang' and t1.tingkat='$tingkat' and t2.nis IS NULL
              order by rand() limit $jumlah";
    $row1 = $model->freeQuery($query1);
    $query2 = "SELECT id_jadwal from t_jadwal_semua where kelas = '$kelas'";
    $row2 = $model->freeQuery($query2);
    // echo $row2[0]->id_jadwal;
    for($i=0; $i < sizeof($row1);$i++){
      for($j=0; $j < sizeof($row2); $j++){
        $nis = $row1[$i]->nis;
        $id_jadwal = $row2[$j]->id_jadwal;
        $query = "insert into t_jadwal_siswa (nis, id_jadwal) values ('$nis', '$id_jadwal')";
        $tes = $model->freeQueryInsert($query);
      }
    }
    redirect (base_url('index.php/JadwalSiswa/viewSetSiswa'), 'refresh');
  }

  public function readDataSiswaBy(){
      $model = new ModelDB();
      $que = "SELECT t1.*
              FROM t_siswa t1
              left JOIN t_jadwal_siswa t2 ON t2.nis = t1.nis
              WHERE t2.nis IS NULL";
      $result = $model->freeQuery($que);
      foreach ($result as $row) {
        # code...
          $siswaArr[] = new M_Siswa($row->nis, $row->nama_siswa, $row->tgl_lahir, $row->alamat, $row->nama_orangtua, $row->jenjang, $row->tingkat);
      }
      return $siswaArr;
  }

  public function jsonSiswaBy(){
    $jenjang = $this->input->get('jenjang', TRUE);
    $tingkat = $this->input->get('tingkat', TRUE);
    $objSiswa = $this->readDataSiswaBy($jenjang, $tingkat);
    foreach ($objSiswa as $as) {
      if($as->getJenjang()=='0'){
          $jenjang = "Taman Kanak-Kanak";
      } else if ($as->getJenjang()=='1'){
          $jenjang = "Madrasah Ibtidaiyah";
      } else {
          $jenjang = "Madrasah Tsanawiyah";
      }
      $dataSiswa[] = array(
        'nis'         => $as->getNis(),
        'nama_siswa'  => $as->getNamaSiswa(),
        'jenjang'     => $jenjang,
        'tingkat'     => $as->getTingkat(),
      );
    }
    $dataS = array("data"=>$dataSiswa);
    $jsonSiswa = json_encode($dataS);
    echo $jsonSiswa;
  }

  public function viewSetSiswa(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('setjadwalsiswaview', $data);
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }
}
