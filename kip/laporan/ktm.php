<body onload="window.print()">
<?php
$kdpendaftar=addslashes($_GET['kdpendaftar']);
include "../../koneksi.php";     
        $exec=mysql_query("select * from pendaftar where kdpendaftar='".$kdpendaftar."' ");
     $r=mysql_fetch_array($exec)
        
       ;

    ?>
<table width="100%" border="0">
  <tr>
    <th ><img src="logo.jpg" width="100" ></th>
    <th ><b>KARTU TANDA MAHASISWA</b><br>
    UNIVERSITAS DARUL ULUM ISLAMIC CENTRE SUDIRMAN GUPPI <br>
    UNDARIS<br>
    Jl. Tentara Pelajar No 13 Ungaran</th>
 
  </tr>
</table>
<hr>
<table align="left" class="table table-striped" width="20%">
<img src="../foto/<?php echo $r[22]; ?>" width=142px height=172px>
</table>
<table align="right" class="table table-striped" width="80%">
    <tr>
            <th width="25%"><div align="left">NPM</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-0-<?php echo $r[0]; ?>"><?php echo $r[2]; ?></span></td>
          </tr>
          <tr>
            <th width="25%"><div align="left">Nama</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-0-<?php echo $r[0]; ?>"><?php echo $r[3]; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Jenis Kelamin</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-1-<?php echo $r[0]; ?>"><?php echo $r[4]==1?'Laki-laki':'Perempuan'; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Agama</div></th>
            <td width="10%"> : </td>
            <?php 
            $loadagama = mysql_query("SELECT * FROM app_agama WHERE agama_id= $r[5]");
            $tampil    = mysql_fetch_array($loadagama);
            ?>
            <td> <span class="data-2-<?php echo $r[0]; ?>"><?php echo $tampil['keterangan']; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Tempat Lahir</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-3-<?php echo $r[0]; ?>"><?php echo $r[8]; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Tanggal Lahir</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-4-<?php echo $r[0]; ?>"><?php echo $r[9]; ?></span></td>
          </tr><tr>
            <th width="25%"><div align="left">Alamat</div></th>
            <td width="10%"> : </td>
            <td> <span class="data-5-<?php echo $r[0]; ?>"><?php echo $r[11]; ?></span></td>
          </tr>
        

      
</table>

        </body>