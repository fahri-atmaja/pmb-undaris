<?php
include "../koneksi.php";
		$query="update pembayaran set statusbayar='1' where kodelogin='9wq8Y9Z'";
		$query="update regist set statusdaftar='1' where kodelogin='9wq8Y9Z'";
	if(mysql_query($query))
                echo "<h3 style='color:green'>Data pendaftar berhasil disimpan</h3>";
            elseif($_GET['code']==2)
                echo "<h3 style='color:red'>Terjadi kesalahan</h3>";
            elseif($_GET['code']==3)
                echo "<h3 style='color:blue'>Data pendaftar berhasil dihapus</h3>";
        

?>