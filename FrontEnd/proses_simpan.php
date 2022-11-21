<?php
session_start(); 
include '../database/db.php';
// error_reporting(0);

function updt($namaP,$noP,$alamatP,$id,$conn){
         $updt= mysqli_query($conn, "UPDATE tbl_detailtransaksi set
                    nama_penerima = '$namaP',
                    nohp = '$noP',
                    alamat = '$alamatP'
                    WHERE id_dt='$id'
                        ");
                        
            // echo "<script>location='pesan.php';</script>";
                        
    }
function updtt($id,$status,$conn){
         $updt= mysqli_query($conn, "UPDATE tbl_transaksi set
                    status = '$status'
                    WHERE id_transaksi='$id'
                        ");
           echo "<script>location='pesanan_anda.php';</script>";             
    }
    
if(isset($_SESSION['user'])){
    
    $vbatas = $_POST['batas'];
    $id = $_POST['idPesan'];
    $idT = $_POST['idTransaksi'];
    $status ="Sedang di Proses";
    
    // updt($idT,$status,$conn);
    
    
    // update harga
    $nama=array("red");
    $nohp=array("1");
    $alamat=array("1");
    $id=array("1");
     for($i=1 ; $i < $vbatas; $i++){
        array_push($nama,$_POST['nama'.$i]);             
        array_push($nohp,$_POST['nohp'.$i]);             
        array_push($alamat,$_POST['alamat'.$i]);             
     }
     
     $tampil = mysqli_query($conn, "SELECT*FROM tbl_detailtransaksi WHERE id_transaksi='$idT' ");
                  if(mysqli_num_rows($tampil)){
                    while($dat= mysqli_fetch_array($tampil)){
                      array_push($id,$dat['id_dt']);
                        }
                    }
     
    $tnama="";                
    $tnop="";                
    $talamat="";                
    $idv="";
    $tampharga = $_POST['nama1'];
    if($tampharga != ""){
    for($a=1; $a < $vbatas; $a++){
        $tnama = $nama[$a] ;
        $tnop = $nohp[$a] ;
        $talamat = $alamat[$a] ;
        $idv = $id[$a];
        // updt($h,$th,$idv,$statusT,$conn);
        updt($tnama,$tnop,$talamat,$idv,$conn);
    }
        
    }
    updtt($idT,$status,$conn);
}
?>