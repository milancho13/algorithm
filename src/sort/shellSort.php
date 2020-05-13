<?php

/*
* Shell sort
* 1. set interval
* 2. sort the pairs of elemnts far apart from each other
* 3. reducing the interval
*
*/

//create the array
$list = range(0, 200, 1);

//shufle it
shuffle($list);

echo '<pre>';
var_dump($list);
echo '</pre>';


$listCount = count($list);

$step = 1;
for ($step_tmp = 1; $step_tmp < $listCount / 9; $step_tmp = $step_tmp * 3 + 1) {
    $step = $step_tmp;
}

while ($step > 0) {
    for ($index = $step; $index < $listCount; $index++) {
        $tmp  = $list[$index];

        for ($j = $index - $step; $j >= 0 && $list[$j] > $tmp; $j = $j - $step) {
            $list[$j + $step] = $list[$j];
        }
        $list[$j + $step] = $tmp;
    }
    $step = (int) ($step / 3);
}

echo "done sort";
echo "<br>";
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}
