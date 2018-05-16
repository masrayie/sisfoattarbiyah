<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sisfo At-Tarbiyah Al-Islamiyah</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url("assets/node_modules/mdi/css/materialdesignicons.min.css");?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/node_modules/simple-line-icons/css/simple-line-icons.css");?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/vendor/Select2/dist/css/select2.min.css");?>"/>
  <link rel="stylesheet" href="<?php echo base_url("assets/vendor/JTimePicker/dist/jquery-clockpicker.css");?>"/>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style2.css");?>"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url("assets/images/logo_kecil2.png");?>" />
  <style type="text/css">
      .select2-results__options{
        font-size:12px !important;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo base_url("assets/images/logoattarbiy.svg");?>" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url("assets/images/logo_kecil2.png");?>" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="mdi mdi-home-outline"></i><span style="padding-top: 0px; border-bottom: 2px solid #FFFFFF; line-height: 24px;">Sistem Informasi At-Tarbiyah Al-Islamiyah</span></a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-account"></i> Asep
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item" style="pointer-events: none; cursor: default;">
                <i class="mdi mdi-settings"></i><p class="mb-0 font-weight-normal float-left">Account Operation
                </p>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-lock"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h7 class="preview-subject font-weight-medium">Lock Page</h7>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item" href="<?php echo base_url().'index.php/login/logout/'; ?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="mdi mdi-logout"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h7 class="preview-subject font-weight-medium">Sign Out</h7>
                </div>
              </a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="<?php echo base_url('photoguru/'.$nip.'.jpg');?>" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?php echo $nama_guru; ?></p>
                <p class="designation">Wakepsek</p>
                <div class="badge badge-teal mx-auto mt-3">Online</div>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url().'index.php/Homepage' ?>"><img class="menu-icon" src="<?php echo base_url("assets/images/menu_icons/01.png");?>" alt="menu icon"><span class="menu-title">Dashboard</span></a></li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu_siswa" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="<?php echo base_url("assets/images/menu_icons/02.png")?>" alt="menu icon"> <span class="menu-title">Data Siswa</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="menu_siswa">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/siswa/viewInputSiswa' ?>">Input Siswa</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/siswa/viewTabelSiswa' ?>">Tabel Siswa</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu_guru" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="<?php echo base_url("assets/images/menu_icons/03.png")?>" alt="menu icon"> <span class="menu-title">Data Guru</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="menu_guru">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/guru/viewInputGuru' ?>">Input Guru</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/guru/viewTabelGuru' ?>">Tabel Guru</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu_mapel" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="<?php echo base_url("assets/images/menu_icons/04.png")?>" alt="menu icon"> <span class="menu-title">Mata Pelajaran</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="menu_mapel">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/matapelajaran/viewInputMapel' ?>">Input Mapel</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/matapelajaran/viewTabelMapel' ?>">Tabel Mapel</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu_jadwal" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="<?php echo base_url("assets/images/menu_icons/05.png")?>" alt="menu icon"> <span class="menu-title">Penjadwalan</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="menu_jadwal">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/JadwalSeluruh/viewTabelJadwalAll' ?>">Set Jadwal</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/jadwalsiswa/viewSetSiswa' ?>">Jadwal Siswa</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/JadwalSeluruh/viewJadwalSeluruh' ?>">Tabel Jadwal</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#menu_nilai" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="<?php echo base_url("assets/images/menu_icons/06.png")?>" alt="menu icon"> <span class="menu-title">Nilai</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="menu_nilai">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url().'index.php/Nilai/viewTabelNilai' ?>">Tabel Nilai</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="pages/icons/font-awesome.html"><img class="menu-icon" src="<?php echo base_url("assets/images/menu_icons/07.png");?>" alt="menu icon"> <span class="menu-title">Pelaporan</span></a></li>
        </ul>
      </nav>
