<?php

/*
* Merge Sort
* divide and conquer algorithm.
* 1. Diveide the unsorted list into n sublists, each containing one element
* 2. Repeatedly merge sublists to produce new sorted sublists until there is only sublist remaining.
*
*/


//create 0 ~ 200 array
$list = range(0, 200, 1);
//shufle the array
shuffle($list);

echo "the target array is" . $list;

$listCount = count($lits);

mergeSort($list, 0, $listCount);

echo "done sort";
foreach ($list as $value) {
    echo $value;
}

function mergeSort(&$list, $first, $last)
{

    if ($first < $last) { //conditions (to finish its roop)
        $center = intval(($first + $last) / 2);
        $p      = 0;
        $j      = 0;
        $k      = $first;
        $tmp    = null;

        //sort first half
        mergeSort($list, $first, $center);
        //sort later half
        mergeSort($list, $center + 1, $last);

        //from below, integrate after compare first and last half

        //save sorted first half into turnout-array
        for ($i = $first; $i <= $center; $i++) {
            $tmp[$p++] = $list[$i];
        }

        //until $i goes to the last and research $tmp
        //$i = $center +1 compares right and left
        //$p = $center +1
        //$j starts with 0
        //$k starts with 0 ($first if it's in roop)
        while ($i <= $last && $j < $p) {
            if ($tmp[$j] <= $list[$i]) {
                //when first half is smaller than last half
                $list[$k] = $tmp[$j];
                $k++;
                $j++;
            } else {
                //when last half is smaller than first half
                $list[$k] = $list[$i];
                $k++;
                $i++;
            }
        }

        //if there is remained turnout-array, add all to conditions array
        while ($j < $p) {
            $list[$k++] = $tmp[$j++];
        }
    }
}
