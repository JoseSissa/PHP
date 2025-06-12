<?php

class Location
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function move(int $x, int $y): Location
    {
        $newLocation = new Location($this->x + $x, $this->y + $y);
        return $newLocation;
    }
}

$location = new Location(10, 20);
echo $location->getX() . ", " . $location->getY() . "<br>";
$newLocation = $location->move(30, 40);
echo $newLocation->getX() . ", " . $newLocation->getY() . "<br>";
