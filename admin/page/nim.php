 <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>pendaftar</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class='row' id='home-content'>
                    <div class='col-lg-12'>
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
    <a target="_BLANK" href="export.php"><button>EXPORT</button></a>
<table class="table table-striped">
    <tr>
        <th width="5%">
            No.
        </th>
        <th>
            NIK
        </th>
        <th>
            Nama pendaftar
        </th>
        <th>
            Jenis kelamin
        </th>
        <th>
            No HP
        </th>
         <th>
            Status
        </th>
        <th>
        </th>
    </tr>
    <?php
        if(!isset($_GET['data']))
        $exec=mysql_query("select pendaftar.*, regist.tahun from pendaftar
                            left join regist on regist.id_regist=pendaftar.id_regist
                            where pendaftar.statusdaftar='Diterima' AND regist.tahun=2021");
        else{
            $data=trim(addslashes($_GET['data']));
            $exec=mysql_query("select * from pendaftar
                            left join regist on regist.id_regist=pendaftar.id_regist
                            where statusdaftar='Diterima' kdpendaftar like '%".$data."%' or nama like '%".$data."%' AND regist.tahun=2021");
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
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[2]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[3]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[4]==1?'Laki-Laki':'Perempuan'; ?></span>
        </td>
         <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[20]; ?></span>
        </td>
        <td>
            <span class="data-1-<?php echo $no; ?>"><?php echo $r[21]; ?></span>
        </td>
    
        <td>
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