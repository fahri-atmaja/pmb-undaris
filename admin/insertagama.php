<?php
include "../koneksi.php";
	$agama_id=addslashes($_POST['agama_id']);
	$keterangan=addslashes($_POST['keterangan']);
	$query="select * from app_agama where agama_id='".$agama_id."'";
	$exec=mysql_query($query);
	$r=mysql_fetch_array($exec);
	$kdjabfield=$r[0];
	$nmjabfield=$r[1];
	if(mysql_num_rows($exec)==0)
		$query="insert into app_agama values('','$keterangan')";
	else
		$query="update app_agama set keterangan='$keterangan' where agama_id='$agama_id'";
	if(mysql_query($query))
		header("location:./?p=agama&code=1");
	else
		header("location:./?p=agama&code=2");

?>