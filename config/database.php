<?php
$sql_details = array(
    'user' => getenv('DB_USER') !== false ? getenv('DB_USER') : 'root',
    'pass' => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
    'db'   => getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'sigkdg',
    'host' => getenv('DB_HOST') !== false ? getenv('DB_HOST') : 'localhost'
);

$con = $sql_details;
