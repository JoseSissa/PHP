<?php

require "modelsArray/people.php";
require "modelsArray/functions.php";

use ModelsArray\People;

$people1 = [
    new People("Mary", 25),
    new People("Peter", 30),
    new People("Anna", 35),
    new People("John", 20),
];
$people2 = [
    new People("Mary", 25),
    new People("Peter", 30),
    new People("Karol", 17),
    new People("Eli", 20),
];

echo "Juan" <=> "Pedro" . "<br>"; // -1
echo "Juan" <=> "Juan" . "<br>"; //   0
echo "Pedro" <=> "Juan" . "<br>"; //  1

$difference = array_udiff(
    $people1,
    $people2,
    fn($person1, $person2) => $person1->name <=> $person2->name
);
show($difference);

$difference2 = array_udiff(
    $people2,
    $people1,
    fn($person1, $person2) => $person2->name <=> $person1->name
);
show($difference2);
