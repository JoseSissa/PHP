<?php

class Beer
{
    public string $name;
    public string $brand;
    public float $alcohol;
    public bool $isStrong;

    public function __construct($name, $brand, $alcohol, $isStrong)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->alcohol = $alcohol;
        $this->isStrong = $isStrong;
    }
}

$beer = new Beer("Lager", "Sierra Nevada", 5.99, true);

$json = json_encode($beer);

echo $json . "\n";

$jsonBeer = '{"name":"Lager","brand":"Sierra Nevada","alcohol":5.99,"isStrong":true}';

$beerObj = json_decode($jsonBeer);
$berrArr = json_decode($jsonBeer, true);

echo $beerObj->name . "\n";
echo $berrArr["name"] . "\n";
