 <?php
 include "../koneksi.php";
 ?>
 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>pendaftar</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class='row' id='home-content'>
                    <div class='col-lg-12'>
          
<style>
.zoom {
  padding: 10px;
  transition: transform .2s; /* Animation */
  width: 300px;
  height: 300px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
<form id="cetak" action="fpdf/examples/print.php" method="post">
    <input type="hidden" name="isi" id="isi" value=""><input type="hidden" name="namafile" value="hakakses">
</form>
<div class="modal fade bs-example-modal-lg dialog-hapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data</h4>
        </div>
        <div class="modal-body">
            Apakah anda ingn menghapus data dengan kode pendaftar =  <span class='kdpendaftar'></span>?
        </div>
        <div class="modal-footer">
        <a id="konf" href=""><button type="button" class="btn btn-danger" id="simpan">Ya</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>

    <?php
        if(isset($_GET['code']))
        {
            if($_GET['code']==1)
                echo "<h3 style='color:green'>Data pendaftar berhasil disimpan</h3>";
            elseif($_GET['code']==2)
                echo "<h3 style='color:red'>Terjadi kesalahan</h3>";
            elseif($_GET['code']==3)
                echo "<h3 style='color:blue'>Data pendaftar berhasil dihapus</h3>";
        }
    ?>
<table class="table table-striped">
    <tr>
        <th width="5%">
            No.
        </th>
        <th width="20%">
            Nama pendaftar
        </th>
        <th>
            Email
        </th>
        <th>
            No BRIVA
        </th>
        <th>
            Jumlah Bayar
        </th>
     <th>
            Keterangan
        </th>
        <th>
            Status
        </th>
        <th>
        </th>
    </tr>
    <?php
        $exec=mysql_query("select proses_transaksi.*, regist.nama, regist.id_regist from proses_transaksi
                            left join regist on regist.email=proses_transaksi.email ORDER BY id_regist ASC");
        $no=0;
        while($r=mysql_fetch_array($exec))
        {
            $no++;

    ?>
    <tr>
        <td width="5%">
            <?php echo $no; ?>
        </td>
        <td width="20%">
            <span class="data-0-<?php echo $no; ?>"><?php echo $r['nama']; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r['email']; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r['brivaNo']; ?><?php echo $r['custCode']; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r['amount']; ?></span>
        </td>
         <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r['keterangan']; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php if($r['status']=='y'){
            echo '<b>Lunas</b>';
            } else {
            echo 'Belum Dikonfirmasi';
            } ?></span>
        </td>
    </tr>
    <?php
        }
    ?>
        </table>
      </div>
    </div>
  </div>
</div>

                    
                    </div>
                 
                </div>