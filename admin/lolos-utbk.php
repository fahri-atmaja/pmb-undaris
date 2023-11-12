<?php
include "../koneksi.php";
$email = $_GET['id'];
$sql = mysql_query("UPDATE pendaftar SET statusdaftar=1 WHERE email='$email'");
if($sql){
		header("location:./?p=jalur-utbk&code=1");
	}else{
		header("location:./?p=jalur-utbk&code=2");
	}
?>