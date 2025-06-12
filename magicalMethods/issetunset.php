<?php

$a = 1;
// unset -> Deletes a variable from memory
unset($a);

if (isset($a)) {
    echo "Exist <br>";
} else {
    echo "Not exist <br>";
}

class Wine
{
    public string $style = "red";
    private array $data = [
        "name" => "Wines"
    ];

    // __isset -> Running when we try to check if a property exists
    public function __isset($name)
    {
        echo "Cheking if '$name' exists. <br>";
        return isset($this->data[$name]);
    }
    // __unset -> Running when we try to delete a non-exist property
    public function __unset($name)
    {
        echo "Attempting to delete '$name' from memory. <br>";
    }
}

$wine = new Wine();

if (isset($wine->country)) {
    echo "Wine exists <br>";
} else {
    echo "Wine does not exist <br>";
}

// print_r($wine);
unset($wine->style);
// print_r($wine);
