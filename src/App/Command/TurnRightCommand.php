<?php

namespace App\Command;

use App\Rover\MarsRover;

class TurnRightCommand implements CommandInterface
{
    public function execute(MarsRover $rover)
    {
        $rover->turnRight();
    }
}
