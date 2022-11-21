<?php 
@session_start();
if(@$_SESSION['Admin']){ 
include 'Layout/header.php';
include '../../database/db.php';

?>
<!-- isi -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kecamatan</h1>
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
              <div class="card-header">
                <a href="tambah_kecamatan.php" class="btn btn-outline-primary btn-sm">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Kecamatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--mengambil semua data pada tabel kecamatan-->
                      <?php 
                      $no = 1;
                      $tampil = mysqli_query($conn, "SELECT*FROM tbl_kecamatan order by id_kecamatan desc");
                      if(mysqli_num_rows($tampil)){
                        while($dat= mysqli_fetch_array($tampil)){
                     ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo $dat['nama_kecamatan']?></td>
                      <td>
                          <a href="edit_kecamatan.php?id=<?=$dat['id_kecamatan']?>"><span class="badge badge-info">Edit</span></a>
                          <a href="hapus_kecamatan.php?id=<?=$dat['id_kecamatan']?>"><span class="badge badge-danger">Hapus</span></a>
                      </td>
                    </tr>
                    <?php 
                        } 
                     }
                     ?>
                    <!--end-->
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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
}
?>