<?php

$json = '{"status": true,"message": "hi"}';
// old
try {
    $data = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
    var_dump($data);
} catch (JsonException $e) {
    var_dump($e->getMessage());
}
// new
$data = json_validate($json);

if ($data) {
    var_dump('validated');
} else {
//    last error message
    var_dump(json_last_error_msg());
//    errors count
    var_dump(json_last_error());
}