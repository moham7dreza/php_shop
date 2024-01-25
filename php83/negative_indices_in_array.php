<?php

$array = [];
$array[-8] = 'php';
// continues index from -8
$array[] = 'php'; // -7
$array[] = 'php'; // -6
$array[-2] = 'php';
$array[] = 'php';
$array[] = 'php';
$array[4] = 'php';
$array[] = 'php';
$array[] = 'php';

var_dump($array);