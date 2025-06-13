<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;

$people = [
    new People("John", 20),
    new People("Mary", 25),
    new People("Peter", 30),
    new People("Anna", 35),
];

show($people);

$names = array_map(fn($elem) => $elem->name, $people);
show($names);


$nameswithformat = array_map(fn($elem) => "<b>" . $elem->name . "</b>", $people);
show($nameswithformat);

$nameswithnumber = array_map(
    fn($elem, $i) => "<b>" . $i + 1 . "-" . $elem->name . "</b>",
    $people,
    array_keys($people)
);

show($nameswithnumber);

$nameswithnumber2 = array_map(
    fn($elem, $i) => ["id" => $i + 1, "name" => $elem->name],
    $people,
    array_keys($people)
);

show($nameswithnumber2);
