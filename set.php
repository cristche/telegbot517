<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$bot_api_key  = '410216312:AAHOrXDU7x7knIhyhFy2AnE_s5UN_HW9J74';
$bot_username = 'FCCWBot';
$hook_url = 'https://telegbot517.herokuapp.com/hook.php';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}