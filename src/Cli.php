<?php

namespace Silver;

use Silver\Commands\CommandManager;

class Cli
{
    public function __construct($command)
    {
        if (!isset($command[1])) {
            echo "\n Welcome to SilverEngine framework \n\n";
            echo " - try use 'php silver help' \n";
            echo "\n ----- \n";
            exit;
        }
    array_search(' -h',$commands)
        //TODO: find string in command   -h  or  help
        //if find   redirect to helper manager  if not find use command manager
        if(ifHelpFind() == true)
            return HelpeManager::class
        else
            return new CommandManager($command[1], $command[2], $this->removeCommandAndMethodFromInput($command));
    }

    private function removeCommandAndMethodFromInput($command)
    {
        unset($command[0], $command[1], $command[2]);

        return array_values($command);
    }

    private function getWelcomeMessage()
    {

    }
}