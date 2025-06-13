<?php

/** Closure
 *  
 */

function add(float $number)
{
    return function (float $number2) use ($number): float {
        return $number + $number2;
    };
}

$s1 = add(10);
echo $s1(20) . "<br>";
echo $s1(10) . "<br>";
echo $s1(100) . "<br>";

function hi()
{
    $count = 0;
    return function () use (&$count) {
        $count++;
        return "Hola, $count <br>";
    };
}

$h1 = hi();
echo $h1();
echo $h1();
echo $h1();
$h2 = hi();
echo $h2();
echo $h1();
