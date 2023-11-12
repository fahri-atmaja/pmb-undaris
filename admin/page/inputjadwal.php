  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Input Jadwal Ujian PMB</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $loadsiswa = mysql_query("SELECT * FROM jadwal_ujian");
      ?>
      <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                               <h3>Input Jadwal Ujian PMB</h3>
                               <div class="form-group">
                                   <form method="POST">
                                   <table border="0px">
                                       <tr>
                                           <td>Tanggal</td><td>:</td><td><input type="date" name="tanggal" value="" require></td>
                                       </tr>
                                       <tr>
                                           <td>Waktu</td><td>:</td><td><input type="time" name="waktu" value="" require></td>
                                       </tr>
                                       <tr>
                                           <td>Status</td><td>:</td><td><select name="status" value="">
                                               <option name="status" value="Offline">Offline</option>
                                               <option name="status" value="Online">Online</option>
                                               <option name="status" value="Menyesuaikan">Menyesuaikan</option>
                                           </select></td>
                                       </tr>
                                       <tr>
                                           <td>Lokasi</td><td>:</td><td><input type="text" name="lokasi" value=""></td>
                                       </tr>
                                       <tr>
                                           <td>Link</td><td>:</td><td><input type="text" name="link" value=""></td>
                                       </tr>
                                       <tr>
                                           <td>Keterangan</td><td>:</td><td><textarea name="keterangan" id="editor">
                                                &lt;p&gt;Tulis disini.&lt;/p&gt;
                                            </textarea></td>
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
    
    $insert = mysql_query("INSERT INTO jadwal_ujian VALUES ('','$tanggal','$waktu','$status','$lokasi','$link','$keterangan','n')");
    if($insert){
        echo "<script>alert('Berhasil Disimpan !!'); location.href='index.php?p=jadwalujian';</script>";
    }else{
        echo "<script>alert('Gagal Disimpan !!'); location.href='index.php?p=inputujian';</script>";
    }
}
?>