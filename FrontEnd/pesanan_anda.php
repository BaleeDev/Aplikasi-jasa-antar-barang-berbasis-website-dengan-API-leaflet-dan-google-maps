<?php
session_start();
include '../database/db.php';

// cek user
if(isset($_SESSION['user'])){
 
    $idUser = $_SESSION['user'];
    $status = "Sedang di Proses";
    $no = 1;
    $cek = "";
    $id=array("1");
    $tgl=array("1");
    
    // mengambil nama desa tujuan
                      $sql="select * from tbl_user where id_user='$idUser'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_user = $row['nama_user'];
    
    // untuk membuat tampilan next page
    $batas = 5;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
    $previous = $halaman - 1;
    $next = $halaman + 1;
    // mengambil data pada tabel transaksi order by id_transaksi desc
    $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE id_user='$idUser'");
         
                  if(mysqli_num_rows($tampil)){
                    while($data= mysqli_fetch_array($tampil)){
                      array_push($id,$data['id_transaksi']);
                      array_push($tgl,$data['tanggal_transaksi']);
                      $cek = $data['status'];
                      $no += 1;
                        }
                    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AtongBae | Transaksi</title>
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

  <!-- MDB -->
 <!-- MDBootstrap Datatables  -->
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/mdb.min.css" />

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>
<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="#"><span>AtongBae</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a> -->
      </div>
      <?php 
        include 'menu_user.php';
      ?>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <p>Status Transaksi Pengiriman Paket</p>
        </div>
          <div class="container">
              <div class="col-md-6 col-12">
                  <div class="section-title" data-aos="fade-up">
                    <h2>Tabel Pesanan</h2>
                  </div>
             </div>
          </div>
          <div class="row">
              <div class="col-md-2">
                  
              </div>
              <?php 
              if($cek != ""){
              ?>
              <div class="col-md-8">
          <table class="table table-responsive mb-3">
            <thead>
              <tr>
                 
                <th scope="col">NO</th>
                <th scope="col">Nama Penerima</th>
                <th scope="col">No Hp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Berat Benda / Kg</th>
                <th scope="col">Jarak</th>
                <th scope="col">Ongkir</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no ="1";
            //   for($i = 1 ; $i < $no ; $i++){
            //       $tamid = $id[$i]; //AT001
                    //   mengambil data pada tabel detail transaksi
                    
                    $tampil1 = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE asal='$idUser' ");
                    $jumlah_data = mysqli_num_rows($tampil1);
                         $total_halaman = ceil($jumlah_data / $batas);
                    $tampil = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE asal='$idUser' order by id_transaksi desc LIMIT $halaman_awal, $batas ");
                    $nomor = $halaman_awal+1;
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                      // mengambil nama dusun tujuan
                      $sql="select * from tbl_dusun where id_dusun='$dat[tujuan]'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_dusun = $row['nama_dusun'];
                      $id_desa = $row['id_kecamatan'];
                      // mengambil nama desa tujuan
                      $sql="select * from tbl_desa where id='$id_desa'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_desa = $row['nama_desa'];
                      $id_kecamatan = $row['id_kecamatan'];
                      // mengambil nama kecamatan tujuan
                      $sql="select * from tbl_kecamatan where id_kecamatan='$id_kecamatan'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_kecamatan = $row['nama_kecamatan'];
                      $totjarak = $dat['jarak'] / 1000;
              ?>
              <tr>
                <td><?=$no++?></td>
                <td><?=$dat['nama_penerima']?></td>
                <td><?=$dat['nohp']?></td>
                <td>Kecamatan <?php echo $nama_kecamatan?>,Desa <?=$nama_desa?>,Dusun <?=$nama_dusun?>,<?=$dat['alamat']?></td>
                <td><?php echo $dat['berat']?></td>
                <td><?php echo round($totjarak,2)?></td>
                <td>Rp. <?php echo number_format ($dat['ongkir'])?></td>
                <td>Rp. <?php echo number_format ($dat['harga_barang'])?></td>
                <td>Rp. <?php echo number_format ($dat['total_harga'])?></td>
                <?php 
                    if($dat['status'] == "Pesan"){
                    ?>    
                <td><span class="badge badge-info">Proses</span></td>
                <?php    }else if($dat['status'] == "Diterima"){
                    ?>
                <td><span class="badge badge-primary">Siap</span></td>
                    
            <?php    }else{
                ?>
                <td><span class="badge badge-success">Selesai</span></td>
            <?php }
                ?>
              </tr>
             <?php
             }
                $no++;
                  }
            //   }
             ?>
            </tbody>
          </table>
          <div>
              <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
              <small><strong>Keterangan :</strong></small> <br>
              <small><span class="badge badge-info">Proses</span><i> Pesanan Masih Di Proses</i></small><br>
              <small><span class="badge badge-primary">Siap</span><i> Kurir Kami Siap Ke Rumah Anda</i></small><br>
              <small><span class="badge badge-success">Selesai</span><i> Pengiriman Paket Anda Sudah Selesai</i></small><br>
              <small><i>Untuk Proses Pemesanan Lebih Cepat Hubungi <a href="https://api.whatsapp.com/send?phone=6281353652511&text=Pesanan%20saya%20Belum%20di%20Proses%20Dengan%20Nama%20User:%20<?=$nama_user?>">Kami</a></i></small><br>
          </div>
        </div>
        <?php }else{
        ?>
        </div>
            <div>
              <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                  <div data-aos="zoom-out">
                    <h1 class="text-center">OOpppsss.... Saat ini tidak ada pesanan anda yang belum selesai.</h1>
                    <h2 class="text-center">Untuk melakukan pemesanan jasa antar AtongBae <a href="cek_ongkir.php" class="btn-get-started scrollto">Tekan ini</a></h2>
                  </div class="text-center">
                </div>
                
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                  <img src="../assets/img/cross.png" class="img-fluid animated" alt="" width="100%">
                </div>
              </div>
            </div>
      </div>
      <?php } ?>
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
  <!-- MDB -->
 <!-- MDBootstrap Datatables  -->
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
</body>

</html>
<?php } 
else{
    echo "<script>location='masuk.php';</script>"; 
}
?>