<?php

class Laravel
{
    public string $version = '1.0';
}

readonly class Framework2
{
    public function __construct(public Laravel $laravel)
    {
    }

    public function __clone(): void
    {
        $this->laravel = clone $this->laravel;
    }
}

$framework = new Framework2(new Laravel());
// clone the readonly class
$clone = clone $framework;

$version = $clone->laravel->version;

var_dump($version);

$version = '12';

var_dump($version);