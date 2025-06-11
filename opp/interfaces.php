<?php

interface SendInterface
{
    public function send(string $message);
}

interface SaveInterface
{
    public function save();
}

class Document implements SendInterface, SaveInterface
{
    public function send(string $message)
    {
        echo "Sending message: $message";
    }

    public function save()
    {
        echo "Saving document";
    }
}


class BeerRepository implements SaveInterface
{
    public function save()
    {
        echo "Saving beer in a DB";
    }
}

class SaveProccess
{
    private SaveInterface $saveManager;

    public function __construct(SaveInterface $saveManager)
    {
        $this->saveManager = $saveManager;
    }

    public function keep()
    {
        echo "We do somethiung before... <br>";
        $this->saveManager->save();
    }
}

$beerRepository = new BeerRepository();
$document = new Document();
$saveProccess = new SaveProccess($document);
$saveProccess->keep();
