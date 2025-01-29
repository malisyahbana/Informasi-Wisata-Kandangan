<?php
include_once "../../header.php";

?>
<!-- Judul Halaman -->
<div class="top-bar clearfix">
    <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="page-title">
                <h3>Data Pengunjung Terdaftar</h3>
                <p>Data Pengunjung / <a href="#">Pengunjung</a> / <a href="<?= base_url() ?>/admin/index.php">Home</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="right-stats" id="mini-nav-right">
                 <li>
                    <a href="<?= base_url(); ?>/admin/laporan/lappengstatistik.php" class="btn btn-warning"><span><i class="icon-download5"></i></span>Print Statistik Data Pengunjung </a>
                </li>
                 <li>
                    <a href="<?= base_url(); ?>/admin/laporan/lappengluar.php" class="btn btn-info"><span><i class="icon-download5"></i></span>Print Pengunjung Luar Daerah</a>
                </li>
                <li>
                    <a href="<?= base_url(); ?>/admin/laporan/lappenglokal.php" class="btn btn-info"><span><i class="icon-download5"></i></span>Print Pengunjung Lokal</a>
                </li>
                <li>
                    <a href="add.php" class="btn btn-success"><i class="icon-add-user"></i> Tambah</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Top Bar Ends -->



<?php
$no = '1';
$query = "SELECT * FROM admin ORDER BY id ASC";
$result = mysqli_query($link, $query);
?>
<!-- Row Konten -->
<div class="row gutter">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 <style>
                                canvas{
                                    -moz-user-select: none;
                                    -webkit-user-select: none;
                                    -ms-user-select: none;
                                }
                                </style>
                                <center><strong>
                                <div style="width: 50%;">
                                    <canvas id="canvas"></canvas>
                                </div>
                                </strong></center>

            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="responsiveTable" class="table table-striped table-bordered no-margin" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tempat</th>
                                <th>Nomor Telpon</th>
                                <th>Tanggal Daftar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($result)) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['telp'] ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="true"><span class="circless animate"></span>Default <span class="caret"></span></button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="update.php?id=<?php echo $row[0]; ?>">Edit</a></li>
                                                <li><a href="delete.php?id=<?php echo $row[0]; ?>">Delete</a></li>
                                            </ul>
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

<script type="text/javascript">



</script>

<?php
include_once "../../footer.php";
?>