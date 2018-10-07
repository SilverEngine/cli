<?php

namespace Cli;

trait File
{
    // use Message;

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
    public function isDirEmpty(string $dir)
    {
        $handle = opendir($dir);
        // var_dump($handle);
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
                echo "failed to copy $file...\n";
            }
        } else {
            if (file_exists($destination)) {
                return $this->warning(
                    [
                        'File already exists! If you want to override please add -f [FORCE]',
                        'path: ' . $destination
                    ]
                );
            }

            // var_dump($destination);
            // var_dump($template);
            // exit;

            file_put_contents($destination, $template);

        }

        return $this->success('File was created');
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

        return $this->success('File was deleted');
    }
}