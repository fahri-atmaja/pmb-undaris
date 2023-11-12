  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Status Seleksi</h4>
        <div class="area-loading"></div>
      </div>
      <?php 
        $cekpendaftar = mysql_query("SELECT * FROM pendaftar WHERE email='$username'");
        if(mysql_num_rows($cekpendaftar)==0){
            echo "<script>alert('Dimohon mengisi formulir terlebih dahulu !!'); location.href='index.php?p=pendaftaran';</script>";
        }
      
        $loadsiswa = mysql_query("SELECT * FROM m_siswa WHERE nim='$username'");
        $v      = mysql_fetch_array($loadsiswa);
        $iduser = $v['id'];
        $email = $v['nim'];
        $load = mysql_query("SELECT * FROM tr_ikut_ujian WHERE id_user='$iduser'");
        $cek = mysql_num_rows($load);
        $tanggal = date('Y-m-d');
    
      ?>
      <div class="modal-body">
        
        <?php 
        if ($cek > 0){
        $status = mysql_fetch_array($load);
        if ($status['nilai']>=20){
           echo "<h3>ANDA LOLOS UJIAN</h3><br>
           <h4>SILAHKAN UNTUK MELANJUTKAN BIAYA REGISTRASI KLIK TOMBOL DIBAWAH :</h4><br>
           <a href='?p=registrasi'><button class='btn btn-primary'>REGISTRASI</button></a>";
        }else{
            echo "<h3>ANDA BELUM LOLOS</h3><br>
            <h4>Silahkan mengulangi ujian di gelombang berikutnya dengan klik tombol dibawah : </h4>
            <a href='ulangiujian.php?id=$iduser&email=$email'><button>Ulangi Ujian</button></a>";
        }
        }else{
            echo "<h3>Tahap Seleksi</h3><br>
            <h4>Anda diwajibkan mengisi <a href='https://pmb.undaris.ac.id/calonmahasiswa/index.php?p=pendaftaran'><i><b>FORMULIR</b></i></a> terlebih dahulu sebelum mengikuti ujian.<br><br>
            <div class='form-group'><b><u>Ada 2 opsi ujian PMB silahkan untuk memilih salah satu :</u></b><br><br>
            1. Ujian private/sendiri.<br> Bagi yang memilih ujian private ini bisa datang ke undaris setiap hari senin - sabtu jam 10.00 - 14.00 WIB, harap menghubungi dulu tim pemanduan kontak dibawah.<br><br>
            2. Ujian bersama.<br> Bagi yang memilih ujian bersama, ujian akan dilaksanakan secara online maupun offline. Anda bisa memilih daftar jadwal Ujian PMB Bersama dibawah ini.<br></div>";
        
        ?>
        <?php
        $cekikut = mysql_query("SELECT * FROM ikut_ujian WHERE email='$username'");
        $ada = mysql_num_rows($cekikut);
        if(empty($ada)){
        ?>
        <?php
        $loadregist = mysql_query("SELECT * FROM pendaftar WHERE email='$username' and id_sks='2'");
        $cekrow = mysql_num_rows($loadregist);
        if($cekrow > 0){
            ?>
            <label>Anda terdaftar sebagai calon mahasiswa konversi</label>
        <a href="skip.php?id=<?= $iduser ?>&email=<?= $username ?>"><button type="submit" name="submit" class="btn btn-success">LEWATI UJIAN</button></a>
        <?php    
        }
        ?>
        <?php
        $loadregists2 = mysql_query("SELECT * FROM pendaftar WHERE email='$username' and konsentrasi_id='25'");
        $cekrows2 = mysql_num_rows($loadregists2);
        if($cekrows2 > 0){
            ?>
            <label>Anda terdaftar sebagai calon mahasiswa S2</label>
        <a href="skip.php?id=<?= $iduser ?>&email=<?= $username ?>"><button type="submit" name="submit" class="btn btn-success">LEWATI UJIAN</button></a>
        <?php    
        }
        ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                               <h3>Pilih Jadwal Ujian PMB Bersama</h3>
                               <div class="form-group">
                                   <form method="POST">
                                       <select name="id_jadwal" class="form-control" required>
                                               <?php
                                               $tanggal = date('Y-m-d');
                                               $loadujian = mysql_query("SELECT * FROM jadwal_ujian WHERE selesai='n' ORDER BY tanggal ASC");
                                               $cek = mysql_num_rows($loadujian);
                                               if ($cek > 0){
                                               while ($row= mysql_fetch_array($loadujian))        
                                               {
				                                echo '<option name="id_jadwal" value="' . $row['id_jadwal'] . '">Tanggal : ' . tgl_indo($row['tanggal']) . ' - Waktu : ' . $row['waktu'] . ' - Pelaksanaan :' . $row['status'] . '</option>';
                                               }
                                               }else{
                                                   echo '<option>belum ada jadwal</option>';
                                               }
                                               ?>
                                           </select>
                                           <hr>
                                           <?php
                                           if ($cek > 0){
                                               ?>
                                           <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                                           <?php } else { echo "Belum Ada Jadwal"; }; ?>
                                   </form>
                               </div>
                            </div>
                        </div>
                    </div>
        
        <?php
        if(isset($_POST['id_jadwal'])){
            $id_jadwal = $_POST['id_jadwal'];
            $insert = mysql_query("INSERT INTO ikut_ujian (email,id_jadwal) VALUES ('$username','$id_jadwal')");
            if($insert){
                echo "<script>alert('Berhasil Disimpan !!'); location.href='index.php?p=status';</script>";
            }else{
                echo "<script>alert('Gagal Disimpan !!'); location.href='index.php?p=status';</script>";
            }
        }
        ?>
        <?php
        }else{
        ?>
                               <h3>Jadwal Ujian PMB Anda</h3>
                               <?php
                               $jadwalujian = mysql_query("SELECT * FROM jadwal_ujian
                                                            LEFT JOIN ikut_ujian ON ikut_ujian.id_jadwal=jadwal_ujian.id_jadwal
                                                            WHERE ikut_ujian.email='$username'");
                               $array = mysql_fetch_array($jadwalujian);
                               ?>
                                    <table id="dtHorizontalExample" class="table table-striped" cellspacing="0" width="80%">
                                        <tr>
                                           <td>Tanggal</td><td>:</td><td><?= tgl_indo($array['tanggal']); ?></td>
                                        </tr>
                                        <tr>
                                           <td>Waktu</td><td>:</td><td><?= $array['waktu'] ?></td>
                                          </tr>
                                        <tr>
                                           <td>Pelaksanaan</td><td>:</td><td><?= $array['status'] ?></td>
                                           </tr>
                                        <tr>
                                           <td>Lokasi</td><td>:</td><td><?= $array['lokasi'] ?></td>
                                           </tr>
                                        <tr>
                                           <td>Link</td><td>:</td><td><a target="_BLANK" href="<?= $array['link'] ?>"><?= $array['link'] ?></a></td>
                                           </tr>
                                        <tr>
                                           <td>Keterangan</td><td>:</td><td height="150px"><?= $array['keterangan'] ?></td>
                                       </tr>
                                    </table>
        <?php
        }
        }
        
        ?>
        <br>
        <div class="row">
        
        <!--*) Pengumuman seleksi juga dapat dilihat pada beranda website.<br>-->
        <!--*) Pengajuan beasiswa bisa langsung datang ke BAAK Undaris setelah mengikuti ujian online / sudah diterima.-->
        <br>
        <br>
        <!--<h4>JOIN GRUP WHATSAPP UNTUK INFORMASI UJIAN PMB <br> klik -> <a target="_BLANK" href="https://chat.whatsapp.com/IVRuE42M4GUIeZCJvQVXMs">GRUP PMB 1</a><br>-->
        <!--Jika grup penuh silahkan ke grup pmb 2<br> klik -> <a target="_BLANK" href="https://chat.whatsapp.com/BdgV8f4zYgLIjnUOlSPFkD">GRUP PMB 2</a></h4>-->
        <h4>Berikut daftar kontak tim ujian PPMB 2023/2024 :<BR>
            1. <a href="https://wa.me/6281328375307">081328375307 (Pak Fahri)</a><br>
            2. <a href="https://wa.me/6287717793816">087717793816 (Humas)</a><br>
            Join <a target='_BLANK' href='https://chat.whatsapp.com/JD3kPxqYh02CuLTaq5G6E8' class="btn btn-primary"><u>GRUP Whatsapp 2022/2023</u></a>
        </h4>
        </div>
            </div>
        </div>
        </div>
	<script src="./Srikandi - Responsive Admin Templates_files/bootstrap.min.js"></script>

    <!-- javascript for Srikandi admin -->
    <script src="./Srikandi - Responsive Admin Templates_files/themes.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/jquery.scrollTo.min.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/jquery.nicescroll.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/jquery.sparkline.js" type="text/javascript"></script>
    <script class="include" type="text/javascript" src="./Srikandi - Responsive Admin Templates_files/jquery.dcjqaccordion.2.7.min.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/respond.min.js"></script>
	<!-- end:javascript -->

    <!-- start:javascript for this page -->
    <script src="./Srikandi - Responsive Admin Templates_files/jquery.easy-pie-chart.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/owl.carousel.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/jquery.customSelect.min.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/sparkline-chart.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/easy-pie-chart.js"></script>
    <script src="./Srikandi - Responsive Admin Templates_files/count.js"></script>
    <script>
        //owl carousel
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation : true,
                slideSpeed : 300,
                paginationSpeed : 400,
                singleItem : true,
                autoPlay:true
            });
        });

        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

        if ($(".custom-bar-chart")) {
        $(".bar").each(function () {
            var i = $(this).find(".value").html();
            $(this).find(".value").html("");
            $(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }
    </script>
    <!-- end:javascript for this page -->

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpnjzrXoIjx%2bGi07djBNw6V%2bk6IhW6Y%2bveWbfUbblHVaaQvAwuGR%2fd%2b%2fRi0q1uJwiB3quL%2fzKXi%2bTtDP7nRp1u393Bl1J91B8EXGn3%2b1WZWTAbf41MT3f%2f77iGqm05WK1gamkxhXwBJGH0bBk7i49%2bQ76N%2bV9F37FLNEjLlLn92tTqReVhWNTq4SNbmiotDbZmN5kYhNg9OqQlGXyAopKmVCmfsP7%2f9ZWOjMwZu3JImgF9%2fXdfJK49u1P6oe%2fefvRQ7vjfySKR6wY6bidmnWNX1np3O9pXqo7%2fa9uYucQcoweAj9pUmIitwMI34gJ6ISd2f2WIy7pmzQX5VisM89w5qSjPmi1lSUmcXjH7GFBDy89k6S2hQuCrtSc2qa%2bfvrQcwoqd00e8CBNtVSOeA9IvWdu85pb0R7%2bMh9PDxUIStndq4LMdZ7t68LGE5PH3NHH9R1rEf%2fB08BWTW5L3wtIbjOG18nNC4RpUWGitCA9QJk7HeAsMkqnLevBr7j%2b5wW%2fGSVkVKaaT6vVdl8wuKIAF81nH%2bHJfc9Bb%2bwRlRplyZ2LSDP2RwG8mSqEmNcDMAS2Do4w%2b7yQKRIt5KlKKMc5l5oxWc17nc203KSq2V5GfqoefoW%2fPKUIVjTPNVou%2f7uLI2vR26K0WZT6D5uvKLdOH%2bGWRXIrPmfadx33YaQePbsVY%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
</body>