<?php


$test = new readonly class {
    public function name(): string
    {
        return 'test';
    }
};

var_dump($test->name());