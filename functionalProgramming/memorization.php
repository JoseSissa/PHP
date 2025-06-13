<?php

/** Memorization
 *  
 */

// Memorization is a technique that stores the result of a function
// in a variable

function add($a, $b)
{
    return $a + $b;
}

function addMemo()
{
    $memo = [];
    return function ($a, $b) use (&$memo) {
        $index = $a . "-" . $b;

        if (isset($memo[$index])) {
            echo "operation exist in memory<br>";
            return $memo[$index];
        }

        echo "operation not exist in memory<br>";
        $memo[$index] = $a + $b;
        return $memo[$index];
    };
}

$mySum = addMemo();
echo $mySum(10, 20) . "<br>";
echo $mySum(10, 20) . "<br>";
