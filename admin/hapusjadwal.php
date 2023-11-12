<?php
include "../koneksi.php";
	$id=addslashes($_GET['id']);
	$query="delete from jadwal_ujian where id_jadwal='".$id."'";
	$exec=mysql_query($query);
	if(mysql_query($query))
		header("location:./?p=jadwalujian&code=3");
	else
		header("location:./?p=jadwalujian&code=2");

?>