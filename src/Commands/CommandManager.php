<?php

namespace Cli\Commands;

use Cli\Traits\File;

class CommandManager
{
    use File;

    protected $command;
    protected $name;
    protected $options = [];

    protected $fileName;
    protected $namespace;
    protected $className;
    private $path;


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

        // print_r(DESTINATION);
        // exit;

        if ($name == '-h' || $name == 'help' && !isset($command[1])) {
            echo " - Controller\n - Model\n - Helper\n - Facade\n - Command\n";
            exit;
        } else {
            $this->className = $command[1];
        }

        $this->name = str_replace('.', '/', $name);
        $this->options = $options;

        //TODO: find way to get files from App/Commands  and vendor/silverengine/cli/src/Commands

        $this->fileName = APP . "Commands" . DS . ucfirst($command[0]) . DS . ucfirst($command[1]) . EXT;
        $class = ROOT . "App" . DS . 'Commands' . DS . ucfirst($command[0]) . DS . ucfirst($command[1]);
        $this->namespace = "Cli\\Commands\\" . ucfirst($command[0]) . "\\" . ucfirst($command[1]);
        $path = ROOT . 'App' . DS . 'Commands'.DS;

        // $this->path = $path = DESTINATION . 'App' . DS . 'Commands';

        // $this->path = $path = ROOT . 'App' . DS . 'Commands';

        if ($this->isDirEmpty($command[1], $path)) {
            if (class_exists($class)) {

                return $this->runCustomCommands();
            } else {

                return $this->run();
            }

        } else {
            // exit('Command not found  check CommandManager on line 74 for fix');
            return $this->run();
        }


    }

    /**
     * checkClass
     *
     * @param  mixed $path
     *
     * @return void
     */
    private function checkClass(string $path)
    {
          //TODO: find way to get files from App/Commands  and vendor/silverengine/cli/src/Commands not used yet
        if ($this->isDirEmpty($this->className, $path)) {
            if (class_exists($class)) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    /**
     * runCustomCommands
     *
     * @return void
     */
    private function runCustomCommands()
    {
        if (file_exists($this->fileName)) {
            include_once($this->fileName);
            if (class_exists($this->namespace)) {

                if (TEST == true)
                    $class = "Cli\\Commands\\" . ucfirst($this->command) . "\\" . ucfirst($this->className);
                else
                    $class = "App\\Commands\\" . ucfirst($this->command) . "\\" . ucfirst($this->className);

                // name = news  | options = -f
                $class = new $class($this->className, $this->name, $this->options);



                if (in_array('-h', $this->options) || in_array('-help', $this->options)) {
                    print_r([ucfirst($this->command) . ': options' => $class->help()]);
                    exit;
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

    /**
     * run
     *
     * @return void
     */
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
                    exit;
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