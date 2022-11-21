<?php
session_start(); 
include '../database/db.php';
// error_reporting(0);

 function cek($idUser,$status,$conn){
      $query = mysqli_query($conn, "SELECT * FROM tbl_transaksi WHERE id_user = '$idUser' && status ='$status' ");    
      $data = mysqli_fetch_array($query);
      $tTransaksi = $data['id_transaksi'];
      return $tTransaksi;
    }
    
     function updt($harga,$tot,$id,$status,$conn){
         $updt= mysqli_query($conn, "UPDATE tbl_detailtransaksi set
                    harga_barang = '$harga',
                    total_harga = '$tot',
                    status = '$status'
                    WHERE id_dt='$id'
                        ");
                        
            echo "<script>location='pesan.php';</script>";
                        
    }
    
     function updTransaksi($totOngkir,$status,$id,$conn){
         $updt= mysqli_query($conn, "UPDATE tbl_transaksi set
                    total_ongkir = '$totOngkir',
                    status = '$status'
                    WHERE id_transaksi='$id'
                        ");
                        
    }
    
if(isset($_SESSION['user'])){
    $idUser = $_SESSION['user'];
    $vbatas = $_POST['batas'];
    $status = "Proses";
    $statusT = "Pesan";
    $ongkir = $_POST['totOngkir'];
    
    $vcek = cek($idUser,$status,$conn);
    
    // update tbl transaksi
    updTransaksi($ongkir,$statusT,$vcek,$conn);
       // insert to tbl pesan
    
    // update harga
    $tampHarga=array("red");
    $totHarga=array("1");
    $id=array("1");
     for($i=1 ; $i < $vbatas; $i++){
        array_push($tampHarga,$_POST['harga'.$i]);             
     }
    //   panggil isi data 
        $tampil = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE id_transaksi='$vcek' ");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                      array_push($totHarga,$dat['ongkir']);
                      array_push($id,$dat['id_dt']);
                        }
                    }
    $h="";                
    $th="";                
    $idv="";
    $tampharga = $_POST['harga1'];
    if($tampharga != ""){
    for($a=1; $a < $vbatas; $a++){
        $h = $tampHarga[$a] ;
        $th = $totHarga[$a] + $h;
        $idv = $id[$a];
        updt($h,$th,$idv,$statusT,$conn);
    }
        
    }else{
        for($a=1; $a < $vbatas; $a++){
        $h = "0" ;
        $th = $totHarga[$a] + $h;
        $idv = $id[$a];
        updt($h,$th,$idv,$statusT,$conn);
    }
    }
}
?>