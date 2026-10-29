<?php
date_default_timezone_set('Asia/Jakarta');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Konfigurasi DataBase
include_once __DIR__ . "/database.php";
$link = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

// Konfigurasi baseurl
function base_url($url = null)
{
    $base_url = getenv('BASE_URL') ? rtrim(getenv('BASE_URL'), '/') : "http://localhost/sigkdg";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}
?>
