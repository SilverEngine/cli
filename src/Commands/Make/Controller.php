<?php

namespace Cli\Commands\Make;

use Cli\File;
use Cli\Message;

// class Controller implements Command   -->  error: Fatal error: Declaration of Silver\Cli\Commands\Make\Controller::run($commandName, $options = Array) must be compatible with Silver\Interfaces\Command::run(string $commandName, array $options) in C:\xampp\htdocs\yt\cli\src\Commands\Make\Controller.php on line 7
class Controller
{

    use File;
    use Message;

    private $name;
    private $options = [];

    public function __construct(string $commandName, array $options = [])
    {
        $this->name = $commandName;
        $this->options = $options;
    }

    public function run()
    {
        $template = ROOT . 'App' . DS . 'Templates' . DS . $this->name . '.php';
        $destination = ROOT . 'App' . DS . 'Controllers' . DS . $this->name . '.php';

        // file_put_contents($destination, $template);

       $this->success('File was created');
    }

    public function help()
    {
        //find better solution for output   check with command: php silver make:controller new -h   | php silver make:controller new -help
        return [
            'force' => '-f',
            'save' => '-s',
        ];
    }

}