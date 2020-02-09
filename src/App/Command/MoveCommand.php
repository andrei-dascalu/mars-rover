<?php

namespace App\Command;

use App\Rover\MarsRover;

class MoveCommand implements CommandInterface
{
    public function execute(MarsRover $rover)
    {
        $rover->move();
    }
}
