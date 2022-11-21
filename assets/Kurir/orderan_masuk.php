<?php 
@session_start();
if(@$_SESSION['kurir']){
include 'Layout/header.php';
include '../../database/db.php';

// mengecek apakah kurir sedang mengambilorderan atau tidak
if(isset($_SESSION['kurir'])){
    $id_kurir = $_SESSION['kurir'];
    $validasi = "";
    // mengecek data pada tabel pesan
    $sql = "SELECT * FROM tbl_pesan WHERE id_kurir='$id_kurir' order by id_pesan desc";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0){
            $data = mysqli_query($conn,"select * from tbl_transaksi where status='Sedang di Proses'");
                      $jumlah_kecamatan = mysqli_num_rows($data);
                      
            $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE status='Sedang di Proses' order by id_transaksi desc LIMIT 3 ");
            $validasi = "Order";
        }else{
            while($dat= mysqli_fetch_array($result)){
            $stt = $dat['status'];
            if($stt == "Diterima" ){
                 
                 $jumlah_kecamatan = 0;
            }else{
                $data = mysqli_query($conn,"select * from tbl_transaksi where status='Sedang di Proses'");
                              $jumlah_kecamatan = mysqli_num_rows($data);
                $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE status='Sedang di Proses' order by id_transaksi desc LIMIT 3 ");
                $validasi = "Order";
            }
            }
        }
}
?>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"><span><strong>AtongBae</strong></span></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?=$jumlah_kecamatan?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?=$jumlah_kecamatan?> Orderan</span>
          <div class="dropdown-divider"></div>
          <?php
                if($validasi == "Order"){
                      if(mysqli_num_rows($tampil)){
                        while($data= mysqli_fetch_array($tampil)){
                             $tamid_us = $data['id_user'];
                           // mengambil nama user
                             $sql="select * from tbl_user where id_user='$tamid_us'";
                              $ses=mysqli_query($conn,$sql);
                              $row =mysqli_fetch_assoc($ses);
                              $nama_user = $row['nama_user'];
                              $nomor = $row['nomor'];
                              $nama_toko = $row['nama_toko'];
                              $alamat = $row['alamat'];
                        // end
          ?>
          <a href="kurir.php?id=<?=$data['id_transaksi']?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>Pengirim : <?=$nama_user ?>
          </a>
          <?php 
                        }
                      }
                     }
          ?>
          <div class="dropdown-divider"></div>
          <a href="orderan_masuk.php" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="kurir.php" role="button">
          <i class="fas fa-sync-alt"></i>
          <span class="float-right text-muted text-sm"> Muat Ulang</span>
        </a>
      </li>
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
            <a href="kurir.php" class="nav-link">
             <i class="fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-boxes"></i>
              <p>
                Orderan 
                <i class="right fas fa-angle-left"></i>
              </p>
                </a>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-box-tissue"></i>
                  <p>Orderan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order_belum_selesai.php" class="nav-link">
                <i class="fas fa-box-open"></i>
                  <p>Orderan Belum Selesai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order_selesai.php" class="nav-link">
                <i class="fas fa-people-carry"></i>
                  <p>Orderan Selesai</p>
                </a>
              </li>
              </ul>
         </li>
         <li class="nav-item">
            <a href="keluar.php" class="nav-link">
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
<div class="tes">
    <div id="map" class="map" style="position: static;
  width: 100%;
  height: 100%;
  background-size: contain;
  min-height: 300px;"></div>
