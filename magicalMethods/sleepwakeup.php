<?php

class Animal
{
    public string $name;
    public int $age;
    public string $color;

    // __sleep() is called when the object is serialized
    public function __sleep()
    {
        return ['name', 'color'];
    }

    // __wakeup() is called when the object is unserialized
    public function __wakeup()
    {
        echo "I'm awake! <br>";
        $this->age = 0;
        $this->some();
    }

    private function some()
    {
        echo "The color is: " . $this->color . "<br>";
    }
}

$duck = new Animal();
$duck->name = "Duck";
$duck->age = 3;
$duck->color = "white";

$s = serialize($duck);
echo $s . "<br><br>";
echo gettype($s) . "<br>";

$obj = unserialize($s);
print_r($obj);
