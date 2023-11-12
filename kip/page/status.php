  <body>
  <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Status Seleksi</h4>
        <div class="area-loading"></div>
      </div>
      <?php 
        $loadsiswa = mysql_query("SELECT * FROM m_siswa WHERE nim='$username'");
        $v      = mysql_fetch_array($loadsiswa);
        $iduser = $v['id'];
        $email = $v['nim'];
        $load = mysql_query("SELECT * FROM tr_ikut_ujian WHERE id_user='$iduser'");
        $cek = mysql_num_rows($load);
        $tanggal = date('Y-m-d');
        $loadregist = mysql_query("SELECT * FROM pendaftar_kip WHERE email='$username'");
      ?>
      <div class="modal-body">
        
        <?php 
        if ($cek > 0){
        $status = mysql_fetch_array($load);
        if ($status['nilai']>=20){
            // <a href='cek_status.php?email=".$username."'><button class='btn btn-primary'>Get NIM</button></a>
            $reg = mysql_query("SELECT * FROM regist_kip WHERE email='$username'");
            $v = mysql_fetch_array($reg);
            // if ($v['periode']=='KIP 2'){
          echo "<h3>ANDA LOLOS UJIAN</h3><br>
          
          ";
          $view = mysql_fetch_array($loadregist);
          if($view['statusdaftar']!='Y'){
        //   echo "<h4>SILAHKAN JOIN GRUP LOLOS KIP TAHAP 4 DI LINK BERIKUT:<br>
        //   <hr>
        //   Tekan -> <a href='https://chat.whatsapp.com/IgkKkdaGbEWDylywbUnd2O' target='_BLANK'>Link Whatsapp</a>
        //   </h4><br>";
          echo "<a href='cek_status.php?email=".$username."'><button class='btn btn-primary'>Get NIM</button></a>
          ";
            // echo "<h3>Tunggu pengumuman di grup</h3>";
          }
            // }else{
            //     echo "<h3>Tunggu pengumuman di grup</h3>";
            // }
        }else{
            echo "<h3>Tunggu pengumuman di grup</h3>";
            // <br>
            // <h4>Silahkan mengulangi ujian di gelombang berikutnya dengan klik tombol dibawah : </h4>
            // <a href='ulangiujian.php?id=$iduser&email=$email'><button>Ulangi Ujian</button></a>";
        }
        }else{
            $loadtolak = mysql_query("SELECT * FROM tolakberkas WHERE email='$username'");
            $cektolak = mysql_num_rows($loadtolak);
            if ($cektolak > 0){
                $filltolak = mysql_fetch_array($loadtolak);
                echo "<h3>BERKAS ANDA DITOLAK, SILAHKAN UPLOAD ULANG</h3><br>Alasan : ".$filltolak['alasan']."<br>";
            }
            echo "<h3>Tahap Seleksi</h3><br>";
            
            $row = mysql_num_rows($loadregist);
            if($row > 0){
                $fill = mysql_fetch_array($loadregist);
                if(empty($fill['berkas']) && $fill['statusdaftar']==0){
                    echo '<a target="_BLANK" href="http://pmb.undaris.ac.id/kip/index.php?p=upload"><button type="button" class="btn btn-danger"><span class="fa fa-print"></span> Upload Berkas</button></a><br>
                    <h5>SCAN SEMUA BERKAS DAN JADIKAN 1 FILE PDF DENGAN UKURAN FILE KURANG DARI 2MB, BERISI :<br>
        *) SCAN KARTU PESERTA DAN FORMULIR PENDAFTARAN DARI SIM KIP KULIAH KEMENDIKBUD atau SCREENSHOT INFORMASI AKUN KIP-K<br>
        *) SCAN KARTU KIP, KARTU KKS, PKH, BUKTI TERDAFTAR DI BDT KEMENSOS, KARTU MISKIN KEMENSOS, DAN SEJENISNYA <br>
        *) SCAN ASLI SURAT KETERANGAN PRESTASI SISWA YANG DISAHKAN KEPALA SEKOLAH <br>
        *) SCAN SURAT KETERANGAN TIDAK MAMPU DARI KELURAHAN <br>
        *) SCAN KTP DAN KK CALON MAHASISWA <br>
        *) SCREENSHOT HASIL UPLOAD di SIM KIP K</h5>';
                }elseif($fill['berkas'] && $fill['statusdaftar']==0){
                    echo "<h3>BERKAS SEDANG DITINJAU</h3><br>HALAMAN UPLOAD AKAN MUNCUL JIKA BERKAS ANDA DITOLAK. SILAHKAN REVISI DAN UPLOAD KEMBALI";
                }elseif($fill['berkas'] && $fill['statusdaftar']==1){
                    echo "<h3>SELAMAT BERKAS ANDA LOLOS</h3><br>
          

                    <div class='row'>
                    <div class='col-md-6'>
                    <h5>SILAHKAN DATANG UNTUK UJIAN & WAWANCARA SERTA MEMBAWA BERKAS-BERKAS LENGKAP.</h5>
               
                    </div></div>";
                    
                }
            }
        }
            
        
        ?>
        <?php
                            $loaddaftar = mysql_query("SELECT * FROM pendaftar_kip
                                                        WHERE pendaftar_kip.email='$username'");
                            $array = mysql_fetch_array($loaddaftar);
        if($array['statusdaftar']=='Y'){?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>EXPORT DATA</h3>
                    <div class="form-group">
                        
                            <?php
                            echo "Koreksi data anda dibawah ini dengan sebenar-benarnya :
                                <form action='https://siakad.undaris.ac.id/pendaftaran-kip.php' method='POST' target='_BLANK'>
                                    <table border='0px'>
                                            <tr>
                                                <td>NIK</td><td>:</td><td><input type='text' name='nik' value='$array[nik]' require></td>
                                            </tr>
                                            <tr>
                                                <td>NISN *wajib ada dan benar</td><td>:</td><td><input type='text' name='nisn' value='$array[nisn]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td><td>:</td><td><input type='text' name='nama' value='$array[nama]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td><td>:</td><td><input type='text' name='tpt_lahir' value='$array[tpt_lahir]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td><td>:</td><td><input type='text' name='tgl_lahir' value='$array[tgl_lahir]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td><td>:</td><td><input type='text' name='email' value='$array[email]' require readonly></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td><td>:</td><td><input type='text' name='alamat' value='$array[alamat]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Asal Sekolah atau Kampus</td><td>:</td><td><input type='text' name='asal_sekolah' value='$array[asal_sekolah]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ayah</td><td>:</td><td><input type='text' name='nmayah' value='$array[nmayah]' require></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ibu</td><td>:</td><td><input type='text' name='nmibu' value='$array[nmibu]' require></td>
                                            </tr>
                                            <tr>
                                                <td>No WA</td><td>:</td><td><input type='text' name='nohp' value='$array[nohp]' require readonly></td>
                                            </tr>
                                    </table>
                                    <div class='form-group'>
                                    <h3><b>Pilihan Wajib!</b></h3>
                                        <table border='0px'>";
                                    $loadkelas = mysql_query("SELECT * FROM kelas WHERE id_angkatan='$array[angkatan_id]' AND konsentrasi_id like '%$array[konsentrasi_id]%'");
                                    $kelas = mysql_fetch_array($loadkelas);
                                    $tags = $kelas['id_kelas'];
                                    $tag = explode(",", $tags);
                                    
                                        echo "
                                        <tr>
                                            <td>Konfirmasi Kelas</td><td>:</td><td>
                                            <select name='id_kelas' value='' require>
                                            <option name='id_kelas' value='1'>REGULER KIP</option>
                                            </select>
                                        </tr>
                                        <tr>
                                            <td>Ikut ospek tahun ini?</td><td>:</td><td>
                                            <select name='ospek' value='' require>
                                            <option name='ospek' value='1'>Ya Wajib</option>
                                            </select></td>
                                        </tr>
                                        <tr>
                                            <td>Pilih ukuran jas almamater</td><td>:</td><td>
                                            <select name='size' value='' require>
                                            <option name='size' value='S'>S</option>
                                            <option name='size' value='M'>M</option>
                                            <option name='size' value='L'>L</option>
                                            <option name='size' value='XL'>XL</option>
                                            <option name='size' value='XXL'>XXL</option>
                                            <option name='size' value='XXXL'>XXXL</option>
                                            </select></td>
                                        </tr>
                                        </table>
                                    </div>
                                        <input type='hidden' name='jenkel' value='$array[jenkel]' require>
                                        <input type='hidden' name='kdagama' value='$array[kdagama]' require>
                                        <input type='hidden' name='prodi_id' value='$array[prodi_id]' require>
                                        <input type='hidden' name='konsentrasi_id' value='$array[konsentrasi_id]' require>
                                        <input type='hidden' name='angkatan_id' value='$array[angkatan_id]' require>
                                        <input type='hidden' name='id_sks' value='$array[id_sks]' require>
                                        <button type='submit' name='submit' class='btn btn-primary'>PROSES DATA</button>
                                </form>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
       <?php
        }
       ?>
        <h4>Berikut daftar kontak tim pemanduan KIP PPMB 2023/2024 :<BR>
            1. <a href="https://wa.me/6283838997331">081325704446 (Pak Ahmad)</a><br>
            2. <a href="https://wa.me/6281326040093">081326040093 (Pak Khozin)</a><br>
            Join <a target='_BLANK' href='https://chat.whatsapp.com/KRSF8C0l7MK5oL1A4CXAVm'><button class="btn btn-primary"><u>GRUP Whatsapp KIP-1</u></button></a>
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