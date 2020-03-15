<?php 

/* 
 * Hash-based Search
 * 
 * convert data to hashed data following a pattern
 * and search by comparing the hashed data
 * 
 */

require_once '../part/Bucket.php';
require_once '../part/ChainHashBox.php';

$chainHashBox = new ChainHashBox(10);
$chainHashBox->add(1);
$chainHashBox->add(2);
$chainHashBox->add(3);
$chainHashBox->add(4);
$chainHashBox->add(5);
$chainHashBox->add(6);
$chainHashBox->add(7);
$chainHashBox->add(8);
$chainHashBox->add(9);
$chainHashBox->add(10);
$chainHashBox->add(15);
$chainHashBox->add(25);

echo '<pre>';
$list = $chainHashBox->getList();
//var_dump($list);
echo '<br>';

echo '探索のテスト';
echo '1の探索テスト';
$searchingValue = 1;
$key = $chainHashBox->search($searchingValue);
if ($key) {
    echo $searchingValue . 'はlist[' . $key . ']に格納されています。';
    //var_dump($list[$key]);
}

echo '</pre>';

?>