<?php

//old
use Random\Randomizer;

$randomEmail = sprintf('%s@gmail.com', 'aaaaa');

var_dump($randomEmail);

//new

$randomizer = new Randomizer();

$randomEmail = sprintf('%s@gmail.com', $randomizer->getBytesFromString('a', 5));

var_dump($randomEmail);

var_dump($randomizer->getBytesFromString('dsafaf', 40));