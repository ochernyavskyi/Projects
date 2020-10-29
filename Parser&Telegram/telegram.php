<?php
$chat_number='';

function sendTelegram ($title, $chat_number)
{
    $ch = curl_init('https://api.telegram.org/bot1158409988:AAHSbPjh3woP6Xgi9x2vMYzdJ5_MpZFi3d0/sendMessage?chat_id=' . $chat_number . '&text=' . $title);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}