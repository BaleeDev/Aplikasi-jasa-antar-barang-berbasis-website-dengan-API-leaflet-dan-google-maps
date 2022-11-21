<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
if(@$_SESSION['Admin']){  
$id_user = $_GET['id'];
$status = "Sudah";

// mengambil data pada tabel kecamatan berdasarkan id yang di kirim
$tampil = mysqli_query($conn, "SELECT*FROM tbl_kurir WHERE id_kurir='$id_user' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $nama_user = $data['nama_kurir'];
        $foto_sim = $data['foto_sim'];
        $foto_ktp = $data['foto_ktp'];
        $id_desa = $data['desa'];
        $alamat = $data['alamat'];
    }
$tampil = mysqli_query($conn, "SELECT*FROM tbl_desa WHERE id='$id_desa' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $nama_desa = $data['nama_desa'];
    }
// end

// Jika tombol simpan di klik
    if(isset($_POST['btn'])){
         $edit= mysqli_query($conn, "UPDATE tbl_kurir set
                    status = '$status'
                    WHERE id_kurir='$id_user'
                        "); 
        // data akan disimpan baru
        
            if($edit){
            echo "<script>
            alert('Aktifasi berhasil');
            document.location='kurir.php';
            </script>";
            }else{
            echo "<script>
            alert('Aktifasi gagal');
            document.location='kurir_daftar.php';
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
                <div class="card-header">Aktifkan Kurir
                </div>
                <!-- form -->
                    <form action="" method="POST" >
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama   : <i><?=$nama_user?></i></label><br>
                        <label for="exampleInputEmail1">Desa   : <i><?=$nama_desa?></i></label><br>
                        <label for="exampleInputEmail1">Alamat : <i><?=$alamat?></i></label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto KTP</label>
                        <img src="../img/kurir/<?=$foto_ktp?>" width="70%" alt="user-avatar" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto SIM</label>
                        <img src="../img/kurir/<?=$foto_sim?>" width="70%" alt="user-avatar" class="img-fluid">
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" name="btn" class="btn btn-primary ">Aktifkan</button>
                        </div>
                        <div class="justify-content-end">
                            <a href="kurir_daftar.php" >Kembali ?</a>
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
}
?>