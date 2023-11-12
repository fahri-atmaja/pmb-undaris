<?php
include "../koneksi.php";
	$konsentrasi_id=addslashes($_POST['konsentrasi_id']);
	$nama_konsentrasi=addslashes($_POST['nama_konsentrasi']);
	$jenjang=addslashes($_POST['jenjang']);
	$semester=addslashes($_POST['semester']);
	$query="select * from app_agama where konsentrasi_id='".$konsentrasi_id."'";
	$exec=mysql_query($query);
	$r=mysql_fetch_array($exec);
	$kdjabfield=$r[0];
	$nmjabfield=$r[1];
	if(mysql_num_rows($exec)==0)
		$query="insert into app_agama(konsentrasi_id,nama_konsentrasin,jenjang,semester) values('','$nama_konsentrasi','$jenjang','$semester')";
	else
		$query="update app_agama set nama_konsentrasi='$nama_konsentrasi' where konsentrasi_id='$konsentrasi_id'";
	if(mysql_query($query))
		header("location:./?p=agama&code=1");
	else
		header("location:./?p=agama&code=2");

?>