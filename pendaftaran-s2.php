<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
$hasil1= acak(7);
$hasil2= acak(5);
include "koneksi.php";
include "classes/class.phpmailer.php";
                if(isset($_POST['nama'])){
                        

                                $nama 			=addslashes($_POST['nama']);
                                $email 			=addslashes($_POST['email']);
                                $nomor 			=addslashes($_POST['nomor']);
                                $prodi1 		=addslashes($_POST['prodi1']);
                                $prodi2 		=addslashes($_POST['prodi2']);
                                $angkatan1 		=addslashes($_POST['angkatan1']);
                                $angkatan2 		=addslashes($_POST['angkatan2']);
                                $informasi 		=addslashes($_POST['informasi']);
                                $provinsi 		=addslashes($_POST['provinsi']);
                                $kota     =addslashes($_POST['kota']);
                                $statusdaftar 	=addslashes($_POST['statusdaftar']);
                                $usia   =addslashes($_POST['usia']);
                                $tahun   =addslashes($_POST['tahun']);
                                $id_sks   =addslashes($_POST['id_sks']);
                                $fixnama = ucwords(strtolower($nama));
                                $fixemail = strtolower($email);
                               $cek = mysql_query("SELECT * FROM regist WHERE email='$email'");
                               if (mysql_num_rows($cek) > 0){
                                   echo "<script>alert('email telah terdaftar !!'); location.href='pendaftaran-s2.php';</script>";
                               } else {
                                   $simpan = mysql_query("insert into regist values('','$fixnama','$hasil1','$fixemail','$nomor','$prodi1','$prodi2','$informasi','$provinsi','$kota','$statusdaftar','$usia','$tahun','$id_sks','Y','$angkatan1','$angkatan2')");
                                
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPSecure = ‘tls’;
    $mail->Host = "localhost"; //hostname masing-masing provider email
    $mail->SMTPDebug = 2;
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "pmb@undaris.ac.id"; //user email
    $mail->Password = "und4r15!$"; //password email
    $mail->SetFrom("pmb@undaris.ac.id","PMB Undaris"); //set email pengirim
    $mail->Subject = "Pemberitahuan Email dari Website"; //subyek email
    $mail->AddAddress("$fixemail","Calon Mahasiswa Undaris"); //tujuan email
    $body .='<html>
        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        	<title>UNIVERSITAS DARUL ULUM ISLAMIC CENTRE SUDIRMAN GUPPI (UNDARIS)</title>
        </head>
        <body>
        	<center>
        		<img src="https://drive.google.com/uc?export=view&amp;id=1GfRSWQIVoQVBM3EnrXuL3ZmZQ4qTVvxu" alt="UNIVERSITAS DARUL ULUM ISLAMIC CENTRE SUDIRMAN GUPPI (UNDARIS)" height="125" width="125">
        		<h3>UNIVERSITAS DARUL ULUM ISLAMIC CENTRE SUDIRMAN GUPPI <br> (UNDARIS)</h3>
        		<h4>Jl. Tentara Pelajar No.13 Ungaran Kab.Semarang, 50314 ,Jawa Tengah Telp.(024) 6923180 | Fax(022) 76911689</h4>
        		<h4><b>____________________________________________________________________________________________________________</b></h4>
        	</center>
        <div class="container">
            <div class="row">
                <center><h2>SELAMAT ANDA SUDAH TERDAFTAR SEBAGAI CALON MAHASISWA BARU UNDARIS</h2></center>
                <br><br>
                <h4 align="center">Berikut detail login anda untuk melengkapi biodata dan pembayaran :</h4>
                <table border="0px" padding="1" align="center" style="width: 600px;" >
                    <tr>
                        <td>Email</td><td>:</td><td>'.$fixemail.'</td>
                    </tr>
                    <tr>
                        <td>Kode Login</td><td>:</td><td>'.$hasil1.'</td>
                    </tr>
                </table>
                <h3 align="center">Panduan PMB UNDARIS</h3>
                <h4 align="center">
                1. Silahkan login menggunakan email dan kode login diatas. klik disini <a href="https://pmb.undaris.ac.id/calonmahasiswa/login.php">https://pmb.undaris.ac.id/calonmahasiswa/login.php</a><br>
                2. Upload bukti bayar di fitur upload bukti bayar. Scan/Foto bukti bayar dengan tujuan pembayaran :Bank JATENG no rek: 1022-0022-16 A/N : UNDARIS .<br>
                3. Tunggu hingga pembayaran anda diverifikasi. Setelah itu silahkan mengisi formulir & upload pass foto anda. Cetak formulir anda sebagai bukti untuk heregistrasi nantinya.<br>
                4. Mengikuti Ujian Tes Pendaftaran Online/Offline sesuai yang sedang berlaku saat ini. Alamat link muncul setelah anda selesai mengisi formulir.<br>
                5. Nilai ujian online langsung muncul setelah anda menyelesaikan ujian.<br>
                6. Cek status seleksi anda, jika anda lulus ujian online maka "SELAMAT ANDA DITERIMA MENJADI MAHASISWA BARU UNDARIS".
                </h4><br><br>
                <h3 align="center">
                Jika mendapati masalah/ingin bertanya dalam pendaftaran silahkan hubungi panita PPMB kami.<br>
                <center><i class="fa fa-phone">Klik Nomor Disini --></i><a href="https://wa.me/087717793816" target="_BLANK" style="color:black">0877-1779-3816</a> / <a href="https://wa.me/089647322624" target="_BLANK" style="color:black">0896-4732-2624</a> (SMS/WA) <br></center>
                </h3>
            </body>
            </html>
                ';
    
    $mail->MsgHTML("$body");
    // $mail->MsgHTML("Selamat!! Anda sudah terdaftar sebagai calon mahasiswa undaris. Berikut detail login anda untuk melengkapi biodata dan pembayaran<br>
    //                 Email : $fixemail <br>
    //                 Kode Login : $hasil1<br>
    //                 Silahkan login di https://pmb.undaris.ac.id/calonmahasiswa/login.php
    //                 ");
    if($mail->Send()) echo "Message has been sent";
    else echo "Failed to sending message";
							    if ($simpan){
                                header("location:$url/berhasil.php");
                            }else{
                            	echo "Gagal Simpan";
                            }


                  }
                }
              ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="PMB-UNDARIS-Penerimaan-Mahasiswa-Baru-UNDARIS-Ungaran">
	<meta name="author" content="instagram.com/fahri_atmaja">
	<title>Penerimaan Mahasiswa Baru UNDARIS</title>
	<link rel="favicon" href="assets/images/undaris-min.png">
	<link rel="shortcut icon" href="assets/images/undaris-min.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <script type="text/javascript">
