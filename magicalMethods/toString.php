<?php

class Car
{
    private string $model;
    private string $brand;
    private int $year;

    public function __construct(string $model, string $brand, int $year)
    {
        $this->model = $model;
        $this->brand = $brand;
        $this->year = $year;
    }

    // __toString -> Running when we try print a object with echo, like a string
    public function __toString(): string
    {
        return "The car is a model: $this->model, brand: $this->brand, year: $this->year";
    }
}

$car = new Car("BMW", "BMW", 2020);
echo $car;
$info = (string)$car;
echo $info;
