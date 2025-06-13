<?php
declare(strict_types=1);

class Sale {
    protected float $total;
    private string $date;
    private array $concepts;
    public static $count;

    public function __construct(float $total, string $date) {
        $this->total = $total;
        $this->date = $date;
        $this->concepts = [];
        // Increase the count for every new object created
        self::$count++;
    }

    // Getter
    public function getTotal (): float {
        return $this->total;
    }
    public function getDate (): string {
        return $this->date;
    }

    // Setter
    public function setDate (string $newDate): string {
        if(strlen($newDate) > 10) {
            return "New date is too long";
        }
        $this->date = $newDate;
        return "New date set";
    }
}

$sale = new Sale(10.5, date("Y-m-d"));

echo $sale->setDate("2022-01-01");