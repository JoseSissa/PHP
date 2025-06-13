<?php

function show(callable $fn, int $a, int $b)
{
    echo $fn($a, $b);
}

$sum = fn(int $a, int $b) => $a + $b;

show($sum, 10, 20);
show(fn(int $a, int $b) => $a * $b, 3, 4);
