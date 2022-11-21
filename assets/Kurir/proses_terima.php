<?php
session_start(); 
include '../../database/db.php';
// error_reporting(0);

function noPesa($conn){
    $query = mysqli_query($conn, "SELECT max(id_pesan) as no_resi FROM tbl_pesan");    
    $data = mysqli_fetch_array($query);
    $noTransaksi = $data['no_resi'];

    $urutan = (int) substr($noTransaksi, 3, 3);

    $urutan++;

    $huruf = "ATP";
    $noTransaksi = $huruf . sprintf("%03s", $urutan);
    return $noTransaksi;
}
    
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
    
    function insertPesan($id_pesan,$id_transaksi,$id_kurir,$status,$tgl, $conn){
    $simpan= mysqli_query($conn, "INSERT INTO tbl_pesan (id_pesan, id_transaksi, id_kurir, status, tgl)
    VALUES ('$id_pesan','$id_transaksi', '$id_kurir', '$status', '$tgl')
");
    echo "<script>alert('Order Berhasil Di Terima! Anda harus Segera pergi ke alamat pengirim!!');</script>";
  echo "<script>location='order_belum_selesai.php';</script>";
}
    
if(isset($_SESSION['kurir'])){
    $id_kurir = $_SESSION['kurir'];
    $id_transaksi = $_POST['idTransaksi'];
    $status = "Diterima";
    $tgl = date("Y-m-d");
     
     $id_pesan = noPesa($conn);
     
    // // update tbl transaksi
    updTransaksi($status,$id_transaksi,$conn);
    //   // insert to tbl pesan
     updt($id_transaksi,$status,$conn);
     
     insertPesan($id_pesan,$id_transaksi,$id_kurir,$status,$tgl, $conn);
     
}
?>