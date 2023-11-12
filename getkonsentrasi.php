<?php
function filter_param($text,$html=true){
        $e_s=array('\\','\'','"');
		$d_s=array('','','');
		$text = preg_replace( "']*>.*?'si", '', $text );
        $text = preg_replace( '/]*>([^<]+)<\/a>/is', '\2 (\1)', $text );
        $text = preg_replace( '//', '', $text );
        $text = preg_replace( '/{.+?}/', '', $text );
        $text = preg_replace( '/ /', ' ', $text );
        $text = preg_replace( '/&/', '', $text );
		$text = str_replace( $e_s, $d_s, $text );
        $text = strip_tags( $text );
        $text = preg_replace("/\r\n\r\n\r\n+/", " ", $text);
        $text = $html ? htmlspecialchars( $text ) : $text;
        return $text;
}
include "koneksi.php";
$id=filter_param($_POST['id']);
$query=mysql_query("select * from akademik_konsentrasi where prodi_id='".$id."'");

$row=mysql_num_rows($query);
if ($row > 0)
{
 while ($data=mysql_fetch_array($query))
 {
  echo "<option value=".$data["konsentrasi_id"].">".$data["jenjang"]." - ".$data["nama_konsentrasi"]."</option>";
 }
}
?>