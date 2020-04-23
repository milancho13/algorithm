<?php

ini_set('display_errors', "On");


/*
Boyer Moore法
見つけたい文字(パターン)の末尾から探していく
テキストの頭から進める。
パターンに含まれて居ない文字の場合はパターンの数分ずらす
パターンに含まれている場合は、最小限の移動
*/

//mb_internal_encoding("UTF-8");

var_dump(bMSearch('テストトテスト', 'テストトテスト'));                            //true
echo '<br>';
var_dump(bMSearch('テストトテストトトト', 'テストトテスト'));                      //true
echo '<br>';
var_dump(bMSearch('テストトテストストトテストテテテテテ', 'テストトテスト'));       //true
echo '<br>';

var_dump(bMSearch('テスト', 'テストトテスト'));                                   //false

function bMSearch($text, $pattern)
{
    $tLength = mb_strlen($text);
    $pLength = mb_strlen($pattern);
    $shifTable = [];

    for ($i = 0; $i < $pLength - 1; $i++) {
        $shifTable[mb_substr($pattern, $i, 1, 'UTF-8')] = $pLength - $i - 1;
    }

    if (!array_key_exists(mb_substr($pattern, $pLength - 1, 1, 'UTF-8'), $shifTable)) {
        $shifTable[mb_substr($pattern, $pLength - 1, 1, 'UTF-8')] = $pLength;
    }

    $tIndex = $pLength - 1;
    while ($tIndex  < $tLength) {
        $pp = $pLength - 1;

        while (mb_substr($text, $tIndex, 1, 'UTF-8') == mb_substr($pattern, $pp, 1, 'UTF-8')) {
            if ($pp == 0) {
                return true;
            }

            $tIndex--;
            $pp--;
        }

        if (isset($shifTable[mb_substr($text, $tIndex, 1, 'UTF-8')])) {
            $tIndex = $tIndex + MAX($shifTable[mb_substr($text, $tIndex, 1, 'UTF-8')], $pLength - $pp);
        } else {
            $tIndex = $tIndex + $pLength;
        }
    }

    return false;
}
