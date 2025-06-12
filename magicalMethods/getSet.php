<?php

class Person
{
    public int $id;
    public string $name;
    public array $data = [];

    // Method running when we try access to a non-exist property
    public function __get($name)
    {
        echo "__get execute because not exist $name in Person object. <br>";
        return $this->data[$name];
    }
    // Method running when we try set a non-exist property
    public function __set($name, $value)
    {
        // echo "You cannot set $value to $name in Person object.";
        $this->data[$name] = $value;
    }
}

$person = new Person();
$person->name = "Jose";

// Example of how to access to a non-exist property __get($country)
echo $person->address;
// Example of how to set a non-exist property __set($address, "123 Main St.")
$person->address = "123 Main St.";
echo $person->address;