</div>
<!-- isi -->
<div class="content-wrapper">
<?php 
if($validasi == "Order"){
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pesanan Baru</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Tabel -->
    <div class="container">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NO Transaksi</th>
                      <th>Nama Pengirim</th>
                      <th>Nomor Pengirim</th>
                      <th>Nama Toko</th>
                      <th>Alamat</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--mengambil semua data pada tabel kecamatan-->
                      <?php 
                     $no = 1;
                       $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE status='Sedang di Proses' ");
                      if(mysqli_num_rows($tampil)){
                        while($data= mysqli_fetch_array($tampil)){
                        //   array_push($id,$data['id_transaksi']);
                        //   array_push($id_user,$data['id_user']);
                          $tamid_us = $data['id_user'];
                          
                           // mengambil nama user
                             $sql="select * from tbl_user where id_user='$tamid_us'";
                              $ses=mysqli_query($conn,$sql);
                              $row =mysqli_fetch_assoc($ses);
                              $nama_user = $row['nama_user'];
                              $nomor = $row['nomor'];
                              $nama_toko = $row['nama_toko'];
                              $alamat = $row['alamat'];
                        // end
                     ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?= $data['id_transaksi']?></td>
                      <td><?= $nama_user?></td>
                      <td><?= $nomor?></td>
                      <td><?= $nama_toko?></td>
                      <td><?= $alamat?></td>
                      <?php 
                         if($data['status'] = "Sedang di Proses"){
                            ?>    
                        <td><span class="badge badge-info">Proses</span></td>
                        <?php    }elseif($data['status'] = "Diterima"){
                            ?>
                        <td><span class="badge badge-primary">Diterima</span></td>
                        <?php }else{
                            ?>
                        <td><span class="badge badge-success">Selesai</span></td>
                            
                            <?php
                        }
                        ?>
                      <td>
                          <a href="orderan_masuk.php?id=<?=$data['id_transaksi']?>" ><span type="submit" class="badge badge-primary">Cek</span></a> &nbsp; &nbsp; &nbsp; 
                      </td>
                    </tr>
                    <?php 
                            
                        } 
                        $no += 1;
                     }
                     ?>
                  </tbody>
                </table>
              </div>
              </div>
              </div>
              </div>
              </div>
<?php
        if(isset($_GET['id'])){
            $id_transaksi = $_GET['id'];
            $sql="select * from tbl_transaksi where id_transaksi='$id_transaksi'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $id_user = $row['id_user'];
                    $sql="select * from tbl_user where id_user='$id_user'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_user = $row['nama_user'];
                      $nomor = $row['nomor'];
                      $nama_toko = $row['nama_toko'];
                      $alamat = $row['alamat'];
        ?>
            <div class="container">
            <div class="row mb-2 ml-3">
                <div class="card border-success pl-2 mt-2 " style="max-width: 18rem;">
                     <div class="card-header">Pengirim</div>
                     <div class="card-body ">
                        <p class="m-0">Nama Pengirim : <?=$nama_user?></p>
                        <p class="m-0">Nomor Pengirim : <?=$nomor?></p>
                        <p class="m-0">Nama Toko : <?=$nama_toko?></p>
                        <p class="m-0">Alamat : <?=$alamat?></p>
                </div>
              </div><!-- /.col -->
            </div>
              <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Penerima</th>
                      <th>Nomor Penerima</th>
                      <th>Alamat Penerima</th>
                      <th>Berat Benda / kg</th>
                      <th >Jarak</th>
                      <th >Ongkir</th>
                      <th >Harga Barang</th>
                      <th >Sub Total</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--mengambil semua data pada tabel kecamatan-->
                      <?php 
                      $n=1;
                //       $tamid ="";
                //  for($i = 1 ; $i < $no ; $i++){
                //   $tamid = $id[$i]; //AT001
                //   $tamid_user = $id_user[$i]; //AT001
                    //   mengambil data pada tabel detail transaksi
                    // mengambil nama user
                    
                    // end
                    $tampil = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE id_transaksi='$id_transaksi' ");
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
                      <td><?= $n++?></td>
                      <td><?=$dat['nama_penerima']?></td>
                      <td><?=$dat['nohp']?></td>
                      <td>Kecamatan <?php echo $nama_kecamatan?>,Desa <?=$nama_desa?>,Dusun <?=$nama_dusun?>,<?=$dat['alamat']?></td>
                      <td><?php echo $dat['berat']?></td>
                      <td><?php echo round($totjarak,2)?></td>
                      <td>Rp. <?php echo number_format ($dat['ongkir'])?></td>
                      <td>Rp. <?php echo number_format ($dat['harga_barang'])?></td>
                      <td>Rp. <?php echo number_format ($dat['total_harga'])?></td>
                      <?php 
                         if($dat['status'] = "Sedang di Proses"){
                            ?>    
                        <td><span class="badge badge-info">Proses</span></td>
                        <?php    }else{
                            ?>
                        <td><span class="badge badge-primary">Diterima</span></td>
                        <?php }
                        ?>
                    </tr>
                    <?php 
                        } 
                        } 
                    //  }
                     ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!--pesan-->
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="proses_terima.php" method="post">
               <input type="hidden" name="idTransaksi" value="<?=$id_transaksi?>">
               <div class="text-center">
               <button type="submit" class="btn btn-outline-success btn-sm mb-3">Terima Orderan</button>
               </div>
                </form>
            </div>
        </div>
        <!--end-->
            <!-- /.card -->
          </div>
          </div>
            
          <?php } ?>
<?php }else{
    ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Maaf Saat Ini Anda Sedang Mengambil Orderan, Sebelum orderan selesi anda tidak bisa mengambil orderan baru!!</h1><br>
            <p><strong>Catatan*</strong></p>
            <p><i>Jika anda merasa sudah menyelsaikan orderan namun pesan ini masih muncul silahkan hubungi <a href="#"><strong>Kami</strong></i></p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php    
}  
?>
          </div>
<?php
include '../leaflet-routing-machine-3.2.12/examples/mapdusun.php';
include 'Layout/footer.php'; 
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='masuk.php';
       </script>"; 
}?>
