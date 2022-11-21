<?php 
@session_start();
 if(@$_SESSION['Admin']){ 
include '../../database/db.php';
include 'Layout/header.php';
// Jika tombol simpan di klik
    if(isset($_POST['btn'])){
        // data akan disimpan baru
        $simpan= mysqli_query($conn, "INSERT INTO tbl_kecamatan (nama_kecamatan)
        VALUES ('$_POST[kecamatan]')
            ");
                if($simpan){
                    echo "<script>
                        alert('Simpan berhasil');
                        document.location='kecamatan.php';
                    </script>";
                }else{
                    echo "<script>
                        alert('Simpan gagal');
                        document.location='tambah_kecamatan.php';
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
                <div class="card-header">Tambah Data Kecamatan
                </div>
                <!-- form -->
                    <form action="tambah_kecamatan.php" method="post">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kecamatan</label>
                        <input type="text" class="form-control form-control-border" id="kecamatan" name="kecamatan" placeholder="Masukkan Nama Kecamatan">
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" name="btn" class="btn btn-primary ">Simpan</button>
                        </div>
                        <div class="justify-content-end">
                            <a href="kecamatan.php" >Kembali ?</a>
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

<!-- end isi -->
<?php include 'Layout/footer.php';
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}?>