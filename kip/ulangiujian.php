<?php
include "../koneksi.php";
        // $loadsiswa = mysql_query("SELECT * FROM m_siswa WHERE nim='$username'");
        // $v      = mysql_fetch_array($loadsiswa);
        // $iduser = $v['id'];
    $iduser= $_GET['id'];
    $email = $_GET['email'];
	$query="delete from tr_ikut_ujian where id_user='".$iduser."'";
	$query2="delete from ikut_ujian where email='".$email."'";
	$exec=mysql_query($query);
	$exec2=mysql_query($query2);
	if(mysql_query($exec))
		header("location:./?p=status&code=02");
	else
		header("location:./?p=status&code=03");
		$exec=mysql_query($query);
	if(mysql_query($exec2))
		header("location:./?p=status&code=02");
	else
		header("location:./?p=status&code=03");

?>