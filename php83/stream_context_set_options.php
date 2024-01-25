<?php

$context = stream_context_create();

$options = [
    'http' => [
        'user_agent' => 'windows 11',
    ]
];

stream_context_set_option($context, $options);

var_dump(stream_context_get_options($context));