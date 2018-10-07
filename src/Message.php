<?php

namespace Cli;

trait Message
{
    public function success(string $message)
    {
       echo "Success: {$message}\n";
    }

    public function error(string $message)
    {
        echo "Error: {$message}\n";
    }
}