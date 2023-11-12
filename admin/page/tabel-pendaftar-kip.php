
 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>pendaftar kip</li>
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
        <th>Jurusan 1</th>
        <th>Jurusan 2</th>
        
        <th>
            Aksi
        </th>
        <th>
            No WA
        </th>
        
        
        <th>
            Email
        </th>
        <th>Kode Login</th>
        
    </tr>
</thead>
<tbody>
     <?php 
          $query = mysql_query("select * from pendaftar_kip");
          $no = 1;
          while ($data = mysql_fetch_assoc($query)) 
          {
          ?>
     <tr>
         <td><?= $no++ ?></td>
         <td>
            <?php echo $data['nama']; ?>
        </td>
         <td>
           <?php
            $akad = mysql_query("SELECT nama_konsentrasi FROM akademik_konsentrasi WHERE konsentrasi_id='$data[konsentrasi_id]'");
            $kon = mysql_fetch_array($akad);
            echo $kon['nama_konsentrasi'];
            ?>
        </td>
        <td>
            <?php
            $regist = mysql_query("SELECT prodi4 FROM regist_kip WHERE email='$data[email]'");
            $cek = mysql_fetch_array($regist);
            $akad1 = mysql_query("SELECT nama_konsentrasi FROM akademik_konsentrasi WHERE konsentrasi_id='$cek[prodi4]'");
            $kon1 = mysql_fetch_array($akad1);
            echo $kon1['nama_konsentrasi'];
            ?>
        </td>
         
         
        <td><?php
            if($data['berkas']){
            ?>
            <a target="_BLANK" href="https://drive.google.com/viewerng/viewer?embedded=true&url=https://pmb.undaris.ac.id/kip/berkaskip/<?= $data['berkas'] ?>"><button type="button" class="btn btn-danger" >View BERKAS</button></a>
            <?php
            if($data['statusdaftar']==0){
            ?>
            <a href="lolosberkas.php?id=<?= $data['email']; ?>"><button type="button" class="btn btn-success" >LOLOS BERKAS</button></a>
            <a href="?p=gagalberkas&id=<?= $data['email']; ?>"><button type="button" class="btn btn-warning" >GAGAL BERKAS</button></a>
            <?php
                }elseif($data['statusdaftar']=='y'){
                    ?>
                    <a href="diterima.php?id=<?= $data['email']; ?>"><button type="button" class="btn btn-success" >DITERIMA</button></a>
                <?php
                }
            }else{
                echo "Belum upload";
            }
            ?></td>
        <td>
            <?php
             $cekno = substr($data['nohp'],0,1);
             $fixno = substr($data['nohp'],1,15);
            //  echo $cekno.'<br>';
            //  echo $fixno;
             if($cekno!=0){
             ?>
            <a target="_BLANK" href="https://wa.me/62<?= $data['nohp']; ?>">0<?php echo $data['nohp']; ?></a>
            <?php
             }else{
            ?>   
            <a target="_BLANK" href="https://wa.me/62<?= $fixno; ?>">0<?php echo $fixno; ?></a>
            <?php     
             }
            ?>
        </td>
        
        
        <td><?= $data['email']; ?></td>
         
         <td>
            <?php 
            $loadsql = mysql_query("SELECT kodelogin FROM regist_kip
                                    WHERE email='$data[email]'");
            $viewsql = mysql_fetch_array($loadsql);
            echo $viewsql['kodelogin'];
            ?>
        </td>
        
     </tr>
     <?php               
          } 
          ?>
</body>
 
</table>