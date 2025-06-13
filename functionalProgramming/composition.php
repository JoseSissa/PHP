<?php

/** Composition
 * 
 */

function composition($fn1, $fn2)
{
    return function ($value) use ($fn1, $fn2) {
        return $fn1($fn2($value));
    };
}

$add10 = fn($n) => $n + 10;
$mul20 = fn($n) => $n * 20;

$compo = composition($add10, $mul20);
echo $compo(5);
