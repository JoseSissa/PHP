<?php

// That sentence helps PHP to have strict typing
declare(strict_types=1);

class Sale {
    public float $total;
    public string $date;
    public array $concepts;
    // static is a element that can share with every object created
    public static $count;

    public function __construct(float $total, string $date) {
        $this->total = $total;
        $this->date = $date;
        $this->concepts = [];
        // Increase the count for every new object created
        self::$count++;
    }

    public function addConcept(Concept $concept) {
        $this->concepts[] = $concept;
    }

    public function createInvoice(): string {
        return "Invoice created";
    }

    // static is a element that can share with every object created
    public static function resetCount() {
        self::$count = 0;
    }

    // Method to destroy the object when it's not needed
    // public function __destruct() {
    //     echo "Sale destroyed";
    // }
}

class OnlineSale extends Sale {

    public $paymentMethod;

    public function __construct(float $total, string $date, string $paymentMethod) {
        parent::__construct($total, $date);
        $this->paymentMethod = $paymentMethod;
    }

    public function showInfo(): string {
        return "Sell has a mount of $this->total";
    }
}

$onlineSale = new OnlineSale(15, date("Y-m-d"), "PayPal");
echo $onlineSale->createInvoice();
echo $onlineSale->showInfo();