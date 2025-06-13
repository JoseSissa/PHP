<?php

declare(strict_types=1);

trait EmailSender
{
    public function sendEmail()
    {
        echo "Sending email";
    }
}

trait DataBase
{
    public function save()
    {
        echo "Saving in DB";
    }
}

trait Log
{
    private function log(string $message, string $fileName)
    {
        if (!file_exists($fileName)) {
            file_put_contents($fileName, "");
        }

        $current = file_get_contents($fileName);
        $current .= date("Y-m-d H:i:s") . " - " . $message . "\n";
        file_put_contents($fileName, $current);
    }
}

class Invoice
{
    use EmailSender, DataBase, Log;

    public function create()
    {
        echo "Creating invoice";
        $this->log("Invoice created", "log.txt");
    }
}

$invoice = new Invoice();
$invoice->sendEmail();
$invoice->save();
$invoice->create();
