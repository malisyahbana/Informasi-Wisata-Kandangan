<?php
include_once "../header.php";
?>
<!-- Judul Halaman -->
<!-- <div class="top-bar clearfix">
    <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="page-title">
                <h3>Dashboard Admin</h3>
            </div>
        </div>
    </div>
</div> -->
<!-- Top Bar Ends -->

<!-- Row Konten -->
<div class="row gutter">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <?php
            $mhs = mysqli_query($link, "SELECT count(*) as hasil FROM admin");
            $hitungmhs = mysqli_fetch_array($mhs);
            ?>
        <div class="panel">
            <div class="social-details clearfix">
                <div class="social-icon pull-left">
                    <div class="round-icon red-icon">
                        <i class="icon-users"></i>
                    </div>
                </div>
                <div class="social-num">
                    <h2><span id="appointmentsOdometer" class="odometer"><?php echo $hitungmhs['hasil']; ?></span> 
                    <span class="label label-danger">0.<?php echo $hitungmhs['hasil']; ?>%</span></h2>
                    <p>Pengunjung</p>
                    <div class="progress progress-xsx">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <?php
            $mhs = mysqli_query($link, "SELECT count(*) as hasil FROM ewisata WHERE jns = 'Wisata'");
            $hitungmhs = mysqli_fetch_array($mhs);
            ?>
        <div class="panel">
            <div class="social-details clearfix">
                <div class="social-icon pull-left">
                    <div class="round-icon blue-icon">
                        <i class="icon-users"></i>
                    </div>
                </div>
                <div class="social-num">
                    <h2><span id="appointmentsOdometer" class="odometer"><?php echo $hitungmhs['hasil']; ?>
                    </span> <span class="label label-info"><?php echo $hitungmhs['hasil']; ?>%</span></h2>
                    <p>Object Wisata</p>
                    <div class="progress progress-xsx">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <?php
            $mhs = mysqli_query($link, "SELECT count(*) as hasil FROM ewisata WHERE jns = 'Penginapan'");
            $hitungmhs = mysqli_fetch_array($mhs);
            ?>
        <div class="panel">
            <div class="social-details clearfix">
                <div class="social-icon pull-left">
                    <div class="round-icon green-icon">
                        <i class="icon-shop2"></i>
                    </div>
                </div>
                <div class="social-num">
                    <h2><span id="appointmentsOdometer" class="odometer"><?php echo $hitungmhs['hasil']; ?>
                    </span> <span class="label label-success"><?php echo $hitungmhs['hasil']; ?>%</span></h2>
                    <p>Penginapan</p>
                    <div class="progress progress-xsx">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <?php
            $mhs = mysqli_query($link, "SELECT count(*) as hasil FROM ewisata WHERE jns = 'Rumah Makan'");
            $hitungmhs = mysqli_fetch_array($mhs);
            ?>
        <div class="panel">
            <div class="social-details clearfix">
                <div class="social-icon pull-left">
                    <div class="round-icon yellow-icon">
                        <i class="icon-users"></i>
                    </div>
                </div>
                <div class="social-num">
                    <h2><span id="appointmentsOdometer" class="odometer"><?php echo $hitungmhs['hasil']; ?>
                    </span> <span class="label label-warning"><?php echo $hitungmhs['hasil']; ?>%</span></h2>
                    <p>Rumah Makan</p>
                    <div class="progress progress-xsx">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row gutter">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <h3><b>
                                    <center>APLIKASI PENYEDIA INFORMASI TEMPAT WISATA PADA KABUPATEN HULU SUNGAI SELATAN</center>
                                </b>
                                <!-- <b>
                                    <center></center>
                                </b> --></h3>
                        </div>
                        <div class="panel-body">
                            <center><img src="../img/dashboard/tes2.png" width="800" height="600"></center>
                        </div>
                        <!-- <h4 align="center"><b>Jl.Adhyaksa No.2 Kayu Tangi Banjarmasin 70123. Telp/Facs (0511) 3304852. www.uniska-bjm.ac.id</b></h4> -->
                    </div>
                </div>
            </div>
<!-- Row Ends -->
<?php
include_once "../footer.php";
?>