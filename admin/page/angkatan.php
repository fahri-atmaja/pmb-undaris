 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>pendaftar</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class='row' id='home-content'>
                    <div class='col-lg-12'>
           <script type="text/javascript">
    $(document).ready(function(){
        
    $("body").on("click", "#tambah",function(e){
        $('#area-loading').html(''); 
        $("#kdpendaftar").removeAttr('readonly')
        $('#kdpendaftar').val('');
        $('#nama').val('');
        $('#jenkel').val('');
        $('#kdagama').val('');
        $('#tpt_lahir').val('');
        $('#tgl_lahir').val('');
        $('#alamat').val('');
        $('#statusanak').val('');
        $('#nmayah').val('');
        $('#kdpendidikana').val('');
        $('#kdpekerjaana').val('');
        $('#penghasilanayah').val('');
        $('#nmibu').val('');
        $('#kdpendidikani').val('');
        $('#kdpekerjaani').val('');
        $('#nohp').val('');
        $('#kdtk').val('');
        $('#statusdaftar').val('');

        $(".edit-dialog").modal('toggle');
    })
  $("body").on("click", ".hapus", function(e) {
                var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
                var DbNumberID = ".data-0-"+clickedID[1];
                $(".kdpendaftar").html($(DbNumberID).html());
                $('.dialog-hapus').modal('toggle');
                $("#konf").attr("href","hapusdaftar.php?kdpendaftar="+$(DbNumberID).html());
            });

    $("body").on("click", ".edit", function(e) {
                var clickedID = this.id.split('-'); //Split string (Split works as PHP explode)
                var DbNumberID = clickedID[1];
                var kelas1 = ".data-0-"+DbNumberID;
                var kelas2 = ".data-1-"+DbNumberID;
                var kelas3 = ".data-2-"+DbNumberID;
                var kelas4 = ".data-3-"+DbNumberID;
                var kelas5 = ".data-4-"+DbNumberID;
                var kelas6 = ".data-5-"+DbNumberID;
                var kelas7 = ".data-6-"+DbNumberID;
                var kelas8 = ".data-7-"+DbNumberID;
                var kelas9 = ".data-8-"+DbNumberID;
                var kelas10 = ".data-9-"+DbNumberID;
                var kelas11 = ".data-10-"+DbNumberID;
                var kelas12 = ".data-11-"+DbNumberID;
                var kelas13 = ".data-12-"+DbNumberID;
                var kelas14 = ".data-13-"+DbNumberID;
                var kelas15 = ".data-14-"+DbNumberID;
                var kelas16 = ".data-15-"+DbNumberID;
                var kelas17 = ".data-16-"+DbNumberID;
                var kelas18 = ".data-17-"+DbNumberID;

                var kdpendaftar = $(kelas1).html();
                var nama = $(kelas2).html();
                var jenkel = $(kelas3).html();
                var kdagama = $(kelas4).html();
                var tpt_lahir = $(kelas5).html();
                var tgl_lahir = $(kelas6).html();
                var alamat = $(kelas7).html();
                var statusanak = $(kelas8).html();
                var nmayah = $(kelas9).html();
                var kdpendidikana = $(kelas10).html();
                var kdpekerjaana = $(kelas11).html();
                var penghasilanayah = $(kelas12).html();
                var nmibu = $(kelas13).html();
                var kdpendidikani = $(kelas14).html();
                var kdpekerjaani = $(kelas15).html();
                var nohp = $(kelas16).html();
                var kdtk = $(kelas17).html();
                var statusdaftar = $(kelas18).html();
                $("#kdpendaftar").val(kdpendaftar);
                $("#nama").val(nama);
                $("#kdpendaftar").attr("readonly","true");
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
            Apakah anda ingn menghapus data dengan kode pendaftar =  <span class='kdpendaftar'></span>?
        </div>
        <div class="modal-footer">
        <a id="konf" href=""><button type="button" class="btn btn-danger" id="simpan">Ya</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!--<div class="container-fluid">-->
<!--    <div class="row">-->
<!--        <form method="GET">-->
<!--        <select name="data">-->
<!--            <option value="2019">2019</option>-->
<!--            <option value="2020">2020</option>-->
<!--            <option value="2021">2021</option>-->
<!--            <option value="2022">2022</option>-->
<!--        </select>-->
<!--        <button name="submit">Submit</button>-->
<!--        </form>-->
<!--    </div>-->
    
<!--</div>-->
<div class="modal fade bs-example-modal-lg edit-dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data pendaftar</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
        <form method="post" id="form" action="insertpendaftar.php">
        <table class="table table-striped" width="100%">
            <tr>
                <th width="25%">kode pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="kdpendaftar" name="kdpendaftar" placeholder="Kode" class="form-control" type="text" required></td>
            </tr><tr>
                <th width="25%">Nama pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="nama" name="nama" placeholder="Nama" class="form-control" type="text" required ></td>
            </tr>
            <tr>
                <th width="25%">Jenis Kelamin</th>
                <td width="1%"> : </td>
                <td> <select id="jenkel" name="jenkel"  class="form-control" required >
                <option value="Laki-laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
                </td>
            </tr>
            <tr>
            <th width="25%">No. Pelanggan Terdekat</th>
            <td width="1%"> : </td>
            <td><select id="no_pelanggan_terdekat" name="no_pelanggan_terdekat"   class="form-control">
              <option>--Pilih Pelanggan--</option>
              <?php
                $exec=mysql_query("select * from pelanggan");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'>$hasil[0] | $hasil[2]</option>";
              ?>
            </select></td>
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
                echo "<h3 style='color:green'>Data pendaftar berhasil disimpan</h3>";
            elseif($_GET['code']==2)
                echo "<h3 style='color:red'>Terjadi kesalahan</h3>";
            elseif($_GET['code']==3)
                echo "<h3 style='color:blue'>Data pendaftar berhasil dihapus</h3>";
        }
    ?>

<h3>Calon Mahasiswa S1</h3>
<table class="table table-striped">
    <tr>
        <th width="5%">
            No.
        </th>
        <th>
            Kode Pendaftar
        </th>
        <th>
            Email Pendaftar
        </th>
        <th>
            Nama pendaftar
        </th>
        <th>
            Prodi
        </th>
        <th>
            Tahun Akademik
        </th>
        <th>
            Nomor HP
        </th>
        <th>
            Tahun Daftar
        </th>
        <th>
            Status Daftar
        </th>
        <th>
        </th>
    </tr>
    <?php
            if(!isset($_GET['data']))
            $exec=mysql_query("select regist.*, student_angkatan.keterangan, akademik_konsentrasi.nama_konsentrasi from regist
                                inner join student_angkatan on student_angkatan.angkatan_id=regist.angkatan_id
                                left join akademik_konsentrasi on akademik_konsentrasi.konsentrasi_id=regist.prodi2
                                where regist.tahun=2021 AND regist.prodi1!=22
                                order by angkatan_id ASC");
            else{
            $data=trim(addslashes($_GET['data']));
            // $exec=mysql_query("select * from regist where tahun like '%".$data."%'");
            $exec=mysql_query("select * from regist where tahun like '%".$data."%'");
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
       <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[kodelogin]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[email]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[1]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[nama_konsentrasi]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[keterangan]; ?></span>
        </td>
         <td>
            <span class="data-1-<?php echo $no; ?>"><a target="_blank" href="https://wa.me/62<?= $r[4] ?>">+62<?php echo $r[4]; ?></a></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[12]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php 
            $load = mysql_query("select statusdaftar as status from pendaftar where id_regist= $r[id_regist]");
            $cek = mysql_num_rows($load);
            $dis = mysql_fetch_array($load);
            if ($cek > 0){
                echo "<i>"; echo $dis[status]; echo "</i>";
            }
            elseif(empty($cek)){
                echo "<b>Registrasi</b>";
            }
            ?></span>
        </td>
        <td>
           
            <!--<a target="_BLANK" href="laporan/cetakformulir.php?kdpendaftar=<?php echo $r[0];  ?>"><button type="button" class="btn btn-primary"><span class='fa fa-print'></span> Cetak Formulir Pendaftar</button></a>-->
            <!--</a>&nbsp;<button class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $r[0]; ?>">Detail</button>-->

 <div class="modal fade bs-example-modal-lg<?php echo $r[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Pendaftar</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped" width="100%">
        <tr>
            <th width="25%">Nama</th>
            <td width="1%"> : </td>
            <td> <span class="data-0-<?php echo $r[0]; ?>"><?php echo $r[3]; ?></span></td>
          </tr><tr>
            <th width="25%">Jenis Kelamin</th>
            <td width="1%"> : </td>
            <td> <span class="data-1-<?php echo $r[0]; ?>"><?php echo $r[4]==1?'Laki-Laki':'Perempuan'; ?></span></td>
          </tr><tr>
            <th width="25%">Agama</th>
            <td width="1%"> : </td>
            <?php 
            $loadagama = mysql_query("SELECT keterangan FROM app_agama WHERE agama_id='$r[5]'");
            $agama = mysql_fetch_array($loadagama);
            ?>
            <td> <span class="data-2-<?php echo $r[0]; ?>"><?php echo $agama['keterangan']; ?></span></td>
          </tr><tr>
            <th width="25%">Tempat Lahir</th>
            <td width="1%"> : </td>
            <td> <span class="data-3-<?php echo $r[0]; ?>"><?php echo $r[8]; ?></span></td>
          </tr><tr>
            <th width="25%">Tanggal Lahir</th>
            <td width="1%"> : </td>
            <td> <span class="data-4-<?php echo $r[0]; ?>"><?php echo $r[9]; ?></span></td>
          </tr>  <tr>
            <th width="25%">Asal Sekolah</th>
            <td width="1%"> : </td>
            <td><?php echo $r[12]; ?></td>
          </tr><tr>
            <th width="25%">Alamat</th>
            <td width="1%"> : </td>
            <td> <span class="data-5-<?php echo $r[0]; ?>"><?php echo $r[11]; ?></span></td>
          </tr><tr>
            <th width="25%">Nama Ayah</th>
            <td width="1%"> : </td>
            <td> <span class="data-7-<?php echo $r[0]; ?>"><?php echo $r[13]; ?></span></td>
          </tr>
          <tr>
            <th width="25%">Nama Ibu</th>
            <td width="1%"> : </td>
            <td> <?php echo $r[17]; ?></td>
          </tr>
          <tr>
            <th width="25%">No Hp</th>
            <td width="1%"> : </td>
            <td> <?php echo $r[20]; ?></td>
          </tr>
        
      
      
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

        </td>
    </tr>
    <?php
        }
    ?>

</table>
                    
                    </div>
                 
                </div>