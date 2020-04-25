<?php

$list = range(0, 100000, 1);

$startTime = microtime(true);
$listCount = count($list);

define('SEARCHINGVALUE', 95400);

$firstIndex = 0;
$lastIndex = $listCount - 1;

$isFind = false;

do {
    $centerIndex = (int) (($firstIndex + $lastIndex) / 2);
    if ($list[$centerIndex] == SEARCHINGVALUE) {
        $isFind = true;
        echo 'found. the key is' . $centerIndex;
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
