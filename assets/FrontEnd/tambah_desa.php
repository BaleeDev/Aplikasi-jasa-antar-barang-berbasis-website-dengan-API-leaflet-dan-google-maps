<?php 
@session_start();
if(@$_SESSION['Admin']){
include '../../database/db.php';
include 'Layout/header.php';
// Jika tombol simpan di klik
    if(isset($_POST['btn'])){
        // data akan disimpan baru
        $simpan= mysqli_query($conn, "INSERT INTO tbl_desa (id_kecamatan,nama_desa)
        VALUES ('$_POST[kecamatan]','$_POST[desa]')
            ");
                if($simpan){
                    echo "<script>
                        alert('Simpan berhasil');
                        document.location='desa.php';
                    </script>";
                }else{
                    echo "<script>
                        alert('Simpan gagal');
                        document.location='tambah_desa.php';
                    </script>"; 
                }
    }
    // end
?>

<!-- isi -->
<div class="content-wrapper">
    
    <!-- form -->
    <div class="container-fluid ">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6 col-12 mt-3">
            <!-- general form elements -->
            <div class="card card-primary ">
                <div class="card-header">Tambah Data Desa
                </div>
                <!-- form -->
                    <form action="" method="post">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Kecamatan</label>
                        <select  class="custom-select form-control-border" id="exampleSelectBorder" name="kecamatan" id="kecamatan">
                            <?php
                             $tampil = mysqli_query($conn, "SELECT*FROM tbl_kecamatan order by id_kecamatan desc");
                              if(mysqli_num_rows($tampil)){
                                while($dat= mysqli_fetch_array($tampil)){
                            ?>
                            <option value="<?php echo $dat['id_kecamatan']?>"><?php echo $dat['nama_kecamatan']?></option>
                            <?php
                                }
                              }
                              ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Desa</label>
                            <input type="text" required class="form-control form-control-border" id="desa" name="desa" placeholder="Masukkan Nama Kecamatan">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" name="btn" class="btn btn-primary ">Simpan</button>
                        </div>
                        <div class="justify-content-end">
                            <a href="desa.php" >Kembali ?</a>
                        </div>
                    </div>
                </form>
                <!-- end form -->
            </div>
          </div>
        </div>
    </div>
              <!-- /.card-header -->
    <!-- end form -->

</div>
 <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $(".js-kecamatan").select2();
        });
</script>
<!-- end isi -->
<?php include 'Layout/footer.php';
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}?>