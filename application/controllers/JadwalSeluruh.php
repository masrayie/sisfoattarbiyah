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

   function __construct(){
     parent::__construct();
     $this->load->model('M_Jadwal', '', TRUE);
     $this->load->model('M_Shift', '', TRUE);
     $this->load->model('ModelDB', '', TRUE);
   }

  public function index()
  {

  }

  public function viewSettingShift(){
    if($this->session->userdata('logged_in'))
       {
         $model = new ModelDB();
         $dataShift = $model->readDataAll('t_shift');
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $data['dataShift'] = $dataShift;
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('inputshiftview', $data);
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function viewTabelJadwalAll(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('tabeljadwalview');
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function saveShift(){
    $idshift     = "";
    $jam_mulai    = $this->input->post('jam_mulai');
    $jam_selesai  = $this->input->post('jam_selesai');
    $keterangan   = $this->input->post('keterangan');
    $data         = array(
          'id_shift'        => $idshift,
          'jam_mulai'       => $jam_mulai,
          'jam_berakhir'    => $jam_selesai,
          'keterangan'      => $keterangan
    );
    $model = new ModelDB();
    $model->insertData($data, 't_shift');
    redirect(base_url('index.php/JadwalSeluruh/viewSettingShift'), 'refresh');
  }

  public function viewEditShift(){
    $id_shift = $this->uri->segment(3);
        if($this->session->userdata('logged_in'))
         {
           $session_data = $this->session->userdata('logged_in');
           $data['nip'] = $session_data['nip'];
           $data['nama_guru'] = $session_data['nama_guru'];
           $data['kode_guru'] = $session_data['kode_guru'];
           $model = new ModelDB();
           $dataShift = $model->readDataAll('t_shift');
           $data['dataShift'] = $dataShift;
           $result = $model->readDataWhere('id_shift', $id_shift, 't_shift');
            if($result){
              foreach ($result as $row) {
                  $id_shift = $row->id_shift;
                  $jam_mulai = $row->jam_mulai;
                  $jam_selesai = $row->jam_berakhir;
                  $keterangan = $row->keterangan;
              }
              $objShift = new M_Shift($id_shift, $jam_mulai, $jam_selesai, $keterangan);
              $data['objShift'] = $objShift;
              $this->load->view('HeaderFooter/Header', $data);
              $this->load->view('editShiftView', $data);
              $this->load->view('HeaderFooter/Footer');
         }
         else
         {
           //If no session, redirect to login page
           redirect(base_url(), 'refresh');
         }
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }


}
