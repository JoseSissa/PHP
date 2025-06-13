<?php

declare(strict_types=1);

abstract class Product
{
    protected float $price;
    protected string $name;

    abstract public function calculatePrice(): float;

    public function getName(): string
    {
        return $this->name;
    }
}

class Beer extends Product
{
    const TAX = 1.1;
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function calculatePrice(): float
    {
        return $this->price * self::TAX;
    }
}

$beer = new Beer('Lager', 10);
echo $beer->getName();

function showInfo(Product $product)
{
    echo "$ " . $product->calculatePrice();
}

showInfo($beer);
