<?php
include "../koneksi.php";
$tglbyr = $_POST['tanggal'];
$now = date('Ymd', strtotime($tglbyr));
$cc = $_GET['custCode'];
$iCdel = 'F3UL3558642';
$brivaNodel = '12775'; 
$load = "SELECT * FROM proses_transaksi WHERE custCode='$cc'";
$query = mysql_query($load);
$fetch = mysql_fetch_array($query);
$tgl = $fetch['tanggal_bayar'];
// $now = date(Ymd);
// $now = '20211210';
// echo $tgl."/".$tgl;
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
    $brivaNo = "12775/";
    $institutionCode = "F3UL3558642/";
    $times = $now."/".$now;

    $payload = "";
    $path = "/v1/briva/report/".$institutionCode .$brivaNo .$times;
    $verb = "GET";
    $base64sign = BRIVAgenerateSignature($path, $verb, $token, $timestamp, $payload, $secret);
    $request_headers = array(
        "Content-Type:"."application/json",
        "Authorization:Bearer " . $token,
        "BRI-Timestamp:" . $timestamp,
        "BRI-Signature:" . $base64sign,
    );

    $urlGet ="https://partner.api.bri.co.id/v1/briva/report/".$institutionCode .$brivaNo .$times;
    $chGet = curl_init();
curl_setopt($chGet,CURLOPT_URL,$urlGet);

$request_headers = array(
                    "Authorization:Bearer " . $token,
                    "BRI-Timestamp:" . $timestamp,
                    "BRI-Signature:" . $base64sign
                );
                curl_setopt($chGet, CURLOPT_HTTPHEADER, $request_headers);
                curl_setopt($chGet, CURLINFO_HEADER_OUT, true);
                
                
                // curl_setopt($chGet, CURLOPT_CUSTOMREQUEST, "GET");  //for updating we have to use PUT method.
                curl_setopt($chGet, CURLOPT_RETURNTRANSFER, true);
                
                $resultGet = curl_exec($chGet);
                $httpCodeGet = curl_getinfo($chGet, CURLINFO_HTTP_CODE);
                // $info = curl_getinfo($chGet);
                // print_r($info);
                curl_close($chGet);
                
                $data = json_decode($resultGet, true);
                // echo "Response Post : ".$resultGet;
                $error = $data['errDesc'];
                $statusJSON = $data['status'];
                if($statusJSON===false){
                echo "<script>alert('$error'); location.href='$url/calonmahasiswa/index.php?p=statusbayar';</script>";
                        }
                        

foreach($data['data'] as $datas){
if ($datas['custCode'] == $cc){
                   
                $command = mysql_query("UPDATE proses_transaksi SET status='y' WHERE custCode='$cc'");
                
                if ($command) {
                    echo "<script>alert('SUKSES!!'); location.href='$url/calonmahasiswa/index.php?p=statusbayar';</script>";
                    $payload = "institutionCode=".$iCdel."&brivaNo=".$brivaNodel."&custCode=".$cc;
                    $path = "/v1/briva";
                    $verb = "DELETE";
                    $base64sign = BRIVAgenerateSignature($path, $verb, $token, $timestamp, $payload, $secret);
                
                    $request_headers = array(
                        "Authorization:Bearer " . $token,
                        "BRI-Timestamp:" . $timestamp,
                        "BRI-Signature:" . $base64sign,
                		
                    );
                
                    $urlPost ="https://partner.api.bri.co.id/v1/briva";
                    $chPost = curl_init();
                    curl_setopt($chPost, CURLOPT_URL, $urlPost);
                    curl_setopt($chPost, CURLOPT_HTTPHEADER, $request_headers);
                    curl_setopt($chPost, CURLOPT_POSTFIELDS, $payload);
                    curl_setopt($chPost, CURLINFO_HEADER_OUT, true);
                    curl_setopt($chPost, CURLOPT_CUSTOMREQUEST, "DELETE");
                    curl_setopt($chPost, CURLOPT_RETURNTRANSFER, true);
                    
                    $resultPost = curl_exec($chPost);
                    $httpCodePost = curl_getinfo($chPost, CURLINFO_HTTP_CODE);
                    curl_close($chPost);
                
                    // echo "<br/> <br/>";
                    // echo "Response Post : ".$resultPost;
                    return json_decode($resultPost, true);
                    
            		

            		
                    
            	
        }
    
} 
// else {
//             		echo "<h1>Transaksi Belum Selesai</h1>
//             		<script>
//             		setTimeout(function(){ window.location.href='$url/calonmahasiswa/index.php?p=statusbayar'; }, 2000);
//             		</script>"
//             		;
//             	}
}
?>
