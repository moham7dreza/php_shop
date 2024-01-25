<?php

//deprecated constants
//echo U_MULTIPLE_DECIMAL_SEPERATORS;
//echo MT_RAND_PHP;

class Test
{
    public function name(): int
    {
        return 1;
    }
}

class Test2 extends Test
{

}

$test = new Test();
$test2 = new Test2();
//get_class() without arguments deprecated
//get_parent_class() without arguments deprecated
var_dump(get_class($test));
var_dump(get_parent_class($test2));