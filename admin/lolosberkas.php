<?php
include "../koneksi.php";
$email = $_GET['id'];
$sql = mysql_query("UPDATE pendaftar_kip SET statusdaftar=1 WHERE email='$email'");
if($sql){
		header("location:./?p=pendaftar_kip&code=1");
	}else{
		header("location:./?p=pendaftar_kip&code=2");
	}
?>