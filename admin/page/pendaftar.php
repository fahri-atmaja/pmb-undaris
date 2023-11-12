 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>pendaftar</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class='row' id='home-content'>
                    <form method="POST">
                        <input type="text" value="" name="data">
                        <button type="submit">Cari</button>
                    </form>
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
            Email pendaftar
        </th>
        <th>
            Nama pendaftar
        </th>
        <th>
            No WA
        </th>
        <th>
            Kode Login
        </th>
        <th>
            Jurusan
        </th>
        <th>
            Angkatan
        </th>
        <th style="width: 10%" class="text-center">Step</th>
        <th>Pembayaran</th>
    </tr>
    <?php
    echo "Halaman :<b> ".$_GET['halaman']."</b><br>";
        $halaman = 10;
        $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        if(!isset($_POST['data'])){
        $exec=mysql_query("select * from regist ORDER BY prodi2 ASC, angkatan_id ASC LIMIT $mulai, $halaman");
        $sql = mysql_query("select * from regist");
        $total = mysql_num_rows($sql);
        $pages = ceil($total/$halaman); 
        }else{
            $data=trim(addslashes($_POST['data']));
            $exec=mysql_query("select * from regist where email like '%".$data."%' or nama like '%".$data."%' ORDER BY prodi2 ASC, angkatan_id ASC");
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
            <span class="data-2-<?php echo $no; ?>"><?php echo $r['email']; ?></span>
        </td>
        <td>
            <span class="data-3-<?php echo $no; ?>"><?php echo $r['nama']; ?></span>
        </td>
         <td>
            <span class="data-11-<?php echo $no; ?>"><a target="_BLANK" href="https://wa.me/62<?= $r['nomor']; ?>">0<?php echo $r['nomor']; ?></a></span>
        </td>
    
        <td>
           <span class="data-11-<?php echo $no; ?>"><?php echo $r['kodelogin']; ?></span>
        </td>
        <td>
            <?php
            $loadfakultas = mysql_query("SELECT * FROM akademik_konsentrasi WHERE konsentrasi_id='$r[prodi2]'");
            $tampil = mysql_fetch_array($loadfakultas);
            ?>
            <span class="data-11-<?php echo $no; ?>"><?php echo $tampil['nama_konsentrasi']; ?></span>
        </td>
        <td>
            <?php
            $loadangkatan = mysql_query("SELECT * FROM student_angkatan WHERE angkatan_id='$r[angkatan_id]'");
            $t = mysql_fetch_array($loadangkatan);
            ?>
            <span class="data-11-<?php echo $no; ?>"><?php echo $t['keterangan']; ?></span>
        </td>
        <td class="project-state">
           <?php
           $load = mysql_query("SELECT * FROM proses_transaksi WHERE email='$r[email]' and status='y'");
           $progres = mysql_num_rows($load);
           ?>
           <?php
           if(empty($progres)):
           ?>
           <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
            <?php
            elseif($progres==1):
            ?>
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <?php
            elseif($progres==2):
            ?>
            <div class="progress">
              <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
            <?php
            elseif($progres==3):
            ?>
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
            </div>
            <?php
            elseif($progres==4):
            ?>
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
            </div>
            <?php
            endif;
            ?>
        </td>
        <td>
            <button type="button" 
                                class="btn btn-danger" 
                                data-toggle="modal" 
                                data-target="#exampleModal<?= $r['id_regist']; ?>">
                                View BRIVA
            </button>
        </td>
        <div class="modal fade" 
             id="exampleModal<?= $r['id_regist']; ?>"
             tabindex="-1" 
             role="dialog"
             aria-labelledby="exampleModalLabel" 
             aria-hidden="true">
            <div class="modal-dialog" 
                 role="document">
                <div class="modal-content">
                    <!-- Modal heading -->
                    <div class="modal-header">
                        <h5 class="modal-title" 
                            id="exampleModalLabel">
                          Status BRIVA
                      </h5>
                        <button type="button" 
                                class="close"
                                data-dismiss="modal" 
                                aria-label="Close">
                            <span aria-hidden="true">
                              ×
                          </span>
                        </button>
                    </div>
  
                    <!-- Modal body with image -->
                    <div class="modal-body">
                    <?php
                    $noo =1;
                  if (mysql_num_rows($load) > 0):
                  while($row = mysql_fetch_array($load)):
                  ?>
                  <div class="card">
                      <div class="card-body">
                        <?= $noo++ ?>. <?= $row['keterangan']; ?> || No Briva : <?= $row['brivaNo']; ?><?= $row['custCode']; ?>  || Status:  
                        <?php
                          if($row['status']=='n'):
                          ?>
                          <span class="badge badge-warning">Menunggu Pembayaran..</span>
                          <?php
                          else:
                          ?>
                          <span class="badge badge-success">Lunas</span>
                          <?php
                          endif;
                          ?>
                      </div>
                 </div>
                  <?php
                                			endwhile;
                                		else:
                                	?>
                                	    DATA TIDAK DITEMUKAN
                                	<?php
                                		endif;
                                	?>
                    </div>
                </div>
            </div>
        </div>
    </tr>
    <?php
        }
    ?>
<?php
    echo "Halaman : "; 
    for ($i=1; $i<=$pages ; $i++){ ?>
 <a href="?p=pendaftar&halaman=<?php echo $i; ?>"><?php echo "<b>".$i." - </b>"; ?></a>
 
 <?php } 
 
?>
</table>
                    
                    </div>
                 
                </div>