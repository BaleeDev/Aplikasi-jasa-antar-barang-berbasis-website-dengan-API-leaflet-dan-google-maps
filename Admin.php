<?php 
@session_start();
   if(@$_SESSION['Admin']){             
include 'LayoutAdmin/header.php';
include 'database/db.php';

$data = mysqli_query($conn,"select * from tbl_kecamatan");
                      $jumlah_kecamatan = mysqli_num_rows($data);
$data = mysqli_query($conn,"select * from tbl_desa");
                      $jumlah_desa = mysqli_num_rows($data);
$data = mysqli_query($conn,"select * from tbl_dusun");
                      $jumlah_dusun = mysqli_num_rows($data);
$data = mysqli_query($conn,"select * from tbl_user");
                      $jumlah_user = mysqli_num_rows($data);
$data = mysqli_query($conn,"select * from tbl_kurir");
                      $jumlah_kurir = mysqli_num_rows($data);
$data = mysqli_query($conn,"select * from tbl_transaksi where status='Sedang di Proses'");
                      $jumlah_pesan = mysqli_num_rows($data);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?=$jumlah_pesan?></h3>

                <p>Pesanan Masuk</p>
              </div>
              <div class="icon">
              <i class="fas fa-boxes"></i>
              </div>
              <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$jumlah_kecamatan?></h3>

                <p>Data Kecamatan</p>
              </div>
              <div class="icon">
              <i class="fas fa-university"></i>
              </div>
              <a href="assets/FrontEnd/kecamatan.php" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$jumlah_desa?></h3>

                <p>Data Desa</p>
              </div>
              <div class="icon">
              <i class="far fa-building"></i>
              </div>
              <a href="assets/FrontEnd/desa.php" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$jumlah_dusun?></h3>

                <p>Data Dusun</p>
              </div>
              <div class="icon">
              <i class="fas fa-city"></i>
              </div>
              <a href="assets/FrontEnd/dusun.php" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$jumlah_user?></h3>

                <p>Total User</p>
              </div>
              <div class="icon">
              <i class="fas fa-users-cog"></i>
              </div>
              <a href="assets/FrontEnd/user.php" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$jumlah_kurir?></h3>

                <p>Total Kurir</p>
              </div>
              <div class="icon">
              <i class="fas fa-users-cog"></i>
              </div>
              <a href="assets/FrontEnd/kurir.php" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include 'LayoutAdmin/footer.php';
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='assets/FrontEnd/login.php';
       </script>";  
}
?>