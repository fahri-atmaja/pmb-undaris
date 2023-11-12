  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Jadwal Ujian PMB</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $loadsiswa = mysql_query("SELECT * FROM jadwal_ujian ORDER BY tanggal DESC");
      ?>
      <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                               <h3>Jadwal Ujian PMB</h3>
                               <div class="form-group">
                                   <a href="index.php?p=inputjadwal"><button class="btn btn-info">INPUT JADWAL</button></a>
                               </div>
                               <div class="table-responsive">
                                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                        <td>Tanggal</td>
                                        <td>Waktu</td>
                                        <td>Status</td>
                                        <td>Lokasi</td>
                                        <td>Link</td>
                                        <td>Keterangan</td>
                                        <td>Pelaksanaan</td>
                                        <td>Aksi</td>
                                        </tr>
                                    </thead>
                                   <tbody>

                                	<?php
                                		$no=1;
                                		if (mysql_num_rows($loadsiswa) > 0):
                                			while($field = mysql_fetch_array($loadsiswa)):
                                	?>
                                		<tr>
                                		    <td><?= $no++ ?></td>
                                			<td><?= $field['tanggal']; ?></td>
                                			<td><?= $field['waktu']; ?></td>
                                			<td><?= $field['status']; ?></td>
                                			<td><?= $field['lokasi']; ?></td>
                                			<td><?= $field['link']; ?></td>
                                			<td><?= $field['keterangan']; ?></td>
                                			<td><?= $field['selesai']=='y'?'<b>Sudah dilaksanakan</b>':'Belum dilaksanakan';?></td>
                                			<td><div class="form-group"><a href="index.php?p=cekpesertaujian&id=<?= $field['id_jadwal']; ?>"><button class="btn btn-primary">Cek Peserta</button></a></div>
                                			<div class="form-group"><a href="hapusjadwal.php?id=<?= $field['id_jadwal']; ?>"><button class="btn btn-danger">Hapus Jadwal</button></a></div>
                                			<div class="form-group"><a href="index.php?p=editjadwal&id=<?= $field['id_jadwal']; ?>"><button class="btn btn-success">Edit Jadwal</button></a></div></td>
                                		</tr>
                                	<?php
                                			endwhile;
                                		else:
                                	?>
                                	<tr>
                                	    <td>DATA TIDAK DITEMUKAN</td>
                                	</tr>
                                	<?php
                                		endif;
                                	?>
                                		
                                	</tbody> 
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</body>