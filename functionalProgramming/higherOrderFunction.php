<?php

/** Higher order function
 *  Functions that take functions as parameters or return functions
 */

$some = function (int $a, int $b): int {
    return $a + $b;
};

function mul(int $a, int $b): int
{
    return $a * $b;
}

/** 
 *  Function that takes a function as parameter
 *  Callable means that the function can be called as a variable
 */
function show(callable $fn, float $a, float $b)
{
    echo $fn($a, $b);
}

show($some, 10, 20);
show("mul", 10, 20);
