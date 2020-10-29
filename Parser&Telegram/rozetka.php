<?php
include 'telegram.php';
$link = 'https://rozetka.com.ua/news-articles-promotions/promotions/';
$content = file_get_contents($link);
$startPoint = 'promo-cat-i-container">';
$endPoint = 'style="border:none"';

function strposall($content, $startPoint)
{

    $s = 0;
    $i = 0;

    while (is_integer($i)) {

        $i = strpos($content, $startPoint, $s);

        if (is_integer($i)) {
            $aStrPos[] = $i;
            $s = $i + strlen($startPoint);
        }
    }
    if (isset($aStrPos)) {
        return $aStrPos;
    } else {
        return false;
    }
}

$arrStrPos = strposall($content, $startPoint);

$arrStartBlocks = [];

for ($i = 0, $length = count($arrStrPos); $i < $length; $i++) {
    $arrStartBlocks[$i] = substr($content, $arrStrPos[$i]);
}

function arrayToStringTitle($arrStartBlocks, $endPoint, $startPoint)
{
    $block1 = (string)$arrStartBlocks;
    $endPoint = strpos($block1, $endPoint);
    $resTitle = trim(substr($block1, 0, $endPoint));
    $resTitle = str_replace($startPoint, '', $resTitle);
    $start = strpos($resTitle, 'title=') + 7;
    $startImg = strpos($resTitle, '<img src="') + 10;
    $endImg = strpos($resTitle, 'width');
    return $resTitle = substr($resTitle, $start, -1);
}
function arrayToStringImage($arrStartBlocks, $endPoint, $startPoint)
{
    $block1 = (string)$arrStartBlocks;
    $endPoint = strpos($block1, $endPoint);
    $resTitle = trim(substr($block1, 0, $endPoint));
    $startImg = strpos($resTitle, '<img src="') + 10;
    $endImg = strpos($resTitle, 'width');
    return $resImg[] = substr($resTitle, $startImg, $endImg - $startImg-2);


}
$finalTitle = [];
for ($i=0; $i<11; $i++){
    $finalTitle[$i] = arrayToStringTitle($arrStartBlocks[$i], $endPoint, $startPoint);

}

$finalImage = [];
for ($i=0; $i<11; $i++) {
    $finalImage[$i] = arrayToStringImage($arrStartBlocks[$i], $endPoint, $startPoint);
}

$prevData = unserialize(file_get_contents('titleSent.txt'));
if (!$prevData) {
    $prevData = [];
}

$prevDataImg = unserialize(file_get_contents('imgSent.txt'));
if (!$prevDataImg) {
    $prevDataImg = [];
}

$imgDifference =  array_diff($finalImage, $prevDataImg);

$titleDifference =  array_diff($finalTitle, $prevData);

if ($titleDifference && $imgDifference){
    for ($i=0, $length = count($titleDifference) ; $i<$length; $i++) {
        sendTelegram($titleDifference[$i]);
        sendTelegram($imgDifference[$i]);
    }
    $titleSent = file_put_contents('titleSent.txt', serialize($finalTitle));
    $imgSent = file_put_contents('imgSent.txt', serialize($finalImage));
}
echo 'Parsing completed';