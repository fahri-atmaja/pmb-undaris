<?php
include "../koneksi.php";
	$agama_id=addslashes($_GET['agama_id']);
	$query="delete from app_agama where agama_id='".$agama_id."'";
	$exec=mysql_query($query);
	if(mysql_query($query))
		header("location:./?p=agama&code=3");
	else
		header("location:./?p=agama&code=2");

?>