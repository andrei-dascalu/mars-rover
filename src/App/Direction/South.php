<?php

namespace App\Direction;

class South extends Direction
{
    public function __construct()
    {
        $this->name = 'S';
        $this->stepX = 0;
        $this->stepY = -1;
    }

    public function left(): Direction
    {
        return new East();
    }

    public function right(): Direction
    {
        return new West();
    }
}
