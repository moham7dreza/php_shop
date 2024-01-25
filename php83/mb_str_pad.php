<?php

var_dump(str_pad('hello', 20, ','));
//multi byte
var_dump(mb_str_pad('hello', 20, 'm', STR_PAD_LEFT));
var_dump(mb_str_pad('hello', 20, 'm', STR_PAD_BOTH));
var_dump(mb_str_pad('hello', 20, 'm', STR_PAD_RIGHT));