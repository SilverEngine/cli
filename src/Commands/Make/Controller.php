<?php

namespace Silver\Cli\Commands;

use Silver\Interfaces\Command;

class Controller implements Command
{
    public function __construct(string $commandName, array $options)
    {

    }

    protected function help()
    {
        return [

        ];
    }

}