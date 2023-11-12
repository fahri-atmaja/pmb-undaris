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
	    <th>mahasiswa_id</th>
		<th>nim</th>
		<th>nikmhs</th>
		<th>password</th>
		<th>nama</th>
		<th>id_sks</th>
		<th>status_angsur</th>
		<th>konsentrasi_id</th>
		<th>id_kelas</th>
		<th>kpt</th>
		<th>beasiswa</th>
		<th>angkatan_id</th>
		<th>dosen_id</th>
		<th>alamat</th>
		<th>semester</th>
		<th>gender</th>
		<th>agama_id</th>
		<th>tempat_lahir</th>
		<th>tanggal_lahir</th>
		<th>nikibu</th>
		<th>nama_ibu</th>
		<th>nikayah</th>
		<th>nama_ayah</th>
		<th>no_hp_ortu</th>
		<th>pekerjaan_id_ibu</th>
		<th>pekerjaan_id_ayah</th>
		<th>alamat_ayah</th>
		<th>alamat_ibu</th>
		<th>penghasilan_ayah</th>
		<th>penghasilan_ibu</th>
		<th>sekolah_nama</th>
		<th>sekolah_telpon</th>
		<th>sekolah_alamat</th>
		<th>sekolah_jurusan</th>
		<th>sekolah_tahun_lulus</th>
		<th>kampus_nama</th>
		<th>kampus_telpon</th>
		<th>kampus_alamat</th>
		<th>kampus_jurusan</th>
		<th>kampus_tahun_lulus</th>
		<th>institusi_nama</th>
		<th>institusi_telpon</th>
		<th>institusi_alamat</th>
		<th>instansi_nama</th>
		<th>instansi_telpon</th>
		<th>instansi_alamat</th>
		<th>instansi_mulai</th>
		<th>instansi_sampai</th>
		<th>semester_aktif</th>
		<th>status_mahasiswa</th>
		<th>last_login</th>
		<th>ip</th>
		<th>status</th>
		<th>aktif_krs</th>
		<th>judul_skripsi</th>
		<th>email</th>
	</tr>
	<?php
	
	//query menampilkan data
	$sql = mysql_query("select pendaftar.*, regist.id_sks as sks
	                    from pendaftar
	                    left join regist on regist.id_regist=pendaftar.id_regist
	                    where pendaftar.statusdaftar='Diterima' and pendaftar.konsentrasi_id=19");
	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>
			<td>0</td>
			<td>0</td>
			<td>'.$data['nik'].'</td>
			<td>'.$data['tgl_lahir'].'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['sks'].'</td>
			<td>0</td>
			<td>'.$data['konsentrasi_id'].'</td>
			<td>1</td>
			<td>0</td>
			<td>0</td>
			<td>11</td>
			<td>0</td>
			<td>'.$data['alamat'].'</td>
			<td>1</td>
			<td>'.$data['jenkel'].'</td>
			<td>'.$data['kdagama'].'</td>
			<td>'.$data['tpt_lahir'].'</td>
			<td>'.$data['tgl_lahir'].'</td>
			<td>-</td>
			<td>'.$data['nmibu'].'</td>
			<td>-</td>
			<td>'.$data['nmayah'].'</td>
			<td>'.$data['nohp'].'</td>
			<td>0</td>
			<td>0</td>
			<td>-</td>
			<td>-</td>
			<td>0</td>
			<td>0</td>
			<td>'.$data['asal_sekolah'].'</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>0</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>0</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>Y</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>'.$data['email'].'</td>
		</tr>
		';
	}
	?>
</table>