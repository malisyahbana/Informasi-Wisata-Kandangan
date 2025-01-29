<?php
include_once '../../config/config.php';
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];

    $tambah = $link->query("INSERT INTO telpon (nama, telp) VALUES ('$nama', '$telp')");


    if ($tambah) {
        echo "<script>alert('Data berhasil disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<script>alert('Data gagal disimpan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=add.php'>";
    }
} elseif (isset($_POST['edit'])) {
    $idTelp = $_POST['idTelp'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];

    $tambah = $link->query("UPDATE telpon SET nama = '$nama', telp = '$telp' WHERE idTelp = '$idTelp'");

    if ($tambah) {
        echo "<script>alert('Data berhasil diedit')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        echo "<script>alert('Data gagal diedit')</script>";
        echo "<meta http-equiv='refresh' content='0; url=add.php'>";
    }
}
