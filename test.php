<?php

// Telegram bot access token
$token = '6218862478:AAEuzoqa2QGdDFSeiP4N3mxo42x0dOj73Ac';

// YouTube video URL
$videoUrl = 'https://www.youtube.com/watch?v=I-SERw0jz-M';

// Telegram chat ID
$chatId = '967469906';

// Create the API URL
$url = 'https://api.telegram.org/bot' . $token . '/sendVideo';

// Prepare the video data
$data = [
    'chat_id' => $chatId,
    'video' => $videoUrl,
];

// Send the video using cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Handle the response
if ($response === false) {
    echo 'Failed to send the video.';
} else {
    $responseData = json_decode($response, true);
    if ($responseData['ok'] === true) {
        echo 'Video sent successfully.';
    } else {
        echo 'Failed to send the video. Error: ' . $responseData['description'];
    }
}
?>
