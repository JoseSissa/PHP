<?php

interface BeerInterface
{
    public function getPrice(): float;
}

class Lager implements BeerInterface
{
    private float $tax;
    private float $price;

    public function __construct(float $tax, float $price)
    {
        $this->tax = $tax;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price + $this->tax;
    }
}

class IPA implements BeerInterface
{
    private float $price;
    private float $discount;

    public function __construct(float $discount, float $price)
    {
        $this->discount = $discount;
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price - $this->discount;
    }
}

abstract class BeerFactory
{
    abstract public function create(array $params): BeerInterface;
}

class LagerFactory extends BeerFactory
{
    public function create(array $params): BeerInterface
    {
        return new Lager($params['tax'], $params['price']);
    }
}

class IPAFactory extends BeerFactory
{
    public function create(array $params): BeerInterface
    {
        return new IPA($params['discount'], $params['price']);
    }
}

$ipaFactory = new IPAFactory();
$ipa = $ipaFactory->create(['price' => 10, 'discount' => 2]);
echo "IPA: $" . $ipa->getPrice() . "<br>";


$lagerFactory = new LagerFactory();
$lager = $lagerFactory->create(['price' => 10, 'tax' => 2]);
echo "Lager: $" . $lager->getPrice() . "<br>";
