<?php
include "../koneksi.php";
$username = $_SESSION['username'];
                if(isset($_POST['submit'])){
                            $ekstensi_diperbolehkan = array('png','jpg','jpeg');
                            $nama = $_FILES['file']['name'];
                            $x = explode('.', $nama);
                            $ekstensi = strtolower(end($x));
                            $ukuran = $_FILES['file']['size'];
                            $file_tmp = $_FILES['file']['tmp_name']; 
                            $kodedaftar = $_POST['kodedaftar'];
                            $jenisbayar = $_POST['jenisbayar'];  
                 
                            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                if($ukuran < 347000){          
                                    move_uploaded_file($file_tmp, 'foto/'.$nama);
                                    $query = mysql_query("UPDATE pendaftar SET foto='$nama' WHERE email='$kodedaftar'");
                                    if($query){
                                        echo 'FILE BERHASIL DI UPLOAD';
                                    }else{
                                        echo 'GAGAL MENGUPLOAD GAMBAR';
                                    }
                                }else{
                                    echo 'UKURAN FILE TERLALU BESAR';
                                }
                            }else{
                                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                            }
                        }
              ?>

 
<body>
<?php 
       $load = mysql_query("SELECT * from pendaftar where email='$username'");
       $tampil = mysql_fetch_array($load);
       $passfoto = $tampil['foto'];
       $namacalon = $tampil['email'];
       if ($namacalon==""){
            echo "<script>alert('SILAHKAN MENGISI FORMULIR TERLEBIH DAHULU! ^.^');history.go(-1);</script>";
       }
       if ($passfoto==null):
       ?>
        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Upload Foto</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
        <table class="table " width="100%">
            <tr>
                <th width="25%">Email pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="kodedaftar" name="kodedaftar" placeholder="Kode Daftar" class="form-control" type="text" value="<?php echo $namacalon;  ?>" readonly required style="color:red"></td>
            </tr>
            <tr>
                <th width="25%">Upload Pass Foto</th>
                <td width="1%"> : </td>
                <td><input  id="file" name="file" type="file" class="form-control" required></td>
            </tr>            
        </table>
        *) Upload foto dengan background merah dan format gambar maximum size 300kb <br>
        *) Perhatikan!! 1 kali upload. Pastikan anda mengupload dengan foto yang benar <br>
        *) Jika anda bingung harap meminta bantuan Panitia PMB <br>
        *) Setelah upload foto silahkan tunggu untuk diverifikasi oleh admin PMB. Setelah di verifikasi maka anda sudah dapat mengisi formulir pendaftaran.

      </div>
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-primary" id="submit">Simpan</button>
        
            </form>
               

               
            </div>
        </div>
        <?php
        else:
        ?>
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
         <h4 class="modal-title" id="myModalLabel">Upload Pass Foto</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
        
        <h4>ANDA SUDAH UPLOAD PASS FOTO</h4>  
        <a href="https://pmb.undaris.ac.id/calonmahasiswa/index.php?p=pendaftaran"><button type="button" class="btn btn-primary"><span class='fa fa-print'></span> Cetak KTM Sementara</button></a>
        

               
            </div>
        </div>
        <?php
        endif;
        ?>
        <!-- end:main -->

  
	
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
	</body></html>