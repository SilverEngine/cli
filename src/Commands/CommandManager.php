<?php

namespace Silver\Commands;

class CommandManager
{

    /**
     * CommandManager constructor.
     * @param string $folderName
     * @param string|null $commandName
     * @param array $options
     */
    public function __construct(string $folderName, string $commandName = null, array $options = [])
    {
        $this->commandDirectory = APP . "Commands" . DS . ucfirst($command);
        $this->classPath        = APP . "Commands" . DS . ucfirst($command) . EXT;
        $this->className        = "Silver\\Cli\\Commands\\" . ucfirst($command);

        if (!$this->hasCommand()) {
            return false;
        }

        if (!method_exists($this->className, $method)) {
            return false;
        }

        // TODO: Controller sure folder exists
        // TODO: Controller sure file with name $commandName exists
        // TODO: Run command with options
    }

    /**
     * Check whether the requested command exists in our application.
     *
     * @return bool
     */
    private function hasCommand()
    {
        if (file_exists($this->commandDirectory) && is_dir($this->commandDirectory) && class_exists($this->className)) {
            return true;
        }

        return false;
    }
}