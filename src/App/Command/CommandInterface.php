<?php

namespace App\Command;

use App\Rover\MarsRover;

interface CommandInterface
{
     function execute(MarsRover $rover);
}
