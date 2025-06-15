<?php

interface BudgetInterface
{
    public function cost(): float;
}

class BasicBudget implements BudgetInterface
{
    private int $hours;
    private float $hourlyRate;

    public function __construct(int $hours, float $hourlyRate)
    {
        $this->hours = $hours;
        $this->hourlyRate = $hourlyRate;
    }

    public function cost(): float
    {
        return $this->hours * $this->hourlyRate;
    }
}

class DecoratorBudget implements BudgetInterface
{
    protected BudgetInterface $budget;

    public function __construct(BudgetInterface $budget)
    {
        $this->budget = $budget;
    }

    public function cost(): float
    {
        return $this->budget->cost();
    }
}

class ForeignBudgetDecorator extends DecoratorBudget
{
    const EXCHANGE_RATE = 1.5;

    public function cost(): float
    {
        return parent::cost() * self::EXCHANGE_RATE;
    }
}

class CustomerBudgetDecorator extends DecoratorBudget
{
    const DISCOUNT = 0.9;

    public function cost(): float
    {
        return parent::cost() * self::DISCOUNT;
    }
}

$basicBudget = new BasicBudget(40, 10);
echo "Basic budget: $" . $basicBudget->cost() . "<br>";
$foreignBudget = new ForeignBudgetDecorator($basicBudget);
echo "Foreign budget: $" . $foreignBudget->cost() . "<br>";
$customerBudget = new CustomerBudgetDecorator($foreignBudget);
echo "Customer budget: $" . $customerBudget->cost() . "<br>";
