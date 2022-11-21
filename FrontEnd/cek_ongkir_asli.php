<?php   
session_start();
 include '../database/db.php';
$vberat = "";

//  jika button cek ongkir di tekan 
if(isset($_POST['btnongkir'])){
  $vberat = $_POST['berat'];
    
    if(@$_SESSION['user']){
        $tampil = mysqli_query($conn, "SELECT*FROM tbl_user WHERE id_user='$_SESSION[user]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            $viduser  = $data['id_user'];
            $vnama_dusun1 = $data['nama_toko'];
            $vlat1 = $data['lat'];
            $vlng1 = $data['lng'];
    
        }
    }else{
    $id_asal = $_POST['asal'];
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_dusun WHERE id_dusun='$id_asal' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        $vid1  = $data['id_dusun'];
        $vnama_dusun1 = $data['nama_dusun'];
        $vlat1 = $data['lat'];
        $vlng1 = $data['lng'];
    }   
    }
    $id_tujuan = $_POST['tujuan'];
    $tampil2 = mysqli_query($conn, "SELECT*FROM tbl_dusun WHERE id_dusun='$id_tujuan' ");
    $data2 = mysqli_fetch_array($tampil2);
    if($data2)
    {
        $vid2  = $data2['id_dusun'];
        $vlat2 = $data2['lat'];
        $vlng2 = $data2['lng'];
        $vnama_dusun2 = $data2['nama_dusun'];

    }
}

// end
 ?>

 <!-- java script -->
 <script>
    var map;
var Rute;
var RuteService;
var markers = [
    ['Kr.Bedil', -8.339494, 116.190590],
    ['Kr.Amor', -8.337109, 116.188712],
    ['Kr.Anyar', -8.337449, 116.191716],
    ['Kr.Pendagi', -8.335889, 116.191383],
    ['Lekok', -8.345836, 116.178519],
    ['Gotim', -8.335900, 116.193722]
];

function initMap() {
    // menentukan kordinat peta 
    var MapOptions = {
        // Titik kordinat peta 
        center: new google.maps.LatLng(-8.373908, 116.277707),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }
    map = new google.maps.Map(document.getElementById('map'), MapOptions);
}


function haversine_distance(mk1, mk2) {
    var R = 3958.8; // Radius of the Earth in miles
    var rlat1 = mk1.position.lat() * (Math.PI / 180); // Convert degrees to radians
    var rlat2 = mk2.position.lat() * (Math.PI / 180); // Convert degrees to radians
    var difflat = rlat2 - rlat1; // Radian difference (latitudes)
    var difflon = (mk2.position.lng() - mk1.position.lng()) * (Math.PI / 180); // Radian difference (longitudes)

    var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
    return d;
}

