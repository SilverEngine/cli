<?php

namespace Cli\Traits;

trait File
{

    /**
     * createDirIfNorExists
     *
     * @param  mixed $name
     * @param  mixed $path
     *
     * @return void
     */
    protected function createDirIfNorExists(string $name, string $path)
    {
        //todo: check for creating if dir is in App/*
        if (is_dir($path . $name)) {
            return false;
        } else {
            mkdir($path . ucfirst($name), 0766);
        }
    }

    /**
     * isDirEmpty
     *
     * @param  mixed $dir
     *
     * @return void
     */
    public function isDirEmpty(string $name, string $path)
    {
        if (!is_dir($path)) {
            $this->createDirIfNorExists($name, $path);
        }

        $handle = opendir($path);

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                return true;
            }
        }
        return false;
    }


    /**
     * checkFile
     *
     * @param  mixed $destination
     * @param  mixed $template
     * @param  mixed $force
     *
     * @return void
     */
    protected function createFile($destination, $template, $force = false)
    {
        if ($force) {
            if (!copy($template, $destination)) {
                exit("failed to copy $template...\n");
            }
        } else {
            if (file_exists($destination)) {
                return $this->warning(
                    [
                        "File already exists! If you want to override please add -f [FORCE]",
                        "path: " . $destination
                    ]
                );
            }

            // var_dump($destination);
            // var_dump($template);
            // exit;

            file_put_contents($destination, $template);

        }

        return $this->success([
            "File was Created",
            "path: " . $destination
        ]);
    }

    /**
     * deleteFile
     *
     * @param  mixed $destination
     * @param  mixed $force
     *
     * @return void
     */
    protected function deleteFile($destination, $force = false)
    {
        if ($force)
            unlink($destination);
        else
            if (is_file($destination))
            unlink($destination);

        return $this->success([
            "File was deleted",  
            "path: " . $destination
        ]);
    }
}