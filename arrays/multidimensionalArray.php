<?php

$beers = [
    [
        "name" => "Budweiser",
        "alcohol" => 12,
        "country" => "Germany"],
    [
        "name" => "Heineken", 
        "alcohol" => 8, 
        "country" => "Germany"
    ],
    [
        "name" => "Miller",
        "alcohol" => 4, 
        "country" => "USA"
    ],
];

echo $beers[1]["name"];

foreach ($beers as $beer) {
    foreach ($beer as $key => $value) {
        echo $key.": ".$value."<br>";
    }
}