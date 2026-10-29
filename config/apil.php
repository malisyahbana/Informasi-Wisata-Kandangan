<?php 
require_once __DIR__ . "/database.php";

$koneksi = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);

if (!$koneksi) {
   die("Gagal Terkoneksi: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
} 
?>
