<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;

$people = [
    new People("Mary", 25),
    new People("Peter", 30),
    new People("Anna", 35),
    new People("John", 20),
];

echo (1 <=> 2) . "<br>"; // -1
echo (1 <=> 1) . "<br>"; // 0
echo (2 <=> 1) . "<br>"; // 1

usort(
    $people,
    fn($elem1, $elem2) => $elem1->age <=> $elem2->age
);
show($people);

usort(
    $people,
    fn($elem1, $elem2) => $elem2->age <=> $elem1->age
);
show($people);
