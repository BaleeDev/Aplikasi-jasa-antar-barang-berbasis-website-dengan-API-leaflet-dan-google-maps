<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
if(@$_SESSION['Admin']){ 
    
    $no = 1;
    $id_user = array("1");
    $id=array("1");
    // mengambil data pada tabel transaksi
    
error_reporting(0);
?>
<!-- isi -->
<div class="content-wrapper">
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
                     
                       $tampil = mysqli_query($conn, "SELECT*FROM tbl_transaksi WHERE status='Sedang di Proses' ");
                      if(mysqli_num_rows($tampil)){
                        while($data= mysqli_fetch_array($tampil)){
                          array_push($id,$data['id_transaksi']);
                          array_push($id_user,$data['id_user']);
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
                          <a href="pesanan_masuk.php?id=<?=$data['id_transaksi']?>" ><span type="submit" class="badge badge-primary">Cek</span></a> &nbsp; &nbsp; &nbsp; 
                          <a href="#"><span class="badge badge-danger">Tolak</span></a>
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
            <div class="row mb-2 ml-3">
                <div class="card border-success pl-2 " style="max-width: 18rem;">
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
            <!-- /.card -->
          </div>
            
          <?php } ?>
        </div>
        </div>
        <!-- end tabel -->

</div>
<!-- end isi -->
<?php include 'Layout/footer.php';
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}?>