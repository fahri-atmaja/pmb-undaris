<?php
include "../koneksi.php";
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
// // Fungsi header dengan mengirimkan raw data excel
// header("Content-type: application/vnd-ms-excel");
 
// // Mendefinisikan nama file ekspor "hasil-export.xls"
// header("Content-Disposition: attachment; filename=mahasiswa.xls");
?>
<table border="1">
	<tr>
		<th>NO.</th>
		<th>NIM</th>
		<th>NIK</th>
		<th>NAMA LENGKAP</th>
		<th>ID GENDER</th>
		<th>ID SKS</th>
		<th>ID KELAS</th>
		<th>ID AGAMA</th>
		<th>ID PRODI</th>
		<th>ID KONSENTRASI</th>
		<th>ID ANGKATAN</th>
		<th>SEMESTER</th>
		<th>TEMPAT LAHIR</th>
		<th>TANGGAL LAHIR</th>
		<th>EMAIL</th>
		<th>ALAMAT</th>
		<th>ASAL SEKOLAH</th>
		<th>NAMA AYAH</th>
		<th>NAMA IBU</th>
		<th>NO HP</th>
	</tr>
	<?php
	
	//query menampilkan data
	$sql = mysql_query("select pendaftar.*, akademik_prodi.nama_prodi, akademik_konsentrasi.nama_konsentrasi, regist.id_sks as sks, regist.angkatan_id, regist.id_kelas
	                    from pendaftar
	                    left join akademik_prodi on pendaftar.prodi_id=akademik_prodi.prodi_id
	                    left join akademik_konsentrasi on pendaftar.konsentrasi_id=akademik_konsentrasi.konsentrasi_id
	                    left join regist on regist.id_regist=pendaftar.id_regist
	                    where regist.prodi2='25' AND pendaftar.statusdaftar='Diterima' AND regist.tahun=2021 order by konsentrasi_id asc");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td></td>
			<td>'.$data['nik'].'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['jenkel'].'</td>
			<td>'.$data['sks'].'</td>
			<td>'.$data['id_kelas'].'</td>
			<td>'.$data['kdagama'].'</td>
			<td>'.$data['nama_prodi'].'</td>
			<td>'.$data['nama_konsentrasi'].'</td>
			<td>'.$data['angkatan_id'].'</td>
			<td>0</td>
			<td>'.$data['tpt_lahir'].'</td>
			<td>'.$data['tgl_lahir'].'</td>
			<td>'.$data['email'].'</td>
			<td>'.$data['alamat'].'</td>
			<td>'.$data['asal_sekolah'].'</td>
			<td>'.$data['nmayah'].'</td>
			<td>'.$data['nmibu'].'</td>
			<td>'.$data['nohp'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>