<?php

namespace App\Command;

class CommandParser
{
    private $commandList;
    private $commands;

    public function __construct()
    {
        $this->commands = [
            'L' => new TurnLeftCommand(),
            'R' => new TurnRightCommand(),
            'M' => new MoveCommand(),
        ];
    }

    public function setCommands(string $commandList)
    {
        $this->commandList = $commandList;
    }

    public function toCommandList(): array
    {
        if (empty($this->commandList)) {
            return [];
        }

        return $this->createCommandList();
    }

    /**
     * Create list of commands
     *
     * @return CommandInterface[]
     */
    public function createCommandList(): array
    {
        $byCharacter = str_split($this->commandList);
        $list = [];

        foreach ($byCharacter as $character) {
            if (!empty($this->commands[$character])) {
                $list[] = $this->commands[$character];
            }
        }

        return $list;
    }
}
