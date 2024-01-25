<?php

var_dump(str_increment('abc'));
var_dump(str_decrement('abc'));

var_dump(str_increment('124'));
var_dump(str_decrement('124'));

var_dump(str_increment(124));
var_dump(str_decrement(124));

var_dump(str_increment(true));
var_dump(str_decrement(true));

//fatal error
//var_dump(str_increment(false));
//var_dump(str_decrement(false));
