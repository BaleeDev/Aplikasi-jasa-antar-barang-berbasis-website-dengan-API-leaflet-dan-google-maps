<?php 
@session_start();
if(@$_SESSION['kurir']){
include 'Layout/header.php';
include 'Layout/navbar.php';
include '../../database/db.php';

$data = mysqli_query($conn,"select * from tbl_transaksi where status='Sedang di Proses'");
                      $jumlah_kecamatan = mysqli_num_rows($data);
?>

<div class="tes">
    <div id="map" class="map" style="position: static;
  width: 100%;
  height: 100%;
  background-size: contain;
  min-height: 300px;"></div>
</div>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
<?php
if(isset($_SESSION['kurir'])){
    $id_kurir = $_SESSION['kurir'];
    $stt ="";
    $loop = "1";
    $tgl = array("1");
    $id_tr = array("1");
    $id_us = array("1");
    $nama_user = array("1");
    $nomor = array("1");
    $nama_toko = array("1");
    $alamat = array("1");
    $sql = "SELECT * FROM tbl_pesan WHERE id_kurir='$id_kurir' && status='Selesai'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0){
    // untuk mengambil id transaksi yang berada pada tbl pesan
    $sql = mysqli_query($conn, "select * from tbl_pesan where id_kurir='$id_kurir' && status='Selesai' ");
                if(mysqli_num_rows($sql)){
                    while($dat= mysqli_fetch_array($sql)){
                      array_push($id_tr,$dat['id_transaksi']);
                      $loop++;
                    }
                }
    for($i = 1 ; $i < $loop; $i++){
        
    // untuk mengambil id user yang ada pada tabel transaksi
    $sql="select * from tbl_transaksi where id_transaksi='$id_tr[$i]' && status='Selesai'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $id_user = $row['id_user'];
                      array_push($id_us,$row['id_user']);
                      array_push($tgl,$row['tanggal_transaksi']);
    // untuk mengambil data user berdasarkan id user
    $sql="select * from tbl_user where id_user='$id_user'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      array_push($nama_user,$row['nama_user']);
                      array_push($nomor,$row['nomor']);
                      array_push($nama_toko,$row['nama_toko']);
                      array_push($alamat,$row['alamat']);
    }
        $stt = "ada";
            
        }else{
    
}
}

?>
<div class="content-wrapper">
            <div class="container">
