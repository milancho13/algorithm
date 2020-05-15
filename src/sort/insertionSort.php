<?php


/*
* Insertion Sort
*
*/

$list = range(0, 200, 1);
shuffle($list);

//var_dump($list);

$listCount = count($list);

for ($sortedCount = 1; $sortedCount < $listCount; $sortedCount++) {
    //find one which will be inserted
    $tmp = $list[$sortedCount];
    //var_dump($tmp);

    //find sorted place 
    for ($index = $sortedCount; $index >= 1 && $list[$index - 1] > $tmp; $index--) {
        $list[$index] = $list[$index - 1];
        //var_dump($list[$index]);
        
    }

    $indexMinusOne = $index;
    $list[$indexMinusOne] = $tmp;

    //var_dump($list[$indexMinusOne]);
    //var_dump($list);
    
}

echo 'Done sort';
echo '<pre>';
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}
echo '</pre>';
