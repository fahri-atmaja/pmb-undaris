<?php
include "../koneksi.php";
$kdpendaftar= $_GET ['kdpendaftar'];

	mysql_query("update pendaftar set statusdaftar='Diterima' where kdpendaftar='$kdpendaftar'");
		
if(mysql_query)
		header("location:./?p=seleksi-s2&code=1");
else
	header("location:./?p=seleksi-s2&code=2");

?>