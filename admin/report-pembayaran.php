<?php
include "../koneksi.php";
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
// // Fungsi header dengan mengirimkan raw data excel
// header("Content-type: application/vnd-ms-excel");
 
// // Mendefinisikan nama file ekspor "hasil-export.xls"
// header("Content-Disposition: attachment; filename=mahasiswa.xls");
function rupiah($angka){
 
 $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
 return $hasil_rupiah;
 
}
?>
<h3>Report Pembayaran Calon Mahasiswa</h3>
<table border="1">
<tr>
        <th width="5%">
            No.
        </th>
      
        <th>
            Nama pendaftar
        </th>
        <th>
            Tagihan
        </th>
        <th>
            Jumlah
        </th>
        <th>
            Status
        </th>
    </tr>
	<?php
	
	//query menampilkan data
	$sql = mysql_query("select pb.*, rg.nama, rg.tahun, rg.email, rg.nomor, jb.tagihan, jb.jumlah
	                   from pembayaran as pb, regist as rg, jenisbayar as jb
                        where pb.kodelogin=rg.kodelogin and jb.id_bayar=pb.jenisbayar and rg.tahun=2021");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['tagihan'].'</td>
			<td>'. rupiah($data['jumlah']).'</td>
			<td>'.$data['statusbayar']=1?'Lunas':'Belum Dikonfirmasi'.'</td>
		</tr>
		';
		$total += $data['jumlah'];
		$no++;
	}
	?>
	<tr>
	    <td colspan="3">Total</td>
	    <td><?= rupiah($total);?></td>
	</tr>
</table>
<script>
    window.print();
</script>