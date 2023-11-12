
 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>pendaftar</li>
                </ol>
                <!-- end:breadcrumb -->  
<table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
<thead>
<tr>
        <th>
            No.
        </th>
        
        <th>
            Nama pendaftar
        </th>
        
        <th>
            Jurusan
        </th>
        <th>
            Angkatan
        </th>
        <th>
            Kelas
        </th>
        <th>
            Step
        </th>
        <th>
            Aksi
        </th>
        <th>
            Email
        </th>
        <th>
            No WA
        </th>
        <th>
            Kode Login
        </th>
        
        
</tr>
</thead>
<tbody>
     <?php 
          $query = mysql_query("SELECT * FROM regist");
          $no = 1;
          while ($data = mysql_fetch_assoc($query)) 
          {
          ?>
     <tr>
         <td><?= $no++ ?></td>
         
         <td><?= $data['nama']; ?></td>
         
         <td>
            <?php
            $loadfakultas = mysql_query("SELECT * FROM akademik_konsentrasi WHERE konsentrasi_id='$data[prodi2]'");
            $tampil = mysql_fetch_array($loadfakultas);
            ?>
            <?php echo $tampil['nama_konsentrasi']; ?>
        </td>
         <td><?php
            $loadangkatan = mysql_query("SELECT * FROM student_angkatan WHERE angkatan_id='$data[angkatan_id]'");
            $t = mysql_fetch_array($loadangkatan);?>
            <?php echo $t['keterangan']; ?>
        </td>
        <td>
            <?php
            $loadkelas = mysql_query("SELECT * FROM akademik_kelas WHERE id_kelas='$data[id_kelas]'");
            $k = mysql_fetch_array($loadkelas);?>
            <?php echo $k['nama_kelas'] . "-" .$k['keterangan'] ; ?>
        </td>
        <td class="project-state">
           <?php
           $load1 = mysql_query("SELECT * FROM proses_transaksi WHERE email='$data[email]' and status='y'");
           $progres = mysql_num_rows($load1);
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
                                data-target="#exampleModal<?= $data['id_regist']; ?>">
                                View BRIVA
            </button>
        </td>
        <div class="modal fade" 
             id="exampleModal<?= $data['id_regist']; ?>"
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
                  if (mysql_num_rows($load1) > 0):
                  while($row = mysql_fetch_array($load1)):
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
        <td><?= $data['email']; ?></td>
        <td><a target="_BLANK" href="https://wa.me/62<?= $data['nomor']; ?>">0<?php echo $data['nomor']; ?></a></td>
         <td><?= $data['kodelogin']; ?></td>
        
     </tr>
     <?php               
          } 
          ?>
</body>
 
</table>