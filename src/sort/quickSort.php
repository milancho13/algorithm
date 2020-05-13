<?php

/*
* quick sort
* divide and conquer algorithm
* 1. set the "pivot" element from the array. 
* 2. partitioning the other elements into two sub-arrays, 
*    according to whether they are less than or greater than the pivot.
*
*/

//create 0~200 array
$list = range(0, 200, 1);
//shufle the array
shuffle($list);

var_dump($list);
echo "will be sorted";
echo '<br>';

$listCount = count($list);

quickSort($list, 0, $listCount);

echo "sort done";
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}

function quickSort(&$list, $first, $last)
{
    $firstPointer = $first;
    $lastPointer = $last;

    $centerValue = $list[intVal($firstPointer + $lastPointer / 2)];

    //until not sorted
    do {
        //if left side and less than pointer
        //increase pointer
        while ($list[$firstPointer] < $centerValue) {
            $firstPointer++;
        }

        //if right side and bigger than pointer
        //decrease pointer
        while ($list[$firstPointer] > $centerValue) {
            $lastPointer--;
        }

        if ($firstPointer <= $lastPointer) {
            $tmp = $list[$lastPointer];
            $list[$lastPointer] = $list[$lastPointer];
            $list[$firstPointer] = $tmp;

            $firstPointer++;
            $lastPointer--;
        }
    } while ($firstPointer <= $lastPointer);

    if ($first < $lastPointer) {
        quickSort($list, $first, $lastPointer);
    }

    if ($firstPointer < $last) {
        quickSort($list, $firstPointer, $last);
    }
}
