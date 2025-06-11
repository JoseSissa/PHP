<?php

$beer = new stdClass();


$beer->name = "Lager";
$beer->price = 5.99;

print_r($beer);
echo "<br>";
var_dump($beer);
echo "<br>";
echo $beer->name;
$beer->name = "Corona";
echo "<br>";
echo $beer->name;
echo "<br>";

// transform stdClass to array and array to stdClass

$arr = (array)$beer;
print_r($arr);
echo "<br>";
echo $arr["name"];

$arrBeer = [
    "address" => "123 Main St.",
    "website" => "https://jose-sissa.vercel.app/"
];

$obj = (object)$arrBeer;
echo $obj->address;
