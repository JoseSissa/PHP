<?php

/** Pipe
 *  
 */

function showNames(...$names)
{
    foreach ($names as $name) {
        echo $name . "<br>";
    }
}

showNames("John", "Mary", "Peter");

function pipe(...$fns)
{
    return function ($value) use ($fns) {
        foreach ($fns as $fn) {
            $value = $fn($value);
        }

        return $value;
    };
}

$toUpper = fn(string $name) => strtoupper($name);
$replaceSpace = fn(string $name) => str_replace(" ", "", $name);
$replaceNumber = fn(string $name) => preg_replace('/\d+/u', "", $name);

$myPipe = pipe($toUpper, $replaceSpace, $replaceNumber);
$result = $myPipe("John Doe 23");
echo $result;
