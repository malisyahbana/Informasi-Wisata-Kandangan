<?php
// Opens a connection to a MySQL server.
require_once __DIR__ . "/database.php";

$connection = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (!$connection) {
    die('Not connected : ' . mysqli_connect_error());
}
?>
