<?php

include 'Telegram.php';
require_once 'User.php';

$bot_token = "6218862478:AAEuzoqa2QGdDFSeiP4N3mxo42x0dOj73Ac";
$telegram = new Telegram($bot_token);

$chat_id = $telegram->ChatID();
$text = $telegram->Text();

$data = $telegram->getData();
$message = $data['message'];

$user = new User($chat_id);
$page = $user->getPage();

if ($text == "/start") {
    showMainPage();
} else {
    switch ($page) {
        case "language":
            switch ($text) {
                case "English 🇺🇸":
                    $user->setLanguage("eng");
                    showMainPage();
                    break;
                case "Русский 🇷🇺":
                    $user->setLanguage("ru");
                    showMainPage();
                    break;
                case "O'zbek tili 🇺🇿":
                    $user->setLanguage("uz");
                    showMainPage();
                    break;
            }
            break;
    }
}

function showMainPage()
{
    global $chat_id, $telegram, $user;
    $user->setPage("main");

    $text = "Dorixona botiga xush kelibsiz!";

    $options = [
        [$telegram->buildKeyboardButton("Dorilar ro'yxati 📁"), $telegram->buildKeyboardButton("Dorini qidirish 💊")],
    ];
    $keyboard = $telegram->buildKeyBoard($options, false, true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyboard,
        'text' => $text,
    ];
    $telegram->sendMessage($content);
}

?>