<?php

class Framework3
{
    public function name(): string
    {
        return 'Framework';
    }
}

class Laravel2 extends Framework3
{
    #[Override]
    public function name(): string
    {
        return 1;
    }
}

$laravel = new Laravel2();

var_dump($laravel->name());