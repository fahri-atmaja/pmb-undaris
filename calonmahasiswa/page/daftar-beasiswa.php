<?php
include "../koneksi.php";
$cekpendaftar = mysql_query("SELECT * FROM pendaftar WHERE email='$username'");
        if(mysql_num_rows($cekpendaftar)==0){
            echo "<script>alert('Dimohon mengisi formulir terlebih dahulu !!'); location.href='index.php?p=pendaftaran';</script>";
        }else{
$cek = mysql_query("SELECT * FROM daftar_beasiswa WHERE email='$username'");
if(mysql_num_rows($cek) > 0){
$view= mysql_fetch_array($cek);
if($view['jenis']=='hafidz'){
     echo "<script>alert('ANDA MENDAFTAR BEASISWA HAFIDZ'); location.href='$url/calonmahasiswa/index.php?p=beasiswa-hafidz';</script>";
}else{
    echo "<script>alert('ANDA MENDAFTAR BEASISWA PPA'); location.href='$url/calonmahasiswa/index.php?p=beasiswa-ppa';</script>";
}
}
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
           <h3>Daftar Beasiswa</h3>
           <hr>
           Silahkan pilih salah satu
           <hr>
  <a href="?p=beasiswa-ppa">
        <div class="text-center">
            <i class="fa fa-trophy fa-3x" data-original-title="" title=""></i><br>
                 <h4>PPA (Peningkatan Prestasi Akademik)</h4></a>
                 <br>
                 <p>1. Fress Graduate (Lulus 2023/2024)</p>
                 <p>2. Peringkat 1-10 di kelas X dan XI</p>
                 <p>3. Rata-rata nilai rapot adalah 9 di kelas X dan XI</p>
        </div>
    
    <hr>
    <a href="?p=beasiswa-hafidz">
        <div class="text-center">
            <i class="fa fa-ticket fa-3x" data-original-title="" title=""></i><br>
               <h4>HAFIDZ / AH</h4></a>
                <br>
                <p>1. Gratis SPI full. Hafal 30 juz dibuktikan dengan syahadah</p>
                <p>2. Gratis SPI 50%. Hafal 20 juz dibuktikan dengan syahadah</p>
        </div>
    
    <hr>
        </div>
    </div>
</div>