<?php 
echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/AdminLTE/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="assets/AdminLTE/dist/img/AtongBaeLogo.png" alt="AtongBae Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong><b>Atong<i>Bae</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../Admin.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-map-marked-alt"></i>
              <p>
                Alamat 
                <i class="right fas fa-angle-left"></i>
              </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../assets/FrontEnd/kecamatan.php" class="nav-link">
                <i class="fas fa-university"></i>
                  <p>Data Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../assets/FrontEnd/desa.php" class="nav-link">
                <i class="far fa-building"></i>
                  <p>Data Desa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../assets/FrontEnd/dusun.php" class="nav-link">
                <i class="fas fa-city"></i>
                  <p>Data Dusun</p>
                </a>
              </li>
              </ul>
         </li>
          <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-users"></i>
              <p>
                User 
                <i class="right fas fa-angle-left"></i>
              </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../assets/FrontEnd/user_daftar.php" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>User Daftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../assets/FrontEnd/user.php" class="nav-link">
                <i class="fas fa-users-cog"></i>
                  <p>Data User</p>
                </a>
              </li>
              </ul>
         </li>
          <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-chalkboard-teacher"></i>
              <p>
                Kurir 
                <i class="right fas fa-angle-left"></i>
              </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../assets/FrontEnd/kurir_daftar.php" class="nav-link">
                <i class="fas fa-id-card-alt"></i>
                  <p>Kurir Daftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../assets/FrontEnd/kurir.php" class="nav-link">
                <i class="fas fa-users-cog"></i>
                  <p>Data Kurir</p>
                </a>
              </li>
              </ul>
         </li>
          <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-boxes"></i>
              <p>
                Pesanan 
                <i class="right fas fa-angle-left"></i>
              </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../assets/FrontEnd/pesanan_masuk.php" class="nav-link">
                <i class="fas fa-box-open"></i>
                  <p>Pesanan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../assets/FrontEnd/pesanan_selesai.php" class="nav-link">
                <i class="fas fa-people-carry"></i>
                  <p>Pesanan Selesai</p>
                </a>
              </li>
              </ul>
         </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fas fa-receipt"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="../assets/FrontEnd/keluar.php" class="nav-link">
             <i class="fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->';
?>