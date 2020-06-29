<?php

ini_set('display_errors', "On");

/*
* HashSearch
* 1. Generate the hash value by Hash Function
* 2. Adding the hash value to the the hash table
* 3. Search the value from hash table
*
*/


    require_once '../part/Bucket.php';
    require_once '../part/ChainHashBox.php';

    $chainHashBox = new ChainHashBox(10);
    // $chainHashBox->add(1);
    $chainHashBox->add(2);
    // $chainHashBox->add(3);
    // // $chainHashBox->add(4);
    // $chainHashBox->add(5);
    // $chainHashBox->add(6);
    // $chainHashBox->add(7);
    // $chainHashBox->add(8);
    // $chainHashBox->add(9);
    // $chainHashBox->add(10);
    // $chainHashBox->add(15);
    // $chainHashBox->add(25);

    // echo '<pre>';
     $list = $chainHashBox->getList();
    // var_dump($list);
    // echo '<br>';

     $searchingValue = 2;
     $key = $chainHashBox->search($searchingValue);
    if ($key) {
        echo $searchingValue . 'is in [' . $key . ']';
        var_dump($list[$key]);
    } else {
        echo $searchingValue . 'is not in the list';
    }
    echo '<br>';
