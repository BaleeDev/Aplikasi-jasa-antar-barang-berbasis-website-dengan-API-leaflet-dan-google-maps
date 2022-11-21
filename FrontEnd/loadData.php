<?php
include '../database/db.php';

$loadType=$_POST['loadType'];
$loadId=$_POST['loadId'];

if($loadType=="kabupaten"){
    $sql="select id,nama_desa from tbl_desa where id_kecamatan='".$loadId."' order by nama_desa asc";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);
    if($check > 0){
        $HTML="";
        while($row=mysqli_fetch_array($res)){
            $HTML.="<option value='".$row['id']."'>".$row['1']."</option>";
        }
        echo $HTML;
    }
}
else{
    $sql="select id_dusun,nama_dusun from tbl_dusun where id_kecamatan='".$loadId."' order by nama_dusun asc";
    $res=mysqli_query($conn,$sql);
    $check=mysqli_num_rows($res);
    if($check > 0){
        $HTML="";
        while($row=mysqli_fetch_array($res)){
            $HTML.="<option value='".$row['id_dusun']."'>".$row['1']."</option>";
        }
        echo $HTML;
    }
}
?>