<?php

interface Framework
{
    const string VERSION = '1';
}

class Laravel implements Framework
{
    const string VERSION = '2';
}

class Django extends Laravel
{
    const string VERSION = '3';
}


var_dump(Laravel::VERSION);
var_dump(Django::VERSION);