function cek(){
    // Locations of landmarks
    var asallat = '<?php print $vlat1?>';
    var asallng ='<?php print $vlng1?>';
    var tujuanlat = '<?php print $vlat2?>';
    var tujuanlng ='<?php print $vlng2?>';
    var infowindow = new google.maps.InfoWindow(), marker, i, j, frick;
    i = 0;
        // mengambil lat lng daerah asal
        pos = new google.maps.LatLng( asallat, asallng);

        dahkota = pos;
        marker = new google.maps.Marker({
            position: pos,
            map: map
        });
            // mengambil lat lng daerah tujuan
            frick = new google.maps.LatLng(tujuanlat, tujuanlng);
            var mk1 = new google.maps.Marker({ position: pos, map: map });
            var mk2 = new google.maps.Marker({ position: frick, map: map });
            var line = new google.maps.Polyline({ path: [pos, frick], map: map });
            // menghitung jarak
            var distance = haversine_distance(mk1, mk2);
            document.getElementById('msg').innerHTML = distance.toFixed(2);
            document.getElementById('tampungJarak').value = distance.toFixed(2);
            // mengambil nilai berat
            var berat = document.getElementById("berat").value;
            document.getElementById('tberat').innerHTML = berat;
            document.getElementById('tampungBerat').value = berat;
            // memanggil function hitungOngkir
            var distanceFix = distance.toFixed(2);
            var totalOngkir = hitungOngkir(berat, distanceFix);
            document.getElementById('ongkir').innerHTML = totalOngkir;
            document.getElementById('tampungOngkir').value = totalOngkir;
            
}
function hitungOngkir(berat, jarak){
  var hargaOngkir = 1000;
  var totalHarga;
  if(jarak <= 1){
    if(berat <= 1 ){
      totalHarga = hargaOngkir + 1000;
    }else if(berat <= 2){
      totalHarga = hargaOngkir + 1500;
    }else{
      totalHarga = hargaOngkir + 2000;
    }
  }else if(jarak <= 2){
    hargaOngkir += 1000;
    if(berat <= 1 ){
      totalHarga = hargaOngkir + 1000;
    }else if(berat <= 2){
      totalHarga = hargaOngkir + 1500;
    }else{
      totalHarga = hargaOngkir + 2000;
    }
  }else if(jarak <= 3){
    hargaOngkir += 2000;
    if(berat <= 1 ){
      totalHarga = hargaOngkir + 1000;
    }else if(berat <= 2){
      totalHarga = hargaOngkir + 1500;
    }else{
      totalHarga = hargaOngkir + 2000;
    }
  }else if(jarak <= 4){
    hargaOngkir += 3000;
    if(berat <= 1 ){
      totalHarga = hargaOngkir + 1000;
    }else if(berat <= 2){
      totalHarga = hargaOngkir + 1500;
    }else{
      totalHarga = hargaOngkir + 2000;
    }
  }else{
    hargaOngkir += 5000;
    if(berat <= 1 ){
      totalHarga = hargaOngkir + 1000;
    }else if(berat <= 2){
      totalHarga = hargaOngkir + 1500;
    }else{
      totalHarga = hargaOngkir + 2000;
    }
  }
  return totalHarga;
}
  </script>
 <!-- end java script -->
<!-- end php -->
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
<?php
  if(isset($_GET['ongkir'])){
?>
<body onload="cek()">
<?php
  }else{
    ?>
    <body>
  <?php
  }
