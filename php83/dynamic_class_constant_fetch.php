<?php

class User
{
    const string VERSION = '1';
}

//old
var_dump(constant(User::class . "::" . 'VERSION'));
//new
var_dump(User::VERSION);