<?php
if($stt == "ada"){
?>
            <div class="row mb-2 ml-3">
                <div class="col-12">
            <div class="card mt-3">
              <div class="card-body table-responsive p-0">
                  <h3>Tabel Order</h3>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Pengirim</th>
                      <th>Nomor Pengirim</th>
                      <th>Nama Toko</th>
                      <th>Alamat</th>
                      <th>Tgl</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $noh = 1;
                  for($a = 1; $a < $loop; $a++){
                     ?>
                      <tr>
                          <td><?=$noh++?></td>
                          <td><?=$nama_user[$a]?></td>
                          <td><?=$nomor[$a]?></td>
                          <td><?=$nama_toko[$a]?></td>
                          <td><?=$alamat[$a]?></td>
                          <td><?=$tgl[$a]?></td>
                      </tr>
              <?php } ?>
                  </tbody>
                 </table>
                </div>
            </div>
              <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                  <h3>Tabel Penerima</h3>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Penerima</th>
                      <th>Nomor Penerima</th>
                      <th>Alamat Penerima</th>
                      <th>Berat Benda / kg</th>
                      <th >Jarak</th>
                      <th >Ongkir</th>
                      <th >Harga Barang</th>
                      <th >Sub Total</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      <!--mengambil semua data pada tabel kecamatan-->
                      <?php 
                      $n=1;
                    for($i = 1 ; $i < $loop; $i++){
                    // end
                    $tampil = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE id_transaksi='$id_tr[$i]' ");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                      // mengambil nama dusun tujuan
                      $sql="select * from tbl_dusun where id_dusun='$dat[tujuan]'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_dusun = $row['nama_dusun'];
                      $id_desa = $row['id_kecamatan'];
                      // mengambil nama desa tujuan
                      $sql="select * from tbl_desa where id='$id_desa'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_desa = $row['nama_desa'];
                      $id_kecamatan = $row['id_kecamatan'];
                      // mengambil nama kecamatan tujuan
                      $sql="select * from tbl_kecamatan where id_kecamatan='$id_kecamatan'";
                      $ses=mysqli_query($conn,$sql);
                      $row =mysqli_fetch_assoc($ses);
                      $nama_kecamatan = $row['nama_kecamatan'];
                      $totjarak = $dat['jarak'] / 1000;
                      $stt = $dat['status'];
                    
                     ?>
                    <tr>
                      <td><?= $n++?></td>
                      <td><?=$dat['nama_penerima']?></td>
                      <td><?=$dat['nohp']?></td>
                      <td>Kecamatan <?php echo $nama_kecamatan?>,Desa <?=$nama_desa?>,Dusun <?=$nama_dusun?>,<?=$dat['alamat']?></td>
                      <td><?php echo $dat['berat']?></td>
                      <td><?php echo round($totjarak,2)?></td>
                      <td>Rp. <?php echo number_format ($dat['ongkir'])?></td>
                      <td>Rp. <?php echo number_format ($dat['harga_barang'])?></td>
                      <td>Rp. <?php echo number_format ($dat['total_harga'])?></td>
                      <?php 
                         if($stt == "Sedang di Proses"){
                            ?>    
                        <td><span class="badge badge-info">Proses</span></td>
                        <?php    }else if($stt == "Diterima"){
                            ?>
                        <td><span class="badge badge-primary">Diterima</span></td>
                        <?php }else{
                            ?>
                        <td><span class="badge badge-success">Selesai</span></td>
                            
                            <?php
                        }
                        ?>
                    </tr>
                    <?php 
                        } 
                        } 
                     }
                     ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           
            <!-- /.card -->
          </div>
          <?php }else{
              ?>
              <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Maaf Saat Ini Tidak Ada Orderan Yang Anda Selesaikan, Silahkan mengambil orderan terlebih dahulu!!</h1><br>
            <p><strong>Catatan*</strong></p>
            <p><i>Jika anda merasa sudah menyelsaikan orderan namun pesan ini masih muncul silahkan hubungi <a href="#"><strong>Kami</strong></i></p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
              <?php
          }
          
          ?>
          </div>
          </div>
