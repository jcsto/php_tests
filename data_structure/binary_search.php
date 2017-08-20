<?php
$a = [2, 3, 4, 8, 0, -2, 10];
$num = 10;

// FIRST STEP IS TO SORT
sort($a);
//  [-2, 0, 2, 3, 4, 8, 10]

function binarySearch($num, $a)
{
    $res = false;
    $tot = count($a);
    $high = $tot - 1;
    $low = 0;
    
    for ($i = 0; $i < $tot; $i++) {
        $mid = ($high + $low) / 2;
        
        if ($a[$mid] == $num) {
            $res = (int) $mid;
            break;
        } elseif ($a[$mid] > $num)
            $high = $mid;
        elseif ($a[$mid] < $num)
            $low = $mid;
        
        if ($a[$high] == $num) {
            $res = $high;
            break;
        }
    }
    return $res;
}

// CALL BINARY SEARCH FUNCTION
$res = binarySearch($num, $a);
if ($res !== false)
    echo 'The value ' . $num . ' was found in the index: ' . $res;
else
    echo 'The value ' . $num . ' is not in the list.';