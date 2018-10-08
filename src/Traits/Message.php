<?php

namespace Cli\Traits;

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
            if (TEST) {
                foreach ($message as $m) {
                    echo $m . "\n";
                }
            } else {
                echo $message[0];
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
            if (TEST) {
                foreach ($message as $m) {
                    echo $m . "\n";
                }
            } else {
                echo $message[0];
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
            if (TEST) {
                foreach ($message as $m) {
                    echo $m . "\n";
                }
            } else {
                echo $message[0];
            }
        } else {
            echo "Warning: {$message} \n";
        }
    }
}