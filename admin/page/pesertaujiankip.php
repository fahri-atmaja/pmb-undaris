  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Peserta Ujian KIP PMB</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $id = $_GET['id'];
        $loadpeserta = mysql_query("SELECT * FROM pendaftar_kip WHERE statusdaftar='1'");
      ?>
      <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                   <a href="?p=laporan"><button class="btn btn-info">Kembali</button></a>
                               </div>
                               <div class="table-responsive">
                                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <td>No</td>
                                        <td>Email</td>
                                        <td>Nama</td>
                                        <td>No HP</td>
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
                                			<td><?= $field['nama']; ?></td>
                                			<td><?= $field['nohp']; ?></td>
                                			<!--<td><?= $field['link']; ?></td>-->
                                			<!--<td><?= $field['keterangan']; ?></td>-->
                                			<td><a target="_BLANK" href="https://wa.me/62<?= $field['nohp']; ?>"><button class="btn btn-primary">Hubungi Peserta</button></a></td>
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