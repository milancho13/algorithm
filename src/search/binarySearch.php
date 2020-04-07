<?php

/*
* Binary Search
*
*
*/

/*
* whether 95400 is in array
*/

//create array
$list = range(0, 100000, 1);

$startTime = microtime(true);
$listCount = count($list);

define('SEARCHINGVALUE', 95400);

$firstIndex  = 0;
$lastIndex   = $listCount - 1;

$isFind = false;

do {
    $centerIndex = (int) (($firstIndex + $lastIndex) / 2);
    if ($list[$centerIndex] == SEARCHINGVALUE) {
        $isFind = true;
        echo "found. The key id is " . $centerIndex;
        break;
    } else if ($list[$centerIndex] < SEARCHINGVALUE) {
        $firstIndex = $centerIndex + 1;
    } else if ($list[$centerIndex] > SEARCHINGVALUE) {
        $lastIndex = $centerIndex - 1;
    }
} while ($firstIndex <= $lastIndex);

if (!$isFind) {
    echo 'not found';
}

$endTime = microtime(true);
$deltaTime = $endTime - $startTime;
echo ('<br>処理にかかった時間は' . $deltaTime . 'ミリ秒です');