?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="#"><span>AtongBae</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>
      <?php 
        if(@$_SESSION['user']){
            include 'menu_user.php';
          }else{ ?>
          <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="cek_ongkir.php">Cek Ongkir</a></li>
              <li><a href="pelacakan.php">Peacakan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="visi.php">Visi & Misi</a></li>
              <li><a href="hubungi.php">Hubungi Kami</a></li>
              <li><a href="temukan.php">Temukan Kami</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="daftar.php">Daftar</a></li>
          <li><a class="nav-link scrollto" href="masuk.php">Masuk</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php }
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
            <h2>Pengiriman barang cepat, aman, amanah dan tidak perlu cemas </h2>
            <div class="text-center text-lg-start">
              <?php if(!isset($_SESSION['user'])){
                ?>
              <a href="#" class="btn-get-started scrollto">Mulai</a>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="../assets/img/hero-img.png" class="img-fluid animated" alt="">
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

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Cek Ongkir</h2>
          <p>Cek Ongkir Pengiriman Paket</p>
        </div>
        <!-- Conten Table -->
            <form action="cek_ongkir.php?ongkir" method="post" id="tableOngkir">
          
      <input type="hidden" name="data" id="data">
        <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Berat Benda / Kg</strong></label>
          <input type="text" required value="<?php echo $vberat?>" class="form-control" name="berat" id="berat" placeholder="Masukkan Berat Benda Yang Mau di Kirim...">
        </div>
        <?php
        if(@$_SESSION['user']){ ?>
            <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Dari Toko</strong></label>
            <?php
             $tampil = mysqli_query($conn,"select * from tbl_user WHERE id_user='$_SESSION[user]'");
                if(mysqli_num_rows($tampil)){
                  while($dat= mysqli_fetch_array($tampil)){
                      ?>
                 <input type="text" required value="<?php echo $dat['nama_toko']?>" class="form-control" name="berat" id="berat"  disabled>
             </div>     
        <?php
                  }
                }
        }else{
        ?>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><strong>Daerah Asal</strong></label>
          <select class="form-control" id="exampleFormControlSelect1" name="asal">
            <?php
            if(isset($_GET['ongkir'])){
            ?>
            <option value="<?php echo $vid1?>"><?php echo $vnama_dusun1?></option>
            <?php
            }
              $tampil = mysqli_query($conn,"select * from tbl_dusun");
                if(mysqli_num_rows($tampil)){
                  while($dat= mysqli_fetch_array($tampil)){
            ?>
            <option value="<?php echo $dat['id_dusun']?>"><?php echo $dat['nama_dusun']?></option>
            <?php }
            }
            ?>
          </select>
        </div>
        <?php } ?>
        <div class="form-group">
          <label for="exampleFormControlSelect1"><strong>Daerah Tujuan</strong></label>
          <select class="form-control" id="exampleFormControlSelect1" name="tujuan">
            <?php
            if(isset($_GET['ongkir'])){
            ?>
            <option value="<?php echo $vid2?>"><?php echo $vnama_dusun2?></option>
          <?php
            }
              $tampil = mysqli_query($conn,"select * from tbl_dusun");
                if(mysqli_num_rows($tampil)){
                  while($dat= mysqli_fetch_array($tampil)){
            ?>
            <option value="<?php echo $dat['id_dusun']?>"><?php echo $dat['nama_dusun']?></option>
            <?php }
            } 
            ?>
          </select>
        </div>
        <div class="form-group">
        <input type="hidden" name="ongk">
        </div>
        <div class="form-group row">
          <div class="mb-3 text-center">
            <button id="btn" type="submit" name="btnongkir" class="btn btn-outline-success ">Cek Ongkir</button>
          </div>
        </div>
      </div>
    </form>
        <!-- end Content -->
        <!-- jika button cek ongkir di tekan -->
        <?php
            if(isset($_GET['ongkir'])){

          ?>
          <div class="container">
          <div class="col-md-6 col-12">
          <div class="section-title" data-aos="fade-up">
          <h2>Tabel Ongkir</h2>
          </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Berat Benda / Kg</th>
                <th scope="col">Daerah Asal</th>
                <th scope="col">Daerah Tujuan</th>
                <th scope="col">Jarak / Km</th>
                <th scope="col">Ongkir</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" id="tberat"></td>
                <?php
                   if(@$_SESSION['user']){
                       ?>
                   <td><?php echo $vnama_dusun1 ?></td>
                <?php    
                   }else{
                      ?> 
                       
                <td><?php echo $vnama_dusun1 ?></td>
                  <?php } 
                ?>
                <td><?php echo $vnama_dusun2 ?></td>
                <td id="msg"></td>
                <td id="ongkir"></td>
              </tr>
            </tbody>
          </table>
          
          <form action="proses.php" method="POST">
              <?php
              if(@$_SESSION['user']){
                  ?>
                  <input type="hidden" name="idasal" value="<?php echo $viduser ?>">
            <?php
              }else{
                  ?>
            <input type="hidden" name="idasal" value="<?php echo $vid1 ?>">
            <?php
              }
              ?>
            <input type="hidden" name="idtujuan" value="<?php echo $vid2 ?>">
            <input type="hidden" name="tampungBerat" id="tampungBerat">
            <input type="hidden" name="tampungAsal" id="tampungAsal" value="<?php echo $vnama_dusun1 ?>">
            <input type="hidden" name="tampungTujuan" id="tampungTujuan" value="<?php echo $vnama_dusun2 ?>">
            <input type="hidden" name="tampungJarak" id="tampungJarak">
            <input type="hidden" name="tampungOngkir" id="tampungOngkir">
            <div class="text-center">
            <button type="submit" class="btn btn-outline-primary btn-sm">Pesan</button>
            </div>
          </form>
        </div>
     <?php
         }
      ?>
        <!-- end cek ongkir -->
      </div>
    </section><!-- End Features Section -->


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
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> atongbae@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->
<!-- 
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div> -->

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