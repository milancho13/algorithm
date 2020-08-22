 <?php


function binarySearch($arr, $l, $r, $x)
{
    while ($l <= $r) {

        //calculate middle value
        $mid = $l + ($r-$l) /2 ; //★

        //check if x is present at mid
        if ($arr[$mid] == $x) {
            return floor($mid);
        }
        
        //if x is greater, ignore left half
        if ($arr[$mid] < $x) {
            $l = $mid + 1; //★ right next to middle would be the first value
        //echo $l;
        } else { //if x is smaller, ignore right half
            $r = $mid - 1; //★ left next to middle would be the last value
        }
    }
    return -1;
}

//array
$arr = array(2, 3, 4, 10, 40);

//counf array
$n = count($arr);

//target
$x = 10;

//call binarySearch function
$result = binarySearch($arr, 0, $n-1, $x);

echo "given data is " . $x . "</br>";

if ($result == -1) {
    echo "element is not in this array";
} else {
    echo "element is at index at " . $result;
}
