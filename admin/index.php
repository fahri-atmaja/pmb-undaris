<?php
include "../koneksi.php";
if(!isset($_SESSION))
  session_start();
if(!isset($_SESSION['udahlogin']) )
  header("location:login.php");
 $username=$_SESSION['username'];
 $status = $_SESSION['status'];
if ($username==''){
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Halaman tidak bisa diakses');
    window.location.href='$url';
    </script>");
session_destroy();
}


?>
<!DOCTYPE html>

<html lang="en"><script id="tinyhippos-injected">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Pendaftaran Online</title>
	<meta name="description" content="PMB UNDARIS">
	<meta name="keywords" content="PMB UNDARIS">
	<meta name="author" content="Fahri Atmaja">
	<link rel="shortcut icon" href="http://bootemplates.com/themes/srikandi/favicon.ico">
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
    <script type="text/javascript" src="assets/js/Chart.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            responsive: true
        } );
     
        new $.fn.dataTable.FixedHeader( table );
    });
</script>
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
                        <a class="navbar-brand" href="./"><i class="fa fa-home" data-original-title="" title=""></i> <strong>PMB </strong>UNDARIS<strong>.</strong></a>
                    </div>
                    <!-- end:navbar-header -->
                    <ul class="nav navbar-nav navbar-left top-menu">
                        <!-- start dropdown 1 -->
                  
                        <!-- end dropdown 3 -->
                    </ul>
                    <ul class="nav navbar-nav navbar-right top-menu">
                       
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="./Srikandi - Responsive Admin Templates_files/avatar-mini3.jpg">
                                <span class="username"><?php echo $username ?></span>
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
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="btn-block btn-drop navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <strong>MENU</strong>
                            </button>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <?php
                                if($username=='sesi_naskah'){
                                ?>
                                <li class="dropdown">
                                    <a  href="?p=jadwalujian">
                                        <div class="text-center">
                                            <i class="fa fa-pencil fa-3x" data-original-title="" title=""></i><br>
                                            Jadwal Ujian PMB
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="?p=jalur-utbk">
                                        <div class="text-center">
                                            <i class="fa fa-user fa-3x" data-original-title="" title=""></i><br>
                                            Jalur UTBK
                                        </div>
                                    </a>
                                </li>
                                <?php
                                }else{
                                ?>
                                <li>
                                    <a href="./">
                                        <div class="text-center">
                                            <i class="fa fa-home fa-3x" data-original-title="" title=""></i><br>
                                            Home
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a  href="?p=notif">
                                        <div class="text-center">
                                            <i class="fa fa-bell fa-3x" data-original-title="" title=""></i><br>
                                            <?php
                                                $loadnotif = mysql_query("SELECT * FROM log WHERE status='n'");
                                                $cek = mysql_num_rows($loadnotif);
                                            ?>
                                            Notif <span><b><?= $cek ?></b></span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="?p=tabel-pendaftar">
                                        <div class="text-center">
                                            <i class="fa fa-user fa-3x" data-original-title="" title=""></i><br>
                                            Pendaftar
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="?p=tabel-pendaftar-kip">
                                        <div class="text-center">
                                            <i class="fa fa-user fa-3x" data-original-title="" title=""></i><br>
                                            Pendaftar KIP
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="?p=jalur-utbk">
                                        <div class="text-center">
                                            <i class="fa fa-user fa-3x" data-original-title="" title=""></i><br>
                                            Jalur UTBK
                                        </div>
                                    </a>
                                </li>
                               <li>
                                    <a href="?p=acc-beasiswa">
                                        <div class="text-center">
                                            <i class="fa fa-trophy fa-3x" data-original-title="" title=""></i><br>
                                            Jalur Beasiswa
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                        <div class="text-center">
                                            <i class="fa fa-heart fa-3x" data-original-title="" title=""></i><br>
                                            Data Calon Mahasiswa KIP <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <!--<li><a href="?p=angkatan"><i class="fa fa-gift" data-original-title="" title=""></i>  Data Calon Mahasiswa S1</a></li>-->
                                        <!--<li><a href="?p=angkatan-s2"><i class="fa fa-gift" data-original-title="" title=""></i> Data Calon Mahasiswa S2</a></li>-->
                                        <li><a href="?p=kip1"><i class="fa fa-gift" data-original-title="" title=""></i>  Data Calon Mahasiswa KIP 1</a></li>
                                        <li><a href="?p=kip2"><i class="fa fa-gift" data-original-title="" title=""></i>  Data Calon Mahasiswa KIP 2</a></li>
                                        <li><a href="?p=kip3"><i class="fa fa-gift" data-original-title="" title=""></i>  Data Calon Mahasiswa KIP 3</a></li>
                                        <li><a href="?p=kip4"><i class="fa fa-gift" data-original-title="" title=""></i>  Data Calon Mahasiswa KIP 4</a></li>
                                   
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a  href="?p=jadwalujian">
                                        <div class="text-center">
                                            <i class="fa fa-pencil fa-3x" data-original-title="" title=""></i><br>
                                            Jadwal Ujian PMB
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                        <div class="text-center">
                                            <i class="fa fa-bar-chart fa-3x" data-original-title="" title=""></i><br>
                                            Chart Grafik <span class="caret"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="?p=infografik"><i class="fa fa-gift" data-original-title="" title=""></i>  Data Grafik Sumber Informasi</a></li>
                                        <li><a href="?p=grafikprodi"><i class="fa fa-gift" data-original-title="" title=""></i> Data Grafik Program Studi</a></li>
                                    </ul>
                                </li>
                                   <li class="dropdown">
                                    <a  href="?p=laporan">
                                        <div class="text-center">
                                            <i class="fa fa-users fa-3x" data-original-title="" title=""></i><br>
                                            Laporan Pendaftaran 
                                        </div>
                                    </a>
                                  
                                </li>
                                <?php
                                }
                                ?>
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
            if($_GET['p']=="agama")
              include "page/agama.php";
              elseif($_GET['p']=="kip1")
              include "page/kip1.php";
              elseif($_GET['p']=="kip2")
              include "page/kip2.php";
              elseif($_GET['p']=="kip3")
              include "page/kip3.php";
              elseif($_GET['p']=="kip4")
              include "page/kip4.php";
              elseif($_GET['p']=="tabel-pendaftar")
              include "page/tabel-pendaftar.php";
              elseif($_GET['p']=="tabel-pendaftar-kip")
              include "page/tabel-pendaftar-kip.php";
            elseif($_GET['p']=="pekerjaan")
              include "page/pekerjaan.php";
              elseif($_GET['p']=="jalur-utbk")
              include "page/jalur-utbk.php";
              elseif($_GET['p']=="acc-beasiswa")
              include "page/acc-beasiswa.php";
              elseif($_GET['p']=="export")
              include "page/export_mahasiswa.php";
              elseif($_GET['p']=="notif")
              include "page/notif.php";
          elseif($_GET['p']=="pendidikan")
              include "page/pendidikan.php";
              elseif($_GET['p']=="gagalberkas")
              include "page/gagalberkas.php";
              elseif($_GET['p']=="gagal-utbk")
              include "page/gagal-utbk.php";
              elseif($_GET['p']=="gagalberkasbeasiswa")
              include "page/gagalberkasbeasiswa.php";
          elseif($_GET['p']=="prodi")
              include "page/prodi.php";
          elseif($_GET['p']=="jenisbayar")
              include "page/jenisbayar.php";
               elseif($_GET['p']=="pendaftar")
              include "page/pendaftar.php";
              elseif($_GET['p']=="pendaftar_kip")
              include "page/pendaftar_kip.php";
           elseif($_GET['p']=="seleksi")
              include "page/seleksi.php";
              elseif($_GET['p']=="seleksi-s2")
              include "page/seleksi-s2.php";
              elseif($_GET['p']=="nim")
              include "page/nim.php";
          elseif($_GET['p']=="pembayaran")
              include "page/pembayaran.php";
              elseif($_GET['p']=="jadwalujian")
              include "page/jadwalujian.php";
              elseif($_GET['p']=="editjadwal")
              include "page/editjadwal.php";
              elseif($_GET['p']=="inputjadwal")
              include "page/inputjadwal.php";
              elseif($_GET['p']=="cekpesertaujian")
              include "page/cekpesertaujian.php";
              elseif($_GET['p']=="pesertaujiankip")
              include "page/pesertaujiankip.php";
            elseif($_GET['p']=="laporan")
              include "page/laporan.php";
              elseif($_GET['p']=="angkatan")
              include "page/angkatan.php";
              elseif($_GET['p']=="angkatan-s2")
              include "page/angkatan-s2.php";
              elseif($_GET['p']=="infografik")
              include "page/infografik.php";
              elseif($_GET['p']=="grafikprodi")
              include "page/grafikprodi.php";
            else
             echo "<blockquote><p>Halaman tidak ditemukan</p></blockquote>";
          }
          else
          {
            $pendaftar = mysql_query("SELECT * FROM pendaftar");
            $hitungpendaftar = mysql_num_rows($pendaftar);
            
            $pendaftarkip = mysql_query("SELECT * FROM pendaftar_kip");
            $hitungpendaftarkip = mysql_num_rows($pendaftarkip);
            // while($hitungpendaftar > 0){
            // $filldaftar = mysql_fetch_array($pendaftar);
            // $email = $filldaftar['email']."<br>";
            
            // $pembayaran = mysql_query("SELECT * FROM proses_transaksi where email='$email' and status='y'");
            // $hitungpembayaran = mysql_num_rows($pembayaran);
            // }
            echo " <ol class='breadcrumb'>
                    <li><a href='./'>Home</a></li>
                    <li class='active'>Home</li>
                </ol>
                <!-- end:breadcrumb -->   

                <div class='row' id='home-content'>
                    <div class='col-lg-8'>
                        <!-- start:state overview -->
                        <div class='row state-overview'>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1>". $hitungpendaftar ."</h1>
                                        <p>Pendaftar</p>
                                    </div>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol red'>
                                        <i class='fa fa-user' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1>". $hitungpendaftarkip ."</h1>
                                        <p>Pendaftar KIP</p>
                                    </div>
                                </section>
                            </div>
                            
                        </div>
                        <!-- end:state overview -->

                        <!--custom chart start-->
                  
                        <!--custom chart end-->
                      
                    
                    </div>
                    <div class='col-lg-4'>
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
                                    <h3>ADMIN</h3>
                                    <small class='label label-warning'>Administrator Web</small>
                                    <p>Welcome back admin, Selamat Bekerja Kembali</p>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end:user info -->
                
                        <!-- end:total earning -->

                        <!-- start:user info table -->
                     
                        <!-- end:user info table -->
                    </div>
                </div>";
          }
          ?>
               <!--<div class='col-lg-6 col-sm-6'>-->
               <!--                 <section class='panel'>-->
               <!--                     <div class='symbol red'>-->
               <!--                         <i class='fa fa-gift' data-original-title=' title='></i>-->
               <!--                     </div>-->
               <!--                     <div class='value'>-->
               <!--                         <h1 class=' count2'>947</h1>-->
               <!--                         <p>Diterima</p>-->
               <!--                     </div>-->
               <!--                 </section>-->
               <!--             </div>-->
               <!--             <div class='col-lg-6 col-sm-6'>-->
               <!--                 <section class='panel'>-->
               <!--                     <div class='symbol yellow'>-->
               <!--                         <i class='fa fa-shopping-cart' data-original-title=' title='></i>-->
               <!--                     </div>-->
               <!--                     <div class='value'>-->
               <!--                         <h1 class=' count3'>328</h1>-->
               <!--                         <p>Ditolak</p>-->
               <!--                     </div>-->
               <!--                 </section>-->
               <!--             </div>-->
               <!--             <div class='col-lg-6 col-sm-6'>-->
               <!--                 <section class='panel'>-->
               <!--                     <div class='symbol purple'>-->
               <!--                         <i class='fa fa-money' data-original-title=' title='></i>-->
               <!--                     </div>-->
               <!--                     <div class='value'>-->
               <!--                         <h1 class=' count4'>10328</h1>-->
               <!--                         <p>Tahap Seleksi</p>-->
               <!--                     </div>-->
               <!--                 </section>-->
               <!--             </div>-->

               
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
                            © 2019 - <?php echo date('Y') ?> <a target="_BLANK" href="https://www.instagram.com/fahri_atmaja"><strong>Fahri Atmaja</strong></a></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="footer-bottom-links">
                                <a href="#">About <strong></strong></a>
                                <a href="https://pmb.undaris.ac.id">: Website Pendaftaran Mahasiswa Baru</a>
                         
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
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpnjzrXoIjx%2bGi07djBNw6V%2bk6IhW6Y%2bveWbfUbblHVaaQvAwuGR%2fd%2b%2fRi0q1uJwiB3quL%2fzKXi%2bTtDP7nRp1u393Bl1J91B8EXGn3%2b1WZWTAbf41MT3f%2f77iGqm05WK1gamkxhXwBJGH0bBk7i49%2bQ76N%2bV9F37FLNEjLlLn92tTqReVhWNTq4SNbmiotDbZmN5kYhNg9OqQlGXyAopKmVCmfsP7%2f9ZWOjMwZu3JImgF9%2fXdfJK49u1P6oe%2fefvRQ7vjfySKR6wY6bidmnWNX1np3O9pXqo7%2fa9uYucQcoweAj9pUmIitwMI34gJ6ISd2f2WIy7pmzQX5VisM89w5qSjPmi1lSUmcXjH7GFBDy89k6S2hQuCrtSc2qa%2bfvrQcwoqd00e8CBNtVSOeA9IvWdu85pb0R7%2bMh9PDxUIStndq4LMdZ7t68LGE5PH3NHH9R1rEf%2fB08BWTW5L3wtIbjOG18nNC4RpUWGitCA9QJk7HeAsMkqnLevBr7j%2b5wW%2fGSVkVKaaT6vVdl8wuKIAF81nH%2bHJfc9Bb%2bwRlRplyZ2LSDP2RwG8mSqEmNcDMAS2Do4w%2b7yQKRIt5KlKKMc5l5oxWc17nc203KSq2V5GfqoefoW%2fPKUIVjTPNVou%2f7uLI2vR26K0WZT6D5uvKLdOH%2bGWRXIrPmfadx33YaQePbsVY%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
	</body></html>