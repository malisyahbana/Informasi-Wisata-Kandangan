<?php 
   require '../../config/config.php';
   include '../../config/database.php';

   // $no = 1;
   // if (isset($_POST['cetak'])) {

   //    $data = mysqli_query($koneksi, "SELECT * FROM ewisata WHERE jns = 'Wisata' ");
   //    $jumlah = mysqli_num_rows($data);
   //      }

  $bln = array(
          '01' => 'Januari',
          '02' => 'Februari',
          '03' => 'Maret',
          '04' => 'April',
          '05' => 'Mei',
          '06' => 'Juni',
          '07' => 'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember'
        );
 ?>
  <!-- <script type="text/javascript">
  window.print();
 </script> -->

 <!DOCTYPE html>
<html>
<head>
  <title>LAPORAN DATA PENGUNJUNG</title>
</head>
<body>
  <img src="<?= base_url() ?>/assets/img/logo-hss.png" align="left" width="75" height="75">
  <p align="center"><b>
    <font size="5">EWISATA-KAB HSS</font> <br> 
    
  </b></p>
    
    <h3><center>
      LAPORAN DATA STATISTIK PENGUNJUNG <br> 
    </center></h3>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="control-panel">
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
                    </div>
                </div>
<br>
<br>


<br>
<div style="text-align: center; display: inline-block; float: right;">

</div> 

<script src="<?= base_url() ?>/assets/js/Chart.bundle.js"></script>
<script src="<?= base_url() ?>/assets/js/utils.js"></script>


<script>
    var MONTHS = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var config = {
      type: 'bar',
      data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [{
          label: 'Wisatawan Lokal',
          backgroundColor: window.chartColors.yellow,
          borderColor: window.chartColors.yellow,
          data: [

          <?php 
          include '../../config/apil.php';
          $tahun = date('Y');
          $jumlah_ruang1 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='01' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang1);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='02' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='03' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='04' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='05' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='06' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='07' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='08' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='09' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='10' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='11' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Lokal' and month(tanggal)='12' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,


          ],
          fill: false,
        }, 
        {
          label: 'Wisatawan Luar Daerah',
          backgroundColor: window.chartColors.green,
          borderColor: window.chartColors.green,
          data: [

          <?php 
          include '../../config/apil.php';
          $tahun = date('Y');
          $jumlah_ruang1 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='01' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang1);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='02' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='03' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='04' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='05' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='06' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='07' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='08' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='09' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='10' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='11' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          <?php 
          $jumlah_ruang2 = mysqli_query($link,"select * from admin where status='Wisatawan Luar' and month(tanggal)='12' and year(tanggal)='$tahun'");
          echo mysqli_num_rows($jumlah_ruang2);
          ?>,

          ],
          fill: false,
        }, 

        ]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Grafik Pengunjung Yang Terdaftar Pada Aplikasi Pada Tahun <?php echo $tahun; ?>'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Bulan'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Angka'
            }
          }]
        }
      }
    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myLine = new Chart(ctx, config);
    };
  </script>

</body>
</html>