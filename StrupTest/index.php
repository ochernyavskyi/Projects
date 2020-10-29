<?php
// Task 2
$arr = ['red', 'blue', 'green', 'yellow', 'lime', 'magenta', 'black', 'gold', 'gray', 'tomato'];
//    'red' => '255,0,0',
//    'blue' => '0,0,255',
//    'green' => '0,255,0',
//    'yellow' => '255,255,0',
//    'lime' => '50,205,50',
//    'magenta' => '255,0,255',
//    'black' => '0,0,0',
//    'gold' => '255,215,0',
//    'gray' => '207,207,207',
//    'tomato' => '255,99,71'
//];
$arr2 = ['255,0,0', '0,0,255', '0,255,0', '255,255,0', '50,205,50', '255,0,255', '0,0,0', '255,215,0', '207,207,207', '255,99,71'];
$color = '0,0,0';
for ($j = 0; $j < 5; $j++) {
    for ($i = 0; $i < 5; $i++) {
        $randInt = rand(0, 9);
        $randCol = rand(0, 9);
        do {
            $randCol = rand(0, 9);
        } while ($randInt == $randCol);
        $color = $arr2[$randCol];
        echo "<span style='color: rgb($color)'>" . $arr[$randInt] . ' ' . "</span>";
    }
    echo "</br>";
}
