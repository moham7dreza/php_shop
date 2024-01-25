<?php

interface Framework4
{
    public const string NAME = 'framework';
}

class Laravel4 implements Framework4
{
    // can not be private
//    private const string NAME = 'laravel';
    public const string NAME = 'laravel';
}

$laravel = new Laravel4();

var_dump(Laravel4::NAME);