<?php
include "../koneksi.php";
	$konsentrasi_id=addslashes($_GET['konsentrasi_id']);
	$query="delete from akademik_konsentrasi where konsentrasi_id='".$konsentrasi_id."'";
	$exec=mysql_query($query);
	if(mysql_query($query))
		header("location:./?p=prodi&code=3");
	else
		header("location:./?p=prodi&code=2");

?>