$(document).ready(function()
{
 <!-- handle event combobox kategori ketika nilainya di ganti -->
 $("#combokategori").change(function() {
  <!-- mendapatkan value dari combobox -->
  var idkategori = $(this).val();
  if (idkategori != "")
  {
   <!-- Request data sub kategori berdasarkan idkategori yang dipilih -->
   $.ajax({
    type:"post",
    url:"getsubkategori.php",
    data:"id="+ idkategori,
    success: function(data){
     $("#subkategori").html(data);
    }
   });
  }
 });
});
</script>
  <script type="text/javascript">
$(document).ready(function()
{
 <!-- handle event combobox kategori ketika nilainya di ganti -->
 $("#combokonsentrasi").change(function() {
  <!-- mendapatkan value dari combobox -->
  var idkategori = $(this).val();
  if (idkategori != "")
  {
   <!-- Request data sub kategori berdasarkan idkategori yang dipilih -->
   $.ajax({
    type:"post",
    url:"getkonsentrasi.php",
    data:"id="+ idkategori,
    success: function(data){
     $("#subkonsentrasi").html(data);
    }
   });
  }
 });
});
</script>
<script type="text/javascript">
$(document).ready(function()
{
 <!-- handle event combobox kategori ketika nilainya di ganti -->
 $("#comboangkatan").change(function() {
  <!-- mendapatkan value dari combobox -->
  var idkategori = $(this).val();
  if (idkategori != "")
  {
   <!-- Request data sub kategori berdasarkan idkategori yang dipilih -->
   $.ajax({
    type:"post",
    url:"getsks.php",
    data:"id="+ idkategori,
    success: function(data){
     $("#subsks").html(data);
    }
   });
  }
 });
});
</script>
  <script type="text/javascript">
