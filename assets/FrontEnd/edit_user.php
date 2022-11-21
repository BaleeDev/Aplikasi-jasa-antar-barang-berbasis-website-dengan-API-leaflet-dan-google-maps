<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
if(@$_SESSION['Admin']){  
$id_user = $_GET['id'];
$status = "Sudah";

// mengambil data pada tabel kecamatan berdasarkan id yang di kirim
$tampil = mysqli_query($conn, "SELECT*FROM tbl_user WHERE id_user='$id_user' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $nama_user = $data['nama_user'];
        $nomor = $data['nomor'];
        $nama_toko = $data['nama_toko'];
        $alamat = $data['alamat'];
        $lat = $data['lat'];
        $lng = $data['lng'];
    }
// end

// Jika tombol simpan di klik
    if(isset($_POST['btn'])){
         $edit= mysqli_query($conn, "UPDATE tbl_user set
                    nama_user = '$_POST[nama]',
                    nomor = '$_POST[nomor]',
                    nama_toko = '$_POST[nama_toko]',
                    alamat = '$_POST[alamat]',
                    lat = '$_POST[lat]',
                    lng = '$_POST[lng]'
                    WHERE id_user='$id_user'
                        "); 
        // data akan disimpan baru
        
            if($edit){
            echo "<script>
            alert('Edit berhasil');
            document.location='user.php';
            </script>";
            }else{
            echo "<script>
            alert('Edit gagal');
            document.location='user.php';
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
                <div class="card-header">Aktifkan User
                </div>
                <!-- form -->
                    <form action="" method="POST" >
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pemilik Toko</label>
                        <input type="text" class="form-control form-control-border" value="<?=$nama_user?>" id="nama" name="nama" required placeholder="Masukkan latitude">
                    </div>
                    <div class="col-auto">
                      <label class="sr-only" for="inlineFormInputGroup">Nomor WhatsAPP</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" class="form-control" name="nomor" value="<?=$nomor?>" id="inlineFormInputGroup" placeholder="83129109256">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Toko</label>
                        <input type="text" class="form-control form-control-border" value="<?=$nama_toko?>" id="nama_toko" name="nama_toko" required placeholder="Masukkan latitude">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?=$alamat?></textarea>
                  </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Latitude Toko</label>
                        <input type="text" class="form-control form-control-border" value="<?=$lat?>" id="lat" name="lat" required placeholder="Masukkan latitude">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Longitude Toko</label>
                        <input type="text" class="form-control form-control-border" value="<?=$lng?>" id="lng" name="lng" required placeholder="Masukkan longitude">
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" name="btn" class="btn btn-primary ">Simpan</button>
                        </div>
                        <div class="justify-content-end">
                            <a href="user.php" >Kembali ?</a>
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