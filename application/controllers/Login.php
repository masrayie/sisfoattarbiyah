<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
    $this->load->model('M_Guru', '' , TRUE);
    $this->load->model('ModelDB', '' , TRUE);
  }

  public function index()
  {
    $this->load->view('loginview');
  }

  public function verifyLogin(){
      
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

      $this->form_validation->set_rules('nip', 'nip', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

      $niplogin = $this->input->post('nip');
      $passwordlogin = md5($this->input->post('password'));
      if($this->check_database($niplogin, $passwordlogin) == FALSE)
      {
        redirect(base_url(), 'refresh');
      }
      else
      {
       //Go to private area
         redirect('homepage', 'refresh');
      }
  }

  function check_database($nip, $password)
   {
     //Field validation succeeded.  Validate against database
    $model = new ModelDB();
    $result = $model->readDataWhere('nip', $nip, 't_guru');
    if($result){
      foreach ($result as $row) {
          $nipku = $row->nip;
          $namaGuru = $row->nama_guru;
          $kode_guru = $row->kode_guru;
          $alamat = $row->alamat;
          $email = $row->email;
          $passwordku = $row->password;
      }
      $objGuru = new M_Guru($nipku, $namaGuru, $alamat, $kode_guru, $email, $passwordku);
      if($objGuru->getNip() == $nip && $objGuru->getPassword() == $password){
          $sess_array = array(
             'nip' => $objGuru->getNip(),
             'kode_guru' => $objGuru->getKodeGuru(),
             'nama_guru' => $objGuru->getNamaGuru()
           );
           $this->session->set_userdata('logged_in', $sess_array);
           return TRUE;
        }
         else {
          $this->form_validation->set_message('check_database', 'Invalid username or password');
           return false;
         }
    } else {
      return false;
    }
   }

   public function logout()
    {
      $this->session->unset_userdata('logged_in');
      session_destroy();
      redirect(base_url(), 'refresh');
    }
}
