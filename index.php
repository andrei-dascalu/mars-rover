<?php

use App\Execution\ParameterHandler;


require_once('./vendor/autoload.php');

$argument = !empty($argv[1]) ?: 'sample.txt';
$rovers = [];

try {
    $rovers = ParameterHandler::getData($argument);
} catch (\Throwable $ex) {
    var_dump($ex->getTrace());
}

foreach ($rovers as $rover) {
    echo sprintf(
        '%d %d %s %s',
        $rover->getCurrentCoordinates()->getX(),
        $rover->getCurrentCoordinates()->getY(),
        $rover->getCurrentDirection()->getName(),
        PHP_EOL
    );
}
