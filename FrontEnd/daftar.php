<?php   
 include '../database/db.php';

//  jika tombol simpan di tekan
if(isset($_POST['simpan'])){
    // simpan data 
    $vnamaUser = $_POST['namaUser'];
    $vnomor = $_POST['nomor'];
    $vnamaToko = $_POST['namaToko'];
    $vkategoriUsaha = $_POST['kategoriUsaha'];
    $valamat = $_POST['alamat'];
    $vemail = $_POST['email'];
    $vpassword = md5($_POST['password']);
    $vstatus = "Belum";
    $sql = "SELECT * FROM tbl_user WHERE email='$vemail'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0){
    // menyimpan data kedalam tabel user
    $query = mysqli_query($conn, "INSERT INTO `tbl_user` (`id_user`, `nama_user`, `nomor`, `nama_toko`, `kategori_usaha`, `alamat`, `email`, `password`, `lat`, `lng`, `gambar`, `status`) VALUES (NULL, '$vnamaUser', '$vnomor', '$vnamaToko', '$vkategoriUsaha', '$valamat', '$vemail', '$vpassword', '', '', '', '$vstatus')");
     
    // jika berhasil menyimpan data 
            if($query){
              echo "<script>
                    alert('Pendaftaran Anda Sudah Berhasil, kami akan mengkonfirmasi pendaftaran anda kurang dari 1 jam');
                    document.location='masuk.php';
                    </script>";
            }else{
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
            
        }else{
            echo "<script>
      alert('Maaf pendaftaran anda gagal, Email ini Sudah Di Gunakan');
      document.location='daftar.php';
      </script>";
        }
    
}
// end
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AtongBae | Daftar</title>
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../assets/css/mdb.min.css" />

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v4.6.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="#"><span>AtongBae</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Visi & Misi</a></li>
              <li><a href="#">Hubungi Kami</a></li>
              <li><a href="#">Temukan Kami</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto active" href="daftar.php">Daftar</a></li>
          <li><a class="nav-link scrollto" href="masuk.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

  </section><!-- End Hero -->

  <main id="main">

  <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 d-flex justify-content-center align-items-stretch" data-aos="fade-right">
          <img src="../assets/img/conten6.png"  alt="" width="80%">
        </div>
          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
          <div class="section-title" data-aos="fade-up"> 
            <h2>Form Daftar</h2>
        </div>
          <form action="daftar.php" method="POST">
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col-12 mb-3">
              <div class="form-outline">
                <input type="text" name="namaUser" id="form6Example1" class="form-control" required/>
                <label class="form-label" for="form6Example1">Masukkan nama lengkap kamu</label>
              </div>
            </div>
            <!--<div class="col-12">-->
            <!--  <div class="form-outline">-->
            <!--    <input type="text" name="nomor" id="form6Example2" class="form-control" required/>-->
            <!--    <label class="form-label" for="form6Example2">Nomor whatsapp kamu</label>-->
            <!--  </div>-->
            <!--</div>-->
            <div class="col-auto">
              <label class="form-label" for="form6Example2">Nomor whatsapp kamu</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+62</div>
                </div>
                <input type="text" name="nomor" id="form6Example2" class="form-control" placeholder="83129001234" required >
                <small><i>Tulis nomor whatsapp tanpa 0, menjadi <strong>(83129001234)</strong></i></small>
              </div>
            </div>
          </div>

          <!-- Text input -->
          <div class="form-outline mb-4">
            <input type="text" name="namaToko" id="form6Example3" class="form-control" required />
            <label class="form-label" for="form6Example3">Nama toko mu</label>
          </div>

          <!-- Number input -->
          <div class="form-outline-group mb-4">
            <label class="form-label" for="form6Example6">Pilih kategori usaha</label>
            <select class="form-control" name="kategoriUsaha" id="form6Example6">
              <option value="Online Store">Online Store</option> 
              <option value="Lainnya">Lainnya</option>
            </select>
          </div>

          <!-- Text input -->
          <div class="form-outline mb-4">
            <textarea type="text" name="alamat" id="form6Example4" class="form-control" required></textarea>
            <label class="form-label" for="form6Example4">Alamat kamu</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form6Example5" class="form-control" required/>
            <label class="form-label" for="form6Example5">Email</label>
          </div>

          <!-- password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form6Example6" class="form-control" required/>
            <label class="form-label" for="form6Example6">Password</label>
          </div>

          <!-- Submit button -->
          <button type="submit" name="simpan" class="btn btn-success btn-block mb-4">Daftar</button>
        </form>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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

          <!-- maps -->
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKzpT83jpaMlRLJYaTdOfsQ9QWDZuzvqs&libraries=drawing,places,geometry&callback=initialize" async defer></script>
          <!-- end maps -->
  <!-- Vendor JS Files -->
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

        <!-- MDB -->
  <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>

</body>

</html>