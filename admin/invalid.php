<?php
include "../koneksi.php";
$idProduk = $_GET['id'];
if($idProduk){
$query = mysql_query("delete from pembayaran where kodelogin='{$idProduk}'");
$query1 = mysql_query("update regist set statusdaftar='2' where kodelogin='{$idProduk}'");}
if($query){
                echo "<script type='text/javascript'>alert('Pembayaran . $idProduk . invalid - laporan terkirim ke user');</script>";
                header("Location: index.php?p=pembayaran");
} else {
    echo "<script type='text/javascript'>alert('Gagal $idProduk');</script>";
}
if($query1){
                echo "<script type='text/javascript'>alert('Registrasi invalid - laporan terkirim ke user');</script>";
                header("Location: index.php?p=pembayaran");
} else {
    echo "<script type='text/javascript'>alert('Gagal $idProduk');</script>";
}

exit;