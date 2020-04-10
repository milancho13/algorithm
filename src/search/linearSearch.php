<?php

/*
* linear search
* the method finding an element within a list. 
*
*/


/*
* Q. is 95400 in array?
*/

$list = range(0, 100000, 1);

$startTime = microtime(true);

define('SEARCHINGVALUE', 95400);
$length = count($list);
$isFind = false;

for ($i=0; $i < $length; $i++) {
    if ($list[$i] === SEARCHINGVALUE) {
        $isFind = true;
        echo "found";
        break;
    }
}
if (!$isFind) {
    echo "not found";
}

$endTime = microtime(true);
$deltaTime = $endTime - $startTime;
echo('<br>took' . $deltaTime . 'mm sec');