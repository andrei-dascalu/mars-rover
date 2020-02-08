<?php

namespace App\Rover;

use App\Direction\Direction;
use App\Location\Coordinates;
use App\Location\Plateau;

class MarsRover
{
    private $coordinates;
    private $currentDirection;
    private $plateau;

    public function __construct(Plateau $plateau, Direction $direction, Coordinates $coordinates)
    {
        $this->plateau = $plateau;
        $this->currentDirection = $direction;
        $this->coordinates = $coordinates;
    }

    public function execute(string $command)
    {

    }
}
