<?php
// That sentence helps PHP to have strict typing
declare(strict_types=1);

class Sale
{
    public float $total;
    public string $date;
    public array $concepts;
    // static is a element that can share with every object created
    public static $count;

    public function __construct(float $total, string $date)
    {
        $this->total = $total;
        $this->date = $date;
        $this->concepts = [];
        // Increase the count for every new object created
        self::$count++;
    }

    public function addConcept(Concept $concept)
    {
        $this->concepts[] = $concept;
    }

    public function createInvoice()
    {
        echo "Invoice created";
    }

    // static is a element that can share with every object created
    public static function resetCount()
    {
        self::$count = 0;
    }

    // Method to destroy the object when it's not needed
    // public function __destruct() {
    //     echo "Sale destroyed";
    // }
}

$sale = new Sale(10.5, date("Y-m-d"));

// echo gettype($sale);
// echo "<br>";
// print_r($sale);
// echo "<br>";

// $sale->total = 10.5;
// $sale->date = date("Y-m-d");

// var_dump($sale);
// echo "<br>";
// $sale->createInvoice();

echo Sale::$count;
Sale::resetCount();
echo Sale::$count;


class Concept
{
    public string $description;
    public int|float $amount;

    public function __construct(string $description, int|float $amount)
    {
        $this->description = $description;
        $this->amount = $amount;
    }
}

$concept = new Concept("Concept 1", 10);
$sale->addConcept($concept);
print_r($sale->concepts);
