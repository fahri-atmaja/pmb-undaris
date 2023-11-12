  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Peserta Ujian PMB</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $id = $_GET['id'];
        $loadjadwal = mysql_query("SELECT * FROM jadwal_ujian WHERE id_jadwal='$id'");
        $array = mysql_fetch_array($loadjadwal);
        
        $loadpeserta = mysql_query("SELECT * FROM ikut_ujian WHERE id_jadwal='$id'");
      ?>
      <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                               <h3>Jadwal Ujian PMB Tanggal <?= $array['tanggal']; ?></h3>
                               <div class="form-group">
                                   <a href="index.php?p=jadwalujian"><button class="btn btn-info">Kembali</button></a>
                               </div>
                               <div class="table-responsive">
                                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <td>No</td>
                                        <td>Email</td>
                                        <!--<td>Status</td>-->
                                        <!--<td>Lokasi</td>-->
                                        <!--<td>Link</td>-->
                                        <!--<td>Keterangan</td>-->
                                        <td>Aksi</td>
                                        </tr>
                                    </thead>
                                   <tbody>

                                	<?php
                                		$no=1;
                                		if (mysql_num_rows($loadpeserta) > 0):
                                			while($field = mysql_fetch_array($loadpeserta)):
                                	?>
                                		<tr>
                                			<td><?= $no++ ?></td>
                                			<td><?= $field['email']; ?></td>
                                			<!--<td><?= $field['status']; ?></td>-->
                                			<!--<td><?= $field['lokasi']; ?></td>-->
                                			<!--<td><?= $field['link']; ?></td>-->
                                			<!--<td><?= $field['keterangan']; ?></td>-->
                                			<td><a href="hapuspesertaujian.php?id=<?= $field['id']; ?>"><button class="btn btn-danger">Hapus Peserta</button></a></td>
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