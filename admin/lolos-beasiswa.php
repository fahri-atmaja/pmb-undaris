<?php
include "../koneksi.php";
$email = $_GET['id'];
$sql = mysql_query("UPDATE daftar_beasiswa SET status='y' WHERE email='$email'");
if($sql){
		header("location:./?p=acc-beasiswa&code=1");
	}else{
		header("location:./?p=acc-beasiswa&code=2");
	}
?>