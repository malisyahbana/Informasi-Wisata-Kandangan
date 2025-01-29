<?php
include_once '../../config/config.php';
if (isset($_POST['simpan'])) {
    $idWt         = $_POST['idWt'];
    $jns      = $_POST['jns'];
    $nama     = $_POST['nama'];
    $alamat      = $_POST['alamat'];
    $ket      = $_POST['ket'];
    $harga      = $_POST['harga'];
    $gbr       = $_FILES['gbr']['name'];
    $tmp_name   = $_FILES['gbr']['tmp_name'];
    $fotobaru   = date('dmYHis') . $gbr;
    $path       = "../../img/" . $fotobaru;
    $lat        = $_POST['lat'];
    $lng        = $_POST['lng'];

    if (move_uploaded_file($tmp_name, $path)) {

        $tambah = $link->query("INSERT INTO ewisata (idWt, jns, nama, alamat, ket, harga, foto, lat, lng) VALUES ('$idWt','$jns','$nama','$alamat', '$ket', '$harga', '$fotobaru', '$lat', '$lng')");

        if ($tambah) {
            echo "<script>alert('Data berhasil disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";
        } else {
            echo "Data anda gagal disimpan. Ulangi sekali lagi";
            echo "<meta http-equiv='refresh' content='0; url=add.php'>";
        }
    }
} elseif(isset($_POST['edit'])){ 

    $idWt         = $_POST['idWt'];
    $jns      = $_POST['jns'];
    $nama     = $_POST['nama'];
    $alamat      = $_POST['alamat'];
    $ket      = $_POST['ket'];
    $harga      = $_POST['harga'];
    $gbr       = $_FILES['gbr']['name'];
    $tmp_name   = $_FILES['gbr']['tmp_name'];
    $fotobaru   = date('dmYHis') . $gbr;
    $path       = "../../img/" . $fotobaru;
    $lat        = $_POST['lat'];
    $lng        = $_POST['lng'];

    if(move_uploaded_file($tmp_name, '../../img/'.$fotobaru)){
        $query = $link->query("SELECT * FROM ewisata WHERE idWt = '$idWt'");
        $data = $query->fetch_array();
        if(is_file("../../img/".$data['foto']))
            unlink("../../img/".$data['foto']);
    }

    if(isset($_POST['ubah_foto'])){
        $edit = $link->query(" UPDATE ewisata SET jns = '$jns', nama = '$nama', alamat = '$alamat', ket = '$ket', harga = '$harga', foto = '$fotobaru', lat = '$lat', lng = '$lng' WHERE idWt = '$idWt'"); 

        if ($edit) {     
            echo "<meta http-equiv='refresh' content='0; url=index.php'>";   
            } else {     
            echo "Data gagal diubah. Ulangi sekali lagi";     
            echo "<meta http-equiv='refresh' content='0; url=edit.php'>";   
            }
    }

    $edit = $link->query(" UPDATE ewisata SET jns = '$jns', nama = '$nama', alamat = '$alamat', ket = '$ket', harga = '$harga', foto = '$fotobaru', lat = '$lat', lng = '$lng' WHERE idWt = '$idWt'");

    if ($edit) {     
    echo "<script>alert('Data berhasil diubah')</script>";     
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";   
    } else {     
    echo "Data anda gagal disimpan. Ulangi sekali lagi";     
    echo "<meta http-equiv='refresh' content='0; url=edit.php'>";   
    }
}
?>