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
<h2>PESERTA KIP 1</h2>
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
        <th>Jurusan 1</th>
        <th>Jurusan 2</th>
        <th>
            Nilai Ujian
        </th>
    </tr>
    <?php
        // $halaman = 10;
        // $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
        // $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        
        // if(!isset($_POST['data'])){
        // $exec=mysql_query("select * from pendaftar_kip 
        //                     left join regist_kip on regist_kip.id_regist=pendaftar_kip.id_regist
        //                     where regist_kip.periode='KIP 2' LIMIT $mulai, $halaman ");
        // $sql = mysql_query("select * from pendaftar_kip
        //                     left join regist_kip on regist.id_regist=pendaftar_kip.id_regist
        //                     where regist_kip.periode='KIP 2'");
        // $total = mysql_num_rows($sql);
        // $pages = ceil($total/$halaman); 
        // }else{
        //     $data=trim(addslashes($_POST['data']));
        //     $exec=mysql_query("select * from pendaftar_kip 
        //                         left join regist_kip on regist_kip.id_regist=pendaftar_kip.id_regist
        //                         where regist_kip.periode='KIP 2' and pendaftar_kip.email like '%".$data."%' or pendaftar_kip.nama like '%".$data."%'");
        // }
            
        // $no=0;
        // while($r=mysql_fetch_array($exec))
        
        // {
        //     $no++;
        $no=0;
        $exec = mysql_query("SELECT pendaftar_kip.nama as nama_peserta,pendaftar_kip.email,pendaftar_kip.konsentrasi_id,pendaftar_kip.nohp,tr_ikut_ujian.nilai,regist_kip.periode FROM pendaftar_kip 
                                LEFT JOIN regist_kip ON regist_kip.id_regist=pendaftar_kip.id_regist
                                LEFT JOIN m_siswa ON m_siswa.nim=pendaftar_kip.email
                                LEFT JOIN tr_ikut_ujian ON tr_ikut_ujian.id_user=m_siswa.id
                                WHERE regist_kip.periode LIKE 'KIP 1'");
                                while($r=mysql_fetch_array($exec)){
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
            <span class="data-3-<?php echo $no; ?>"><?php echo $r['nama_peserta']; ?></span>
        </td>
         <td>
             <?php
             $cekno = substr($r['nohp'],0,1);
             $fixno = substr($r['nohp'],1,15);
            //  echo $cekno.'<br>';
            //  echo $fixno;
             if($cekno!=0){
             ?>
            <span class="data-11-<?php echo $no; ?>"><a target="_BLANK" href="https://wa.me/62<?= $r['nohp']; ?>">0<?php echo $r['nohp']; ?></a></span>
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
            $akad = mysql_query("SELECT nama_konsentrasi FROM akademik_konsentrasi WHERE konsentrasi_id='$r[konsentrasi_id]'");
            $kon = mysql_fetch_array($akad);
            echo $kon['nama_konsentrasi'];
            ?>
        </td>
        <td>
            <?php
            $regist = mysql_query("SELECT prodi4 FROM regist_kip WHERE email='$r[email]'");
            $cek = mysql_fetch_array($regist);
            $akad1 = mysql_query("SELECT nama_konsentrasi FROM akademik_konsentrasi WHERE konsentrasi_id='$cek[prodi4]'");
            $kon1 = mysql_fetch_array($akad1);
            echo $kon1['nama_konsentrasi'];
            ?>
        </td>
        <td>
            <?php
            echo $r['nilai'];
            ?>
        </td>
    </tr>

    <?php
        }
    ?>
    <?php
    echo "Halaman : "; 
    for ($i=1; $i<=$pages ; $i++){ ?>
 <a href="?p=pendaftar_kip&halaman=<?php echo $i; ?>"><?php echo "<b>".$i."-</b>"; ?></a>
 
 <?php } 
 
?>
</table>
                    
                    </div>
                 
                </div>