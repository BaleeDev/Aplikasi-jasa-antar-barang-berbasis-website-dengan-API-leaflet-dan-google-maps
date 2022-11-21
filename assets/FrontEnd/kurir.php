<?php 
@session_start();
if(@$_SESSION['Admin']){
include 'Layout/header.php';
include '../../database/db.php';

?>
<!-- isi -->
<div class="content-wrapper">
    <!-- Tabel -->
    <div class="container">
    <div class="row">
          <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header">
                <label>Data Kurir</label>
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
                      <th>Nama Kurir</th>
                      <th>Nomor Kurir</th>
                      <th>Desa</th>
                      <th>Alamat</th>
                      <th>Foto SIM</th>
                      <th>Foto KTP</th>
                      <th>Status Aktif</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--mengambil semua data pada tabel kecamatan-->
                      <?php 
                      $no = 1;
                      
                      $tampil = mysqli_query($conn, "SELECT*FROM tbl_kurir WHERE status='Sudah' order by id_kurir desc");
                      if(mysqli_num_rows($tampil)){
                        while($dat= mysqli_fetch_array($tampil)){
                             $id_desa = $dat['desa'];
                            $tampil = mysqli_query($conn, "SELECT*FROM tbl_desa WHERE id='$id_desa' ");
                            $data = mysqli_fetch_array($tampil);
                                if($data)
                                {
                                    //jika data ditemukan maka data di tampung dulu ke variabel
                                    $nama_desa = $data['nama_desa'];
                                }
                     ?>
                    <tr>
                      <td><?= $no++?></td>
                      <td><?php echo $dat['nama_kurir']?></td>
                      <td>
                          <a href="https://api.whatsapp.com/send?phone=62<?php echo $dat['nohp']?>&text=Kami%20Dari%20AtongBae%20ingin%20mengkonfirmasi%20bahwa%20kakak%20telah%20melakukan%20pendaftaran%20di%20AtongBae."><span class="badge badge-success">WhatsApp</span></a></td>
                      <td><?=$nama_desa?></td>
                      <td><?php echo $dat['alamat']?></td>
                      <td>
                          <img src="../img/kurir/<?php echo $dat['foto_sim']?>" width="50%" alt="user-avatar" class="img-fluid">
                      </td>
                      <td>
                          <img src="../img/kurir/<?php echo $dat['foto_ktp']?>" width="50%" alt="user-avatar" class="img-fluid">
                      </td>
                      <td><span class="badge badge-info"><?php echo $dat['status']?></span></td>
                      <td>
                          <a href="edit_kurir.php?id=<?=$dat['id_kurir']?>" ><span type="button" class="badge badge-primary">Edit</span></a> &nbsp; &nbsp; &nbsp; 
                          <a href="hapus_kurir.php?id=<?=$dat['id_kurir']?>"><span class="badge badge-danger">Hapus</span></a>
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
}?>