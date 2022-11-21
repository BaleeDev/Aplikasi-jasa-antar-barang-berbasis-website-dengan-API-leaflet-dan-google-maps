<?php
session_start();
include '../database/db.php';

function cek($idUser,$status,$conn){
      $query = mysqli_query($conn, "SELECT * FROM tbl_transaksi WHERE id_user = '$idUser' && status ='$status' ");    
      $data = mysqli_fetch_array($query);
      $tTransaksi = $data['id_transaksi'];
      return $tTransaksi;
    }

// cek user
if(isset($_SESSION['user'])){
 
    $idUser = $_SESSION['user'];
    $status = "Proses";
    $subTotal = 0;
    $Total = 0;
    $diskon = 0;
    $vcek = cek($idUser,$status,$conn);

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
  <link rel="stylesheet" href="../assets/css/mdb.min.css" />

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
        <?php
            $query = mysqli_query($conn, "SELECT * FROM tbl_transaksi WHERE id_user = '$idUser' && status ='$status'");    
          $data = mysqli_fetch_array($query);
          $stt = $data['status'];
          
          if($stt != ""){
              if($stt == $status){
             ?>
        <div class="section-title" data-aos="fade-up">
          <p>Transaksi Pengiriman Paket</p>
        </div>
          <div class="container">
              <div class="col-md-6 col-12">
                  <div class="section-title" data-aos="fade-up">
                    <h2>Tabel Pesanan</h2>
                  </div>
             </div>
             
             <div class="mb-2 text-center">
                    <a href="cek_ongkir.php" class="btn btn-outline-secondary">Tambah Pengiriman</a>
            </div>
          </div>
          <div class="row">
              <div class="col-md-2">
                  
              </div>
              <div class="col-md-8">
          <table class="table table-responsive mb-3">
            <thead>
              <tr>
                <th scope="col">No Pesanan</th>
                <th scope="col">Berat Benda / Kg</th>
                <th scope="col">Dari</th>
                <th scope="col">Daerah Tujuan</th>
                <th scope="col">Jarak / Km</th>
                <th scope="col">Ongkir</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if($vcek != ""){
                    $no = 1;
                  $tampil = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE id_transaksi='$vcek' ");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                        
                      $sql="select * from tbl_user where id_user='$dat[asal]'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $vasal = $row['nama_toko'];
                      // 
                      $sql="select * from tbl_dusun where id_dusun='$dat[tujuan]'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $vtujuan = $row['nama_dusun'];
                      
                      $totjarak = $dat['jarak'] / 1000;
              ?>
              <tr>
                <td scope="row" ><?php echo $no?></td>
                <td><?php echo $dat['berat']?></td>
                <td><?php echo $vasal?></td>
                <td><?php echo $vtujuan?></td>
                <td><?php echo round($totjarak,1)?></td>
                <td>Rp. <?php echo number_format ($dat['ongkir'])?></td>
              </tr>
              <?php
              $Total += $dat['ongkir']; 
              $no += 1;
                    }
                }
            }
              ?>
            </tbody>
            <tfoot>
             <td colspan="5">Total Harga</td>
             <td>Rp. <?php echo number_format($Total)?></td>
             </tfoot>
          </table>
        </div>
        </div>
        
        <!--pesan-->
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="proses_pesan.php" method="post">
                    <small id="emailHelp" class="form-text text-muted"><i>Masukkan harga barang, sesuai dengan no pemesanan pada tabel di atas</i>.<strong>(Khusus Pembayaran COD!!)</strong></small>
                <?php
                    for($i=1; $i < $no; $i++){
                ?>
                  <div class="form-group mb-3">
                    <input type="text" class="form-control" id="harga<?=$i?>" name="harga<?=$i?>"  placeholder="Masukkan Harga Barang ke-<?=$i?>">
                  </div>
               <?php }?>
               <input type="hidden" name="idTransaksi" value="<?=$vcek?>">
               <input type="hidden" name="batas" value="<?=$no?>">
               <input type="hidden" name="totOngkir" value="<?=$Total?>">
               <div class="text-center">
               <button type="submit" class="btn btn-outline-success btn-sm">Lanjut</button>
               </div>
                </form>
            </div>
        </div>
        <!--end-->
        <?php 
            }
        }else{
            ?>
            <div>
              <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                  <div data-aos="zoom-out">
                    <h1 class="text-center">OOpppsss.... Saat ini tidak ada pesanan anda yang belum selesai atau tertunda.</h1>
                    <h2 class="text-center">Untuk melakukan pemesanan jasa antar AtongBae <a href="cek_ongkir.php" class="btn-get-started scrollto">Tekan ini</a></h2>
                  </div class="text-center">
                </div>
                
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                  <img src="../assets/img/cross.png" class="img-fluid animated" alt="" width="100%">
                </div>
              </div>
            </div>
    <?php
        }
        ?>
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