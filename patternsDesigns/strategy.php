<?php

interface IStrategy
{
    public function get(): array;
}

class ArrayStrategy implements IStrategy
{
    private array $data = [
        "Título 1",
        "Título 2",
        "Título 3",
    ];

    public function get(): array
    {
        return $this->data;
    }
}

class UrlStrategy implements IStrategy
{
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function get(): array
    {
        $data = file_get_contents($this->url);
        $arr = json_decode($data, true);
        return array_map(
            fn($item) => $item["title"],
            $arr
        );
    }
}

class InfoPrinter
{
    private IStrategy $strategy;

    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function print(): void
    {
        $content = $this->strategy->get();
        foreach ($content as $item) {
            echo $item . "<br>";
        }
    }
}

$arrayStrategy = new ArrayStrategy();
$urlStrategy = new UrlStrategy("https://jsonplaceholder.typicode.com/posts");
// $infoPrinter = new InfoPrinter($arrayStrategy);
$infoPrinter = new InfoPrinter($urlStrategy);
$infoPrinter->print();
