<?php

namespace App\Rover;

use App\Command\CommandParser;
use App\Direction\Direction;
use App\Location\Coordinates;
use App\Location\Plateau;

class MarsRover
{
    /** @var Coordinates */
    private $currentCoordinates;
    /** @var Direction */
    private $currentDirection;
    /** @var Plateau */
    private $plateau;
    /** @var CommandParser */
    private $commandParser;

    /**
     *
     * @param Plateau $plateau
     * @param Direction $direction
     * @param Coordinates $coordinates
     * @param CommandParser $parser
     *
     * @return self
     */
    public function __construct(Plateau $plateau, Direction $direction, Coordinates $coordinates, CommandParser $parser)
    {
        $this->plateau = $plateau;
        $this->currentDirection = $direction;
        $this->currentCoordinates = $coordinates;
        $this->commandParser = $parser;
    }

    /**
     *
     * @param string $commands
     * @return void
     */
    public function execute(string $commands)
    {
        $this->commandParser->setCommands($commands);
        $commandList = $this->commandParser->createCommandList();

        foreach ($commandList as $command) {
            $command->execute($this);
        }
    }

    public function turnRight()
    {
        $this->currentDirection = $this->currentDirection->right();
    }

    public function turnLeft()
    {
        $this->currentDirection = $this->currentDirection->left();
    }

    public function move()
    {
        $futureCoordinates = $this->currentCoordinates->newCoordinatesForStepSize($this->currentDirection->getStepX(), $this->currentDirection->getStepY());

        if ($this->plateau->hasWithinBounds($futureCoordinates)) {
            $this->currentCoordinates = $futureCoordinates;
        }
    }

    /**
     * Get the value of coordinates
     */
    public function getCurrentCoordinates(): Coordinates
    {
        return $this->currentCoordinates;
    }

    /**
     * Get the value of currentDirection
     */
    public function getCurrentDirection(): Direction
    {
        return $this->currentDirection;
    }
}
