 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>Program Studi</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class='row' id='home-content'>
                    <div class='col-lg-12'>
           <script type="text/javascript">
    $(document).ready(function(){
        
    $("body").on("click", "#tambah",function(e){
        $('#area-loading').html(''); 
        $("#konsentrasi_id").removeAttr('readonly')
        $('#konsentrasi_id').val('');
        $('#nama_konsentrasi').val('');
        $('#jenjang').val('');
        $('#semester').val('');
        $(".edit-dialog").modal('toggle');
    })
  $("body").on("click", ".hapus", function(e) {
                var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
                var DbNumberID = ".data-0-"+clickedID[1];
                $(".konsentrasi_id").html($(DbNumberID).html());
                $('.dialog-hapus').modal('toggle');
                $("#konf").attr("href","hapusagama.php?konsentrasi_id="+$(DbNumberID).html());
            });

    $("body").on("click", ".edit", function(e) {
                var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
                var DbNumberID = clickedID[1];
                var kelas1 = ".data-0-"+DbNumberID;
                var kelas2 = ".data-1-"+DbNumberID;
                var kelas3 = ".data-2-"+DbNumberID;
                var kelas4 = ".data-3-"+DbNumberID;
                var konsentrasi_id = $(kelas1).html();
                var nama_konsentrasi = $(kelas2).html();
                var jenjang = $(kelas3).html();
                var semester = $(kelas4).html();
                $("#konsentrasi_id").val(konsentrasi_id);
                $("#nama_konsentrasi").val(nama_konsentrasi);
                $("#jenjang").val(jenjang);
                $("#semester").val(semester);
                $("#konsentrasi_id").attr("readonly","true");
                $('.edit-dialog').modal('toggle');
            });

    })
</script>
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
            Apakah anda ingn menghapus data dengan kode agama =  <span class='konsentrasi_id'></span>?
        </div>
        <div class="modal-footer">
        <a id="konf" href=""><button type="button" class="btn btn-danger" id="simpan">Ya</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>

<button type="button" id="tambah" onClick=""class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Tambah</button><br>
<div class="modal fade bs-example-modal-lg edit-dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Agama</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
        <form method="post" id="form" action="insertagama.php">
        <table class="table table-striped" width="100%">
            <!-- <tr>
                <th width="25%">Kode agama</th>
                <td width="1%"> : </td>
                <td> <input id="konsentrasi_id" name="konsentrasi_id" placeholder="Kode" class="form-control" type="hidden" ></td>
            </tr> --><tr>
                <th width="25%">Nama Prodi</th>
                <td width="1%"> : </td>
                <td> <input id="nama_konsentrasi" name="nama_konsentrasi" placeholder="Nama" class="form-control" type="text" required ></td>
            </tr>
            <tr>
                <th width="25%">Jenjang</th>
                <td width="1%"> : </td>
                <td> <input id="jenjang" name="jenjang" placeholder="Jenjang" class="form-control" type="text" required ></td>
            </tr>
            <tr>
                <th width="25%">Semester</th>
                <td width="1%"> : </td>
                <td> <input id="semester" name="semester" placeholder="Semester" class="form-control" type="text" required ></td>
            </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
      </div>
    </div>
  </div>
</div>

    <?php
        if(isset($_GET['code']))
        {
            if($_GET['code']==1)
                echo "<h3 style='color:green'>Data Prodi berhasil disimpan</h3>";
            elseif($_GET['code']==2)
                echo "<h3 style='color:red'>Terjadi kesalahan</h3>";
            elseif($_GET['code']==3)
                echo "<h3 style='color:blue'>Data Prodi berhasil dihapus</h3>";
        }
    ?>
<table class="table table-striped">
    <tr>
        <th width="5%">
            No.
        </th>
        <th width="20%">
            Kode Prodi
        </th>
        <th>
            Nama Prodi
        </th>
        <th>
            Jenjang
        </th>
        <th>
            Semester
        </th>
        <th>
        </th>
    </tr>
    <?php
        if(!isset($_GET['data']))
        $exec=mysql_query("select * from akademik_konsentrasi ");
        else{
            $data=trim(addslashes($_GET['data']));
            $exec=mysql_query("select * from akademik_konsentrasi where konsentrasi_id like '%".$data."%' or nama_konsentrasi like '%".$data."%'");
        }
            
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
            <span class="data-0-<?php echo $no; ?>"><?php echo $r[0]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[1]; ?></span>
        </td>
        <td>
            <span class="data-2-<?php echo $no; ?>"><?php echo $r[4]; ?></span>
        </td>
        <td>
            <span class="data-3-<?php echo $no; ?>"><?php echo $r[5]; ?></span>
        </td>
    
        <td>
            <a class="edit" id="edit-<?php echo $no; ?>"><button type="button" class="btn btn-primary" style="color-pink"><span class='fa fa-edit'> </span> Edit</button></a> &nbsp;
            <a class="hapus" id="hapus-<?php echo $no; ?>"><button type="button" class="btn btn-danger"><span class='fa fa-shopping-cart'></span> Hapus</button></a>
        </td>
    </tr>
    <?php
        }
    ?>

</table>
                    
                    </div>
                 
                </div>