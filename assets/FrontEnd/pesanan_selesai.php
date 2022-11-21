<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
if(@$_SESSION['Admin']){ 
    
    $no = 1;
    $id_user = array("1");
    $id=array("1");
    // mengambil data pada tabel transaksi
    $loop = "1";
    $tgl = array("1");
    $id_tr = array("1");
    $id_us = array("1");
    $nama_user = array("1");
    $nama_kurir = array("1");
    $nomor = array("1");
    $nomor_kurir = array("1");
    $nama_toko = array("1");
    $alamat = array("1");
    $alamat_kurir = array("1");
    $desa_kurir = array("1");
    $id_kurir = array("1");
    $sql = "SELECT * FROM tbl_pesan WHERE status='Selesai'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0){
    // untuk mengambil id transaksi yang berada pada tbl pesan
    $sql = mysqli_query($conn, "select * from tbl_pesan where status='Selesai' ");
                if(mysqli_num_rows($sql)){
                    while($dat= mysqli_fetch_array($sql)){
                      array_push($id_tr,$dat['id_transaksi']);
                      array_push($id_kurir,$dat['id_kurir']);
                      $loop++;
                    }
                }
    for($i = 1 ; $i < $loop; $i++){
        
    // untuk mengambil id user yang ada pada tabel transaksi
    $sql="select * from tbl_transaksi where id_transaksi='$id_tr[$i]' && status='Selesai'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $id_user = $row['id_user'];
                      array_push($id_us,$row['id_user']);
                      array_push($tgl,$row['tanggal_transaksi']);
    // untuk mengambil data user berdasarkan id user
    $sql="select * from tbl_user where id_user='$id_user'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      array_push($nama_user,$row['nama_user']);
                      array_push($nomor,$row['nomor']);
                      array_push($nama_toko,$row['nama_toko']);
                      array_push($alamat,$row['alamat']);
    $sql="select * from tbl_kurir where id_kurir='$id_kurir[$i]'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      array_push($nama_kurir,$row['nama_kurir']);
                      array_push($nomor_kurir,$row['nohp']);
                      array_push($desa_kurir,$row['desa']);
                      array_push($alamat_kurir,$row['alamat']);
    }
        $stt = "ada";
            
        }else{
    
}
    
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
    <?php
if($stt == "ada"){
?>
            <div class="row mb-2 ml-3">
                <div class="col-12">
            <div class="card mt-3">
              <div class="card-body table-responsive p-0">
                  <h3>Tabel Order</h3>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Pengirim</th>
                      <th>Nomor Pengirim</th>
                      <th>Nama Toko</th>
                      <th>Alamat</th>
                      <th>Tgl</th>
                      <th>Nama Kurir</th>
                      <th>Nomor Kurir</th>
                      <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $noh = 1;
                  for($a = 1; $a < $loop; $a++){
                     ?>
                      <tr>
                          <td><?=$noh++?></td>
                          <td><?=$nama_user[$a]?></td>
                          <td><?=$nomor[$a]?></td>
                          <td><?=$nama_toko[$a]?></td>
                          <td><?=$alamat[$a]?></td>
                          <td><?=$tgl[$a]?></td>
                          <td><?=$nama_kurir[$a]?></td>
                          <td><?=$nomor_kurir[$a]?></td>
                          <td><?=$alamat_kurir[$a]?></td>
                      </tr>
              <?php } ?>
                  </tbody>
                 </table>
                </div>
            </div>
              <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                  <h3>Tabel Penerima</h3>
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
                    for($i = 1 ; $i < $loop; $i++){
                    // end
                    $tampil = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE id_transaksi='$id_tr[$i]' ");
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
                      $stt = $dat['status'];
                    
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
                         if($stt == "Sedang di Proses"){
                            ?>    
                        <td><span class="badge badge-info">Proses</span></td>
                        <?php    }else if($stt == "Diterima"){
                            ?>
                        <td><span class="badge badge-primary">Diterima</span></td>
                        <?php }else{
                            ?>
                        <td><span class="badge badge-success">Selesai</span></td>
                            
                            <?php
                        }
                        ?>
                    </tr>
                    <?php 
                        } 
                        } 
                     }
                     ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           
            <!-- /.card -->
          </div>
          <?php }else{
              ?>
              <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Maaf Saat Ini Tidak Ada Pesanan Yang  Selesai, !!</h1><br>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
              <?php
          }
          
          ?>
          </div>
          </div>
   

</div>
<!-- end isi -->
<?php include 'Layout/footer.php';
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}?>