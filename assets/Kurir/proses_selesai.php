<?php
session_start(); 
include '../../database/db.php';
// error_reporting(0);

     function updt($id,$status,$conn){
         $updt= mysqli_query($conn, "UPDATE tbl_detailtransaksi set
                    status = '$status'
                    WHERE id_transaksi='$id'
                        ");
                        
           
                        
    }
    
     function updTransaksi($status,$id,$conn){
         $updt= mysqli_query($conn, "UPDATE tbl_transaksi set
                    status = '$status'
                    WHERE id_transaksi='$id'
                        ");
                        
    }
     function updPesan($status,$id,$conn){
         $updt= mysqli_query($conn, "UPDATE tbl_pesan set
                    status = '$status'
                    WHERE id_transaksi='$id'
                        ");
     echo "<script>alert('Order Selesai! Terimakasih');</script>";
  echo "<script>location='kurir.php';</script>";                   
    }
    
    
if(isset($_SESSION['kurir'])){
    $id_kurir = $_SESSION['kurir'];
    $id_transaksi = $_POST['idTransaksi'];
    $status = "Selesai";
    $batas = $_POST['batas'];
    // update tbl transaksi
    updTransaksi($status,$id_transaksi,$conn);
    //   // insert to tbl pesan
     updt($id_transaksi,$status,$conn);
     
    //  mengambil bukti terima
    for($i=1 ; $i < $batas; $i++){
     $vnama = $_FILES['bukti'.$i]['name'];
            $source = $_FILES['bukti'.$i]['tmp_name'];
            $folder = '../img/bukti/';
            move_uploaded_file($source, $folder.$vnama);
    $simpan= mysqli_query($conn, "INSERT INTO tbl_detailpesan (id_transaksi,id_kurir, gambar)
        VALUES ('$id_transaksi','$id_kurir','$vnama')
            ");
                
    }
     
     
     updPesan($status,$id_transaksi,$conn);
}
?>