<?php
include "../koneksi.php";
$email = $_GET['id'];

$load = mysql_query("SELECT berkas FROM pendaftar_kip WHERE email='$email'");
$text = mysql_fetch_array($load);
$path = '../kip/berkaskip/'.$text[berkas];

chown($path, 666);

if (unlink($path)) {
    echo 'success';
    $sql = mysql_query("UPDATE pendaftar_kip SET berkas='' WHERE email='$email'");
    if($sql){
		header("location:./?p=pendaftar_kip&code=1");
	}else{
		header("location:./?p=pendaftar_kip&code=2");
	}
} else {
    echo 'fail';
}

?>