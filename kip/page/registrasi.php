  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Biaya Registrasi Anda</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $loadsiswa = mysql_query("SELECT * FROM m_siswa WHERE nim='$username'");
        $v      = mysql_fetch_array($loadsiswa);
        $iduser = $v['id'];
        $load = mysql_query("SELECT * FROM tr_ikut_ujian WHERE id_user='$iduser'");
        $cek = mysql_num_rows($load);
      ?>
      <div class="modal-body">
        
        <?php 
        if ($cek > 0){
        $status = mysql_fetch_array($load);
        if ($status['nilai']>=40){
            $loadmhs = mysql_query("SELECT pendaftar.*, regist.angkatan_id FROM pendaftar 
                    LEFT JOIN regist ON regist.id_regist=pendaftar.id_regist
                    WHERE pendaftar.email='$username'");
            $array = mysql_fetch_array($loadmhs);
            // echo $array['nik'];
            $konsentrasi = $array['konsentrasi_id'];
            $angkatan = $array['angkatan_id'];
            // echo $konsentrasi;
            // echo $angkatan;
            echo "<h3><b>Selamat Anda Lolos dan Diterima sebagai mahasiswa Undaris.</b><br><br>
                    Silahkan menyelesaikan tagihan awal anda :";
            $tagihan = mysql_query("SELECT tagihan_mahasiswa.*, kode_tagihan.keterangan FROM tagihan_mahasiswa
                                    LEFT JOIN kode_tagihan ON kode_tagihan.kode_bayar=tagihan_mahasiswa.jenis_bayar
                                    WHERE tagihan_mahasiswa.konsentrasi_id='$konsentrasi' AND tagihan_mahasiswa.angkatan_id='$angkatan'");
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                               <h3>Daftar Biaya Tagihan Awal Anda</h3>
                               <div class="table-responsive">
                                <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <td>Jenis Bayar</td>
                                        <td>Jumlah Bayar</td>
                                        <td></td>
                                        </tr>
                                    </thead>
                                   <tbody>

                                	<?php
                                		$no=1;
                                		if (mysql_num_rows($tagihan) > 0):
                                			while($field = mysql_fetch_array($tagihan)):
                                	?>
                                		<tr>
                                			<td><?= $field['keterangan']; ?></td>
                                			<td><?= $field['jumlah']; ?></td>
                                			<td>
                                				
                                				<?php
                                				$transaksi = mysql_query("SELECT * FROM proses_transaksi WHERE email='$username' AND kode_bayar='$field[jenis_bayar]'");
                                				$cek = mysql_num_rows($transaksi);
                                				// echo $cek;
                                				if($cek > 0){
                                				$fill = mysql_fetch_array($transaksi);
                                				echo '<a href="?p=statuspayment&id='.$fill[custCode].'"><button>CEK INVOICE</button></a>';
                                				
                                				}else{
                                				    echo '<a href="?p=payment-regist&id='.$field[id_tagihan].'"><button>PROSES</button></a>';
                                				}

                                				?>
                                			</td>
                                		</tr>
                                	<?php
                                			endwhile;
                                		else:
                                	?>
                                	
                                	<?php
                                		endif;
                                	?>
                                		
                                	</tbody> 
                                </table>
                                </div>
                                Setelah transaksi diatas terpenuhi akan dilanjutkan dengan export data yang akan muncul form dibawah
                                <br><br>
                            </div>
                        </div>
                    </div>
        <?php
        }
        }
        ?>
        <?php
        $loadproses = mysql_query("SELECT * FROM proses_transaksi WHERE email='$username' AND status='y'");
        $cekk = mysql_num_rows($loadproses);
        if($cekk > 3):
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>EXPORT DATA</h3>
                    <div class="form-group">
                        <?php
                            $loaddaftar = mysql_query("SELECT pendaftar.*, regist.angkatan_id, student_angkatan.id_sks FROM pendaftar
                                                        LEFT JOIN regist ON regist.id_regist=pendaftar.id_regist
                                                        LEFT JOIN student_angkatan ON student_angkatan.angkatan_id=regist.angkatan_id
                                                        WHERE pendaftar.email='$username'");
                            $array = mysql_fetch_array($loaddaftar);
                            
                            echo "Koreksi data anda dibawah ini dengan sebenar-benarnya :
                                <form action='https://siakad.undaris.ac.id/pendaftaran.php' method='POST' target='_BLANK'>
                                    <table border='0px'>
                                            <tr>
                                                <td>NIK</td><td>:</td><td><input type='text' name='nik' value='$array[nik]' require></td>
                                            </tr>
                                            <tr>
                                                <td>NISN *wajib ada dan benar</td><td>:</td><td><input type='text' name='nisn' value='$array[nisn]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td><td>:</td><td><input type='text' name='nama' value='$array[nama]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td><td>:</td><td><input type='text' name='tpt_lahir' value='$array[tpt_lahir]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td><td>:</td><td><input type='text' name='tgl_lahir' value='$array[tgl_lahir]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td><td>:</td><td><input type='text' name='email' value='$array[email]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td><td>:</td><td><input type='text' name='alamat' value='$array[alamat]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Asal Sekolah atau Kampus</td><td>:</td><td><input type='text' name='asal_sekolah' value='$array[asal_sekolah]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ayah</td><td>:</td><td><input type='text' name='nmayah' value='$array[nmayah]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ibu</td><td>:</td><td><input type='text' name='nmibu' value='$array[nmibu]' require></td>
                                            </tr>
                                            <tr>
                                                <td>No WA</td><td>:</td><td><input type='text' name='nohp' value='$array[nohp]' require></td>
                                            </tr>
                                    </table>
                                    <div class='form-group'>
                                    <h3><b>Pilihan Wajib!</b></h3>
                                        <table border='0px'>";
                                    $loadkelas = mysql_query("SELECT * FROM kelas WHERE id_angkatan='$array[angkatan_id]' AND konsentrasi_id like '%$array[konsentrasi_id]%'");
                                    $kelas = mysql_fetch_array($loadkelas);
                                    $tags = $kelas['id_kelas'];
                                    $tag = explode(",", $tags);
                                    
                                        echo "
                                        <tr>
                                            <td>Konfirmasi Kelas</td><td>:</td><td>
                                            <select name='id_kelas' value='' require>";
                                    foreach($tag as $t):
                                        $result = mysql_query("SELECT * FROM akademik_kelas WHERE id_kelas='$t'");
                                        $row = mysql_fetch_array($result);
                                        echo "
                                            <option name='id_kelas' value='$t'>$row[keterangan]</option>";
                                    endforeach;
                                    echo"
                                        <tr>
                                            <td>Ikut ospek tahun ini?</td><td>:</td><td>
                                            <select name='ospek' value='' require>
                                            <option name='ospek' value='1'>Ya</option>
                                            <option name='ospek' value='0'>Tahun Depan</option>
                                            </select></td>
                                        </tr>
                                        <tr>
                                            <td>Pilih ukuran jas almamater</td><td>:</td><td>
                                            <select name='size' value='' require>
                                            <option name='size' value='S'>S</option>
                                            <option name='size' value='M'>M</option>
                                            <option name='size' value='L'>L</option>
                                            <option name='size' value='XL'>XL</option>
                                            <option name='size' value='XXL'>XXL</option>
                                            <option name='size' value='XXXL'>XXXL</option>
                                            </select></td>
                                        </tr>
                                        </table>
                                    </div>
                                        <input type='hidden' name='jenkel' value='$array[jenkel]' require>
                                        <input type='hidden' name='kdagama' value='$array[kdagama]' require>
                                        <input type='hidden' name='prodi_id' value='$array[prodi_id]' require>
                                        <input type='hidden' name='konsentrasi_id' value='$array[konsentrasi_id]' require>
                                        <input type='hidden' name='angkatan_id' value='$array[angkatan_id]' require>
                                        <input type='hidden' name='id_sks' value='$array[id_sks]' require>
                                        <button type='submit' name='submit'>PROSES DATA</button>
                                </form>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        endif;
        ?>
        </div>
    </div>
</body>