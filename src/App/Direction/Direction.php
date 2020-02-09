<?php

namespace App\Direction;

abstract class Direction
{
    protected $name;
    protected $stepX;
    protected $stepY;

    abstract public function left(): Direction;
    abstract public function right(): Direction;

    /**
     * Get the value of stepX
     */
    public function getStepX()
    {
        return $this->stepX;
    }

    /**
     * Get the value of stepY
     */
    public function getStepY()
    {
        return $this->stepY;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }
}
