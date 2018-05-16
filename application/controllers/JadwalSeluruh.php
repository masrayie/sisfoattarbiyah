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

  public function readDataJadwal(){
      $model= new ModelDB();
      $result = $model->readDataAll('t_jadwal_semua');
      foreach ($result as $row) {
        # code...
          $jadwalArr[] = new M_Jadwal($row->id_jadwal, $row->kode_mapel, $row->nip, $row->jenjang, $row->kelas, $row->hari, $row->id_shift);
      }
      return $jadwalArr;
  }

  public function readDataKelas($jenjang){
    $model = new ModelDB();
    $que="select distinct kelas from t_jadwal_semua where jenjang='$jenjang'";
    $query = $model->freeQuery($que);
      foreach ($query as $row) {
        # code...
          $kelas[] = array(
            'id' => $row->kelas,
            'text' => "Kelas ".$row->kelas
          );
      }
      echo json_encode($kelas);
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
        $date = strtotime($as->getJamMulai());
        $time = date('H:i', $date);
        $dataShift[] = array(
          'id'   => $as->getIdShift(),
          'text'   => 'Shift '.$as->getIdShift().' - '.$time
        );
      }
      $jsonShift = json_encode($dataShift);
      echo $jsonShift;
  }

  public function getJam($id){
      $model = new ModelDB();
      $query = $model->readDataWhere('id_shift',$id,'t_shift');
      foreach ($query as $row ) {
        $jam_mulai = date('H:i', strtotime($row->jam_mulai));
        $jam_selesai = date('H:i', strtotime($row->jam_berakhir));
        $keterangan = $row->keterangan;
      }
      $dataJam = array('jam_mulai'=> $jam_mulai, 'jam_selesai'=> $jam_selesai, 'keterangan'=> $keterangan);
      $jsonJam = json_encode($dataJam);
      echo $jsonJam;
  }

  public function getNip($kode_guru){
      $model = new ModelDB();
      $result = $model->readDataWhere('kode_guru', $kode_guru, 't_guru');
      foreach ($result as $row) {
        # code...
        $nip = $row->nip;
      }
      return $nip;
  }

  public function getKodeGuru($nip){
      $model = new ModelDB();
      $result = $model->readDataWhere('nip', $nip, 't_guru');
      foreach ($result as $row) {
        # code...
        $kode = $row->kode_guru;
      }
      return $kode;
  }

  public function getNamaMapel($kodemapel){
      $model = new ModelDB();
      $result = $model->readDataWhere('kode_mapel', $kodemapel, 't_mapel');
      foreach ($result as $row) {
        # code...
        $mapel = $row->nama_mapel;
      }
      return $mapel;
  }

  public function jsonDataJadwal(){
    $objJadwal = $this->readDataJadwal();
    foreach ($objJadwal as $as) {
      if($as->getJenjang()=='0'){
          $jenjang = "Taman Kanak-Kanak";
      } else if ($as->getJenjang()=='1'){
          $jenjang = "Madrasah Ibtidaiyah";
      } else {
          $jenjang = "Madrasah Tsanawiyah";
      }
      $model = new ModelDB();
      $query = $model->readDataWhere('id_shift',$as->getJam(),'t_shift');
      foreach ($query as $row ) {
        $jam_mulai = date('H:i', strtotime($row->jam_mulai));
        $jam_selesai = date('H:i', strtotime($row->jam_berakhir));
        $keterangan = $row->keterangan;
      }
      $dataJadwal[] = array(
        'id_jadwal'   => $as->getIdJadwal(),
        'mapel'       => $this->getNamaMapel($as->getMapel()),
        'kode_guru'   => $this->getKodeGuru($as->getGuru()),
        'jenjang'     => $jenjang,
        'kelas'       => $as->getKelas(),
        'hari'        => $as->getHari(),
        'jam_pel'     => $jam_mulai." s.d. ".$jam_selesai,
        'buton'       => '<button type="button" class="btn btn-primary btn-xs" onclick="editData(\''.$as->getIdJadwal().'\')">ubah</button> &nbsp; <button type="button" onclick="return deleteData(\''.$as->getIdJadwal().'\')" class="btn btn-danger btn-xs">hapus</button>'
      );
    }
    $dataJ = array("data"=>$dataJadwal);
    $jsonJadwal = json_encode($dataJ);
    echo $jsonJadwal;
  }

  public function insertJadwalAll(){
      $model = new ModelDB();
      $dataAll = json_decode(file_get_contents('php://input'), true);
      for($i = 0; $i < sizeof($dataAll['id_jadwal']); $i++){
        $dataJadwal = array(
          'id_jadwal'   => $dataAll['id_jadwal'][$i],
          'kode_mapel'  => $dataAll['mapel'][$i],
          'nip'         => $this->getNip($dataAll['kodeguru'][$i]),
          'jenjang'     => $dataAll['jenjang'][$i],
          'kelas'       => $dataAll['kelas'][$i],
          'hari'        => $dataAll['hari'][$i],
          'id_shift'    => $dataAll['shift'][$i]
        );
        $model->insertData($dataJadwal,'t_jadwal_semua');
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
         $this->load->view('inputjadwalseluruhview', $data);
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function getDataJadwal(){
    $model = new ModelDB();
    $dataAll = json_decode(file_get_contents('php://input'), true);
    $hari = $dataAll['hari'];
    $jenjang = $dataAll['jenjang'];
    $kelas = $dataAll['kelas'];
    if($hari=='-'){
      $query = "Select * from t_jadwal_semua where jenjang='$jenjang' and kelas = '$kelas'";
      $rows = $model->freeQuery($query);
    } else {
      $query = "Select * from t_jadwal_semua where hari = '$hari' and jenjang='$jenjang' and kelas = '$kelas'";
      $rows = $model->freeQuery($query);
    }
    return json_encode($rows);
  }

  public function viewEditOpsional(){
    if($this->session->userdata('logged_in'))
       {

         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $data['jsonJadwal'] = $this->getDataJadwal();
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('editopsionaljadwalview', $data);
         $this->load->view('HeaderFooter/Footer');
       }
       else
       {
         //If no session, redirect to login page
         redirect(base_url(), 'refresh');
       }
  }

  public function viewJadwalSeluruh(){
    if($this->session->userdata('logged_in'))
       {
         $session_data = $this->session->userdata('logged_in');
         $data['nip'] = $session_data['nip'];
         $data['nama_guru'] = $session_data['nama_guru'];
         $data['kode_guru'] = $session_data['kode_guru'];
         $this->load->view('HeaderFooter/Header', $data);
         $this->load->view('tabeljadwalseluruhview', $data);
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

    public function updateJadwalSingle($id){
      $model = new ModelDB();
      $dataJson = json_decode(file_get_contents('php://input'), true);
      $dataJadwal = array(
        'id_jadwal'   => $dataJson['id_jadwal'][0],
        'kode_mapel'  => $dataJson['mapel'][0],
        'nip'         => $this->getNip($dataJson['kodeguru'][0]),
        'jenjang'     => $dataJson['jenjang'][0],
        'kelas'       => $dataJson['kelas'][0],
        'hari'        => $dataJson['hari'][0],
        'id_shift'    => $dataJson['shift'][0]
      );
      $model->editData('id_jadwal', $id, 't_jadwal_semua', $dataJadwal);
      // print_r($dataJadwal);
    }

    public function viewEditJadwalSingle($id_jadwal){
          if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $data['nip'] = $session_data['nip'];
             $data['nama_guru'] = $session_data['nama_guru'];
             $data['kode_guru'] = $session_data['kode_guru'];
             $model = new ModelDB();
             $result = $model->readDataWhere('id_jadwal', $id_jadwal, 't_jadwal_semua');
              if($result){
                foreach ($result as $row) {
                    $jadwalArr = new M_Jadwal($row->id_jadwal, $row->kode_mapel, $this->getKodeGuru($row->nip), $row->jenjang, $row->kelas, $row->hari, $row->id_shift);
                }
                $data['objJadwal'] = $jadwalArr;
                $this->load->view('HeaderFooter/Header', $data);
                $this->load->view('editsinglejadwalview', $data);
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
