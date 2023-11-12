<?php
  include "../koneksi.php";
  $id = $_GET['id'];
  $username = $_GET['email'];
        $loadregist = mysql_query("SELECT * FROM pendaftar WHERE email='$username'");
        $cekrow = mysql_num_rows($loadregist);
        if($cekrow > 0){
         $insert = mysql_query("insert into tr_ikut_ujian values('','3','$id','109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168',
         '109:B,110:B,111:A,112:D,113:C,114:B,115:C,116:B,117:A,118:A,119:D,120:A,121:C,122:B,123:B,124:C,125:B,126:B,127:E,128:C,129:B,130:A,131:B,132:C,133:C,134:B,135:D,136:B,137:C,138:B,139:A,140:E,141:D,142:A,143:B,144:C,145:E,146:D,147:E,148:C,149:E,150:D,151:C,152:A,153:B,154:C,155:A,156:A,157:D,158:C,159:C,160:D,161:A,162:D,163:B,164:A,165:B,166:C,167:E,168:B',
         '42','70.00','70.00','2022-01-28 13:40:06','2022-01-28 15:10:06','N')");   
         if($insert){
             echo "<script>alert('Berhasil Disimpan !!'); location.href='index.php?p=status';</script>";
            }else{
                echo "<script>alert('Gagal Disimpan !!'); location.href='index.php?p=status';</script>";
            }
        }else{
            echo "<script>alert('Data tidak ada, silahkan isi formulir !!'); location.href='index.php?p=pendaftaran';</script>";
        }
?>