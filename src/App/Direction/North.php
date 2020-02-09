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

    public function left(): Direction
    {
        return new West();
    }

    public function right(): Direction
    {
        return new South();
    }
}
