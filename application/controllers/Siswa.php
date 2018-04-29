<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
    $this->load->model('M_Siswa', '', TRUE);
    $this->load->model('ModelDB', '' , TRUE);
  }

  public function index()
  {

  }

  public function viewInputSiswa(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header');
         $this->load->view('inputsiswaview');
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function viewTabelSiswa(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $data['siswaArr'] = $this->readDataSiswaAll();
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('tabelsiswaview', $data);
         $this->load->view('HeaderFooter/Footer', $data);
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function inputDataSiswa(){
      $nis            = $this->input->post('nis');
      $nama_siswa     = $this->input->post('nama_siswa');
      $tgl_lahir      = $this->input->post('tgl_lahir');
      $alamat         = $this->input->post('alamat');
      $nama_orangtua  = $this->input->post('nama_orangtua');
      $jenjang        = $this->input->post('jenjang');
      $objSiswa = new M_Siswa($nis, $nama_siswa, $tgl_lahir, $alamat, $nama_orangtua, $jenjang);
      $model = new ModelDB();
      $res = $model->insertSiswa($objSiswa);
      echo $res;
      redirect(base_url('index.php/siswa/viewInputSiswa/'), 'refresh');
  }

  public function readDataSiswaAll(){
      $model = new ModelDB();
      $result = $model->readDataAll('t_siswa');

      foreach ($result as $row) {
        # code...
          $siswaArr[] = new M_Siswa($row->nis, $row->nama_siswa, $row->tgl_lahir, $row->alamat, $row->nama_orangtua, $row->jenjang);
      }
      return $siswaArr;
  }

  public function deleteDataSiswa()
   {
     $id = $this->uri->segment(3);
     $this->ModelDB->deleteData('nis', $id, 't_siswa');
     redirect(base_url('index.php/siswa/viewTabelSiswa/'), 'refresh');
   }

}
