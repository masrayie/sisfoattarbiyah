<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
    $this->load->model('M_Guru', '', TRUE);
    $this->load->model('ModelDB', '', TRUE);
  }

  public function index()
  {

  }

  public function viewInputGuru(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header');
         $this->load->view('inputguruview');
         $this->load->view('HeaderFooter/Footer');        
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function viewTabelGuru(){
     if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $data['guruArr'] = $this->readDataGuruAll();
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('tabelguruview', $data);
         $this->load->view('HeaderFooter/Footer', $data);      
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function inputDataGuru(){
    $nip        = $this->input->post('nip');
    $nama_guru  = $this->input->post('nama_guru');
    $alamat     = $this->input->post('alamat');
    $kode_guru  = $this->input->post('kode_guru');
    $email      = $this->input->post('email');
    $password   = md5($this->input->post('nip'));
    $objGuru    = new M_Guru($nip, $nama_guru, $alamat, $kode_guru, $email, $password);
    $model      = new ModelDB();
    $res        = $model->insertGuru($objGuru);
  }

  public function readDataGuruAll(){
      $model = new ModelDB();
      $result = $model->readDataAll('t_guru');
      foreach ($result as $row) {
        # code...
          $guruArr[] = new M_Guru($row->nip, $row->nama_guru, $row->alamat, $row->kode_guru, $row->email, $row->password);
      }
      return $guruArr;
  }
  
  public function viewEditGuru($nip){
        if($this->session->userdata('logged_in'))
         {
           $session_data = $this->session->userdata('logged_in');
           $data['nip'] = $session_data['nip'];
           $data['nama_guru'] = $session_data['nama_guru'];
           $data['kode_guru'] = $session_data['kode_guru'];
           $model = new ModelDB();
           $result = $model->readDataWhere('nip', $nip, 't_guru');
            if($result){
              foreach ($result as $row) {
                  $nipguru      = $row->nip;
                  $namaGuru     = $row->nama_guru;
                  $kode_guru    = $row->kode_guru;
                  $alamat       = $row->alamat;
                  $email        = $row->email;
                  $passwordguru = $row->password;
              }
              $objGuru = new M_Guru($nipguru, $namaGuru, $alamat, $kode_guru, $email, $passwordguru);
              $data['objGuru'] = $objGuru;
           $this->load->view('HeaderFooter/Header', $data);
           $this->load->view('editguruview', $data);
           $this->load->view('HeaderFooter/Footer');        
         }
         else
         {
           //If no session, redirect to login page
           redirect(base_url(), 'refresh');
         }
  }

  public function editDataGuru($nip){

  }
}
