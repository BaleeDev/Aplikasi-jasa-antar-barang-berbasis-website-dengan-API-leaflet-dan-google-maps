<?php 
@session_start();
if(@$_SESSION['Admin']){  
include 'Layout/header.php';
include '../../database/db.php';

?>
<!-- isi -->
<div class="tes">
    <div id="map" class="map" style="position: static;
  width: 100%;
  height: 100%;
  background-size: contain;
  min-height: 300px;"></div>
</div>
<div class="content-wrapper">
    <!-- Tabel -->
    <div class="container">
    <div class="row">
          <div class="col-12  mt-3">
            <div class="card">
                <div class="card-header">
                <label>Data User</label>
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
                      <th>Nama User</th>
                      <th>No WhatsApp</th>
                      <th>Nama Toko</th>
                      <th>Kategori Usaha</th>
                      <th>Alamat</th>
                      <th>Latitude</th>
                      <th>Longtitude</th>
                      <th>Status Aktif</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--mengambil semua data pada tabel kecamatan-->
                      <?php 
                      $no = 1;
                      
                      $tampil = mysqli_query($conn, "SELECT*FROM tbl_user WHERE status='Sudah' order by id_user desc");
                      if(mysqli_num_rows($tampil)){
                        while($dat= mysqli_fetch_array($tampil)){
                     ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo $dat['nama_user']?></td>
                      <td>
                          <a href="https://api.whatsapp.com/send?phone=62<?php echo $dat['nomor']?>"><span class="badge badge-success">WhatsApp</span></a></td>
                      <td><?php echo $dat['nama_toko']?></td>
                      <td><?php echo $dat['kategori_usaha']?></td>
                      <td><?php echo substr($dat['alamat'],0,10)?>...</td>
                      <td><?php echo $dat['lat']?></td>
                      <td><?php echo $dat['lng']?></td>
                      <td><span class="badge badge-info"><?php echo $dat['status']?></span></td>
                      <td>
                          <a href="edit_user.php?id=<?=$dat['id_user']?>" ><span type="button" class="badge badge-primary">Edit</span></a> &nbsp; &nbsp; 
                          <a href="hapus_user.php?id=<?=$dat['id_user']?>"><span class="badge badge-danger">Hapus</span></a>
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
<?php 
include '../leaflet-routing-machine-3.2.12/examples/mapuser.php';
include 'Layout/footer.php';
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}?>