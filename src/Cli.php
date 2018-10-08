<?php

namespace Cli;

use Cli\Commands\CommandManager;

class Cli
{
    protected $input;
    protected $command;
    protected $options;

    /**
     * __construct
     *
     * @param  mixed $input
     *
     * @return void
     */
    public function __construct($input)
    {

        if (!isset($input[0]) || !isset($input[1])) {
            echo "\n Welcome to SilverEngine framework \n\n";
            echo " - try use 'php silver help' \n";
            // echo "\n ----- \n";
            exit;
        }

        /**
         * Command example:  silver make controller <name> <option>
         * - Silver = [0]
         * - Make = [1]
         * - Cntroller = [2]
         * - Options [3,4,...]
         */
        // dd($input);

        $this->input = $this->removeLineInArray($input, 0);

        $command = $this->ExplodeCommandLine();
        $name = $this->ExplodeName();
        $options = $this->ExplodeOptions();

        // dd($this->input);

        return new CommandManager($command, $name, $options);
    }

    private function ExplodeCommandLine()
    {
        $commands = explode(':', $this->input[0]);

        // dd($commands);

        return $commands;
    }

    private function ExplodeName()
    {
        if (empty($this->input[1]))
            exit("\nThe name is empty, please add the name!\n");

        $name = $this->input[1];
        return $name;
    }

    private function ExplodeOptions()
    {
        // dd($this->input);
        unset($this->input[0], $this->input[1]);

        return array_values($this->input);
    }

    /**
     * removeLineInArray
     *
     * @param  int $i
     *
     * @return void
     */
    private function removeLineInArray(array $payload, int $i)
    {

        // [1]=> command:action
        // string(15) "make:controller"
        // [2]=> name
        // string(4) "news"
        // [3]=> options
        // string(2) "-y"

        unset($payload[$i]);

        return array_values($payload);
    }
}