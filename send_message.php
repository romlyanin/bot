<?php

$botToken = '6020094789:AAEraLAOChuB8Y5qp8uNk1Q4GsITY8N7TYE';
$chatID = '330685';
$message = $_POST['message'];

$apiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";
$data = array(
    'chat_id' => $chatID,
    'text' => $message
);

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    // Обработка ошибки
    $error = curl_error($ch);
    echo "Ошибка при выполнении запроса: {$error}";
} else {
    // Обработка успешного результата
    echo "Сообщение успешно отправлено в Telegram!";
}

curl_close($ch);

?>
