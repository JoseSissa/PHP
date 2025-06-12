<?php

$array1 = ["a", "b", "c"];
$array2 = $array1;
$array2[] = "d";

class Some
{
    public string $name;
    public A $a;

    // __clone -> Running when we clone an object
    public function __clone()
    {
        $this->name = strtoupper($this->name);
        // 
        $this->a = clone $this->a;
    }
}

function change(Some $some)
{
    $some->name = "Changed value";
}

$some = new Some();
$some->name = "Some";
$some2 = $some;
$some2->name = "Some2";
echo "<pre>";
echo $some2->name . "<br>";
echo $some->name . "<br>";

change($some);
echo $some->name . "<br>";

// When we use clone, the __clone method is called
// clone copy the object and all the properties but not propeties of the objects like A
$newSome = clone $some;
// $newSome->name = "New name <br>";
echo $newSome->name . "<br>";
echo "</pre>";


class A
{
    public string $label;
}
