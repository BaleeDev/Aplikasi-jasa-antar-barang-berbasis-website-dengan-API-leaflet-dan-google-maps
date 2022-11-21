<?php
include '../database/db.php';
session_start(); 

if(isset($_SESSION['user'])){
    // $user_check=$_SESSION['login_user'];
    $sql="select * from tbl_user where id_user='$_SESSION[user]'";
    $ses=mysqli_query($conn,$sql);
    $row =mysqli_fetch_assoc($ses);
    $id = $row['id_user'];
    $email = $row['email'];
    $status = $row['status'];
    $login_session =$row['nama_user'];
  
}else{
    echo "<script>
       document.location='masuk.php';
       </script>"; 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AtongBae | Cek Ongkir</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>
<body>

     <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="../index.html"><span>AtongBae</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="../index.php">Beranda</a></li>
            
            <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="visi.php">Visi & Misi</a></li>
                <li><a href="hubungi.php">Hubungi Kami</a></li>
              </ul>
            </li>
            <li><a class="nav-link scrollto" href="daftar.php">Daftar</a></li>
            <li><a class="nav-link scrollto" href="masuk.php">Masuk</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
  </header>
<?php 
   if($status == "Belum"){
?>
    <!-- ======= Hero Section ======= -->
  <section id="hero">

<div class="container">
  <div class="row justify-content-between">
    <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
      <div data-aos="zoom-out">
        <h1 class="text-center">Akun Anda Belum Di Verifikasi, Tim Kami Akan Segera Menghubungi Anda.</h1>
        <h2>Jika akun anda belum di verifikasi lebih dari 2 Jam, silahkan hubungi <a href="https://api.whatsapp.com/send?phone=6281353652511&text=Akun%20saya%20Belum%20di%20Verifikasi%20Dengan%20Nama%20Email:%20<?=$email?>" class="btn-get-started scrollto">Kami</a></h2>
      </div>
    </div>
    
    <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
      <img src="../assets/img/cross.png" class="img-fluid animated" alt="" width="100%">
    </div>
  </div>
</div>

<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
  <defs>
    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
  </defs>
  <g class="wave1">
    <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
  </g>
  <g class="wave2">
    <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
  </g>
  <g class="wave3">
    <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
  </g>
</svg>

</section><!-- End Hero -->
    
    <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-12 col-md-12">
            <div class="footer-info">
              <h3>AtongBae</h3>
              <p class="pb-3"><em>Pengiriman barang cepat, aman, amanah dan tidak perlu cemas.</em></p>
              <p>
                Jalan Raya Gondang - Bayan <br>
                Lokok Bengkok, Dusun Karang Jurang, Desa Genggelang, Kecamatan Gangga, Kabupaten Lombok Utara. <br>
                Kode Pos 83353<br><br>
                <strong>Email:</strong> atongbae1@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/atongbae__/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>AtongBae</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">BaleeDev</a>
      </div>
    </div>
  </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKzpT83jpaMlRLJYaTdOfsQ9QWDZuzvqs&libraries=drawing,places,geometry&callback=initialize" async defer></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>
<?php 
session_destroy();     
   }else{
    // header('location:cek_ongkir.php?id=');
    echo "<script>
       document.location='cek_ongkir.php';
       </script>"; 
            
   } 
?>