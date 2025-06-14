<?php

require "modelsArray/functions.php";

$numbers = [1, 2, 3, 4, 5];

// Modify the original array
array_walk(
    $numbers,
    fn(&$num) => $num *= 2
);

show($numbers);

// Like a foreach loop
array_walk(
    $numbers,
    function ($num) {
        echo $num . "<br>";
    }
);

show($numbers);
