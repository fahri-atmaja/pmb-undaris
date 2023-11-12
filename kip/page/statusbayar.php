<?php
include "../koneksi.php";
$load = mysql_query("SELECT * FROM proses_transaksi WHERE email='$username'");
$f = mysql_fetch_array($load);
$custCode = $f['custCode'];
$now = date("Y-m-d");
$exp = substr($f['expiredDate'],0,10);
                        
?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Status Bayar Registrasi <?= $exp; ?></h3>
            <p>Silahkan untuk melakukan pembayaran dengan rincian sebagai berikut :</p>
            <table align="right" class="table table-striped" width="80%">
                <tr>
                    <td>Bank</td><td>:</td><td>B R I</td>
                </tr>
                <tr>
                    <td>Kode Bank</td><td>:</td><td>0 0 2</td>
                </tr>
                <tr>
                    <td>Nomor BRIVA</td><td>:</td><td><?= $f['brivaNo'] ?><?= $f['custCode'] ?></td>
                </tr>
                <tr>
                    <td>Jumlah Bayar</td><td>:</td><td><?= rupiah($f['amount']) ?></td>
                </tr>
                <tr>
                    <td>Keterangan</td><td>:</td><td><?= $f['keterangan'] ?></td>
                </tr>
                <tr>
                    <td>Status</td><td>:</td><td><?php if($f['status']=='n'){ echo "Belum Lunas"; }else{ echo "<b>Lunas</b>"; } ?></td>
                </tr>
                <tr>
                    <td>Bayar Sebelum Tanggal</td><td>:</td><td><?= $exp; ?></td>
                </tr>
            </table>
            <table align="right" class="table table-striped" width="80%">
                <tr>
                    <?php if($f['status']=='n'){
                        
                        ?>
                        <td><a href="refresh.php?custCode=<?= $custCode ?>"><button type="submit" name="refresh" class="btn btn-primary" id="submit">Refresh</button></a></td>
                        <td><a target="_BLANK" href="../invoice.php?custCode=<?= $custCode ?>"><button name="invoice" class="btn btn-danger" id="submit">Cara Bayar</button></a></td>
                    <?php } ?>
                    <?php if($f['status']=='y'){
                        echo '<td><a href="index.php?p=pendaftaran"><button name="formulir" class="btn btn-primary">Isi Formulir</button></a></td>';
                    }
                    ?>
                </tr>
            </table>
            <p><b>Penting!!</b><br>Setelah melakukan pembayaran harap segera menekan tombol refresh diatas dihari yang sama.<br> Jika mengalami kendala dalam pembayaran hubungi no WA dibawah ini:<br>
            <a href="https://api.whatsapp.com/send?phone=6281328375307&text=Salam,%20Saya%20mengalami%20kendala%20dengan%20NO.BRIVA%20:%20<?= $f['brivaNo'] ?><?= $f['custCode'] ?>">UNDARIS IT DIVISION</a></p>
        </div>
    </div>
</div>