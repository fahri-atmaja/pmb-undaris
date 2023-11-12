<?php
include "../koneksi.php";
                if(isset($_POST['nama'])){
                                $id_regist=addslashes($_POST['id_regist']);
                                $nik=addslashes($_POST['nik']);
                                $nisn=addslashes($_POST['nisn']);
                                $namacalon=addslashes($_POST['nama']);
                                $jenkel=addslashes($_POST['jenkel']);
                                $kdagama=addslashes($_POST['kdagama']);
                                $prodi_id=addslashes($_POST['prodi_id']);
                                $konsentrasi_id=addslashes($_POST['konsentrasi_id']);
                                $tpt_lahir=addslashes($_POST['tpt_lahir']);
                                $tgl_lahir=addslashes($_POST['tgl_lahir']);
                                $email=addslashes($_POST['email']);
                                $alamat=addslashes($_POST['alamat']);
                                $asal_sekolah=addslashes($_POST['asal_sekolah']);
                                $nmayah=addslashes($_POST['nmayah']);
                                $kdpendidikana=addslashes($_POST['kdpendidikana']);
                                $kdpekerjaana=addslashes($_POST['kdpekerjaana']);
                                $penghasilanayah=addslashes($_POST['penghasilanayah']);
                                $nmibu=addslashes($_POST['nmibu']);
                                $kdpendidikani=addslashes($_POST['kdpendidikani']);
                                $kdpekerjaani=addslashes($_POST['kdpekerjaani']);
                                $nohp=addslashes($_POST['nohp']);
                                $statusdaftar=addslashes($_POST['statusdaftar']);
                                $id_sks=addslashes($_POST['id_sks']);
                                $loadpendaftar = mysql_query("SELECT * FROM pendaftar_kip WHERE email=$email");
                                $cek = mysql_num_rows($loadpendaftaran);
                                if ($cek > 0){
                                    echo "<h3 style='color:red'>Posting gagal. Data sudah ada !!</h3>";
                                }else{
                                $query = mysql_query("insert into pendaftar_kip 
                                (kdpendaftar,id_regist,nik,nisn,nama,jenkel,kdagama,prodi_id,konsentrasi_id,tpt_lahir,tgl_lahir,
                                    email,alamat,asal_sekolah,nmayah,kdpendidikana,kdpekerjaana,penghasilanayah,nmibu,kdpendidikani,kdpekerjaani,nohp,statusdaftar,id_sks)
                                    values('','$id_regist','$nik','$nisn','$namacalon','$jenkel','$kdagama',
                                    '$prodi_id','$konsentrasi_id','$tpt_lahir','$tgl_lahir','$email','$alamat','$asal_sekolah','$nmayah',
                                    '$kdpendidikana','$kdpekerjaana','$penghasilanayah','$nmibu','$kdpendidikani','$kdpekerjaani','$nohp','$statusdaftar','$id_sks')");
                                     $ujian = mysql_query("insert into m_siswa values('','$namacalon','$email','PMB 2022')");
                                if($query){
                                    echo "<h3 style='color:green'>Berhasil diposting !!</h3>";
                                } else {
                                    echo "<h3 style='color:red'>Posting gagal !!</h3>";
                                }
                                }
                }
                        
                        ?>

                <?php
                $loadpendaftar = mysql_query("SELECT * FROM pendaftar_kip WHERE email='$username'");
                $cek = mysql_num_rows($loadpendaftar);
                
                if ($cek > 0):
                    $play = mysql_fetch_array($loadpendaftar);
                ?>
               <div class="container">
    <div class="row">
			
					<div class="col-md-12">
						<div class="grey-box-icon b4">  
							 <h4 class="modal-title" id="myModalLabel">Formulir Pendaftaran</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
        <form method="post">
        <table class="table " width="100%">
            <input type="hidden" name="id_regist" id="id_regist" value="<?= $play['id_regist'] ?>">
            <tr>
                <th width="25%">N I K</th>
                <td width="1%"> : </td>
                <td> <input id="nik" name="nik" placeholder="Nomor Induk Kependudukan" class="form-control" type="text" value="<?= $play['nik'] ?>" readonly required ></td>
            </tr>
            <tr>
                <th width="25%">N I S N <br> <span>Wajib diisikan 10 Digit NISN anda!</span></th>
                <td width="1%"> : </td>
                <td> <input id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" class="form-control" type="number" maxlenght="10" value="<?= $play['nisn'] ?>" readonly required ></td>
                
            </tr>
          <tr>
                <th width="25%">Nama pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="nama" name="nama" placeholder="Nama" class="form-control" type="text" value="<?= $play['nama'] ?>" readonly required></td>
            </tr>
            
            <tr>
                <th width="25%">Jenis Kelamin</th>
                <td width="1%"> : </td>
                <td> <select id="jenkel" name="jenkel"  class="form-control" required readonly>
                <option value="<?= $play['jenkel'] ?>"><?= $play['jenkel']==1?'Laki-laki':'Perempuan'; ?></option>
                </select>
                </td>
            </tr>
            <tr>
            <th width="25%">Agama</th>
            <td width="1%"> : </td>
            <td><select  name="kdagama"   class="form-control" readonly required>
                <?php
                $id_agama = $play['kdagama'];
                $exec1=mysql_query("select * from app_agama where agama_id = $id_agama");
                $hasil1=mysql_fetch_array($exec1);
                ?>
            	<option value="<?= $play['kdagama'] ?>"><?= $hasil1['keterangan'] ?></option>
            </select></td>
          </tr>
          <input type="hidden" name="prodi_id" id="prodi_id" value="<?= $dis['prodi1'] ?>">
          <input type="hidden" name="konsentrasi_id" id="konsentrasi_id" value="<?= $dis['prodi2'] ?>">
            <tr>
            <th width="25%">Asal Sekolah / Perguruan Tinggi</th>
            <td width="1%"> : </td>
                <td> <input id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" class="form-control" type="text" value="<?= $play['asal_sekolah'] ?>" required readonly></td>
            </td>
          </tr>
            <tr>
                <th width="25%">Tempat Lahir</th>
                <td width="1%"> : </td>
                <td> <input id="tpt_lahir" name="tpt_lahir" placeholder="Tempat Lahir" class="form-control" type="text" value="<?= $play['tpt_lahir'] ?>" readonly required ></td>
            </tr>
            <tr>
                <th width="25%">Tanggal Lahir</th>
                <td width="1%"> : </td>
                <td> <input id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control"  type="date" value="<?= $play['tgl_lahir'] ?>" readonly required ></td>
            </tr>
            <tr>
                <th width="25%">Email</th>
                <td width="1%"> : </td>
                <td> <input id="email" name="email" placeholder="Email" class="form-control" type="text" value="<?= $play['email'] ?>" readonly required ></td>
            </tr>
            <tr>
                <th width="25%">Alamat</th>
                <td width="1%"> : </td>
                <td> <input id="alamat" name="alamat" placeholder="Alamat" class="form-control" type="textarea" value="<?= $play['alamat'] ?>" readonly required></td>
            </tr>
            <tr>
                <th width="25%">Nama Ayah</th>
                <td width="1%"> : </td>
                <td> <input id="nmayah" name="nmayah" placeholder="Nama Ayah" class="form-control" type="text" value="<?= $play['nmayah'] ?>" readonly required ></td>
            </tr>
              
            <tr>

                <th width="25%">Nama Ibu</th>
                <td width="1%"> : </td>
                <td> <input id="nmibu" name="nmibu" placeholder="Nama Ibu" class="form-control" type="text" value="<?= $play['nmibu'] ?>" readonly required ></td>
            </tr>
            <tr>
            <tr>

                <th width="25%">No  Telepon Pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="nohp" name="nohp" placeholder="No telepon Pendaftar" class="form-control" type="text" value="<?= $play['nohp'] ?>" readonly required ></td>
            </tr>
            <input type="hidden" name="statusdaftar" value="tahap seleksi">
            <input type="hidden" name="id_sks" id="konsentrasi_id" value="<?= $dis['id_sks'] ?>">
        </table>
        *) Info Ujian Penerimaan Mahasiswa Baru akan langsung diinfokan setelah anda mendaftar <br> 
        *) Silahkan Upload Foto Anda <a target="_BLANK" href="http://pmb.undaris.ac.id/kip/index.php?p=passfoto">Klik Disini</a> Lalu refresh halaman ini. <br>
        *) Jika anda Anda bingung harap meminta bantuan Panitia PMB <br>
        *) Dengan Mengisi semua form anda telah setuju menjadi Calon Mahasiswa dan akan menunggu beberapa hari untuk pengumuman hasil seleksi

    </div>
    <div class="modal-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                                <a target="_BLANK" href="http://pmb.undaris.ac.id/kip/index.php?p=passfoto"><button type="button" class="btn btn-danger"><span class='fa fa-print'></span> Upload Pass Foto</button></a>
                                <a target="_BLANK" href="laporan/cetakformulir.php?kdpendaftar=<?= $play['kdpendaftar'] ?>"><button type="button" class="btn btn-primary"><span class='fa fa-print'></span> Cetak KTM Sementara</button></a>
            
                                </div>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
    </div> 
    <?php
    else:
        $loadregist = mysql_query("SELECT * FROM regist_kip WHERE email='$username'");
        $diss = mysql_fetch_array($loadregist);
    ?>
