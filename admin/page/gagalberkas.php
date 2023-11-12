  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">TOLAK BERKAS KIP PMB</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                               <h3>Alasan Tolak</h3>
                               <div class="form-group">
                                   <form method="POST">
                                   <table border="0px">
                                       <tr>
                                           <td>Keterangan</td><td>:</td><td><textarea name="keterangan" id="editor">
                                                &lt;p&gt;Tulis disini.&lt;/p&gt;
                                            </textarea></td>
                                       </tr>
                                       <tr>
                                           <td>
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

if(isset($_POST['keterangan'])){
    $alasan = $_POST['keterangan'];
    $email = $_GET['id'];

    $load = mysql_query("SELECT berkas FROM pendaftar_kip WHERE email='$email'");
    $text = mysql_fetch_array($load);
    $path = '../kip/berkaskip/'.$text[berkas];
    
    chown($path, 666);
    if (unlink($path)) {
    echo 'success';
    $sql = mysql_query("UPDATE pendaftar_kip SET berkas='' AND statusdaftar='0' WHERE email='$email'");
    }
    $insert = mysql_query("INSERT INTO tolakberkas VALUES ('','$email','$alasan')");
    if($insert){
        echo "<script>alert('Berhasil Disimpan !!'); location.href='index.php?p=pendaftar_kip';</script>";
    }else{
        echo "<script>alert('Gagal Disimpan !!'); location.href='index.php?p=pendaftar_kip';</script>";
    }
}
?>