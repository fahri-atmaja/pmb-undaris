<?php
include "../koneksi.php";
	$kdpendaftar=addslashes($_POST['kdpendaftar']);
	$nim=addslashes($_POST['nim']);
	$query="select * from nim where kdpendaftar='".$kdpendaftar."'";
	$exec=mysql_query($query);
	$r=mysql_fetch_array($exec);
	$kdjabfield=$r[0];
	$nimmjabfield=$r[1];
	if(mysql_num_rows($exec)==0)
		$query="insert into nim values('$kdpendaftar','$nim')";
	else
		$query="update nim set nim='$nim' where kdpendaftar='$kdpendaftar'";
	if(mysql_query($query))
		header("location:./?p=nim&code=1");
	else
		header("location:./?p=nim&code=2");
?>