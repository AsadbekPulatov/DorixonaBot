<?php

include 'Telegram.php';
require_once 'User.php';
require_once 'Drug.php';

$bot_token = "6218862478:AAEuzoqa2QGdDFSeiP4N3mxo42x0dOj73Ac";
$telegram = new Telegram($bot_token);

$chat_id = $telegram->ChatID();
$text = $telegram->Text();
$first_name = $telegram->FirstName();

$video = "https://www.youtube.com/watch?v=I-SERw0jz-M";

$telegram->sendVideo([
    'chat_id' => $chat_id,
    'video' => $video,
    'caption' => "Yangi foydalanuvchi: $first_name",
]);

$user = new User($chat_id);
$page = $user->getPage();

if ($text == "/start") {
    $user->createUser($chat_id, $first_name);
    showMainPage();
} else {
    switch ($page) {
        case "main":
            switch ($text) {
                case "Dorilar ro'yxati 📁":
                    showList();
                    break;
                case "Dorini qidirish 🔎":
                    askDrug();
                    break;
            }
            break;
        case "search":
            searchDrug($text);
            break;
        case "result":
            showDrug($text);
            break;
    }
}

function showMainPage()
{
    global $chat_id, $telegram, $user;
    $user->setPage("main");

    $text = "Dorixona botiga xush kelibsiz!";

    $options = [
        [$telegram->buildKeyboardButton("Dorilar ro'yxati 📁"), $telegram->buildKeyboardButton("Dorini qidirish 🔎")],
    ];
    $keyboard = $telegram->buildKeyBoard($options, false, true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyboard,
        'text' => $text,
    ];
    $telegram->sendMessage($content);
}

function showList(){
    global $chat_id, $telegram, $user;
    $user->setPage("result");

    $text = "Dorilar ro'yxati";
    $drug = new Drug();
    $drugs = $drug->getDrugs();
    $options = [];
    foreach ($drugs as $item) {
        $options[] = [$telegram->buildKeyboardButton($item['name'])];
    }
    $keyboard = $telegram->buildKeyBoard($options, false, true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyboard,
        'text' => $text,
    ];
    $telegram->sendMessage($content);
}

function askDrug(){
    global $chat_id, $telegram, $user;
    $user->setPage("search");

    $text = "Dori nomini kiriting";
    $content = [
        'chat_id' => $chat_id,
        'text' => $text,
    ];
    $telegram->sendMessage($content);
}

function searchDrug($name){
    global $chat_id, $telegram, $user;
    $user->setPage("result");

    $text = "Qidiruv natijalari:";
    $drug = new Drug();
    $drugs = $drug->searchDrug($name);
    $options = [];
    foreach ($drugs as $item) {
        $options[] = [$telegram->buildKeyboardButton($item['name'])];
    }
    $keyboard = $telegram->buildKeyBoard($options, false, true);
    $content = [
        'chat_id' => $chat_id,
        'reply_markup' => $keyboard,
        'text' => $text,
    ];
    $telegram->sendMessage($content);
}

function showDrug($name){
    global $chat_id, $telegram, $user;
    $user->setPage("result");

    $text = "Dori haqida ma'lumot:";
    $drug = new Drug();
    $drugs = $drug->searchDrug($name);
    $drug = $drugs[0];
    $text .= "\nNomi: " . $drug['name'];
    $text .= "\nQo'llanilishi: " . $drug['description'];
    $text .= "\nNarxi: " . $drug['price']." so'm";
    $text .= "\nSoni: " . $drug['count']." ta";
    $content = [
        'chat_id' => $chat_id,
        'text' => $text,
    ];
    $telegram->sendMessage($content);
}

?>