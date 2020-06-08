<?php

/*
Selection sort
repeatedly finding the minimum element from unsorted part.
*/

$list = range(0, 200, 1);
shuffle($list);

echo '<pre>';
var_dump($list);
echo 'would be sorted';
echo '</pre>';

$listCount = count($list);
$isChanged = false;

for ($sortedCount = 0; $sortedCount < $listCount; $sortedCount++) {
    //最小値のキーの変数を定義。まずは基準位置をセットする
    $minKey = $sortedCount;
    
    //find minimum
    for ($i = $sortedCount + 1; $i < $listCount; $i++) {
        if ($list[$i] < $list[$sortedCount]) {
            $minKey = $i;
            //echo $list[$sortedCount];
            $isChanged = true;
        }
        if ($isChanged) {
            $tmp = $list[$sortedCount];
            $list[$sortedCount] = $list[$minKey];
            $list[$i] = $tmp;
            //echo $tmp;
            $isChanged = false;
        }
    }   
}

echo 'done sort';
echo '<pre>';
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}
echo '</pre>';