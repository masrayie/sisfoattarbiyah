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
     $this->load->model('M_MataPelajaran', '', TRUE);
     $this->load->model('M_Guru', '', TRUE);
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

  public function generateIdJadwal($i){
      $model  = new ModelDB();
      $query = $model->readDataWhere('idc',1,'t_counter');
      foreach ($query as $row ) {
        $result = $row->countjadwal;
      }
      $result  = $result + $i ;
      $id_jadwal = "";
        if($result/10 > 999){
             $id_jadwal = "JDW".$result;
           } elseif ($result/10 > 99) {
               $id_jadwal = "JDW"."0".$result;
           } elseif ($result/10 > 9) {
               $id_jadwal = "JDW"."00".$result;
           } elseif ($result/10 >= 1) {
               $id_jadwal = "JDW"."000".$result;
           } else{
               $id_jadwal = "JDW"."0000".$result;
           }
      // $dataID = array($id_jadwal, $result);
      $data = array('no'=>1, 'id_jadwal'=>$id_jadwal);
      echo json_encode($data);
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

  public function readDataShiftAll(){
      $model = new ModelDB();
      $result = $model->readDataAll('t_shift');
      foreach ($result as $row) {
        # code...
          $shiftArr[] = new M_Shift($row->id_shift, $row->jam_mulai, $row->jam_berakhir, $row->keterangan);
      }
      return $shiftArr;
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

  public function jsonMapel(){
      $objMapel  = $this->readDataMapelAll();
      foreach ($objMapel as $as) {
        $dataMapel[] = array(
          'id'   => $as->getKodeMapel(),
          'text'   => $as->getNamaMapel()
        );
      }
      $jsonMapel = json_encode($dataMapel);
      echo $jsonMapel;
      // return $jsonMapel;
  }

  public function jsonGuru(){
      $objGuru  = $this->readDataGuruAll();
      foreach ($objGuru as $as) {
        $dataGuru[] = array(
          'id'     => $as->getKodeGuru(),
          'text'   => $as->getKodeGuru().' - '.$as->getNamaGuru()
        );
      }
      $jsonGuru = json_encode($dataGuru);
      echo $jsonGuru;
  }

  public function jsonShift(){
      $objShift  = $this->readDataShiftAll();
      foreach ($objShift as $as) {
        $dataShift[] = array(
          'id'   => $as->getIdShift(),
          'text'   => 'Shift '.$as->getIdShift()
        );
      }
      $jsonShift = json_encode($dataShift);
      echo $jsonShift;
  }

  public function getJam($id){
      $model = new ModelDB();
      $query = $model->readDataWhere('id_shift',$id,'t_shift');
      foreach ($query as $row ) {
        $jam_mulai = $row->jam_mulai;
        $jam_selesai = $row->jam_berakhir;
        $keterangan = $row->keterangan;
      }
      $dataJam = array('jam_mulai'=> $jam_mulai, 'jam_selesai'=> $jam_selesai, 'keterangan'=> $keterangan);
      $jsonJam = json_encode($dataJam);
      echo $jsonJam;
  }

  public function viewTabelJadwalAll(){
    if($this->session->userdata('logged_in'))
       {
         $model     = new ModelDB();
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('tabeljadwalview', $data);
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
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

    public function updateShift(){
        $id_shift     = $this->uri->segment(3);
        $jam_mulai    = $this->input->post('jam_mulai');
        $jam_selesai  = $this->input->post('jam_selesai');
        $keterangan   = $this->input->post('keterangan');
        $data         = array(
              'id_shift'      => $id_shift,
              'jam_mulai'     => $jam_mulai,
              'jam_berakhir'   => $jam_selesai,
              'Keterangan'    => $keterangan
        );
        $model = new ModelDB();
        $model->editData('id_shift', $id_shift, 't_shift', $data);
        redirect(base_url('index.php/JadwalSeluruh/viewSettingShift'), 'refresh');

    }

}
