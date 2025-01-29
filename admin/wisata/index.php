<?php
include_once "../../header.php";

?>
<!-- Judul Halaman -->
<div class="top-bar clearfix">
    <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="page-title">
                <h3>Data Tempat Wisata</h3>
                <p>Map Seluruh Tempat Wisata / <a href="#">Maps</a> / <a href="<?= base_url() ?>/admin/index.php">Home</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="right-stats" id="mini-nav-right">
            <li>
                    <a href="mapw.php" class="btn btn-warning "><span><i class="icon-map"></i></span>Peta Wisata</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#laporan" class="btn btn-info"><span><i class="icon-print"></i></span>Cetak Data</a>
                </li>
                <li>
                    <a href="tambah.php" class="btn btn-success"><i class="icon-map2"></i> Tambah</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Top Bar Ends -->



<?php
$no = '1';
$query = "SELECT * FROM ewisata WHERE jns = 'Wisata' ";
$result = mysqli_query($link, $query);
?>
<!-- Row Konten -->
<div class="row gutter">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <!-- <h4>Responsive Table</h4> -->
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="responsiveTable" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Wisata</th>
                                <th>Nama Tempat</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <TH>Kisaran Biaya Perjalanan</TH>
                                <TH>Biaya Masuk</TH>
                                <TH>Nilai Favorit</TH>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>
                                        <div class="image">
                                            <img src="<?= base_url(); ?>/img/<?= $row ['foto'] ?>" width="70" heigth="70">
                                        </div>
                                    </td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= $row['ket'] ?></td>
                                    <td>Rp.150000 - Rp.<?= $row['harga'] ?></td>
                                    <td>Rp.<?= $row['bm'] ?></td>
                                    <td><?= $row['fav'] ?></td>
                                    <td>
                                        <div class="btn-group text-center">
                                            <a href="edit.php?id=<?= $row['0'] ?>" class="badge badge-info badge-xs"><i class="icon-pencil"></i>Edit </a>
                                            <a href="delete.php?id=<?= $row['0'] ?>" id="hapus" class="badge badge-danger"><i class="icon-trash">Delet</i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row Ends -->

<form action="<?= base_url(); ?>/admin/laporan/lapwkat.php" method="POST" target="blank">
<div class="modal fade" id="laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel1"><b>Cetak Laporan Sesuai Kategori</b></h2>
      </div>

  <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="form-group">
                                <div class="row gutter">
                                    <div class="col-md-6">
                                        <label class="control-label">Pilih Kategori Wisata</label>
                                        <select class="form-control" name="kat" id="kat">
                                            <option value="">-->Pilih Jenis Kategori Wisata<--</option> <option value="Alam" >Wisata Alam</option>
                                            <option value="Religi" >Wisata Religi</option>
                                            <option value="Sejarah" >Wisata Sejarah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

  <div class="modal-footer">
    <button type="submit" class="btn btn-success btn-sm" name="cetak"><i class="icon-printer2"></i> Cetak</button>
    <button type="reset" class="btn btn-warning btn-sm" ><i class="icon-cancel"></i> Reset</a></button>
    <button type="reset" class="btn btn-danger btn-sm"  data-dismiss="modal"><i class="icon-cancel"></i> Batal</a></button>
 </div>


 </div>
</div>
</div>
</form>

<script type="text/javascript">



</script>

<?php
include_once "../../footer.php";
?>