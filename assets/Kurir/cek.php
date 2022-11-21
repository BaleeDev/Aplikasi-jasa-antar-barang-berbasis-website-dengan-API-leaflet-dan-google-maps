<?php
include '../../database/db.php';
session_start(); 
// include 'Layout/header.php';
if(isset($_SESSION['kurir'])){
    // $user_check=$_SESSION['login_user'];
    $sql="select * from tbl_kurir where id_kurir='$_SESSION[kurir]'";
    $ses=mysqli_query($conn,$sql);
    $row =mysqli_fetch_assoc($ses);
    $id = $row['id_kurir'];
    $nama = $row['nama_kurir'];
    $email = $row['nohp'];
    $status = $row['status'];
    $login_session =$row['nama_kurir'];
  
}else{
    echo "<script>
       document.location='masuk.php';
       </script>"; 
}

   if($status == "Belum"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../AdminLTE/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../AdminLTE/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../AdminLTE/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="sweetalert2.min.css">
  
    <link rel="stylesheet" href="css/mdb.min.css" />
    
    <!--select2-->
   <link rel="stylesheet" href="../AdminLTE/plugins/select2/css/select2.min.css">
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
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
      <span class="brand-text font-weight-light"><strong><b>Atong<i>Bae</strong></span>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
         <li class="nav-item">
            <a href="../../kurir.php" class="nav-link ">
              <i class="fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="daftar_kurir.php" class="nav-link">
             <i class="fas fa-user-plus"></i>
              <p>
                Daftar
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="masuk.php" class="nav-link">
             <i class="far fa-user"></i>
              <p>
                Masuk
              </p>
            </a>
          </li> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- ======= Hero Section ======= -->
  <section id="hero">

<div class="container">
  <div class="row justify-content-between">
    <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
      <div data-aos="zoom-out">
        <h1 class="text-center">Akun Anda Belum Di Verifikasi, Tim Kami Akan Segera Menghubungi Anda.</h1>
        <h2>Jika akun anda belum di verifikasi lebih dari 2 Jam, silahkan hubungi <a href="https://api.whatsapp.com/send?phone=6281353652511&text=Akun%20saya%20Belum%20di%20Verifikasi%20Dengan%20Nama%20:%20<?=$nama?>%20Nomor%20Hp:%20<?=$email?>" type="submit" class="btn-get-started scrollto">Kami</a></h2>
      </div>
    </div>
    
    <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
      <img src="../../assets/img/cross.png" class="img-fluid animated" alt="" width="100%">
    </div>
  </div>
</div>
</section><!-- End Hero -->
    

<?php 
include 'Layout/footer.php';
session_destroy();     
   }else{
    // header('location:cek_ongkir.php?id=');
    echo "<script>
       document.location='kurir.php';
       </script>"; 
            
   } 
?>