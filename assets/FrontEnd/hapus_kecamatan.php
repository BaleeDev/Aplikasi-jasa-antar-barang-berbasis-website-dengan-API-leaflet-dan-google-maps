<?php 
     @session_start();
     if(@$_SESSION['Admin']){ 
     include '../../database/db.php';
     $delet = mysqli_query($conn, "DELETE FROM tbl_kecamatan WHERE id_kecamatan='$_GET[id]'" );
     if($delet){
       echo "<script>
       alert('Hapus berhasil');
       document.location='kecamatan.php';
       </script>";
       }else{
       echo "<script>
       alert('Hapus gagal');
       document.location='kecamatan.php';
       </script>"; 
       }
    }else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}
?>