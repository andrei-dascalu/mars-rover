<?php

namespace App\Direction;

final class DirectionFactory
{
    public static function directionFactory(string $direction)
    {
        switch (strtoupper($direction)) {
            case 'N':
                return new North();
            break;
            case 'S':
                return new South();
            break;
            case 'E':
                return new East();
            break;
            case 'W':
                return new West();
            break;
            default:
                throw new UnknownDirectionException(sprintf('Unknown %s', $direction));
            break;
        }
    }
}
