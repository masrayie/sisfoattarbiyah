<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalSeluruh extends CI_Controller {

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
    
  }

  public function viewInputJadwalAll(){
    $this->load->view('HeaderFooter/Header');
    $this->load->view('inputjadwalview');
    $this->load->view('HeaderFooter/Footer');
  }

  public function viewTabelJadwalAll(){
    $this->load->view('HeaderFooter/Header');
    $this->load->view('tabeljadwalview');
    $this->load->view('HeaderFooter/Footer');
  }
}
