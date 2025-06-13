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

$sum = array_reduce(
    $people,
    fn($current, $elem) => $current + $elem->age,
    0
);
show($sum);

$namesPipe = array_reduce(
    $people,
    fn($current, $elem) => $current . $elem->name . "|",
    ""
);
show($namesPipe);
