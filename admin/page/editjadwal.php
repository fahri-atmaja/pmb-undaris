  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Edit Jadwal Ujian PMB</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $id = $_GET['id'];
        $loadjadwal = mysql_query("SELECT * FROM jadwal_ujian WHERE id_jadwal='$id'");
        $fill = mysql_fetch_array($loadjadwal);
      ?>
      <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                               <h3>Edit Jadwal Ujian PMB</h3>
                               <div class="form-group">
                                   <form method="POST">
                                   <table border="0px">
                                       <tr>
                                           <td>Tanggal</td><td>:</td><td><input type="date" name="tanggal" value="<?= $fill['tanggal'] ?>" require></td>
                                       </tr>
                                       <tr>
                                           <td>Waktu</td><td>:</td><td><input type="time" name="waktu" value="<?= $fill['waktu'] ?>" require></td>
                                       </tr>
                                       <tr>
                                           <td>Status</td><td>:</td><td><select name="status" value="<?= $fill['status'] ?>">
                                               <option name="status" value="<?= $fill['status'] ?>"><?= $fill['status'] ?></option>
                                               <option name="status" value="Offline">Offline</option>
                                               <option name="status" value="Online">Online</option>
                                           </select></td>
                                       </tr>
                                       <tr>
                                           <td>Lokasi</td><td>:</td><td><input type="text" name="lokasi" value="<?= $fill['lokasi'] ?>"></td>
                                       </tr>
                                       <tr>
                                           <td>Link</td><td>:</td><td><input type="text" name="link" value="<?= $fill['link'] ?>"></td>
                                       </tr>
                                       <tr>
                                           <td>Keterangan</td><td>:</td><td><textarea name="keterangan" id="editor">
                                                <?= $fill['keterangan'] ?>
                                            </textarea></td>
                                       </tr>
                                       <tr>
                                           <td>Pelaksanaan</td><td>:</td><td><select name="pelaksanaan" value="<?= $fill['selesai'] ?>">
                                               <option name="pelaksanaan" value="<?= $fill['selesai'] ?>"></option>
                                               <option name="pelaksanaan" value="n">Belum</option>
                                               <option name="pelaksanaan" value="y">Sudah</option>
                                           </select></td>
                                       </tr>
                                       <tr><td>
                                           <button class="btn btn-primary" type="submit" name="submit">SIMPAN</button>
                                       </td></tr>
                                   </table>
                                   </form>
                               </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</body>
<?php
if(isset($_POST['tanggal'])){
    $tanggal    = $_POST['tanggal'];
    $waktu      = $_POST['waktu'];
    $status     = $_POST['status'];
    $lokasi     = $_POST['lokasi'];
    $link       = $_POST['link'];
    $keterangan = $_POST['keterangan'];
    $pelaksanaan= $_POST['pelaksanaan'];
    
    $insert = mysql_query("UPDATE jadwal_ujian SET tanggal='$tanggal',waktu='$waktu',status='$status',lokasi='$lokasi',link='$link',keterangan='$keterangan',selesai='$pelaksanaan' WHERE id_jadwal='$id'");
    if($insert){
        echo "<script>alert('Berhasil Disimpan !!'); location.href='index.php?p=jadwalujian';</script>";
    }else{
        echo "<script>alert('Gagal Disimpan !!'); location.href='index.php?p=jadwalujian';</script>";
    }
}
?>