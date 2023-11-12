 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>pendaftar</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class='row' id='home-content'>
                    <div class='col-lg-12'>
         
<style>
.zoom {
  padding: 10px;
  transition: transform .2s; /* Animation */
  width: 300px;
  height: 300px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<form method="POST">
<table class="table table-striped">
    <tr>
        <th width="5%">
            No.
        </th>
        <th width="20%">
            Kode pendaftar
        </th>
        <th>
            Tahun Angkatan
        </th>
        <th>
            Nama pendaftar
        </th>
        <th>
            Bukti Bayar
        </th>
     <th>
            Jenis Bayar
        </th>
        <th>
            Status
        </th>
        <th>
        </th>
    </tr>
    <?php
//     $batas = 10;
// 	$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
// 	$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
// 	$previous = $halaman - 1;
// 	$next = $halaman + 1;
//     $datapmb=mysql_query("select pb.*, rg.nama, rg.statusdaftar, rg.email, rg.nomor, rg.tahun, jb.tagihan from pembayaran as pb, regist as rg, jenisbayar as jb
//                           where pb.kodelogin=rg.kodelogin and jb.id_bayar=pb.jenisbayar and rg.tahun=2021");
        // $exec=mysql_query("Select pembayaran.*, regist.nama, regist.tahun, regist.statusdaftar, regist.nomor, jenisbayar.tagihan from pembayaran
        //                     inner join regist on regist.kodelogin=pembayaran.kodelogin
        //                     inner join jenisbayar on jenisbayar.id_bayar=pembayaran.jenisbayar
        //                     where regist.tahun=2021
        //                     order by pembayaran.id_bayar ASC");
            
        // $jumlahdata = mysql_num_rows($datapmb);
        // $total_halaman = ceil($jumlah_data / $batas);
        // $data_limit=mysql_query("select pb.*, rg.nama, rg.statusdaftar, rg.email, rg.nomor, rg.tahun, jb.tagihan from pembayaran as pb, regist as rg, jenisbayar as jb
        //                   where pb.kodelogin=rg.kodelogin and jb.id_bayar=pb.jenisbayar and rg.tahun=2021 limit $halaman_awal, $batas");
        // $nomor = $halaman_awal+1;
        
        //   $halaman = 10;
        //   $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        //   $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        //   $result = mysql_query("select pb.*, rg.nama, rg.statusdaftar, rg.email, rg.nomor, rg.tahun, jb.tagihan from pembayaran as pb, regist as rg, jenisbayar as jb
        //                   where pb.kodelogin=rg.kodelogin and jb.id_bayar=pb.jenisbayar and rg.tahun=2021 and pb.statusbayar=0");
        //   $total = mysql_num_rows($result);
        //   $pages = ceil($total/$halaman);            
        //   $query = mysql_query("select pb.*, rg.nama, rg.statusdaftar, rg.email, rg.nomor, rg.tahun, jb.tagihan from pembayaran as pb, regist as rg, jenisbayar as jb
        //                   where pb.kodelogin=rg.kodelogin and jb.id_bayar=pb.jenisbayar and rg.tahun=2021 and pb.statusbayar=0 LIMIT $mulai, $halaman")or die(mysql_error);
        //   $no =$mulai+1;
        
        // $result = mysql_query("select pb.*, rg.nama, rg.statusdaftar, rg.email, rg.nomor, rg.tahun, jb.tagihan 
        //                         from pembayaran as pb, regist as rg, jenisbayar as jb
        //                         where pb.kodelogin=rg.kodelogin and jb.id_bayar=pb.jenisbayar and rg.tahun=2021 and pb.statusbayar=0");
        // $result = mysql_query("SELECT pembayaran.*, regist.nama, regist.statusdaftar, regist.email, regist.nomor, regist.tahun, jenisbayar.tagihan
        //                         FROM pembayaran
        //                         LEFT JOIN regist ON pembayaran.kodelogin=regist.kodelogin
        //                         LEFT JOIN jenisbayar ON pembayaran.jenisbayar.regist.jenisbayar
        //                         WHERE regist.tahun=2021 AND pembayaran.statusbayar=1");
        $no=1;
        $result = mysql_query("SELECT pembayaran.*, jenisbayar.tagihan, regist.nama, regist.tahun FROM pembayaran
                                LEFT JOIN jenisbayar ON jenisbayar.id_bayar=pembayaran.jenisbayar
                                LEFT JOIN regist ON regist.kodelogin=pembayaran.kodelogin
                                WHERE pembayaran.statusbayar='0'");
        while($r=mysql_fetch_array($result))
        
        {

    ?>
    <tr>
        <td width="5%">
            <?php echo $no++; ?>
        </td>
        <td width="20%">
            <span class="data-0-<?php echo $no; ?>"><?php echo $r['kodelogin']; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r['tahun']; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r['nama']; ?></span>
        </td>
        <td>
            <span class="data-2-<?php echo $no; ?>"><img width="200px" height="200px" src="<?php echo "../calonmahasiswa/file/".$r['file']; ?>"></span>
        </td>
         <td>
            <span class="data-3-<?php echo $no; ?>"><?php echo $r['tagihan']; ?></span>
        </td>
        <td>
            <?php
            if ($r['statusdaftar']==0){
                echo "Belum Dikonfirmasi";
            } elseif ($r['statusdaftar']==1){
                echo "Lunas";
            } else {
                echo "INVALID";
            }
            ?>
            <!--<span class="data-4-<?php echo $no; ?>"><?php echo $r['statusdaftar']=1?'Lunas':'Belum Dikonfirmasi'; ?></span>-->
        </td>
    
        <td>
             <a href="bayar.php?id=<?php echo $r['kodelogin']; ?>">Konfirmasi</a> | 
            <a href="invalid.php?id=<?php echo $r['kodelogin']; ?>">Invalid</a>
        </td>
    </tr>
    <?php
    $kode = $r['kodelogin'];
include "../koneksi.php";
if ( isset($_POST['submit'])){
        $query="update pembayaran set statusbayar='1' where kodelogin='$kode'";
        $query1="update regist set statusdaftar='1' where kodelogin='$kode'";
    if(mysql_query($query))
                echo "<h3 style='color:green'>Pembayaran telah dikonfirmasi</h3>";
            elseif($_GET['code']==2)
                echo "<h3 style='color:red'>Terjadi kesalahan</h3>";
            elseif($_GET['code']==3)
                echo "<h3 style='color:blue'>Data pendaftar berhasil dihapus</h3>";
    if(mysql_query($query1))
                echo "<h3 style='color:green'>Status pendaftar berhasil disimpan</h3>";
            elseif($_GET['code']==2)
                echo "<h3 style='color:red'>Terjadi kesalahan</h3>";
            elseif($_GET['code']==3)
                echo "<h3 style='color:blue'>Data pendaftar berhasil dihapus</h3>";
        }

?>
    <?php
        }
    ?>

</table>
			
			<ul class="pagination">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <li><a href="?p=pembayaran&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 
  <?php } ?>
 
</ul>
</form>
                    
                    </div>
                 
                </div>