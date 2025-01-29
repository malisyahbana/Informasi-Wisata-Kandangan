<?php
	include '../../config/config.php';

	$id = $_GET['id'];
	$query2 = $link->query("SELECT * FROM ewisata WHERE idWt = '$id'");
	$data = $query2->fetch_array();
	if(is_file("../../img/".$data['foto']))
	unlink("../../img/".$data['foto']);

	$query = $link->query(" DELETE FROM ewisata WHERE idWt = '$id' ");
	if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	} else {
		echo "<script>alert('Data Gagal dihapus')</script>";     
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";   
	}
?>