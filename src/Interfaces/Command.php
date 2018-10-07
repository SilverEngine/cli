<?php

namespace Silver\Interfaces;

interface Command
{
    // public function __construct(string $commandName, array $options);

    // public function run(string $commandName, array $options);

    public function help();
}