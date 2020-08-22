<?php

$list = [10,6,3,11,4];
$length = count($list);

$givenValue = 11;

//-1 as index value
$isFind = -1;

for ($i=0; $i < $length; $i++) {
    if ($list[$i] == $givenValue) {
        $isFind = $i;
        break;
    }
}

echo "found! at $i";
