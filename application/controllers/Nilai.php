<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

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
     $this->load->model('M_JadwalSiswa', '', TRUE);
     $this->load->model('M_Guru', '', TRUE);
     $this->load->model('M_Siswa', '', TRUE);
     $this->load->model('ModelDB', '', TRUE);
   }
  public function index()
  {
  }

  public function exportExcelData($records){
    $heading = false;
    if (!empty($records))
    foreach ($records as $row) {
      if (!$heading) {
        echo implode("\t", array_keys($row)) . "\n";
        $heading = true;
      }
      echo implode("\t", ($row)) . "\n";
    }
  }

  public function exportExcel()
  {
    $jenjang = $this->input->get('jenjang', TRUE);
    $kelas = $this->input->get('kelas', TRUE);
    $mapel = $this->input->get('mapel', TRUE);
    $model = new ModelDB();
    $query = "select t2.id_jadwal_siswa as id, s.nis as nis, s.nama_siswa as nama, g.kode_guru as kode, t1.kelas as kelas, m.nama_mapel as mapel, t2.nilai_tugas as tugas, t2.nilai_uts as uts, t2.nilai_uas as uas from t_jadwal_siswa t2
              inner join t_siswa s on s.nis = t2.nis
              inner join t_jadwal_semua t1 on t1.id_jadwal = t2.id_jadwal
              inner join t_mapel m on m.kode_mapel = t1.kode_mapel
              inner join t_guru g on g.nip = t1.nip
              where t1.jenjang = $jenjang and t1.kelas = '$kelas' and t1.kode_mapel=$mapel";
    $result = $model->freeQuery($query);
    foreach ($result as $row) {
      # code...
        $nilaiArr[] = new M_JadwalSiswa($row->id, $row->nis, $row->nama, $row->kode, $row->kelas, $row->mapel, $row->tugas, $row->uts, $row->uas);
    }
    $filename = "nilai.xls";
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");
    $this->exportExcelData($nilaiArr);
  }

  public function getDataNilai(){
    $jenjang = $this->input->get('jenjang', TRUE);
    $kelas = $this->input->get('kelas', TRUE);
    $mapel = $this->input->get('mapel', TRUE);
    $model = new ModelDB();
    $query = "select t2.id_jadwal_siswa as id, s.nis as nis, s.nama_siswa as nama, g.kode_guru as kode, t1.kelas as kelas, m.nama_mapel as mapel, t2.nilai_tugas as tugas, t2.nilai_uts as uts, t2.nilai_uas as uas from t_jadwal_siswa t2
              inner join t_siswa s on s.nis = t2.nis
              inner join t_jadwal_semua t1 on t1.id_jadwal = t2.id_jadwal
              inner join t_mapel m on m.kode_mapel = t1.kode_mapel
              inner join t_guru g on g.nip = t1.nip
              where t1.jenjang = $jenjang and t1.kelas = '$kelas' and t1.kode_mapel=$mapel";
    $result = $model->freeQuery($query);
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $data['nilai'] = $result;
         $data['jenjang'] = $jenjang;
         $data['kodemapel'] = $mapel;
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('shownilaiview', $data);
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function updateNilai(){
    $id = $this->input->post('id');
    $tugas = $this->input->post('n_tugas');
    $uts= $this->input->post('n_uts');
    $uas = $this->input->post('n_uas');
    $model = new ModelDB();
    for($i=0; $i<sizeof($id); $i++){
      $data = array(
            'nilai_tugas'       => $tugas[$i],
            'nilai_uts'         => $uts[$i],
            'nilai_uas'         => $uas[$i]
      );
      $model->editData('id_jadwal_siswa', $id[$i], 't_jadwal_siswa', $data);
    }
    redirect(base_url('index.php/Nilai/viewTabelNilai'), 'refresh');
  }

  public function viewTabelNilai(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('inputnilaiseluruhview', $data);
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function readDataNilai(){

  }
}