$(document).ready(function()
{
 <!-- handle event combobox kategori ketika nilainya di ganti -->
 $("#comboangkatan").change(function() {
  <!-- mendapatkan value dari combobox -->
  var idkategori = $(this).val();
  if (idkategori != "")
  {
   <!-- Request data sub kategori berdasarkan idkategori yang dipilih -->
   $.ajax({
    type:"post",
    url:"getangkatan.php",
    data:"id="+ idkategori,
    success: function(data){
     $("#subangkatan").html(data);
    }
   });
  }
 });
});
</script>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="./" style="color:red">
				<marquee>Penerimaan Mahasiswa Baru UNDARIS</marquee></a> 
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="c1"><a href="./"><span class="fa fa-home"></span> Home</a></li>
					<li class="c2"><a href="pengumuman.php"><span class="fa fa-users"></span> Pengumuman</a></li>
					<li class="c3"><a href="pendaftaran.php"><span class="fa fa-pencil"></span> Pendaftaran</a></li>
					<li class="c4 active"><a href="pendaftaran-s2.php"><span class="fa fa-pencil"></span> Pendaftaran S2</a></li>
					<li class="c7"><a href="calonmahasiswa"><span class="fa fa-lock"></span> Login</a></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->


	<!-- Header -->
	<!--
	<header id="head">
		<div class="container">
             <div class="heading-text">							
							<h1 class="animated flipInY delay1">Pendaftaran Online Mahasiswa Baru UNDARIS</h1>
						</div>
            
					<div class="fluid_container">                       
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                        <div data-thumb="assets/images/slides/thumbs/img1.jpg" data-src="assets/images/slides/img1.jpg">
                        </div> 
                        <div data-thumb="assets/images/slides/thumbs/img2.jpg" data-src="assets/images/slides/img2.jpg">
                        </div>
                        <div data-thumb="assets/images/slides/thumbs/img3.jpg" data-src="assets/images/slides/img3.jpg">
                        </div> 
                    </div>
                </div>
		</div>
	</header>
	 -->
	<!-- /Header -->
  <div class="container">
    <div class="row">
			
					<div class="col-md-12">
						<div class="grey-box-icon b4">  
							 <h4 class="modal-title" id="myModalLabel">Registrasi Calon Mahasiswa Magister UNDARIS</h4>
        <div class="area-loading"></div>
      </div>
      <div class="modal-body">
        <form method="POST">
        <table class="table " width="100%">
          <tr>
                <th width="25%">Nama pendaftar</th>
                <td width="1%"> : </td>
                <td> <input id="nama" name="nama" placeholder="Nama" class="form-control" type="text" required><br>
                *) Gunakan huruf kapital dengan benar. Contoh : Fittera Aulia
                </td>
            </tr>
            <tr>
                <th width="25%"><p color="black">Nomor HP / WA</p></th>
                <td width="1%"> : </td>
                <td>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">+62</div><input id="nomor" name="nomor" placeholder="8132837xxxx" class="form-control" type="number" maxlength="12" required>
                    </div>
                </td>
            </tr>
            <tr>
            <th width="25%">Email</th>
            <td width="1%"> : </td>
            <td> <input id="email" name="email" placeholder="Email" class="form-control" type="email" required><br>
            *) Harus email yang aktif sebagai sarana penghubung ke PMB Undaris dan seterusnya . <br>
            *) Pastikan penulisan alamat email sudah benar <b>menggunakan huruf kecil semua.</b>
            </td>
          </tr>
            <tr>
            <th width="25%">Prodi S2</th>
            <td width="1%"> : </td>
               <td><select  name="prodi1" id="combokonsentrasi" class="form-control" required>
            	<option value="">-- pilih prodi pilihan 1 --</option>
              <?php
                $exec=mysql_query("select * from akademik_prodi where prodi_id=22");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'>$hasil[1]</option>";
              ?>
            </select></td>
          </tr>
          <tr>
            <th width="25%">Prodi Pilihan</th>
            <td width="1%"> : </td>
               <td><select  name="prodi2" id="subkonsentrasi" class="form-control" required>
            	<option select="selected">-- pilih prodi pilihan 2 --</option>
            </select></td>
          </tr>
           <!-- update angkatan -->
          <tr>
            <th width="25%">Angkatan</th>
            <td width="1%"> : </td>
               <td><select  name="angkatan1" id="comboangkatan" class="form-control" required>
            	<option value="">-- pilih angkatan --</option>
              <?php
                $exec=mysql_query("select * from student_angkatan");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'>$hasil[1]</option>";
              ?>
            </select></td>
          </tr>
          <tr>
            <th width="25%">Pilihan Kelas</th>
            <td width="1%"> : </td>
               <td><select  name="angkatan2" id="subangkatan" class="form-control" required>
            	<option select="selected">-- pilihan kelas --</option>
            </select></td>
          </tr>
          <!-- end of update -->
          <tr>
                <th width="25%">Jenis Kelas</th>
                <td width="1%"> : </td>
                <td><select id="subsks" name="id_sks" class="form-control" required >
                    <option select="selected">-- pilihan kelas --</option>
                <!--<option value="">-- pilih kelas --</option>-->
                <!--<option value="1">Reguler</option>-->
                <!--<option value="2">Konversi</option>-->
                </select></td>
            </tr>
            <tr>
                <th width="25%">Sumber Informasi</th>
                <td width="1%"> : </td>
                <td> <select id="informasi" name="informasi" class="form-control" required >
                <option value="">-- pilih informasi --</option>
                <option value="Alumni">Alumni</option>
                <option value="Expo">Expo</option>
                <option value="Koran">Koran</option>
                <option value="Brosur">Brosur</option>
                <option value="Spanduk">Spanduk</option>
                <option value="Facebook">Facebook</option>
                <option value="Instagram">Instagram</option>
                <option value="Relasi">Relasi</option>
                <option value="Saudara">Saudara</option>
                <option value="Teman">Teman</option>
                <option value="Sekolah">Sekolah</option>
                <option value="Seminar">Seminar</option>
                <option value="Website">Website</option>


                </select></td>
            </tr>
            <tr>
            <th width="25%">Provinsi</th>
            <td width="1%"> : </td>
               <td><select  name="provinsi" id="combokategori" class="form-control" required>
            	<option value="">-- pilih asal / provinsi --</option>
              <?php
                $exec=mysql_query("select * from m_ipropinsi");
                while($hasil=mysql_fetch_array($exec))
                  echo "<option value='$hasil[0]'>$hasil[1]</option>";
              ?>
            </select></td>
          </tr>
          <tr>
              <th width="25%">Kota</th>
              <td width="1%"> : </td>
              <td>
              <select  name="kota" id="subkategori" class="form-control" required>
              <option selected="selected">Pilih kota</option>
            </select></td>
          </tr>
          <tr>
                <th width="25%">Usia</th>
                <td width="1%"> : </td>
                <td> <input id="usia" name="usia" placeholder="Usia" class="form-control" type="number" maxlength="2" required></td>
            </tr>
            <input type="hidden" name="statusdaftar" id="statusdaftar" value="Tahap Seleksi">
            <input type="hidden" name="tahun" id="tahun" value="<?php echo date("Y");?>">
        </table>
        <label>*) Pengumuman Penerimaan Mahasiswa Baru akan langsung diinfokan setelah anda mendaftar dan mengikuti ujian <br> 
        *) Silahkan cek email untuk login, sesudah anda mengisi semua form dengan benar anda di terima dalam tahap seleksi <br>
        *) Jika anda Anda bingung harap meminta bantuan Panitia PMB <br>
        *) Dengan Mengisi semua form anda akan menjadi Calon Mahasiswa dan akan menunggu beberapa hari untuk pengumuman hasil seleksi</label>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="submit" name="submit">Simpan</button>
        
            </form>
						</div><!--grey box -->
					</div><!--/span3-->
				</div>
    </div>
      <section class="news-box top-margin">
     
    </section>
   
  
	
     
      
    	 
    <footer id="footer">
 
		<div class="container">
   <div class="row">
  <div class="footerbottom">

    <div class="col-md-12 col-sm-7"> 
            	<div class="footerwidget"> 
                         <h4 class="text-center">Contact</h4> 
                        <p class="text-center">Hubungi Kami </p>
            <div class="contact-info" class="text-center"> 
            <center><i class="fa fa-map-marker"></i> Panitia PMB UNDARIS<br></center>
            <center><iframe class="text-center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.8685749946853!2d110.41407671472179!3d-7.141192694843518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708603440a8475%3A0x475b4fff06ad1651!2s%22Undaris%22%20Universitas%20Darul%20Ulum%20Islamic%20Centre%20Sudirman%20GUPPI!5e0!3m2!1sid!2sid!4v1576035568973!5m2!1sid!2sid" width="200" height="90" frameborder="0" style="border:0;" allowfullscreen=""></iframe></center><br>
            <center><i class="fa fa-phone"></i>081228218271 / 081229052443 (SMS/WA) <br></center>
             <center><i class="fa fa-envelope-o"></i> pmb@undaris.ac.id </center>
              </div> 
                </div><!-- end widget --> 
    </div>
  </div>
</div>
			<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-pencil"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

				

					<div class="col-md-12 panel">
						<div class="panel-body">
							<p class="text-center">
								Copyright &copy; 2018 - <?= date('Y'); ?>. <a href="http://undaris.ac.id">UNDARIS.AC.ID</a> || <a target="_BLANK" href="http://www.instagram.com/fahri_atmaja">IT DIVISION</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
      
	</script>
    
</body>
</html>
