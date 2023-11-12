<body>
<a href="javascript:printDiv('cetak');"><span style="color: red; font-size: 50;"><b><i><u>PRINT</u></i></b></span></a>
<div id="cetak">
  <div class="container">
     <div id="main">
         <h4 class="modal-title" id="myModalLabel">Laporan Pendaftaran</h4>
        <div class="area-loading"></div>
      </div>
       <?php 
        $camabaregist = mysql_query("SELECT * FROM pendaftar");
        $countcamabaregist = mysql_num_rows($camabaregist);
        
        $camabakip = mysql_query("SELECT * FROM pendaftar_kip");
        $countcamabakip = mysql_num_rows($camabakip);
        
        $lolosregist = mysql_query("SELECT email, COUNT(*) duplikat FROM `proses_transaksi` GROUP BY email HAVING COUNT(duplikat) > 3");
        $countlolosregist = mysql_num_rows($lolosregist);
        
        $berkaskip = mysql_query("SELECT * FROM pendaftar_kip WHERE statusdaftar='1'");
        $countberkaskip = mysql_num_rows($berkaskip);
        
        //fakultas
        
        $ambilhukum = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=18 group by email");
        $counthukum = mysql_num_rows($ambilhukum);
        
        $ambilmh = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=25 group by email");
        $countmh = mysql_num_rows($ambilmh);
        
        $ambilsipil = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=19 group by email");
        $countsipil = mysql_num_rows($ambilsipil);
        
        $ambilfai = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=22 group by email");
        $countfai = mysql_num_rows($ambilfai);
        
        $ambilft = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=23 group by email");
        $countft = mysql_num_rows($ambilft);
        
        $ambilfeb = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=24 group by email");
        $countfeb = mysql_num_rows($ambilfeb);
        
        $ambilpgsd = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=26 group by email");
        $countpgsd = mysql_num_rows($ambilpgsd);
        
        $ambilpkn = mysql_query("SELECT * FROM pendaftar where konsentrasi_id=27 group by email");
        $countpkn = mysql_num_rows($ambilpkn);
        
        // fakultas HUKUM
        $ahukum = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=18 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $hukumreguler = mysql_num_rows($ahukum);
        
        $bhukum = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=18 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $hukumkonversi = mysql_num_rows($bhukum);
        
        $chukum = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=18 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $hukumkaryawan = mysql_num_rows($chukum);
        
        $dhukum = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=18 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $hukumgenap = mysql_num_rows($dhukum);
        
        // fakultas S2
        $aS2 = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=25 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $hukumregulers2 = mysql_num_rows($aS2);
        
        $bhukums2 = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=25 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $hukumkonversis2 = mysql_num_rows($bhukums2);
        
        $chukums2 = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=25 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $hukumkaryawans2 = mysql_num_rows($chukums2);
        
        $dhukums2 = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=25 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $hukumgenaps2 = mysql_num_rows($dhukums2);
        
        // fakultas teknik sipil
        $asipil = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=19 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $sipilreguler = mysql_num_rows($asipil);
        
        $bsipil = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=19 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $sipilkonversi = mysql_num_rows($bsipil);
        
        $csipil = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=19 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $sipilkaryawan = mysql_num_rows($csipil);
        
        $dsipil = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=19 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $sipilgenap = mysql_num_rows($dsipil);
        
        // fakultas agama
        $aagama = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=22 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $agamareguler = mysql_num_rows($aagama);
        
        $bagama = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=22 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $agamakonversi = mysql_num_rows($bagama);
        
        $cagama = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=22 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $agamakaryawan = mysql_num_rows($cagama);
        
        $dagama = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=22 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $agamagenap = mysql_num_rows($dagama);
        
        // fakultas peternakan
        $apet = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=23 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $petreguler = mysql_num_rows($apet);
        
        $bpet = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=23 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $petkonversi = mysql_num_rows($bpet);
        
        $cpet = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=23 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $petkaryawan = mysql_num_rows($cpet);
        
        $dpet = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=23 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $petgenap = mysql_num_rows($dpet);
        
        // fakultas manajemen
        $afeb = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=24 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $febreguler = mysql_num_rows($afeb);
        
        $bfeb = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=24 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $febkonversi = mysql_num_rows($bfeb);
        
        $cfeb = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=24 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $febkaryawan = mysql_num_rows($cfeb);
        
        $dfeb = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=24 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $febgenap = mysql_num_rows($dfeb);
        
        // fakultas pgsd
        $apgsd = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=26 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $pgsdreguler = mysql_num_rows($apgsd);
        
        $bpgsd = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=26 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $pgsdkonversi = mysql_num_rows($bpgsd);
        
        $cpgsd = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=26 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $pgsdkaryawan = mysql_num_rows($cpgsd);
        
        $dpgsd = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=26 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $pgsdgenap = mysql_num_rows($dpgsd);
        
        // fakultas pkn
        $apkn = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=27 AND regist.angkatan_id=41
        GROUP by pendaftar.email");
        $pknreguler = mysql_num_rows($apkn);
        
        $bpkn = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=27 AND regist.angkatan_id=42
        GROUP by pendaftar.email");
        $pknkonversi = mysql_num_rows($bpkn);
        
        $cpkn = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=27 AND regist.angkatan_id=43
        GROUP by pendaftar.email");
        $pknkaryawan = mysql_num_rows($cpkn);
        
        $dpkn = mysql_query("SELECT regist.angkatan_id, pendaftar.* FROM pendaftar
        LEFT JOIN regist ON regist.email=pendaftar.email
        where pendaftar.konsentrasi_id=27 AND regist.angkatan_id=45
        GROUP by pendaftar.email");
        $pkngenap = mysql_num_rows($dpkn);
        
        //Jalur
        $regist21 = mysql_query("SELECT * FROM pendaftar LEFT JOIN regist ON regist.email=pendaftar.email WHERE regist.angkatan_id=41");
        $countregist21 = mysql_num_rows($regist21);
        
        $regist22 = mysql_query("SELECT * FROM pendaftar LEFT JOIN regist ON regist.email=pendaftar.email WHERE regist.angkatan_id=42");
        $countregist22 = mysql_num_rows($regist22);
        
        $regist23 = mysql_query("SELECT * FROM pendaftar LEFT JOIN regist ON regist.email=pendaftar.email WHERE regist.angkatan_id=43");
        $countregist23 = mysql_num_rows($regist23);
        
        $regist25 = mysql_query("SELECT * FROM pendaftar LEFT JOIN regist ON regist.email=pendaftar.email WHERE regist.angkatan_id=45");
        $countregist25 = mysql_num_rows($regist25);
        
        $regist26 = mysql_query("SELECT * FROM pendaftar LEFT JOIN regist ON regist.email=pendaftar.email WHERE regist.angkatan_id=46");
        $countregist26 = mysql_num_rows($regist26);
        
        // lolosjalur
        $lolos21 = mysql_query("SELECT email, COUNT(*) duplikat FROM proses_transaksi 
                                    LEFT JOIN regist ON regist.email=proses_transaksi.email 
                                    WHERE regist.angkatan_id=41 GROUP BY email HAVING COUNT(duplikat) > 3");
        $countlolos21 = mysql_num_rows($lolos21);
        $lolos22 = mysql_query("SELECT email, COUNT(*) duplikat FROM proses_transaksi 
                                    LEFT JOIN regist ON regist.email=proses_transaksi.email 
                                    WHERE regist.angkatan_id=42 GROUP BY email HAVING COUNT(duplikat) > 3");
        $countlolos22 = mysql_num_rows($lolos22);
        $lolos23 = mysql_query("SELECT email, COUNT(*) duplikat FROM proses_transaksi 
                                    LEFT JOIN regist ON regist.email=proses_transaksi.email 
                                    WHERE regist.angkatan_id=43 GROUP BY email HAVING COUNT(duplikat) > 3");
        $countlolos23 = mysql_num_rows($lolos23);
      ?>
      <div class='row' id='home-content'>
                    <div class='col-lg-8'>
                        <!-- start:state overview -->
                        <div class='row state-overview'>
                            <h3>Laporan Jumlah Pendaftar</h3>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countcamabaregist ?></h1>
                                        <p>Pendaftar Universitas</p>
                                    </div>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countcamabakip ?></h1>
                                        <p>Pendaftar KIP</p>
                                    </div>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1 ><?= $countlolosregist ?></h1>
                                        <p>Lolos Universitas</p>
                                    </div>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countberkaskip ?></h1>
                                        <p>Lolos Berkas KIP</p>
                                        <a href="?p=pesertaujiankip"><button>Cek Daftar Peserta</button></a>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class='row state-overview'>
                        <h3>Laporan Jumlah Pendaftar Jalur Universitas Per Fakultas</h3>  
                        <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $counthukum ?></h1>
                                        <p>Fakultas Hukum S1</p>
                                        <p>Kelas Reguler : <?= $hukumreguler ?></p>
                                        <p>Kelas Konversi : <?= $hukumkonversi ?></p>
                                        <p>Kelas Karyawan : <?= $hukumkaryawan ?></p>
                                        <p>Kelas Konversi Genap : <?= $hukumgenap ?></p>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $countmh ?></h1>
                                        <p>Fakultas Hukum S2</p>
                                        <p>Kelas Reguler : <?= $hukumregulers2 ?></p>
                                        <p>Kelas Konversi : <?= $hukumkonversis2 ?></p>
                                        <p>Kelas Karyawan : <?= $hukumkaryawans2 ?></p>
                                        <p>Kelas Konversi Genap : <?= $hukumgenaps2 ?></p>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $countsipil ?></h1>
                                        <p>Fakultas Teknik</p>
                                        <p>Kelas Reguler : <?= $sipilreguler ?></p>
                                        <p>Kelas Konversi : <?= $sipilkonversi ?></p>
                                        <p>Kelas Karyawan : <?= $sipilkaryawan ?></p>
                                        <p>Kelas Konversi Genap : <?= $sipilgenap ?></p>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $countfai ?></h1>
                                        <p>Fakultas Agama Islam</p>
                                        <p>Kelas Reguler : <?= $agamareguler ?></p>
                                        <p>Kelas Konversi : <?= $agamakonversi ?></p>
                                        <p>Kelas Karyawan : <?= $agamakaryawan ?></p>
                                        <p>Kelas Konversi Genap : <?= $agamagenap ?></p>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $countft ?></h1>
                                        <p>Fakultas Peternakan</p>
                                        <p>Kelas Reguler : <?= $petreguler ?></p>
                                        <p>Kelas Konversi : <?= $petkonversi ?></p>
                                        <p>Kelas Karyawan : <?= $petkaryawan ?></p>
                                        <p>Kelas Konversi Genap : <?= $petgenap ?></p>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $countfeb ?></h1>
                                        <p>Fakultas Ekonomi & Bisnis</p>
                                        <p>Kelas Reguler : <?= $febreguler ?></p>
                                        <p>Kelas Konversi : <?= $febkonversi ?></p>
                                        <p>Kelas Karyawan : <?= $febkaryawan ?></p>
                                        <p>Kelas Konversi Genap : <?= $febgenap ?></p>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $countpgsd ?></h1>
                                        <p>F K I P - PGSD</p>
                                        <p>Kelas Reguler : <?= $pgsdreguler ?></p>
                                        <p>Kelas Konversi : <?= $pgsdkonversi ?></p>
                                        <p>Kelas Karyawan : <?= $pgsdkaryawan ?></p>
                                        <p>Kelas Konversi Genap : <?= $pgsdgenap ?></p>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                        <h1><?= $countpkn ?></h1>
                                        <p>F K I P - PKN</p>
                                        <p>Kelas Reguler : <?= $pknreguler ?></p>
                                        <p>Kelas Konversi : <?= $pknkonversi ?></p>
                                        <p>Kelas Karyawan : <?= $pknkaryawan ?></p>
                                        <p>Kelas Konversi Genap : <?= $pkngenap ?></p>
                                </section>
                            </div>
                        </div>
                        <div class='row state-overview'>
                            <h3>Laporan Pendaftar Universitas Berdasarkan Jalur</h3> 
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countregist21 ?></h1>
                                        <p>Reguler</p>
                                    </div>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countregist22 ?></h1>
                                        <p>Konversi</p>
                                    </div>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countregist23 ?></h1>
                                        <p>Karyawan</p>
                                    </div>
                                </section>
                            </div>
                             <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countregist26 ?></h1>
                                        <p>Kerja Sama</p>
                                    </div>
                                </section>
                            </div>
                            <div class='col-lg-6 col-sm-6'>
                                <section class='panel'>
                                    <div class='symbol terques'>
                                        <i class='fa fa-users' data-original-title=' title='></i>
                                    </div>
                                    <div class='value'>
                                        <h1><?= $countregist25 ?></h1>
                                        <p>Konversi Tahun Ini (genap)</p>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
       </div>
      <!--<div class="modal-body">-->
      <!--      <h3>Laporan Lolos Pendaftar Universitas Berdasarkan Jalur (sedang dikerjakan)</h3>-->
      <!--      <div class="container">-->
      <!--          <div class="row">-->
      <!--              <div class="col-md-3">-->
      <!--                   <button class="btn btn-primary">Reguler : <span><?= $countlolos21 ?></span></button>-->
      <!--              </div>        -->
      <!--              <div class="col-md-3">-->
      <!--                   <button class="btn btn-primary">Konversi : <span><?= $countlolos22 ?></span></button>-->
      <!--              </div>    -->
      <!--              <div class="col-md-3">-->
      <!--                   <button class="btn btn-primary">Karyawan : <span><?= $countlolos23 ?></span></button>-->
      <!--              </div> -->
      <!--          </div>-->
      <!--      </div>-->
      <!--  </div>-->
    </div>
</div>
<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>
</body>