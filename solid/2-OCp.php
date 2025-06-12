<?php

// Open/closed principle

// This example doesn't follow the OCP
class Calculator
{
    public function calculare($a, $b, $operation)
    {
        if ($operation == 'sum') {
            return $a + $b;
        } else if ($operation == 'sub') {
            return $a - $b;
        } else if ($operation == 'mul') {
            return $a * $b;
        } else if ($operation == 'div') {
            return $a / $b;
        }
    }
}

// Correct implementation

interface OpInterface
{
    public function calculate(int $a, int $b): int;
}

class Sum implements OpInterface
{
    public function calculate(int $a, int $b): int
    {
        return $a + $b;
    }
}

class Sub implements OpInterface
{
    public function calculate(int $a, int $b): int
    {
        return $a - $b;
    }
}

class Calculate
{
    private OpInterface $op;

    public function __construct(OpInterface $op)
    {
        $this->op = $op;
    }

    public function run(int $a, int $b): int
    {
        return $this->op->calculate($a, $b);
    }
}

$sum = new Sum();
$sub = new Sub();
$calculate = new Calculate($sum);
echo $calculate->run(10, 20);

$calculate = new Calculate($sub);
echo $calculate->run(10, 20);
