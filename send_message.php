
<?php
// Получение параметра сообщения
$message = $_POST['message'];

// Замените 'YOUR_BOT_TOKEN' на свой токен бота Telegram
$botToken = '6020094789:AAEraLAOChuB8Y5qp8uNk1Q4GsITY8N7TYE';
// Замените 'TARGET_USER_ID' на фактический идентификатор пользователя
$chatID = '330685';

// Формирование URL для отправки запроса
$url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
$data = array(
    'chat_id' => $chatID,
    'text' => $message
);

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === false) {
    echo "Ошибка при отправке сообщения в Telegram.";
} else {
    echo "Сообщение успешно отправлено в Telegram!";
}
?>

