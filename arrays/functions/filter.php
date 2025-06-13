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

$greaterThan25 = array_filter(
    $people,
    fn($elem) => $elem->age >= 25
);

show($greaterThan25);

$withOutPeter = array_filter(
    $people,
    fn($elem) => $elem->name !== "Peter"
);

show($withOutPeter);