<!-- jQuery -->
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="../AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<script>

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
$(function () {
  bsCustomFileInput.init();
});
</script>
<div style="text-align: right;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 1%;cursor: pointer;line-height: 0;display:block !important;"><a title="Hosted on free web hosting 000webhost.com. Host your own website for FREE." target="_blank" href="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"><img src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png" alt="www.000webhost.com"></a></div><script>function getCookie(t){for(var e=t+"=",n=decodeURIComponent(document.cookie).split(";"),o=0;o<n.length;o++){for(var i=n[o];" "==i.charAt(0);)i=i.substring(1);if(0==i.indexOf(e))return i.substring(e.length,i.length)}return""}getCookie("hostinger")&&(document.cookie="hostinger=;expires=Thu, 01 Jan 1970 00:00:01 GMT;",location.reload());var wordpressAdminBody=document.getElementsByClassName("wp-admin")[0],notification=document.getElementsByClassName("notice notice-success is-dismissible"),hostingerLogo=document.getElementsByClassName("hlogo"),mainContent=document.getElementsByClassName("notice_content")[0];if(null!=wordpressAdminBody&&notification.length>0&&null!=mainContent){var googleFont=document.createElement("link");googleFontHref=document.createAttribute("href"),googleFontRel=document.createAttribute("rel"),googleFontHref.value="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700",googleFontRel.value="stylesheet",googleFont.setAttributeNode(googleFontHref),googleFont.setAttributeNode(googleFontRel);var css="@media only screen and (max-width: 576px) {#main_content {max-width: 320px !important;} #main_content h1 {font-size: 30px !important;} #main_content h2 {font-size: 40px !important; margin: 20px 0 !important;} #main_content p {font-size: 14px !important;} #main_content .content-wrapper {text-align: center !important;}} @media only screen and (max-width: 781px) {#main_content {margin: auto; justify-content: center; max-width: 445px;}} @media only screen and (max-width: 1325px) {.web-hosting-90-off-image-wrapper {position: absolute; max-width: 95% !important;} .notice_content {justify-content: center;} .web-hosting-90-off-image {opacity: 0.3;}} @media only screen and (min-width: 769px) {.notice_content {justify-content: space-between;} #main_content {margin-left: 5%; max-width: 445px;} .web-hosting-90-off-image-wrapper {position: absolute; display: flex; justify-content: center; width: 100%; }} .web-hosting-90-off-image {max-width: 90%;} .content-wrapper {min-height: 454px; display: flex; flex-direction: column; justify-content: center; z-index: 5} .notice_content {display: flex; align-items: center;} * {-webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;} .upgrade_button_red_sale{box-shadow: 0 2px 4px 0 rgba(255, 69, 70, 0.2); max-width: 350px; border: 0; border-radius: 3px; background-color: #ff4546 !important; padding: 15px 55px !important; font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 600; color: #ffffff;} .upgrade_button_red_sale:hover{color: #ffffff !important; background: #d10303 !important;}",style=document.createElement("style"),sheet=window.document.styleSheets[0];style.styleSheet?style.styleSheet.cssText=css:style.appendChild(document.createTextNode(css)),document.getElementsByTagName("head")[0].appendChild(style),document.getElementsByTagName("head")[0].appendChild(googleFont);var button=document.getElementsByClassName("upgrade_button_red")[0],link=button.parentElement;link.setAttribute("href","https://www.hostinger.com/hosting-starter-offer?utm_source=000webhost&utm_medium=panel&utm_campaign=000-wp"),link.innerHTML='<button class="upgrade_button_red_sale">Go for it</button>',(notification=notification[0]).setAttribute("style","padding-bottom: 0; padding-top: 5px; background-color: #040713; background-size: cover; background-repeat: no-repeat; color: #ffffff; border-left-color: #040713;"),notification.className="notice notice-error is-dismissible";var mainContentHolder=document.getElementById("main_content");mainContentHolder.setAttribute("style","padding: 0;"),hostingerLogo[0].remove();var h1Tag=notification.getElementsByTagName("H1")[0];h1Tag.className="000-h1",h1Tag.innerHTML="Black Friday Prices",h1Tag.setAttribute("style",'color: white; font-family: "Roboto", sans-serif; font-size: 22px; font-weight: 700; text-transform: uppercase;');var h2Tag=document.createElement("H2");h2Tag.innerHTML="Get 90% Off!",h2Tag.setAttribute("style",'color: white; margin: 10px 0 15px 0; font-family: "Roboto", sans-serif; font-size: 60px; font-weight: 700; line-height: 1;'),h1Tag.parentNode.insertBefore(h2Tag,h1Tag.nextSibling);var paragraph=notification.getElementsByTagName("p")[0];paragraph.innerHTML="Get Web Hosting for $0.99/month + SSL Certificate for FREE!",paragraph.setAttribute("style",'font-family: "Roboto", sans-serif; font-size: 16px; font-weight: 700; margin-bottom: 15px;');var list=notification.getElementsByTagName("UL")[0];list.remove();var org_html=mainContent.innerHTML,new_html='<div class="content-wrapper">'+mainContent.innerHTML+'</div><div class="web-hosting-90-off-image-wrapper"><img class="web-hosting-90-off-image" src="https://cdn.000webhost.com/000webhost/promotions/bf-2020-wp-inject-img.png"></div>';mainContent.innerHTML=new_html;var saleImage=mainContent.getElementsByClassName("web-hosting-90-off-image")[0]}</script>
</body>
<?php
include '../leaflet-routing-machine-3.2.12/examples/mapuser.php';
// include 'Layout/footer.php'; 
}else{
     echo "<script>
       alert('Anda Belum login');
       document.location='masuk.php';
       </script>"; 
}?>
