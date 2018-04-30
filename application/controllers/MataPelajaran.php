<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MataPelajaran extends CI_Controller {

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
    $this->load->model('M_MataPelajaran', '', TRUE);
    $this->load->model('ModelDB', '' , TRUE);
  }

  public function index()
  {

  }

  public function viewInputMapel(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header');
         $this->load->view('inputmapelview');
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function viewTabelMapel(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $data['mapelArr'] = $this->readDataMapelAll();
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('tabelmapelview', $data);
         $this->load->view('HeaderFooter/Footer', $data);
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function inputDataMapel(){
      $kode_mapel     = $this->input->post('kode_mapel');
      $nama_mapel     = $this->input->post('nama_mapel');

      $data = array(
  			'kode_mapel' 	=> $kode_mapel,
  			'nama_mapel' 	=> $nama_mapel
  		);

      $this->ModelDB->insertData($data, 't_mapel');

      redirect(base_url('index.php/MataPelajaran/viewInputMapel/'), 'refresh');
  }

  public function readDataMapelAll(){
      $model = new ModelDB();
      $result = $model->readDataAll('t_mapel');

      foreach ($result as $row) {
        # code...
          $mapelArr[] = new M_MataPelajaran($row->kode_mapel, $row->nama_mapel);
      }
      return $mapelArr;
  }

  public function viewEditMapel(){
    $nip = $this->uri->segment(3);
        if($this->session->userdata('logged_in'))
         {
           $session_data = $this->session->userdata('logged_in');
           $data['nip'] = $session_data['nip'];
           $data['nama_guru'] = $session_data['nama_guru'];
           $data['kode_guru'] = $session_data['kode_guru'];
           $model = new ModelDB();
           $result = $model->readDataWhere('kode_mapel', $nip, 't_mapel');
            if($result){
              foreach ($result as $row) {
                  $kode_mapel = $row->kode_mapel;
                  $nama_mapel = $row->nama_mapel;
              }
              $objMapel = new M_MataPelajaran($kode_mapel, $nama_mapel);
              $data['objMapel'] = $objMapel;
           $this->load->view('HeaderFooter/Header', $data);
           $this->load->view('editmapelview', $data);
           $this->load->view('HeaderFooter/Footer');
         }
         else
         {
           //If no session, redirect to login page
           redirect(base_url(), 'refresh');
         }
       }
  }

  public function editDataMapel(){
    $kode_mapel     = $this->uri->segment(3);
    $nama_mapel     = $this->input->post('nama_mapel');

    $data = array('nama_mapel'    => $nama_mapel
                );

    $this->ModelDB->editData('kode_mapel', $kode_mapel, 't_mapel', $data);

    redirect(base_url('index.php/MataPelajaran/viewTabelMapel/'), 'refresh');
  }

  public function deleteDataMapel()
   {
     $id = $this->uri->segment(3);
     $this->ModelDB->deleteData('kode_mapel', $id, 't_mapel');
     redirect(base_url('index.php/MataPelajaran/viewTabelMapel/'), 'refresh');
   }
}
