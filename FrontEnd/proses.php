<?php
session_start(); 
include '../database/db.php';
error_reporting(0);
if(isset($_SESSION['user'])){
      $idUser = $_SESSION['user'];;

    $tamBerat = $_POST['tampungBerat'];
    $tamAsal = $_POST['idasal'];
    $tamTujuan = $_POST['idtujuan'];
    $tamJarak = $_POST['tampungJarak'];
    $tamOngkir = $_POST['tampungOngkir'];
    $tgl = date("Y-m-d");
    $status = "Proses";
    $totalOngkir = 0;

   $vcek = cek($idUser,$status,$conn);
    if($vcek != ""){
        // insert data ke tbl detail transaksi
        insertDetailTransaksi($vcek,$tamBerat, $tamAsal, $tamTujuan, $tamJarak, $tamOngkir, $conn);
    }else{
        $transaksi = noTransaksi($conn);
        insertTransaksi($transaksi, $tgl, $status, $idUser, $totalOngkir, $conn);
        insertDetailTransaksi($transaksi,$tamBerat, $tamAsal, $tamTujuan, $tamJarak, $tamOngkir, $conn);
    }
    
    // echo "<script>alert('Pesanan Berhasil di Tambahkan');</script>";
   echo "<script>location='transaksi.php';</script>";
}else{
    echo "<script>alert('Maaf Untuk Melanjutkan Transaksi Anda Harus Masuk Terlebih Dahulu!');</script>";
    echo "<script>location='masuk.php';</script>";
}
function noTransaksi($conn){
    $query = mysqli_query($conn, "SELECT max(id_transaksi) as no_resi FROM tbl_transaksi");    
    $data = mysqli_fetch_array($query);
    $noTransaksi = $data['no_resi'];

    $urutan = (int) substr($noTransaksi, 3, 3);

    $urutan++;

    $huruf = "AT";
    $noTransaksi = $huruf . sprintf("%03s", $urutan);
    return $noTransaksi;
}

function insertTransaksi($transaksi, $tgl, $status, $idUser, $totalOngkir, $conn){
    $simpan= mysqli_query($conn, "INSERT INTO tbl_transaksi (id_transaksi, id_user, total_ongkir, tanggal_transaksi, status)
    VALUES ('$transaksi','$idUser', '$totalOngkir', '$tgl', '$status')
");
}

function insertDetailTransaksi($transaksi,$tamBerat, $tamAsal, $tamTujuan, $tamJarak, $tamOngkir, $conn){
    $simpan= mysqli_query($conn, "INSERT INTO tbl_detailtransaksi (id_transaksi, berat, asal, tujuan, jarak, ongkir, harga_barang, total_harga, nama_penerima, nohp, alamat, status)
    VALUES ('$transaksi','$tamBerat', '$tamAsal', '$tamTujuan', '$tamJarak', '$tamOngkir', '0', '0', '', '', '', 'Proses')
");
}

function cek($idUser,$status,$conn){
    $query = mysqli_query($conn, "SELECT * FROM tbl_transaksi WHERE id_user = '$idUser' && status ='$status' ");    
    $data = mysqli_fetch_array($query);
    $tTransaksi = $data['id_transaksi'];
    return $tTransaksi;
}
?>