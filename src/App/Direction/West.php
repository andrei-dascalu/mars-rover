<?php

namespace App\Direction;

class West extends Direction
{
    public function __construct()
    {
        $this->name = 'W';
        $this->stepX = -1;
        $this->stepY = 0;
    }

    public function left(): Direction
    {
        return new South();
    }

    public function right(): Direction
    {
        return new North();
    }
}
