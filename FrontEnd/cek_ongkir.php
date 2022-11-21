<?php   
session_start();
 include '../database/db.php';
$vberat = "";


// menampilkan isi data kecamatan
    $sqlprovinsi="select id_kecamatan,nama_kecamatan from tbl_kecamatan  order by nama_kecamatan asc ";
$resprovinsi   = mysqli_query($conn,$sqlprovinsi);
$checkprovinsi = mysqli_num_rows($resprovinsi);
// end

  // jika buton cek di tekan
  if(isset($_POST['btnongkir'])){
    $vberat = $_POST['berat'];
     
      $id_kecamatan = $_POST['kecamatan'];
      $tampil2 = mysqli_query($conn, "SELECT*FROM tbl_kecamatan WHERE id_kecamatan='$id_kecamatan' ");
      $data2 = mysqli_fetch_array($tampil2);
      if($data2)
      {
          $idc  = $data2['id_kecamatan'];
          $nama_kecamatan = $data2['nama_kecamatan'];
  
      }
      $id_desa = $_POST['desa'];
      $tampil2 = mysqli_query($conn, "SELECT*FROM tbl_desa WHERE id='$id_desa' ");
      $data2 = mysqli_fetch_array($tampil2);
      if($data2)
      {
          $idd  = $data2['id'];
          $nama_desa = $data2['nama_desa'];
  
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

  if(isset($_SESSION['user'])){
      $user_check=$_SESSION['user'];
      $tampil = mysqli_query($conn, "select * from tbl_user WHERE id_user='$user_check' ");
      $data = mysqli_fetch_array($tampil);
      if($data)
      {
          $vnamaToko = $data['nama_toko'];
          $vlat = $data['lat'];
          $vlng = $data['lng'];
  
      }
      
  
?>
<!-- end php -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>AtongBae | Pesan Jasa </title>
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gumby/2.6.0/js/libs/jquery-1.10.1.min.js"></script>       
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		function pilihprovinsi(id_provinsi){
			if(id_provinsi!="-1"){
				loadData('kabupaten',id_provinsi);
                // alert(id_provinsi);
				$("#kecamatan_dropdown").html("<option value='-1'>Pilih Dusun</option>");	
			}else{
				$("#kabupaten_dropdown").html("<option value='-1'>Pilih Desa</option>");
				$("#kecamatan_dropdown").html("<option value='-1'>Pilih Dusun</option>");		
			}
		}

		function pilihkabupaten(id_kabupaten){
			if(id_kabupaten!="-1"){
				loadData('kecamatan',id_kabupaten);
			}else{
				$("#kecamatan_dropdown").html("<option value='-1'>Pilih Dusun</option>");		
			}
		}

		function loadData(loadType,loadId){
			var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
			$("#"+loadType+"_loader").show();
			$("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
			$.ajax({
				type: "POST",
				url: "loadData.php",
				data: dataString,
				cache: false,
				success: function(result){
					$("#"+loadType+"_loader").hide();
					$("#"+loadType+"_dropdown").html("<option value='-1'>Pilih </option>");  
					$("#"+loadType+"_dropdown").append(result);  
				}
			});
		}
	</script>
    <link rel="stylesheet" href="css/mdb.min.css" />
    
    <!--select2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Template Main CSS File -->
<link href="../assets/css/style.css" rel="stylesheet">  
</head>

<?php
if(isset($_GET['ongkir'])){
  ?>
  <body onload="keSini(<?=$vlat2?>,<?=$vlng2?>)" >
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
        <h1><a href="index.html"><span>AtongBae</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>
      <?php 
        if(@$_SESSION['user']){
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

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">
      <!-- ingat tambah style.css about.vidio-box1 -->
        <div class="row d-flex justify-content-center">
          <div class="col-xl-6 col-lg-6 d-flex justify-content-center align-items-stretch" >
          <div id="map" class="video-box1"></div>
          </div>
            <div class="col-xl-6 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>Cek Ongkir Pengiriman Paket</h3> 
            <!-- form -->
            
              <form action="cek_ongkir.php?ongkir" method="post" id="tableOngkir">
              <input type="hidden" name="data" id="data">
              <div class="form-group">
                <label for="exampleFormControlInput1"><strong>Berat Benda / kg</strong></label>
                <input type="text" required value="<?php echo $vberat?>" class="form-control" name="berat" id="berat" placeholder="Masukkan Berat Benda (angka saja)!!">
              </div>
            <div class="form-group">
            <label for="exampleFormControlInput1"><strong>Dari Toko</strong></label>
                <input type="text" required value="<?php echo $vnamaToko?>" class="form-control" name="berat" id="berat" disabled>
            </div>
            <div class="form-group">
						<label for="exampleFormControlInput1"><strong>Pilih Kecamatan</strong></label>
			                <div class="col-12">							
			                <select class="js-kecamatan js-states form-control" required name="kecamatan" onchange="pilihprovinsi(this.options[this.selectedIndex].value)">
								<?php
								while($rowprovinsi=mysqli_fetch_array($resprovinsi)){
									?>
									<option value="<?php echo $rowprovinsi['id_kecamatan']?>"><?php echo $rowprovinsi['nama_kecamatan']?></option>
									<?php
								}
								?>
							</select>
						</div>

					</div>
					<div class="form-group">
						    <label for="exampleFormControlInput1"><strong>Pilih Desa</strong></label>
						    <div class="col-12">
							<select class="js-kecamatan js-states form-control" name="desa" data-live-search="true" id="kabupaten_dropdown" required onchange="pilihkabupaten(this.options[this.selectedIndex].value)">
							</select>
							</div>
							<!--<span id="state_loader"></span>-->
						
					</div>
					
					<div class="form-group">
						<label for="exampleFormControlInput1"><strong>Pilih Dusun</strong></label>
							<div class="col-12">
							<select class="js-kecamatan js-states form-control" required name="tujuan" data-live-search="true" id="kecamatan_dropdown">
							</select>
							</div>
							<span id="city_loader"></span>
						
					</div>
            <div class="form-group row">
              <div class="mb-3 mt-2 text-center">
                <button id="btn" type="submit" name="btnongkir" class="btn btn-outline-success ">Cek Ongkir</button>
              </div>
            </div>
          </div>
        </form>

        <!-- jika button cek ongkir di tekan -->
        <?php
            if(isset($_GET['ongkir'])){

          ?>
          <div class="container mt-3">
          <div class="col-md-12 col-12">
          <div class="section-title " data-aos="fade-up">
          <h2>Tabel Ongkir</h2>
          </div>
          </div>
          <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-8 col-12 d-flex justify-content-center">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">Berat Benda / Kg</th>
                <th scope="col">Dari</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Desa</th>
                <th scope="col">Dusun</th>
                <th scope="col">Jarak / m</th>
                <th scope="col">Ongkir</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" id="tberat"><?=$vberat?></td>
                <td><?php echo $vnamaToko ?></td>
                <td><?php echo $nama_kecamatan ?></td>
                <td><?php echo $nama_desa ?></td>
                <td><?php echo $vnama_dusun2 ?></td>
                <td id="jarak"></td>
                <td id="ongkir"></td>
              </tr>
            </tbody>
          </table>
          </div>
          </div>
          <form action="proses.php" method="POST">
            <input type="hidden" name="idasal" value="<?php echo $_SESSION['user'] ?>">
            <input type="hidden" name="idtujuan" value="<?php echo $vid2 ?>">
            <input type="hidden" name="tampungBerat" id="tampungBerat">
            <input type="hidden" name="tampungAsal" id="tampungAsal" value="<?php echo $vnamaToko ?>">
            <input type="hidden" name="tampungTujuan" id="tampungTujuan" value="<?php echo $vnama_dusun2 ?>">
            <input type="hidden" name="tampungJarak" id="tampungJarak">
            <input type="hidden" name="tampungOngkir" id="tampungOngkir">
            <div class="text-center mb-3">
            <button type="submit" class="btn btn-outline-primary btn-sm">Pesan</button>
            </div>
          </form>
        </div>
     <?php
         }
      ?>
        <!-- end cek ongkir -->
        
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

    <?php include '../assets/leaflet-routing-machine-3.2.12/examples/indexjs.php' ?>
    
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $(".js-kecamatan").select2();
        });
    </script>
   
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  
  <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    
</body>

</html>
<?php 
  }else{
    echo "<script>location='masuk.php';</script>";
  }
?>