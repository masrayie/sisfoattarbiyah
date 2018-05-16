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
  public function index()
  {
    parent::__construct();
    $this->load->model('M_Jadwal', '', TRUE);
    $this->load->model('M_Shift', '', TRUE);
    $this->load->model('M_MataPelajaran', '', TRUE);
    $this->load->model('M_Guru', '', TRUE);
    $this->load->model('ModelDB', '', TRUE);
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
