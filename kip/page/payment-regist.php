<?php 
include "../koneksi.php";
    $tgl_skrg       = date("Ymd");
    $tes            = '2021-11-12';
    $today          = date("Y-m-d");
    $tambah         = date('Y-m-d', strtotime('+6 days', strtotime($today)));
    $exp            = date("H:m:s");
    $today_id       = date("Ym");
    $h              = date("d");


 $load = mysql_query("SELECT * FROM regist WHERE email='$username'");
$status = mysql_fetch_array($load);
?>
<?php
    // $load       = mysql_query("SELECT * FROM proses_transaksi WHERE email='$username'");
    // $cek        = mysql_num_rows($load);
    //     if($cek > 0){
    //         echo "<script>alert('TRANSAKSI SUDAH ADA !!'); location.href='$url/calonmahasiswa/index.php?p=statusbayar';</script>";
    //     }
    $id_tagihan = $_GET['id'];
    $load       = mysql_query("SELECT tagihan_mahasiswa.*, kode_tagihan.keterangan FROM tagihan_mahasiswa 
                                LEFT JOIN kode_tagihan ON kode_tagihan.kode_bayar=tagihan_mahasiswa.jenis_bayar
                                WHERE id_tagihan='$id_tagihan'");
    $fill       = mysql_fetch_array($load);
    // $cek        = mysql_num_rows($load);
    //     if($cek > 0){
    //         echo "<script>alert('TRANSAKSI SUDAH ADA !!'); location.href='$url/calonmahasiswa/index.php?p=statusbayar';</script>";
    //     }
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
           <h3>Proses Biaya Pendaftaran</h3>
           <form Method="POST">
           <div class="table-responsive">
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <tr>
                   <td>Jenis Bayar</td><td>:</td><td>Pembayaran <?= $fill['keterangan']; ?></td>
                </tr>
                 
                <tr>
                   <td>Nominal</td><td>:</td>
                   <td>
                        <?= $fill['jumlah'];?>
        			</td>
                </tr>
            </table>
            <input type="hidden" name="email" value="<?= $username; ?>" readonly>
            <input type="hidden" name="brivaNo" value="12775" readonly>
            <input type="hidden" name="custCode" value="<?= substr($status['nomor'],0,8); ?><?= $fill['jenis_bayar']; ?>" readonly>
            <input type="hidden" name="amount" value="<?=$fill['jumlah'];?>" readonly>
            <input type="hidden" name="keterangan" value="Pembayaran <?= $fill['keterangan']; ?>" readonly>
            <input type="hidden" name="expiredDate" value="<?= $tambah ?> <?= $exp; ?>" readonly>
            <input type="hidden" name="tanggal_bayar" value="<?= $tgl_skrg; ?>" readonly>
            <input type="hidden" name="status" value="n" readonly>
            <input type="hidden" name="kode_bayar" value="<?= $fill['jenis_bayar']; ?>" readonly>
            <!--
            
            -->
            <button type="submit" name="submit" class="button success">Proses</button>
           </div>
           </form>
           <span>Setelah menekan tombol progress diwajibkan untuk segera membayar tagihan  tsb.</span>
        </div>
    </div>
</div>
<?php
	
if (isset($_POST['submit'])) {
$email       	= $_POST['email'];
$brivaNo   		= $_POST['brivaNo'];
$custCode		= $_POST['custCode'];
$expiredDate	= $_POST['expiredDate'];
$status			= $_POST['status'];
$tanggal_bayar	= $_POST['tanggal_bayar'];
$keterangan		= $_POST['keterangan'];
$amount 		= $_POST['amount'];
$kode_bayar 	= $_POST['kode_bayar'];
// $client_id = "4y0fz9VFU5LLAbJKRGgPXeMUhLaddYSX";
// $secret_id= "Ttama2OL82xpdvvY";

/* Generate Token */
function BRIVAgenerateToken($client_id, $secret_id) {
    $url ="https://partner.api.bri.co.id/oauth/client_credential/accesstoken?grant_type=client_credentials";
    $data = "client_id=".$client_id."&client_secret=".$secret_id;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
    
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $json = json_decode($result, true);
    $accesstoken = $json['access_token'];

    return $accesstoken;
}

/* Generate signature */
function BRIVAgenerateSignature($path, $verb, $token, $timestamp, $payload, $secret) {
    $payloads = "path=$path&verb=$verb&token=Bearer $token&timestamp=$timestamp&body=$payload";
    $signPayload = hash_hmac('sha256', $payloads, $secret, true);
    return base64_encode($signPayload);
}


    $client_id = "Ys1MQUgYAydR2epMA4y7JfxACuW8i6y3";
    $secret_id= "Dck3V2wfuGq7xP3s";
    $timestamp = gmdate("Y-m-d\TH:i:s.000\Z");
    $secret = $secret_id;
    $token = BRIVAgenerateToken($client_id, $secret_id);

    $institutionCode = "F3UL3558642";
    
    $datas = array(
        'institutionCode' => $institutionCode ,
        'brivaNo' => $brivaNo,
        'custCode' => $custCode,
        'nama' => $email,
        'amount' => $amount,
        'keterangan' => $keterangan,
        'expiredDate' => $expiredDate
    );

    $payload = json_encode($datas, true);
    $path = "/v1/briva";
    $verb = "POST";
    $base64sign = BRIVAgenerateSignature($path, $verb, $token, $timestamp, $payload, $secret);

    $request_headers = array(
        "Content-Type:"."application/json",
        "Authorization:Bearer " . $token,
        "BRI-Timestamp:" . $timestamp,
        "BRI-Signature:" . $base64sign,
    );

    $urlPost ="https://partner.api.bri.co.id/v1/briva";
    $chPost = curl_init();
    curl_setopt($chPost, CURLOPT_URL, $urlPost);
    curl_setopt($chPost, CURLOPT_HTTPHEADER, $request_headers);
    curl_setopt($chPost, CURLOPT_CUSTOMREQUEST, "POST"); 
    curl_setopt($chPost, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($chPost, CURLINFO_HEADER_OUT, true);
    curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);

    $resultPost = curl_exec($chPost);
    $httpCodePost = curl_getinfo($chPost, CURLINFO_HTTP_CODE);
    curl_close($chPost);

    // echo "Response Post : ".$resultPost;
    $json = json_decode($resultPost, true);
    // return json_decode($resultPost, true);


$error = $json['errDesc'];
$statusJSON = $json['status'];
// echo "ERROR ->". $error;
// echo "STATUS ->". $status;

if($statusJSON===false){
        echo "<script>
alert('$error');
exit();
</script>";
        }
            else{
            $cmd = mysqli_query($koneksi,"SELECT * FROM proses_transaksi WHERE custCode='$custCode' AND del_endpoint='0'");
            $cek = mysqli_num_rows($cmd);
            if($cek > 0){   
            echo "<script>alert('CustCode Sudah Digunakan !!'); location.href='index.php';</script>";
            }else{
        	$sql = "INSERT INTO proses_transaksi (email,brivaNo,custCode,expiredDate,status,tanggal_bayar,amount,keterangan,kode_bayar) 
        	VALUES ('$email','$brivaNo','$custCode','$expiredDate','$status','$tanggal_bayar','$amount','$keterangan','$kode_bayar')";
        	$queque = mysql_query($sql);
    
        	if ($queque) {
        		echo "<script>alert('Proses Berhasil !!'); location.href='index.php?p=statuspayment&id=".$custCode."';</script>";
        	} else {
        		echo "<script>alert('Proses Gagal !!'); location.href='index.php';</script>";
        	}
        }
    }
}
?>