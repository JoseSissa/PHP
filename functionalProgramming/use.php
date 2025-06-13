<?php

$const = 5;

$some = function (int $a, int $b) use ($const): int {
    return $a + $b + $const;
};

$some2 = fn(int $a, int $b) => $a + $b + $const;

echo $some(1, 2);
echo $some2(3, 4);
