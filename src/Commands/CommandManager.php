<?php

namespace Cli\Commands;

class CommandManager
{

    protected $command;
    protected $name;
    protected $options = [];

    protected $fileName;
    protected $classPath;
    protected $className;


    /**
     * __construct
     *
     * @param  mixed $command
     * @param  mixed $name
     * @param  mixed $options
     *
     * @return void
     */
    public function __construct(array $command, string $name = null, array $options = [])
    {

        $this->command = $command[0]; //make
        $this->className = $command[1]; //controller

        $this->name = $name;
        $this->options = $options;

        $this->fileName = APP . "Commands" . DS . ucfirst($command[0]) . DS . ucfirst($command[1]) . EXT;
        $this->classPath = "Cli\\Commands\\" . ucfirst($command[0]) . "\\" . ucfirst($command[1]);

        return $this->run();
    }

    private function run()
    {
        if (file_exists($this->fileName)) {
            include($this->fileName);
            if (class_exists($this->classPath)) {
                $class = $this->classPath;
                $class = "Cli\\Commands\\Make\\Controller";
                $class = new $class($this->name, $this->options);

                // var_dump($this->options);

                if (in_array('-h', $this->options) || in_array('-help', $this->options)) {
                    print_r( [ucfirst($this->command).': options' => $class->help()]);
                } else {
                    return $class->run();
                }

            } else {
                exit('Class not found!');
                throw new \Exception('Class not found!');
            }
        } else {
            exit('File not exists!');
            throw new \Exception('File not exists!');
        }
    }

    /**
     * Check whether the requested command exists in our application.
     *
     * @return bool
     */
    private function hasCommand()
    {
        if (file_exists($this->fileName)) {
            var_dump($this->className);
            // include_once($this->fileName);
            $class = $this->className;
            // exit;
            if (class_exists($class, true)) {
                return true;
            } else {
                throw new \Exception('Class not exists!');
            }
        } else {
            return false;
        }


    }
}