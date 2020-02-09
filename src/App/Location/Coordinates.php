<?php

namespace App\Location;

class Coordinates
{
    private $x;
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function hasWithinBounds(Coordinates $coordinate): bool
    {
        return $this->isXCoordinateWithinBounds($coordinate->getX()) && $this->isYCoordinateWithinBounds($coordinate->getY());
    }

    public function hasOutsideBounds(Coordinates $coordinate): bool
    {
        return $this->isXCoordinateInOutsideBounds($coordinate->getX()) && $this->isYCoordinateInOutsideBounds($coordinate->getY());
    }

    private function isXCoordinateWithinBounds(int $x): bool
    {
        return $x <= $this->x;
    }

    private function isYCoordinateWithinBounds(int $y): bool
    {
        return $y <= $this->y;
    }

    private function isXCoordinateInOutsideBounds(int $x): bool
    {
        return $x >= $this->x;
    }

    private function isYCoordinateInOutsideBounds(int $y): bool
    {
        return $y >= $this->y;
    }

    /**
     * Get the value of x
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Get the value of y
     */
    public function getY()
    {
        return $this->y;
    }

    public function newCoordinatesForStepSize(int $xStepSize, int $yStepSize)
    {
        return new Coordinates($this->x + $xStepSize, $this->y + $yStepSize);
    }
}
