<?php
include 'database/db.php';
session_start();
  if(isset($_SESSION['user'])){
    if(isset($_SESSION['user'])){
      $user_check=$_SESSION['user'];
      $sql="select * from tbl_user where email='$user_check'";
      $ses=mysqli_query($conn,$sql);
      $row =mysqli_fetch_assoc($ses);
      $id = $row['id_user'];
      
      if(!isset($_SESSION)){
          echo"$user_check";
          
      }
  }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AtongBae | Beranda</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/AdminLTE/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span>AtongBae</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <?php 
        if(!isset($_GET['id'])){
          ?>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="../index.php">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="FrontEnd/visi.php">Visi & Misi</a></li>
              <li><a href="FrontEnd/hubungi.php">Hubungi Kami</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="FrontEnd/daftar.php">Daftar</a></li>
          <li><a class="nav-link scrollto" href="FrontEnd/masuk.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
       <?php }else{
         include 'menu_user.php';
       }
      ?>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Percayakan Pengiriman Barang Anda Dengan <span>AtongBae</span></h1>
            <h2>Pengiriman barang Cepat, Aman, Amanah dan Murah </h2>
            <div class="text-center text-lg-start">
              <a href="FrontEnd/masuk.php" class="btn-get-started scrollto">Mulai</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="assets/img/conten4.png" class="img-fluid animated" alt="" width="100%">
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

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <a href="#" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>AtongBae, Jasa Pengiriman Yang <span>#AmanahMerenten</span></h3>
            <p>AtongBae merupakan Jasa pengiriman yang dapat di percaya yang ada di Kabupaten Lombok Utara. jasa pengiriman AtongBae melakukan pengiriman khusu untuk wilayah yang ada di Kabupaten Lombok Utara. Pengiriman barang cepat tidak butuh waktu lama, barang sampai kurang dari 6 jam dengan aman yang menjadikan jasa pengiriman yang selalu memberikan kesenangan bagi semua orang. <br> <br>
              Kesenangan itu gampang, maka kami terus berusaha mengurangi kesulitan dan keraguan dalam urusan mengirimkan paket agar #AmanahMerenten untuk semua orang!. Kamu cukup pesan dari manapun tanpa rasa cemas, AtongBae akan mengirimkan paket mu tanpa minimum pengiriman paket! dan tentunya dengan harga ongkir yang merenten. </p>


          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Fitur</h2>
          <p>Fitur Dari AtongBae</p>
        </div>
        <div class="row" data-aos="fade-left">
            <div class="col-lg-3 col-md-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <!--<i class="ri-paint-brush-line" style="color: #e361ff;"></i>-->
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAYRJREFUSEvFlY0xBEEQhb+LABEgAyEQASJABkSACMgAGRABIRABMiAD9W1NX3XNze0NZeu66mqvdvvvvX7TM2Nim02cn54C+8AzcA9clIZugCPgGHgZa7KnwAewXZJ8ledmefpt97cF9oDDErQDnK6gUWQW0p6A1+zfQnAFXP5xNteA8XNbSwEhn6QmHOxt6SyQfZfhBpXhbuzZMgSq5Q6Q95aP79/LB5OYrEWn81BdwywyRSpko8G9SR4Kqvjv4FWS8lUUtZlrqy5QU9Oa8xsgUhOM+dvQoL6MwI6E10Khr7ybXOgGS2fL9JPO4czUBeQ4DlEdHLxLidQs8zOxh2+hQA/kMd5zQ02Klg25xXtI9xxwL9UmTQPCTJHQH9PeiaA4nZn3iMvSDf/PsggXZJoPSz5ovrewAw7ea+lG7JyaeLGWVTH5snMWXiaaHNd01QOVlljXUrlyXdcJ8oWjOrQ4jCqstSrmOXpuNIdrZ/6UpeZ2FdnBf1yZ7YXQ+bYHQWeqttsPEvlWGc1UzvQAAAAASUVORK5CYII="/>
              <h3><a href="">Harga Ongkir yang murah</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAVVJREFUSEvFlf0xBEEQR99FgAxkgAgQgRAQgggIQQbIQAbIQAaI4IiAemrnarZvPnavXOl/9m5m5/e6e7p7F2zZFlvWZw7gArgeHLoBHqY4NwWQhPeD4DvQBbUAUfhjELybAyoBasL3g/B3JTXFiCLgFTgYBJLHSTjp1gBpX42j9CcC0uFLIApPBfjeSrcGaN1NL4L/BTwDx8Ap4O+S9SJ4AU5qd2Dez4Er4HZDgA1oJf5azLUbsc4jp3Y/j8AZMCqQ+PIusOyMgBLALn8bzu0Bn7UIXE+e1DglgCPDOTVKTylFrnlBT40oIiD3fq04evkscfIzplRnDkve1yJw3YPOlp0CIQeksv4CjGSV+9YdpD29UiBCBChmtZlOxX06g9as9z0oQewRL9Qom+KtFOWe6K0NaIfnZsfaN6ayar0I8oOKWY6az9q0HcHmAFqO/kkEGwF+ACPjRBlyBB7HAAAAAElFTkSuQmCC"/>
              <h3><a href="">Keamanan pengiriman paket</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNldERwVAQRY8K0IESqAAdUAEqoBQqQAWUQAWUoANUwFyTnYnI8zbJZMj37p7du3dfGtT8NWquTx7gURH6VvMnAA1gU3glDMaHClhCG7hFJGsB1yTmo14IcAD6wBjYRwAjYAccgUE2NgRYAnNAoGEEYM2sgIUX0AHOQNPpqDvQBS5egOKmwNoJmAGbvNiYS6SvEkOTqHM1EtxTDKCmNPopMEkvkTI4aFGAxZuNKwMkkfYgr6ddYi7TjUj/UhKll7xNLGhHJ6Agk0SbwkuWTaV7tvOs1ulJJJfbppaYe50ZSqlDsyTnGbzCCj0VZf8J7seuVkDZ4ibnf/zRiiz3a6znqagEewJ3EjUZ9nhWNgAAAABJRU5ErkJggg=="/>
              <h3><a href="">Pengantaran paket cepat</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAa9JREFUSEu9leE1BEEQhOsiQAZEgAiQARkQASJABIiADBABIkAGRIAIeJ/Xda+3d3du/5z+c7NzPV3V1d0zMy3ZZkuOrykA+5I2Je1K2gpCr5KeJPH70CLZAiDYTQo6FgeQowDr+YwBnEs6C+83SfeJMduAk5GzY48zFxVhCCAHv5Z00pBgNQIfh8+ppKvsXwFg9hIOB8E8+//ERz1HJnfx33aWqzqiJwWtzAkAS2TBbkOO94QOc3yIAcifZQCzQHN3i7V1PXI2BN9IG8hFZ0Fwnn0GsPYUirXtS9KKJOtLIIq+E0xhbOvFyACgc2gvmPiQda/7Q7VHwkdJz5YzA5jpmiTWNmubA8KaLGpbkt1nnCdOpwZjAK5D7nmD1WYwwLck1h2AMYlaUtQYTYkWFZmBgzHG+lLSh6T1qUV2m6IvBXUd8mTXbPLkIglDCuBgm3K4NWgA0eMYs8I3ha7N0Jmjf78q3DGeXFqUVsxtm2VCFnx9IS687OpEWjZf16SP+QE6TEXuBa8tVgvIfcSlZt2H2tX1AChfGXPfqU+mH5ihJzMXukdiCsAY80n7Swf4BVFvcBliTeDwAAAAAElFTkSuQmCC"/>
              <h3><a href="">Bisa menerima pembayaran COD</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Testimonials Section ======= -->
    <!--<section id="testimonials" class="testimonials">-->
    <!--  <div class="container">-->

    <!--    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">-->
    <!--      <div class="swiper-wrapper">-->

    <!--        <div class="swiper-slide">-->
    <!--          <div class="testimonial-item">-->
    <!--            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">-->
    <!--            <h3>Saul Goodman</h3>-->
    <!--            <h4>Ceo &amp; Founder</h4>-->
    <!--            <p>-->
    <!--              <i class="bx bxs-quote-alt-left quote-icon-left"></i>-->
    <!--              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.-->
    <!--              <i class="bx bxs-quote-alt-right quote-icon-right"></i>-->
    <!--            </p>-->
    <!--          </div>-->
    <!--        </div>-->
            <!-- End testimonial item -->

            <!--<div class="swiper-slide">-->
            <!--  <div class="testimonial-item">-->
            <!--    <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">-->
            <!--    <h3>Sara Wilsson</h3>-->
            <!--    <h4>Designer</h4>-->
            <!--    <p>-->
            <!--      <i class="bx bxs-quote-alt-left quote-icon-left"></i>-->
            <!--      Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.-->
            <!--      <i class="bx bxs-quote-alt-right quote-icon-right"></i>-->
            <!--    </p>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- End testimonial item -->

            <!--<div class="swiper-slide">-->
            <!--  <div class="testimonial-item">-->
            <!--    <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">-->
            <!--    <h3>Jena Karlis</h3>-->
            <!--    <h4>Store Owner</h4>-->
            <!--    <p>-->
            <!--      <i class="bx bxs-quote-alt-left quote-icon-left"></i>-->
            <!--      Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.-->
            <!--      <i class="bx bxs-quote-alt-right quote-icon-right"></i>-->
            <!--    </p>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- End testimonial item -->

            <!--<div class="swiper-slide">-->
            <!--  <div class="testimonial-item">-->
            <!--    <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">-->
            <!--    <h3>Matt Brandon</h3>-->
            <!--    <h4>Freelancer</h4>-->
            <!--    <p>-->
            <!--      <i class="bx bxs-quote-alt-left quote-icon-left"></i>-->
            <!--      Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.-->
            <!--      <i class="bx bxs-quote-alt-right quote-icon-right"></i>-->
            <!--    </p>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- End testimonial item -->

            <!--<div class="swiper-slide">-->
            <!--  <div class="testimonial-item">-->
            <!--    <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">-->
            <!--    <h3>John Larson</h3>-->
            <!--    <h4>Entrepreneur</h4>-->
            <!--    <p>-->
            <!--      <i class="bx bxs-quote-alt-left quote-icon-left"></i>-->
            <!--      Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.-->
            <!--      <i class="bx bxs-quote-alt-right quote-icon-right"></i>-->
            <!--    </p>-->
            <!--  </div>-->
            <!--</div>-->
            <!-- End testimonial item -->

    <!--      </div>-->
    <!--      <div class="swiper-pagination"></div>-->
    <!--    </div>-->

    <!--  </div>-->
    <!--</section>-->
    <!-- End Testimonials Section -->

      <!-- ======= Gallery Section ======= -->
      <!--<section id="gallery" class="gallery">-->
      <!--  <div class="container">-->
  
      <!--    <div class="section-title" data-aos="fade-up">-->
      <!--      <h2>Gallery</h2>-->
      <!--      <p>Check our Gallery</p>-->
      <!--    </div>-->
  
      <!--    <div class="row no-gutters" data-aos="fade-left">-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">-->
      <!--          <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">-->
      <!--          <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">-->
      <!--          <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">-->
      <!--          <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">-->
      <!--          <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">-->
      <!--          <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">-->
      <!--          <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--      <div class="col-lg-3 col-md-4">-->
      <!--        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">-->
      <!--          <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox">-->
      <!--            <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">-->
      <!--          </a>-->
      <!--        </div>-->
      <!--      </div>-->
  
      <!--    </div>-->
  
      <!--  </div>-->
      <!--</section>-->
      <!-- End Gallery Section -->
  
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>PERTANYAAN YANG SERING DIAJUKAN</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Kenapa Harus Menggunakan AtongBae? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Karena AtongBae merupakan jasa pengiriman yang aman, amanah, cepat, terpercaya dengan biaya ongkir yang merenten.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Apakah Paket Yang Di Kirimkan Akan Sampai? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Tentu saja, paket yang di kirimkan melalui jasa pengiriman AtongBae akan sampai kepada penerimanya, karena visi dan misi AtongBae adalah Aman, Amanah, Cepat, Merenten.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Apakah Pengiriman Melalui AtongBae Menerima Paket dengan Berat Kurang Dari 1 Kg? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Pengiriman melalui Jasa Kirim AtongBae Tanpa Minimum Pengiriman Paket, Jadi Kami Menerima Pengiriman Paket Yang Kurang Dari 1 Kg.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Bagaimana Cara Menggunakan Jasa Pengiriman AtongBae? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Untuk Bisa Menggunakan Jasa Pengiriman AtongBae, Cukup Dengan Melakukan Pendaftaran Yang Tertera Pada Menu Bagian Atas Dan Isi Forlmulir Yang Dibutuhkan Untuk Melakukan Pendaftaran.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>