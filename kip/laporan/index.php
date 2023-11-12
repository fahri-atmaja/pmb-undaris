<?php
include "../koneksi.php";
if(!isset($_SESSION))
  session_start();
if(!isset($_SESSION['udahlogin']) )
  header("location:login.php");
 $username=$_SESSION['username'];
 $nama=$_SESSION['nama'];


?>
OPPSSSSS..........PILIH DATA YANG AKAN DI CETAK