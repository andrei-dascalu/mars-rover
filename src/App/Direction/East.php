<?php

namespace App\Direction;

class East extends Direction
{
    public function __construct()
    {
        $this->name = 'E';
        $this->stepX = 1;
        $this->stepY = 0;
    }

    public function left()
    {
        return new North();
    }

    public function right()
    {
        return new South();
    }
}
