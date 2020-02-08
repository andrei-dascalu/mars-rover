<?php

namespace App\Location;

class Plateau
{
    private $topRight;
    private $bottomLeft;

    public function __construct(Coordinates $topRight, Coordinates $bottomLeft)
    {
        $this->topRight = $topRight;
        $this->bottomLeft = $bottomLeft;
    }

    public function hasWithinBounds(Coordinates $coordinates)
    {
        return $this->bottomLeft->hasOutsideBounds($coordinates) && $this->topRight->hasWithinBounds($coordinates);
    }
}
