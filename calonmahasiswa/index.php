<?php
include "../koneksi.php";
if(!isset($_SESSION))
  session_start();
if(!isset($_SESSION['udahlogin']) )
  header("location:login.php");
 $username=$_SESSION['username'];
 $nama=$_SESSION['nama'];

function tgl_indo($tanggal){
  $bulan = array (
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

?>
<!DOCTYPE html>

<html lang="en"><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="PMB-UNDARIS-Penerimaan-Mahasiswa-Baru-UNDARIS-Ungaran">
	<meta name="author" content="instagram.com/fahri_atmaja">
	<title>PMB Online UNDARIS</title>
	<link rel="favicon" href="../assets/images/undaris-min.png">
	<link rel="shortcut icon" href="../assets/images/undaris-min.png">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="./Srikandi - Responsive Admin Templates_files/bootstrap.min.css">
    <link rel="stylesheet" href="./Srikandi - Responsive Admin Templates_files/bootstrap-reset.css">
    <link href="./Srikandi - Responsive Admin Templates_files/css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="./Srikandi - Responsive Admin Templates_files/style.css">
    <script src="./Srikandi - Responsive Admin Templates_files/jquery-1.11.1.min.js"></script>
    <!-- css for this page -->
    <link href="./Srikandi - Responsive Admin Templates_files/jquery.easy-pie-chart.css" rel="stylesheet">
    <link rel="stylesheet" href="./Srikandi - Responsive Admin Templates_files/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="./Srikandi - Responsive Admin Templates_files/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="./Srikandi - Responsive Admin Templates_files/owl.transitions.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- start:wrapper -->
    <div id="wrapper">
        <div class="header-top">
            <!-- start:navbar -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="container">
                    <!-- start:navbar-header -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="./"><img src="../assets/images/undaris-min.png" alt="undaris ungaran" class="img-thumbnail"> <strong>PMB </strong>UNDARIS<strong>.</strong></a>
                    </div>
                    <!-- end:navbar-header -->
                    <ul class="nav navbar-nav navbar-left top-menu">
                        <!-- start dropdown 1 -->
                  
                        <!-- end dropdown 3 -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right top-menu">
                        <li>
                            <input type="text" class="form-control input-sm search" placeholder="Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="./Srikandi - Responsive Admin Templates_files/avatar-mini3.jpg">
                                <span class="username"><?php echo $nama ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <div class="log-arrow-up"></div>
                                
                                <li><a href="logout.php"><i class="fa fa-key" data-original-title="" title=""></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end:navbar -->
        </div>
        <!-- start:header -->
        <div id="header">
            <div class="overlay">
                <nav class="navbar" role="navigation">
                    <div class="container">
                         <!--Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="btn-block btn-drop navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <strong>Klik -> MENU</strong>
                            </button>
                        </div>
                    
                         <!--Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="./">
                                        <div class="text-center">
                                            <i class="fa fa-home fa-3x" data-original-title="" title=""></i><br>
                                            Home
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                        <div class="text-center">
                                            <i class="fa fa-money fa-3x" data-original-title="" title=""></i><br>
                                            Pembayaran BRIVA <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="?p=payment"><i class="fa fa-gift" data-original-title="" title=""></i>Pendaftaran Biaya Formulir</a></li>
                                        <!--<li><a href="?p=registrasi"><i class="fa fa-gift" data-original-title="" title=""></i>Biaya Masuk Registrasi</a></li>-->
                                   
                                    </ul>
                                </li>
                                <li>
                                    <a href="?p=pendaftaran">
                                        <div class="text-center">
                                            <i class="fa fa-location-arrow fa-3x" data-original-title="" title=""></i><br>
                                            Formulir
                                        </div>
                                    </a>
                                </li>
                                <li><a href="?p=status"><div class="text-center"><i class="fa fa-users"></i><br> Status Seleksi</div></a></li>
                                <!--<li class="dropdown">-->
                                <!--    <a class="dropdown-toggle" data-toggle="dropdown" href="">-->
                                <!--        <div class="text-center">-->
                                <!--            <i class="fa fa-shopping-cart fa-3x" data-original-title="" title=""></i><br>-->
                                <!--            Upload <span class="caret"></span>-->
                                <!--        </div>-->
                                <!--    </a>-->
                                <!--    <ul class="dropdown-menu" role="menu">-->
                                <!--        <li><a href="?p=upload"><i class="fa fa-gift" data-original-title="" title=""></i>  Upload Bukti Bayar</a></li>-->
                                <!--        <li><a href="?p=passfoto"><i class="fa fa-gift" data-original-title="" title=""></i> Upload Pass Foto</a></li>-->
                                   
                                <!--    </ul>-->
                                <!--</li>-->
                                    <li class="dropdown">
                                        <a href="?p=upload-utbk">
                                            <div class="text-center">
                                                <i class="fa fa-gift" data-original-title="" title=""></i><br>
                                                UTBK Tanpa Tes
                                            </div>
                                        </a>
                                    </li> 
                                    <li class="dropdown">
                                        <a href="?p=daftar-beasiswa">
                                            <div class="text-center">
                                                <i class="fa fa-trophy" data-original-title="" title=""></i><br>
                                                Daftar Beasiswa
                                            </div>
                                        </a>
                                    </li> 
                                    <li class="dropdown">
                                        <a target="_BLANK" href="https://ujian.undaris.ac.id">
                                            <div class="text-center">
                                                <i class="fa fa-clipboard fa-3x" data-original-title="" title=""></i><br>
                                                Ujian PMB
                                            </div>
                                        </a>
                                    </li> 
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- end:header -->

        <!-- start:main -->
        <div class="container">
            <div id="main">
                <!-- start:breadcrumb -->

       
          <?php
            if(isset($_GET['p'])){
            // if($_GET['p']=="agama")
            //   include "page/agama.php";
         // elseif($_GET['p']=="tk")
         //      include "page/tk.php";
         //    elseif($_GET['p']=="pekerjaan")
         //      include "page/pekerjaan.php";
         //  elseif($_GET['p']=="pendidikan")
         //      include "page/pendidikan.php";
               //else
                if($_GET['p']=="pendaftaran")
              include "page/pendaftaran.php";
           // elseif($_GET['p']=="seleksi")
           //    include "page/seleksi.php";
            // elseif($_GET['p']=="laporan")
            //   include "page/laporan.php";
            elseif($_GET['p']=="daftar-beasiswa")
              include "page/daftar-beasiswa.php";
            elseif($_GET['p']=="beasiswa-ppa")
              include "page/beasiswa-ppa.php";
            elseif($_GET['p']=="beasiswa-hafidz")
              include "page/beasiswa-hafidz.php";
            elseif($_GET['p']=="daftar-beasiswa")
              include "page/daftar-beasiswa.php";
              elseif($_GET['p']=="skip-beasiswa-hafidz")
              include "page/skip-beasiswa.php";
          elseif($_GET['p']=="upload")
              include "page/upload.php";
              elseif($_GET['p']=="upload-utbk")
              include "page/upload-utbk.php";
              elseif($_GET['p']=="ujian")
              include "page/ujian.php";
              elseif($_GET['p']=="ktm")
              include "page/ktm.php";
              elseif($_GET['p']=="passfoto")
              include "page/passfoto.php";
              elseif($_GET['p']=="payment")
              include "page/payment.php";
              elseif($_GET['p']=="payment-regist")
              include "page/payment-regist.php";
              elseif($_GET['p']=="registrasi")
              include "page/registrasi.php";
              elseif($_GET['p']=="delete")
              include "page/delete.php";
              elseif($_GET['p']=="invoice")
              include "page/invoice.php";
              elseif($_GET['p']=="statusbayar")
              include "page/statusbayar.php";
              elseif($_GET['p']=="statuspayment")
              include "page/statuspayment.php";
              elseif($_GET['p']=="status")
              include "page/status.php";
            else
             echo "<blockquote><p>Halaman tidak ditemukan</p></blockquote>";
          }
          else
          {
            $load = mysql_query("SELECT regist.*, akademik_prodi.nama_prodi, akademik_prodi.ketua FROM regist
                                 LEFT JOIN akademik_prodi ON akademik_prodi.prodi_id=regist.prodi1
                                 WHERE email='$username'");
            $load2 = mysql_query("SELECT regist.*, akademik_konsentrasi.nama_konsentrasi, akademik_konsentrasi.jenjang FROM regist
                                 LEFT JOIN akademik_konsentrasi ON akademik_konsentrasi.konsentrasi_id=regist.prodi2
                                 WHERE email='$username'");
            $dis = mysql_fetch_array($load);
            $dis2 = mysql_fetch_array($load2);
            $jenjang = strtoupper($dis2['jenjang']);
            echo " <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>Home</li>
                </ol>
                <!-- end:breadcrumb -->   
<!-- start:user info -->
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                <header class='panel-title'>
                                    <div class='text-center'>
                                        <strong>Profile</strong>
                                    </div>
                                </header>
                            </div>
                            <div class='panel-body'>
                                <div class='text-center' id='author'>
                                    <img src='./Srikandi - Responsive Admin Templates_files/avatar-mini3.jpg'>
                                    <h3>{$nama}</h3>
                                    <small class='label label-warning'>Calon Mahasiswa</small>
                                    <p>Welcome {$nama}</p>
                                    <h3><a target='_blank' href='https://youtu.be/TuNwyiTPvNM'>Klik disini → Tutorial Daftar</a></h3>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end:user info -->
                <div class='row' id='home-content'>
                    <div class='col-lg-8'>
                    
<h4>
                        Selamat, tahap pertama anda sudah selesai. Data pendaftaran anda adalah:<br>
            <table border=0px>
            <tr>
            <td>Nomor HP/WA</td><td>:</td><td> +62{$dis['nomor']}</td></tr>
            <tr><td>Alamat Email</td><td>:</td><td> {$dis['email']}</td></tr>
            <tr><td>Program Studi</td><td>:</td><td><b> {$dis['nama_prodi']} ( {$jenjang} - {$dis2['nama_konsentrasi']} )</b></td></tr>
            </table>
<br>
Berikutnya silahkan lakukan pelunasan biaya pendaftaran sebagaimana pada rincian berikut:<br>
Biaya Pendaftaran: Rp 200.000,- untuk S1, Rp 300.000,- untuk S2 <br> (Cek Brosur Fakultas / Tanyakan pada admin BAU)<br>
Tujuan Pembayaran :<br>
Bank BRI<br>
Cek disini <i><b><a href='https://pmb.undaris.ac.id/calonmahasiswa/?p=payment'>BRIVA</a></i></b><br>
<br><br>Join <a target='_BLANK' href='https://chat.whatsapp.com/JD3kPxqYh02CuLTaq5G6E8'>GRUP Whatsapp</a>
<br>Jika Anda telah melakukan pembayaran : <br>
1. Isi formulir dengan benar dan upload pass photo. <br>
2. Ujian PMB sesuai arahan panitia, silahkan join grup WA difitur status seleksi. <br>
3. Setelah mengikuti ujian status anda otomatis akan terupdate. <br>
4. Jika status 'Anda Diterima' maka silahkan datang ke UNDARIS untuk melakukan pemberkasan tunggu arahan dari panitia.</h4>
                            </div>
                        </div>
                        <!-- end:state overview -->

                        <!--custom chart start-->
                  
                        <!--custom chart end-->
                      
                    
                    </div>
                    <div class='col-lg-4'>
                        
                
                        <!-- end:total earning -->

                        <!-- start:user info table -->
                     
                        <!-- end:user info table -->
                    </div>
                </div>";
          }
          ?>
               

               
            </div>
        </div>
        <!-- end:main -->

        <!-- start:footer -->
      
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-widget">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>
                            <span class="sosmed-footer">
                                <a href="#"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus"></i></a>
                                <a href="#"><i class="fa fa-youtube" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube"></i></a>
                                <a href="#"><i class="fa fa-linkedin" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin"></i></a>
                                <a href="#"><i class="fa fa-instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"></i></a>
                                <a href="#"><i class="fa fa-github" data-toggle="tooltip" data-placement="top" title="" data-original-title="Github"></i></a>
                            </span>
                            © 2019 <a target="_BLANK" href="http://www.instagram.com/fahri_atmaja"><strong>Fahri Atmaja</strong></a>
                        </div>
                        <div class="col-sm-6">
                            <p class="footer-bottom-links">
                                Copyright &copy; 2019 - <?= date('Y'); ?> <a href="http://undaris.ac.id">UNDARIS.AC.ID</a> || <a target="_BLANK" href="http://www.instagram.com/fahri_atmaja">IT DIVISION</a>
                         
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:footer -->

    </div>
    <!-- end:wrapper -->

	<!-- start:javascript -->
	<!-- javascript default for all pages-->
	
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