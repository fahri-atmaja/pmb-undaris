<?php
include "../koneksi.php";
	$id_bayar=addslashes($_POST['id_bayar']);
	$tagihan=addslashes($_POST['tagihan']);
	$jumlah=addslashes($_POST['jumlah']);
	$query="select * from app_agama where id_bayar='".$id_bayar."'";
	$exec=mysql_query($query);
	$r=mysql_fetch_array($exec);
	$kdjabfield=$r[0];
	$nmjabfield=$r[1];
	if(mysql_num_rows($exec)==0)
		$query="insert into app_agama(id_bayar,tagihann,jumlah,semester) values('','$tagihan','$jumlah')";
	else
		$query="update app_agama set tagihan='$tagihan' where id_bayar='$id_bayar'";
	if(mysql_query($query))
		header("location:./?p=jenisbayar&code=1");
	else
		header("location:./?p=jenisbayar&code=2");

?>