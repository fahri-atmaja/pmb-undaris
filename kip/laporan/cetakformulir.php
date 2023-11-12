<?php
include "../../koneksi.php";
if(!isset($_SESSION))
  session_start();
if(!isset($_SESSION['udahloginkip']) )
  header("location:login.php");
 $username=$_SESSION['username'];
 $nama=$_SESSION['nama'];


?>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<html>
<body>
<?php
$kdpendaftar=addslashes($_GET['kdpendaftar']);
include "../../koneksi.php";     
        $exec=mysql_query("select pendaftar_kip.*, regist_kip.kodelogin from pendaftar_kip
                            left join regist_kip on regist_kip.id_regist=pendaftar_kip.id_regist
                            where kdpendaftar='".$kdpendaftar."' ");
     $r=mysql_fetch_array($exec)
        
       ;

    ?>
<div class="book">
    <div class="page">
<table width="100%" border="0">
  <tr>
    <th ><img src="logo.jpg" width="100" ></th>
    <th ><b>KARTU TANDA MAHASISWA SEMENTARA</b> <br>
    UNIVERSITAS DARUL ULUM ISLAMIC CENTRE SUDIRMAN GUPPI <br>
    UNDARIS<br>
    Jl. Tentara Pelajar No 13 Ungaran</th>
 
  </tr>
</table>
<hr>
<table align="left" class="table table-striped" width="20%">
<img src="../foto/<?= $r['foto']; ?>" width=152px height=182px>
</table>
<table align="right" class="table table-striped" width="70%">
          <tr>
            <th width="25%"><div align="left">N I K</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-0-<?php echo $r[0]; ?>"><?php echo $r['nik']; ?></span></td>
          </tr>
          <tr>
            <th width="25%"><div align="left">N I S N</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-0-<?php echo $r[0]; ?>"><?php echo $r['nisn']; ?></span></td>
          </tr>
          <tr>
            <th width="25%"><div align="left">Nama</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-0-<?php echo $r[0]; ?>"><?php echo $r['nama']; ?></span></td>
          </tr>
            <tr>
            <th width="25%"><div align="left">Prodi</div></th>
            <td width="10%"> : </td>
            <?php 
            $loadprodi = mysql_query("SELECT * FROM akademik_prodi WHERE prodi_id= $r[prodi_id]");
            $tampilprodi    = mysql_fetch_array($loadprodi);
            ?>
            <td> <?php echo $tampilprodi['nama_prodi']; ?></td>
          </tr>
          <tr>
            <th width="25%"><div align="left">Jenis Kelamin</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-1-<?php echo $r[0]; ?>"><?php echo $r['jenkel']==1?'Laki-laki':'Perempuan'; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Agama</div></th>
            <td width="10%"> : </td>
            <?php 
            $loadagama = mysql_query("SELECT * FROM app_agama WHERE agama_id= $r[kdagama]");
            $tampil    = mysql_fetch_array($loadagama);
            ?>
            <td> <span class="data-2-<?php echo $r[0]; ?>"><?php echo $tampil['keterangan']; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Tempat Lahir</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-3-<?php echo $r[0]; ?>"><?php echo $r['tpt_lahir']; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Tanggal Lahir</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-4-<?php echo $r[0]; ?>"><?php echo $r['tgl_lahir']; ?></span></td>
          </tr>  <tr>
            <th width="25%"><div align="left">Asal Sekolah</div></th>
            <td width="10%"> : </td>
            <td><?php echo $r['asal_sekolah']; ?></td>
          </tr><tr>
            <th width="25%"><div align="left">Alamat</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-5-<?php echo $r[0]; ?>"><?php echo $r['alamat']; ?></span></td>
          </tr> <tr>
            <th width="25%"><div align="left">No Hp</div></th>
            <td width="10%"> : </td>
            <td> <?php echo $r['nohp']; ?></td>
          </tr>

      
</table>
<br><br>
<table align="center" class="table table-striped" width="900%">
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
*) Kartu Ujian di cetak Rangkap 2  <br>
*) Pengumuman Seleksi Pendaftaran Akan di Umumkan Melalui Website Resmi PMB Undaris di Http://pmb.undaris.ac.id  <br>
</table>

</div>
    </div>
        </body>
        </html>
        <script type="text/javascript">window.print();</script>