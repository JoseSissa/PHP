<?php

/** Callbacks
 *  
 */

// Callbacks are functions that are passed as parameters

$number = [1, 2, 3, 4, 5, 6];

function process(array $arr, callable $fn): array
{
    $newArray = [];
    foreach ($arr as $number) {
        $newElem = $fn($number);
        $newArray[] = $newElem;
    }
    return $newArray;
}

$result1 = process($number, fn(int $number) => $number * 2);
print_r($result1);
