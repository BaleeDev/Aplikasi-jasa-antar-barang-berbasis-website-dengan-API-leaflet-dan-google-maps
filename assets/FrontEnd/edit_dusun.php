<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';
if(@$_SESSION['Admin']){  
$id_dusun = $_GET['id'];
$tampil = mysqli_query($conn, "SELECT*FROM tbl_dusun WHERE id_dusun='$id_dusun' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $id_desa = $data['id_kecamatan'];
        $nama_dusun = $data['nama_dusun'];
        $lat = $data['lat'];
        $lng = $data['lng'];
    }
$tampil = mysqli_query($conn, "SELECT*FROM tbl_desa WHERE id='$id_desa' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $id_kecamatan = $data['id_kecamatan'];
        $id_desa = $data['id'];
        $nama_desa = $data['nama_desa'];
    }
$tampil = mysqli_query($conn, "SELECT*FROM tbl_kecamatan WHERE id_kecamatan='$id_kecamatan' ");
    $data = mysqli_fetch_array($tampil);
    if($data)
    {
        //jika data ditemukan maka data di tampung dulu ke variabel
        $id_kecamatan = $data['id_kecamatan'];
        $nama_kecamatan = $data['nama_kecamatan'];
    }
    
    // Jika tombol simpan di klik
    if(isset($_POST['btn'])){
        
         $edit= mysqli_query($conn, "UPDATE tbl_dusun set
                    id_kecamatan = '$_POST[desa]',
                    nama_dusun = '$_POST[dusun]',
                    lat = '$_POST[lat]',
                    lng = '$_POST[lng]'
                    WHERE id_dusun='$id_dusun'
                        "); 
        // data akan disimpan baru
        
            if($edit){
            echo "<script>
            alert('Edit berhasil');
            document.location='dusun.php';
            </script>";
            }else{
            echo "<script>
            alert('Edit gagal');
            document.location='edit_dusun.php';
            </script>"; 
            }
    }
    // end
?>
<script type="text/javascript">
		function pilihprovinsi(id_provinsi){
			if(id_provinsi!="-1"){
				loadData('kabupaten',id_provinsi);
                // alert(id_provinsi);
			}else{
				$("#kabupaten_dropdown").html("<option value='-1'>Pilih Desa</option>");		
			}
		}

		function loadData(loadType,loadId){
			var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
			$("#"+loadType+"_loader").show();
			$("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />');
			$.ajax({
				type: "POST",
				url: "loadData.php",
				data: dataString,
				cache: false,
				success: function(result){
					$("#"+loadType+"_loader").hide();
					$("#"+loadType+"_dropdown").html("<option value='-1'>Pilih </option>");  
					$("#"+loadType+"_dropdown").append(result);  
				}
			});
		}
</script>
<!-- isi -->
<div class="content-wrapper">
    
    <!-- form -->
    <div class="container-fluid ">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6 col-12 mt-3">
            <!-- general form elements -->
            <div class="card card-primary ">
                <div class="card-header">Edit Data Dusun
                </div>
                <!-- form -->
                    <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Kecamatan</label>
                        <select class="js-kecamatan js-states form-control" required name="kecamatan" onchange="pilihprovinsi(this.options[this.selectedIndex].value)">
                            <option value="<?php echo $id_kecamatan?>"><?php echo $nama_kecamatan?></option>
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
                        <label for="exampleSelectBorder">Pilih Desa</label>
                        <select class="js-kecamatan js-states form-control" name="desa" data-live-search="true" id="kabupaten_dropdown" required>
                            <option value="<?php echo $id_desa?>"><?php echo $nama_desa?></option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Dusun</label>
                            <input type="text" class="form-control form-control-border" value="<?=$nama_dusun?>" required id="dusun" name="dusun" placeholder="Masukkan Nama Kecamatan">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Latitude</label>
                            <input type="text" value="<?=$lat?>" required class="form-control form-control-border" id="lat" name="lat" placeholder="Masukkan latitude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Longitude</label>
                            <input type="text" value="<?=$lng?>" required class="form-control form-control-border" id="lng" name="lng" placeholder="Masukkan longitude">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="text-center">
                            <button type="submit" name="btn" class="btn btn-primary ">Simpan</button>
                        </div>
                        <div class="justify-content-end">
                            <a href="dusun.php" >Kembali ?</a>
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