<?php

namespace Cli\Commands;

use Cli\File;

class CommandManager
{
    use File;

    protected $command;
    protected $name;
    protected $options = [];

    protected $fileName;
    protected $namespace;
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

        $this->name = str_replace('.', '/', $name);
        $this->options = $options;

        $this->fileName = APP . "Commands" . DS . ucfirst($command[0]) . DS . ucfirst($command[1]) . EXT;
        $class = ROOT . "App" . DS . 'Commands' . DS . ucfirst($command[0]) . DS . ucfirst($command[1]);
        $this->namespace = "Cli\\Commands\\" . ucfirst($command[0]) . "\\" . ucfirst($command[1]);

        $path = ROOT . 'App' . DS . 'Commands';

        if ($this->isDirEmpty($path)) {
            if (class_exists($class))
                return $this->runCustomCommands();
            else
                return $this->run();
        }
        else{
            return $this->run();
        }

       

    }

    private function runCustomCommands()
    {
        if (file_exists($this->fileName)) {
            include_once($this->fileName);
            if (class_exists($this->namespace)) {

                $class = "Cli\\Commands\\" . ucfirst($this->command) . "\\" . ucfirst($this->className);

                // var_dump($this);
                // exit;

                // name = news  | options = -f
                $class = new $class($this->className, $this->name, $this->options);

                // var_dump($this->options);

                if (in_array('-h', $this->options) || in_array('-help', $this->options)) {
                    print_r([ucfirst($this->command) . ': options' => $class->help()]);
                } else {
                    return $this->executeOptions($class);
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

    private function run()
    {
        if (file_exists($this->fileName)) {
            include_once($this->fileName);
            if (class_exists($this->namespace)) {
                $class = $this->namespace;
                $class = "Cli\\Commands\\" . $this->command . "\\" . ucfirst($this->className);

                // var_dump($this->name);
                // exit;

                // name = news  | options = -f
                $class = new $class($this->className, $this->name, $this->options);

                // var_dump($this->options);

                if (in_array('-h', $this->options) || in_array('-help', $this->options)) {
                    print_r([ucfirst($this->command) . ': options' => $class->help()]);
                } else {
                    return $this->executeOptions($class);
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

    private function executeOptions($class)
    {
        return $class->run($this->options);
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