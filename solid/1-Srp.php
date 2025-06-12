<?php

// SINGLE RESPONSABILITY PRINCIPLE

// This example doesn't follow the SRP principle
class OrderNOSRP
{
    private $items = [];
    private $total;

    public function addItem($description, $price)
    {
        $this->items[] = [
            'description' => $description,
            'price' => $price
        ];
        $this->total += $price;
    }

    public function createOrder()
    {
        echo "Processing order...";
        $this->sendEmail();
    }

    private function sendEmail()
    {
        echo "Sending email...";
    }
}

class OrderSRP
{
    private $items = [];
    private $total;

    public function addItem($description, $price)
    {
        $this->items[] = [
            'description' => $description,
            'price' => $price
        ];
        $this->total += $price;
    }

    public function createOrder()
    {
        echo "Processing order... <br>";
    }

    public function getTotal()
    {
        return $this->total;
    }
}

class EmailNotifier
{
    public function send(OrderSRP $order)
    {
        echo "Sending email with total: " . $order->getTotal() . "<br>";
    }
}

$order = new OrderSRP();
$order->addItem("Item 1", 10);
$order->addItem("Item 2", 20);
$order->createOrder();

$notifier = new EmailNotifier();
$notifier->send($order);
