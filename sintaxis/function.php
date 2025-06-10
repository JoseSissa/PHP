<?php

// hi("World");
// function hi($name) {
//     echo "Hello $name";
// }

echo add(1, 2);
function add($a, $b) {
    $result = $a + $b;
    return $result;
}

echo substract(1, "3");
function substract(int $a, int $b): int {
    $result = $a - $b;
    return $result;
}