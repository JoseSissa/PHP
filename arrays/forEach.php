<?php

$names = ["José", "Juan", "Pedro"];

foreach ($names as $name) {
    echo $name."<br>";
}

$beer = [
    "name" => "Budweiser",
    "alcohol" => 12,
    "country" => "Germany",
];

foreach ($beer as $key =>$value) {
    echo $key.": ".$value."<br>";
}