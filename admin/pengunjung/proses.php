<?php
include_once '../../config/config.php';
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $tanggal = $_POST['tanggal'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = md5($password);
    $status = $_POST['status'];

    $tambah = $link->query("INSERT INTO admin (id, nama, telp, tanggal, username, password, status) VALUES ('$id', '$nama','$telp', '$tanggal', '$username', '$pass', '$status')");


    if ($tambah) {
        echo "<script>alert('Data berhasil disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<script>alert('Data gagal disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=add.php'>";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $tanggal = $_POST['tanggal'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = md5($password);
    $status = $_POST['status'];

    $tambah = $link->query("UPDATE admin SET nama = '$nama', telp = '$telp', tanggal = '$tanggal', username = '$username', password = '$pass', status = '$status' WHERE id = '$id' ");

    if ($tambah) {
        echo "<script>alert('Data berhasil diedit')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<script>alert('Data gagal diedit')</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit.php'>";
    }
}
