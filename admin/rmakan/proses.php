<?php
include_once '../../config/config.php';
if (isset($_POST['simpan'])) {
    $idWt         = $_POST['idWt'];
    $jns      = $_POST['jns'];
    $nama     = $_POST['nama'];
    $alamat      = $_POST['alamat'];
    $ket      = $_POST['ket'];
    $gbr       = $_FILES['gbr']['name'];
    $tmp_name   = $_FILES['gbr']['tmp_name'];
    $fotobaru   = date('dmYHis') . $gbr;
    $path       = "../../img/" . $fotobaru;
    $lat        = $_POST['lat'];
    $lng        = $_POST['lng'];

    if (move_uploaded_file($tmp_name, $path)) {

        $tambah = $link->query("INSERT INTO rmakan (idWt, jns, nama, alamat, ket, foto, lat, lng) VALUES ('$idWt','$jns','$nama','$alamat', '$ket', '$fotobaru', '$lat', '$lng')");

        if ($tambah) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        } else {
            echo "Data anda gagal disimpan. Ulangi sekali lagi";
            echo "<meta http-equiv='refresh' content='0; url=add.php'>";
        }
    }
}
