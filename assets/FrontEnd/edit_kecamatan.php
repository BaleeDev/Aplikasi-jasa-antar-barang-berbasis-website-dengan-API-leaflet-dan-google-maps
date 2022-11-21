<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
if(@$_SESSION['Admin']){  
$id_kecamatan = $_GET['id'];

// mengambil data pada tabel kecamatan berdasarkan id yang di kirim
$tampil = mysqli_query($conn, "SELECT*FROM tbl_kecamatan WHERE id_kecamatan='$id_kecamatan' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $nama_kecamatan = $data['nama_kecamatan'];
    }
// end

// Jika tombol simpan di klik
    if(isset($_POST['btn'])){
        
         $edit= mysqli_query($conn, "UPDATE tbl_kecamatan set
                    nama_kecamatan = '$_POST[kecamatan]'
                    WHERE id_kecamatan='$id_kecamatan'
                        "); 
        // data akan disimpan baru
        
            if($edit){
            echo "<script>
            alert('Edit berhasil');
            document.location='kecamatan.php';
            </script>";
            }else{
            echo "<script>
            alert('Edit gagal');
            document.location='edit_kecamatan.php';
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
                <div class="card-header">Edit Data Kecamatan
                </div>
                <!-- form -->
                    <form action="" method="POST" >
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kecamatan</label>
                        <input type="text" value="<?=@$nama_kecamatan?>" class="form-control form-control-border" id="kecamatan" name="kecamatan" required placeholder="Masukkan Nama Kecamatan">
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