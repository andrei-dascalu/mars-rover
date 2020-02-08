<?php

namespace App\Direction;

class North extends Direction
{
    public function __construct()
    {
        $this->name = 'N';
        $this->stepX = 0;
        $this->stepY = 1;
    }

    public function left()
    {
        return new West();
    }

    public function right()
    {
        return new South();
    }
}
