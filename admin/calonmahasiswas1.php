<?php
include "../koneksi.php";
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
// // Fungsi header dengan mengirimkan raw data excel
// header("Content-type: application/vnd-ms-excel");
 
// // Mendefinisikan nama file ekspor "hasil-export.xls"
// header("Content-Disposition: attachment; filename=mahasiswa.xls");
?>
<h3>Calon Mahasiswa S1</h3>
<table border="1">
<tr>
        <th width="5%">
            No.
        </th>
      
        <th>
            Nama pendaftar
        </th>
        <th>
            Nomor HP
        </th>
        <th>
            Tahun Daftar
        </th>
    </tr>
	<?php
	
	//query menampilkan data
	$sql = mysql_query("select * from regist where tahun=2021 AND prodi1!=22");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['nomor'].'</td>
			<td>'.$data['tahun'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
<script>
    window.print();
</script>