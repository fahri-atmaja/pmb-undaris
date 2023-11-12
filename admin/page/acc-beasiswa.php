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
        <th>Jenis Beasiswa</th>
        <th>
            No WA
        </th>
        <th>Jurusan</th>
        <th>
            Aksi
        </th>
    </tr>
    <?php
        $halaman = 10;
        $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        
        if(!isset($_POST['data'])){
        $exec=mysql_query("select regist.*, daftar_beasiswa.berkas, daftar_beasiswa.status, daftar_beasiswa.jenis from regist left join daftar_beasiswa on daftar_beasiswa.email=regist.email WHERE daftar_beasiswa.berkas IS NOT NULL LIMIT $mulai, $halaman");
        $sql = mysql_query("select regist.*, daftar_beasiswa.berkas, daftar_beasiswa.status, daftar_beasiswa.jenis from regist left join daftar_beasiswa on daftar_beasiswa.email=regist.email WHERE daftar_beasiswa.berkas IS NOT NULL");
        $total = mysql_num_rows($sql);
        $pages = ceil($total/$halaman); 
        }else{
            $data=trim(addslashes($_POST['data']));
            $exec=mysql_query("select regist.*, daftar_beasiswa.berkas, daftar_beasiswa.status, daftar_beasiswa.jenis from regist left join daftar_beasiswa on daftar_beasiswa.email=regist.email WHERE daftar_beasiswa.berkas IS NOT NULL and email like '%".$data."%' or nama like '%".$data."%'");
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
            <span class="data-3-<?php echo $no; ?>"><?php echo $r['jenis']; ?></span>
        </td>
         <td>
             <?php
             $cekno = substr($r['nomor'],0,1);
             $fixno = substr($r['nomor'],1,15);
            //  echo $cekno.'<br>';
            //  echo $fixno;
             if($cekno!=0){
             ?>
            <span class="data-11-<?php echo $no; ?>"><a target="_BLANK" href="https://wa.me/62<?= $r['nomor']; ?>">0<?php echo $r['nomor']; ?></a></span>
            <?php
             }else{
            ?>   
            <span class="data-11-<?php echo $no; ?>"><a target="_BLANK" href="https://wa.me/62<?= $fixno; ?>">0<?php echo $fixno; ?></a></span>
            <?php     
             }
            ?>
        </td>
        <td>
            <?php
            $akad = mysql_query("SELECT nama_konsentrasi FROM akademik_konsentrasi WHERE konsentrasi_id='$r[prodi2]'");
            $kon = mysql_fetch_array($akad);
            echo $kon['nama_konsentrasi'];
            ?>
        </td>
        <td>
            <?php
            if($r['berkas']){
            ?>
            <a target="_BLANK" href="https://drive.google.com/viewerng/viewer?embedded=true&url=https://pmb.undaris.ac.id/calonmahasiswa/berkasbeasiswa/<?= $r['berkas'] ?>"><button type="button" class="btn btn-danger" >View BERKAS</button></a>
            <?php
            if($r['status']=='x'){
            ?>
            <a href="lolos-beasiswa.php?id=<?= $r['email']; ?>"><button type="button" class="btn btn-success" >LOLOS BERKAS</button></a>
            <a href="?p=gagalberkasbeasiswa&id=<?= $r['email']; ?>"><button type="button" class="btn btn-warning" >GAGAL BERKAS</button></a>
            <?php
                }elseif($r['status']=='y'){
                    ?>
                    DITERIMA
                <?php
                }elseif($r['status']=='n'){
                    ?>
                    DITOLAK
                <?php
                }
            }else{
                echo "Belum upload";
            }
            ?>
        </td>
    </tr>

    <?php
        }
    ?>
    <?php
    echo "Halaman : "; 
    for ($i=1; $i<=$pages ; $i++){ ?>
 <a href="?p=acc-beasiswa&halaman=<?php echo $i; ?>"><?php echo "<b>".$i."-</b>"; ?></a>
 
 <?php } 
 
?>
</table>
                    
                    </div>
                 
                </div>