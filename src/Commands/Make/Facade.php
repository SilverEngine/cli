<?php

namespace Cli\Commands\Make;

use Cli\File;
use Cli\Message;

// class Controller implements Command   -->  error: Fatal error: Declaration of Silver\Cli\Commands\Make\Controller::run($commandName, $options = Array) must be compatible with Silver\Interfaces\Command::run(string $commandName, array $options) in C:\xampp\htdocs\yt\cli\src\Commands\Make\Controller.php on line 7
class Facade
{

    use File;
    use Message;

    private $name;
    private $className;
    private $options = [];

    private $destinationFolderName = 'Facades';

    /**
     * __construct
     *
     * @param  mixed $commandName
     * @param  mixed $options
     *
     * @return void
     */
    public function __construct(string $className, string $commandName, array $options = [])
    {
        $this->className = $className;
        $this->name = $commandName;
        $this->options = $options;
    }

    /**
     * run
     *
     * @param  mixed $options
     *
     * @return void
     */
    public function run(array $options)
    {
        if (in_array('-d', $options))
            return $this->delete();
        else if (in_array('-f', $options) || in_array('-force', $options))
            return $this->create(true);
        else
            return $this->create();
    }

    /**
     * create
     *
     * @param  mixed $force
     *
     * @return void
     */
    private function create($force = false)
    {
        $path = ROOT . 'App' . DS;
        $this->createDirIfNorExists($this->destinationFolderName, $path);

        // exit($this->className);

        $template = ROOT . 'App' . DS . 'Templates' . DS . ucfirst($this->className) . '.php';
        $destination = ROOT . 'App' . DS . ucfirst($this->className).'s' . DS . ucfirst($this->name) . '.php';

        $this->createFile($destination, $template, $force);
    }

    /**
     * delete
     *
     * @param  mixed $force
     *
     * @return void
     */
    private function delete($force = false)
    {
        $destination = ROOT . 'App' . DS . ucfirst($this->className) . 's' . DS . ucfirst($this->name) . '.php';
        // exit($destination);
        $this->deleteFile($destination, $force);
    }

    public function help()
    {
        //find better solution for output   check with command: php silver make:controller new -h   | php silver make:controller new -help
        return [
            'force' => '-f | -force ',
            // 'save' => '-s',
            'delete' => '-d | -delete',
        ];
    }

}