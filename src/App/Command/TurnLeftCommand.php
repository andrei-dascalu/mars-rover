<?php

namespace App\Command;

use App\Rover\MarsRover;

class TurnLeftCommand implements CommandInterface
{
    public function execute(MarsRover $rover)
    {
        $rover->turnLeft();
    }
}
