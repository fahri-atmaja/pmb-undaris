<?php
include "../koneksi.php";
	$id_bayar=addslashes($_GET['id_bayar']);
	$query="delete from jenisbayar where id_bayar='".$id_bayar."'";
	$exec=mysql_query($query);
	if(mysql_query($query))
		header("location:./?p=jenisbayar&code=3");
	else
		header("location:./?p=jenisbayar&code=2");

?>