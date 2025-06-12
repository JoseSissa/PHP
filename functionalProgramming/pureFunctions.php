<?php

class Counter
{
    public int $count = 0;
}

function increment(Counter $counter)
{
    return $counter->count++ . "\n";
}

$counter = new Counter();
echo increment($counter);
echo increment($counter);
echo increment($counter);


// Pure function

function add(int $a, int $b): int
{
    return $a + $b;
}

echo add(10, 20);
echo add(10, 20);
echo add(10, 20);
