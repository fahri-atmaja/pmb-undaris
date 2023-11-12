<?php
include "../koneksi.php";
$custCode = $_GET['id'];
$load = mysql_query("SELECT * FROM proses_transaksi WHERE email='$username' and custCode='$custCode'");
$f = mysql_fetch_array($load);
?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Status Bayar Registrasi</h3>
            <p>Silahkan untuk melakukan pembayaran dengan rincian sebagai berikut :</p>
            <table align="right" class="table table-striped" width="80%">
                <tr>
                    <td>Rekening</td><td>:</td><td>B R I</td>
                </tr>
                <tr>
                    <td>Nomor BRIVA</td><td>:</td><td><?= $f['brivaNo'] ?><?= $f['custCode'] ?></td>
                </tr>
                <tr>
                    <td>Jumlah Bayar</td><td>:</td><td><?= $f['amount'] ?></td>
                </tr>
                <tr>
                    <td>Keterangan</td><td>:</td><td><?= $f['keterangan'] ?></td>
                </tr>
                <tr>
                    <td>Status</td><td>:</td><td><?php if($f['status']=='n'){ echo "Belum Lunas"; }else{ echo "<b>Lunas</b>"; } ?></td>
                </tr>
            </table>
            <table align="right" class="table table-striped" width="80%">
                <tr>
                    <?php if($f['status']=='n'): ?>
                    <td><a href="refresh.php?custCode=<?= $custCode ?>"><button type="submit" name="refresh" class="btn btn-primary" id="submit">Refresh</button></a></td>
                    <td><a target="_BLANK" href="../invoice.php?custCode=<?= $custCode ?>"><button name="invoice" class="btn btn-danger" id="submit">Cara Bayar</button></a></td>
                    <?php endif; ?>
                    <?php
                    if($f['status']=='y'){
                        echo '<td><a target="_BLANK" href="../invoice.php?custCode='.$custCode.'"><button name="formulir" class="btn btn-primary">Invoice</button></a></td>';  
                    }
                    ?>
                </tr>
            </table>
            <p>Setelah melakukan pembayaran harap segera menekan tombol refresh diatas dihari yang sama.</p>
        </div>
    </div>
</div>