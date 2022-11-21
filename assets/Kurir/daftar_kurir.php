<?php 
@session_start();
include 'Layout/header.php';
include '../../database/db.php';

if(isset($_POST['bsimpan'])){
    
    $tgl = date("Y-m-d");
    $status = "Belum";
    $vpassword = md5($_POST['pass']);
    $nomor = $_POST['nomor'];
     $sql = "SELECT * FROM tbl_kurir WHERE nohp='$nomor'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0){
    $vnama = $_FILES['foto_ktp']['name'];
            $source = $_FILES['foto_ktp']['tmp_name'];
            $folder = '../img/kurir/';
            move_uploaded_file($source, $folder.$vnama);
    $foto_sim = $_FILES['foto_sim']['name'];
            $source = $_FILES['foto_sim']['tmp_name'];
            $folder = '../img/kurir/';
            move_uploaded_file($source, $folder.$foto_sim);
            
    // data akan disimpan baru
        $simpan= mysqli_query($conn, "INSERT INTO tbl_kurir (nama_kurir,nohp, password,  desa, alamat, foto_sim, foto_ktp, status, tgl_at)
        VALUES ('$_POST[nama]','$_POST[nomor]' ,'$vpassword' , '$_POST[desa]' ,'$_POST[alamat]','$vnama','$foto_sim','$status','$tgl')
            ");
                if($simpan){
                    echo "<script>
                        alert('Pendaftaran berhasil, silahkan menunggu verifikasi akun anda');
                        document.location='masuk.php';
                    </script>";
                }else{
                    echo "<script>
                        alert('Pendaftaran gagal, isi data dengan benar!');
                        document.location='daftar_kurir.php';
                    </script>"; 
                }
        }else{
            echo "<script>
      alert('Maaf pendaftaran anda gagal, Nomor Hp ini Sudah Di Gunakan');
      document.location='daftar_kurir.php';
      </script>";
        }
    
}
include 'Layout/navbar.php';
?>
<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
<div class="content-wrapper">
<div class="container">
<div class="card card-success mt-3">
              <div class="card-header">
                <h3 class="card-title">Form Pendaftaran Mitra AtongBae</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                      <label for="exampleSelectBorder">Nama Anda</label>
                    <input type="text" name="nama" required class="form-control form-control-border" id="exampleInputEmail1" placeholder="Nama Lengkap Anda">
                  </div>
                      <label for="exampleSelectBorder">Nomor Hp Anda</label>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">+62</span>
                  </div>
                  <input type="text" name="nomor" required class="form-control form-control-border" placeholder="83129108633 (nomor aktif)">
                </div>
                <div class="form-group">
                        <label for="exampleSelectBorder">Pilih Desa</label>
                        <select class="form-control form-control-border js-example-basic-single" required name="desa">
                            <?php
                             $tampil = mysqli_query($conn, "SELECT*FROM tbl_desa order by id desc");
                              if(mysqli_num_rows($tampil)){
                                while($dat= mysqli_fetch_array($tampil)){
                            ?>
                            <option value="<?php echo $dat['id']?>"><?php echo $dat['nama_desa']?></option>
                            <?php
                                }
                              }
                              ?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control form-control-border" required name="alamat" rows="3" placeholder="Alamat Lengkap Anda"></textarea>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Foto KTP</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" required name="foto_ktp" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file..</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Foto SIM</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" required name="foto_sim" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih file..</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" required name="pass" class="form-control form-control-border" id="exampleInputPassword1" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" name="bsimpan" class="btn btn-success">Daftar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
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
