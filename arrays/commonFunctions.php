<?php

$beers = [
    "Carolus",
    "Budweiser",
    "Heineken",
    "Miller"
];

$beers2 = [
    "Carolus 2",
    "Budweiser 2",
    "Heineken 2",
    "Miller 2"
];

echo count($beers)."<br>";

array_push($beers, "Heinz");

print_r($beers);

echo count($beers)."<br>";

if (in_array("Heinz", $beers)) {
    echo "Exist <br>";
}

$beerMixed = array_merge($beers, $beers2);

echo ($beerMixed);