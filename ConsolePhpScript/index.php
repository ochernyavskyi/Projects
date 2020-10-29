<?php
// Task 3
unset($argv[0]);
$inputArray = explode(" ", $argv[1]);
$numArray = [];
$finalArray = [];
for ($i = 0, $length = count($inputArray); $i < $length; $i++) {
    if (is_numeric($inputArray[$i])) {
        $numArray[] = $inputArray[$i];
    }
}

for ($i = 0, $length = count($numArray); $i < $length; $i++) {
    if (!stripos($numArray[$i], '.')) {
        $finalArray[] = (int)$numArray[$i];
    }
}
sort($finalArray);
$finalArray = array_unique($finalArray);
var_dump($finalArray);
