<?php

namespace Cli;

trait Message
{
    /**
     * success
     *
     * @param  mixed $message
     *
     * @return void
     */
    public function success($message, string $file = null)
    {
        if (is_array($message)) {
            foreach ($message as $m) {
                echo "Success: {$m} \n";
            }
        } else {
            echo "Success: {$message} \n";
        }
    }

    /**
     * error
     *
     * @param  mixed $message
     *
     * @return void
     */
    public function error($message, string $file = null)
    {
        if (is_array($message)) {
            foreach ($message as $m) {
                echo $m . '\\n';
            }
        } else {
            echo "Error: {$message} \n";
        }
    }

    /**
     * warning
     *
     * @param  mixed $message
     *
     * @return void
     */
    public function warning($message, string $file = null)
    {
        if (is_array($message)) {
            foreach ($message as $m) {
                echo $m . '\n';
            }
        } else {
            echo "Warning: {$message} \n";
        }
    }
}