<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
 if(@$_SESSION['Admin']){  
?>
<!-- isi -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Desa</h1>
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
                <a href="tambah_desa.php" class="btn btn-outline-primary btn-sm">Tambah Data</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Desa</th>
                      <th>Nama Kecamatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--mengambil semua data pada tabel kecamatan-->
                      <?php 
                      $batas = 10;
                      $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                      $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                      $previous = $halaman - 1;
                      $next = $halaman + 1;
                      
                      $data = mysqli_query($conn,"select * from tbl_desa");
                      $jumlah_data = mysqli_num_rows($data);
                      $total_halaman = ceil($jumlah_data / $batas);
                      
                      $no = 1;
                      $tampil = mysqli_query($conn, "SELECT tbl_desa.id, tbl_desa.nama_desa, tbl_kecamatan.nama_kecamatan FROM tbl_desa JOIN tbl_kecamatan ON tbl_kecamatan.id_kecamatan = tbl_desa.id_kecamatan order by tbl_kecamatan.id_kecamatan desc LIMIT $halaman_awal, $batas");
                      $nomor = $halaman_awal+1;
                      if(mysqli_num_rows($tampil)){
                        while($dat= mysqli_fetch_array($tampil)){
                     ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo $dat['nama_desa']?></td>
                      <td><?php echo $dat['nama_kecamatan']?></td>
                      <td>
                          <a href="edit_desa.php?id=<?=$dat['id']?>"><span class="badge badge-info">Edit</span></a>
                          <a href="hapus_desa.php?id=<?=$dat['id']?>"><span class="badge badge-danger">Hapus</span></a>
                      </td>
                    </tr>
                    <?php 
                        } 
                     }
                     ?>
                  </tbody>
                </table>
              </div>
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