<?php


/*
*Bubble sort
* repeatedly swapping the adjacent elemente if they are wrong order. 
*/

//$list = [9, 8, 7, 6, 5, 4, 3, 2, 1, 0];
$list = [9,0,1,2,3,4,5,6,7,8];

$listCount = count($list);

$sortedCount = 0;

while ($sortedCount < $listCount - 1) {

    $last = $listCount - 1;

    for ($index = $listCount - 1; $index > $sortedCount; $index--) {
        if ($list[$index - 1] > $list[$index]) {
            //change the value
            $tmp = $list[$index - 1];
            $list[$index - 1] = $list[$index];
            $list[$index] = $tmp;

            $last = $index;
            //print_r($last);
        }
    }

    $sortedCount = $last;
    //echo $sortedCount . 'done sort';
}

echo '<p>done</p>';
echo '<pre>';
var_dump($list);
echo '</pre>';
