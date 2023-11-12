<?php
  include "../koneksi.php";
  $username = $_GET['email'];
        $loadregist = mysql_query("SELECT * FROM pendaftar_kip WHERE email='$username'");
        $cekrow = mysql_num_rows($loadregist);
        if($cekrow > 0){
         $insert = mysql_query("UPDATE pendaftar_kip SET statusdaftar='Y' WHERE email='$username'");   
         if($insert){
             echo "<script>alert('Berhasil Disimpan !!'); location.href='index.php?p=status';</script>";
            }else{
                echo "<script>alert('Gagal Disimpan !!'); location.href='index.php?p=status';</script>";
            }
        }else{
            echo "<script>alert('Data tidak ada, silahkan isi formulir !!'); location.href='index.php?p=pendaftaran_kip';</script>";
        }
?>