<?php 
     @session_start();  
     if(@$_SESSION['Admin']){ 
     include '../../database/db.php';
     $delet = mysqli_query($conn, "DELETE FROM tbl_user WHERE id_user='$_GET[id]'" );
     if($delet){
       echo "<script>
       alert('Hapus berhasil');
       document.location='user.php';
       </script>";
       }else{
       echo "<script>
       alert('Hapus gagal');
       document.location='user.php';
       </script>"; 
       }
     }else{
     echo "<script>
       alert('Anda Belum login');
       document.location='login.php';
       </script>";  
}
?>