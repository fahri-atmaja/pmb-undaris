<?php
include "../koneksi.php";
	$id=addslashes($_GET['id']);
	$query="delete from ikut_ujian where id='".$id."'";
	$exec=mysql_query($query);
	if(mysql_query($query))
		header("location:./?p=jadwalujian&code=3");
	else
		header("location:./?p=jadwalujian&code=2");

?>