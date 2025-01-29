<?php

include 'config.php';

if (isset($_POST['login'])) {
    $user = $link->real_escape_string($_POST['username']);
    $pass = $link->real_escape_string($_POST['password']);

    $pass = md5($pass);
    $query = $link->query("SELECT * FROM admin WHERE username = '$user' AND password = '$pass' ");
    $data = $query->fetch_array();
    $username = $data['username'];
    $password = $data['password'];
    $usr = $data['nama'];

    if ($user == $username && $pass == $password) {

        $_SESSION['user'] = $username;
        $_SESSION['nama'] = $usr;

        echo "<script>alert('Anda berhasil login. Sebagai : $usr');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../admin/index.php'>";
    } else {

        echo "<script>alert('Username dan Password Tidak Ditemukan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../Login.php'>";
    }
}
?>