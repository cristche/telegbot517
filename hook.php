<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '410216312:AAHOrXDU7x7knIhyhFy2AnE_s5UN_HW9J74';
$bot_username = 'FCCWBot';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Handle telegram webhook request
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    // log telegram errors
    // echo $e->getMessage();
}