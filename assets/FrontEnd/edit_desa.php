<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
if(@$_SESSION['Admin']){  
$id_desa = $_GET['id'];

$tampil = mysqli_query($conn, "SELECT*FROM tbl_desa WHERE id='$id_desa' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $id_kecamatan = $data['id_kecamatan'];
        $nama_desa = $data['nama_desa'];
    }

// Jika tombol simpan di klik
    if(isset($_POST['btn'])){
        
         $edit= mysqli_query($conn, "UPDATE tbl_desa set
                    id_kecamatan = '$_POST[kecamatan]',
                    nama_desa = '$_POST[desa]'
                    WHERE id='$id_desa'
                        "); 
        // data akan disimpan baru
        
            if($edit){
            echo "<script>
            alert('Edit berhasil');
            document.location='desa.php';
            </script>";
            }else{
            echo "<script>
            alert('Edit gagal');
            document.location='edit_desa.php';
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
                <div class="card-header">Edit Data Desa
                </div>
                <!-- form -->
                    <form action="" method="POST">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Kecamatan</label>
                        <select class="custom-select form-control-border" name="kecamatan" id="exampleSelectBorder">
                            <?php
                             $tampil = mysqli_query($conn, "SELECT*FROM tbl_kecamatan WHERE id_kecamatan='$id_kecamatan'");
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
                            <input type="text" value="<?=$nama_desa?>" class="form-control form-control-border" id="desa" name="desa" placeholder="Masukkan Nama Desa">
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

<!-- end isi -->
<?php include 'Layout/footer.php';
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}?>