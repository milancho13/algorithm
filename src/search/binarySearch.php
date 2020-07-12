 <?php


function binarySearch($arr, $key, $start, $end)
{
    $query = 0;

    //初めて
    if ($query = 0) {
        $cnt = count($arr);
        //echo $cnt . "<br>";
    
        //真ん中を割り出す
        $mid = floor($cnt / 2);
        echo $mid . "<br>";
        // echo $arr[$mid];
    }

    //2回目以降
    if ($query != 0) {
        $base = $cnt;
        $cnt = count($arr);
        //echo $cnt . "<br>";

        //真ん中を割り出す
        $mid = floor($cnt / 2) + $base;
        echo $mid . "<br>";
    }

    //真ん中だったら
    if ($arr[$mid] === $key) {
        //echo "s";
        return $arr[$mid];
    }

    //真ん中より大きかったら
    if ((int)$arr[$mid] < $key) {
        //echo "aaa";
        //arrの左側を捨てる
        $arr = range((int)$arr[$mid], $end, 1);
        //print_r($arr);
        return binarySearch($arr, $key, $start, $end);
    }

    //真ん中より小さかったら
    if ($key <= $arr[$mid]) {
        //echo "b";
        //arrの右側を捨てる
        $arr = range($start, (int)$arr[$mid], 1);
        return binarySearch($arr, $key, $start, $end);
    }

    return false;
}

$key = 7;
$start = 1;
$end = 10;

$arr = range($start, $end, 1);
//print_r($arr);

//echo "given data is" . $key . "</br>";

$result = binarySearch($arr, $key, $start, $end);
// if (!$result) {
//     echo "element is not in this array";
// } else {
//     echo "element is at index at " . $result;
// }
