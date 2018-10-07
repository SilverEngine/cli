<?php

namespace Cli;

trait File
{
    public function createDirIfNorExists($name, $path)
    {
        if (is_dir($path . $name)) {
            return false;
        } else {
            mkdir($path . ucfirst($name), 0766);
        }
    }
}