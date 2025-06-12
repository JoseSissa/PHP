<?php

class Add
{
    public function __invoke($a, $b)
    {
        return $a + $b;
    }
}

class Validator
{
    private int $min;
    private int $max;
    public $error;

    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function __invoke($text)
    {
        $long = strlen($text);

        if ($long < $this->min || $long > $this->max) {
            $this->error = "The text is too long or too short";
            return false;
        }

        return true;
    }
}

$add = new Add();
// echo $add(1, 2);

$val = new Validator(5, 10);
if ($val("hi")) {
    echo "All good";
} else {
    echo $val->error;
}
