<?php
require_once __DIR__ . "/../config/database.php";

define('DB_NAME', $con['db']);
define('DB_USER', $con['user']);
define('DB_PASSWORD', $con['pass']);
define('DB_HOST', $con['host']);

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
