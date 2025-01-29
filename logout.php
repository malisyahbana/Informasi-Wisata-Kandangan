<?php
session_start();
$_SESSION["nama"];
$_SESSION["username"];


unset($_SESSION["nama"]);
unset($_SESSION["username"]);
session_unset();

session_destroy();

header("Location: login.php");
exit();
