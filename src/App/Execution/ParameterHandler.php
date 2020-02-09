<?php

namespace App\Execution;

use App\Command\CommandParser;
use App\Direction\DirectionFactory;
use App\Direction\UnknownDirectionException;
use App\Location\Coordinates;
use App\Location\Plateau;
use App\Rover\MarsRover;

final class ParameterHandler
{
    /**
     *
     * @param string $input
     * @return MarsRover[]
     * @throws UnknownDirectionException
     * @throws NoDataFileException
     */
    public static function getData(string $input)
    {
        $path = realpath(sprintf('./%s', $input));
        $rovers = [];

        if (is_file($path)) {
            $f = fopen($path, 'r+');

            $gridConfig = explode(' ', trim(fgets($f)));
            $plateau = new Plateau(new Coordinates($gridConfig[0], $gridConfig[1]), new Coordinates(0, 0));
            while ($roverConfigString = fgets($f)) {
                $roverCommandsString = trim(fgets($f));

                $roverCofig = explode(' ', trim($roverConfigString));
                $rover = new MarsRover(
                    $plateau,
                    DirectionFactory::directionFactory($roverCofig[2]),
                    new Coordinates($roverCofig[0], $roverCofig[1]),
                    new CommandParser()
                );

                $rover->execute($roverCommandsString);

                $rovers[] = $rover;
            }

            return $rovers;
        }

        throw new NoDataFileException(sprintf('No input data file [%s]', $input));
    }
}