<div class="container">
    <div class="row">
            
                    <div class="col-md-12">
                        <div class="grey-box-icon b4">  
                             <h4 class="modal-title" id="myModalLabel">Formulir Pendaftaran</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
        <form method="post">
        <table class="table " width="100%">
            <input type="hidden" name="id_regist" id="id_regist" value="<?= $diss['id_regist'] ?>">
            <tr>
                <th width="25%">N I K</th>
                <td width="1%"> : </td>
                <td> <input id="nik" name="nik" placeholder="Nomor Induk Kependudukan" class="form-control" type="text" value="" required ></td>
            </tr>
            <tr>
                <th width="25%">N I S N <br> <span>Wajib diisikan 10 Digit NISN anda!</span></th>
                <td width="1%"> : </td>
                <td> <input id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" class="form-control" type="number" maxlenght="10" value="" required ></td>
            </tr>
          <tr>
                <th width="25%">Nama pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="nama" name="nama" placeholder="Nama" class="form-control" type="text" value="<?= $diss['nama'] ?>" readonly required></td>
            </tr>
            <tr>
                <th width="25%">Jenis Kelamin</th>
                <td width="1%"> : </td>
                <td> <select id="jenkel" name="jenkel"  class="form-control" required >
                <option value="">-- pilih jenis kelamin --</option>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
                </select>
                </td>
            </tr>
            <tr>
            <th width="25%">Agama</th>
            <td width="1%"> : </td>
            <td><select  name="kdagama"   class="form-control" required>
                <option value="">-- pilih agama --</option>
              <?php
                $exec=mysql_query("select * from app_agama");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'> $hasil[1]</option>";
              ?>
            </select></td>
          </tr>
          <input type="hidden" name="prodi_id" id="prodi_id" value="<?= $diss['prodi1'] ?>">
          <input type="hidden" name="konsentrasi_id" id="konsentrasi_id" value="<?= $diss['prodi2'] ?>">
            <tr>
                <th width="25%">Tempat Lahir</th>
                <td width="1%"> : </td>
                <td> <input id="tpt_lahir" name="tpt_lahir" placeholder="Tempat Lahir" class="form-control" type="text" required ></td>
            </tr>
            <tr>
                <th width="25%">Tanggal Lahir</th>
                <td width="1%"> : </td>
                <td> <input id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control"  type="date" required ></td>
            </tr>
            <tr>
                <th width="25%">Email</th>
                <td width="1%"> : </td>
                <td> <input id="email" name="email" placeholder="Email" class="form-control" type="text" value="<?= $diss['email'] ?>" readonly required ></td>
            </tr>
            <tr>
                <th width="25%">Alamat</th>
                <td width="1%"> : </td>
                <td> <input id="alamat" name="alamat" placeholder="Alamat" class="form-control" type="textarea" required></td>
            </tr>
            
            <tr>
            <th width="25%">Asal Sekolah / Perguruan Tinggi</th>
            <td width="1%"> : </td>
                <td> <input id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" class="form-control" type="text"></td>
            </td>
            </tr>

            <tr>

                <th width="25%">Nama Ayah</th>
                <td width="1%"> : </td>
                <td> <input id="nmayah" name="nmayah" placeholder="Nama Ayah" class="form-control" type="text" required ></td>
            </tr>
              <tr>
            <th width="25%">Pendidikan Ayah</th>
            <td width="1%"> : </td>
            <td><select  name="kdpendidikana"   class="form-control" required>
            
              <?php
                $exec=mysql_query("select * from pendidikan");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'> $hasil[1]</option>";
              ?>
            </select></td>
          </tr>
           <tr>
            <th width="25%">Pekerjaan Ayah</th>
            <td width="1%"> : </td>
            <td><select  name="kdpekerjaana"   class="form-control" required>
            
              <?php
                $exec=mysql_query("select * from pekerjaan");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'> $hasil[1]</option>";
              ?>
            </select></td>
          </tr>
 <tr>

                <th width="25%">Penghasilan Ayah</th>
                <td width="1%"> : </td>
                <td> <input id="penghasilanayah" name="penghasilanayah" placeholder="Pengasilan Contoh : Rp.2.000.000" class="form-control" type="text" required></td>
            </tr>
 <tr>

                <th width="25%">Nama Ibu</th>
                <td width="1%"> : </td>
                <td> <input id="nmibu" name="nmibu" placeholder="Nama Ibu" class="form-control" type="text" required></td>
            </tr>
            <tr>
            <th width="25%">Pendidikan Ibu</th>
            <td width="1%"> : </td>
            <td><select  name="kdpendidikani"   class="form-control" required>
            
              <?php
                $exec=mysql_query("select * from pendidikan");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'> $hasil[1]</option>";
              ?>
            </select></td>
          </tr>
           <tr>
            <th width="25%">Pekerjaan Ibu</th>
            <td width="1%"> : </td>
            <td><select  name="kdpekerjaani"   class="form-control" required>
            
              <?php
                $exec=mysql_query("select * from pekerjaan");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'> $hasil[1]</option>";
              ?>
            </select></td>
          </tr>
          <tr>

                <th width="25%">No  Telepon Pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="nohp" name="nohp" placeholder="No telepon Pendaftar" class="form-control" type="text" required></td>
            </tr>
            <input type="hidden" name="statusdaftar" value="0">
            <input type="hidden" name="id_sks" value="1">
        </table>
        *) Info Ujian Penerimaan Mahasiswa Baru akan langsung diinfokan setelah anda mendaftar <br> 
        *) Foto Di Tempel sesudah anda mengisi semua form Dengan Benar dan Anda di terima dalam tahap seleksi <br>
        *) Jika anda Anda bingung harap meminta bantuan Panitia PMB <br>
        *) Dengan Mengisi semua form anda akan menjadi Calon Mahasiswa

      </div>
      <div class="modal-footer">
        <center>
        <p>PASTIKAN DATA ANDA SUDAH BENAR SEBELUM MENYIMPAN !</p>
        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
        </center>
            </form>
                        </div>
                    </div><
                </div>
    </div>
  
    <?php
    endif;
    ?>
      <section class="news-box top-margin">
     
    </section>
   
  
	
     
      
    	 
   