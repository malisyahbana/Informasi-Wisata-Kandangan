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

 <script type="text/javascript">
 	window.print();
 </script>

<!DOCTYPE html>
<html>
<head>
  <title>LAPORAN DATA WISATA</title>
</head>
<body>
  <img src="<?= base_url() ?>/assets/img/logo-hss.png" align="left" width="75" height="75">
  <!-- <img src="<?=base_url('assets/bukti_kenaikan_jabatan/tut wuri.png')?>" align="right" width="75" height="75"> -->
  <p align="center"><b>
    <font size="5">EWISATA-KAB HSS</font> <br> 
    
  </b></p>
    
    <h3><center>
      LAPORAN DATA TEMPAT WISATA <br> 
    </center></h3>
    <?php
$no = 1;
   if (isset($_POST['cetak'])) {
      $kat = $_POST['kat'];
      $data = mysqli_query($link, "SELECT* FROM ewisata WHERE kat = '$kat' ");
        }
?>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 18px;">No</th>
                                    <th style="text-align: center; font-size: 18px;">Nama Tempat Wisata</th>
                                    <th style="text-align: center; font-size: 18px;">Kategori Wisata</th>
                                    <th style="text-align: center; font-size: 18px;">Alamat</th>
                                    <th style="text-align: center; font-size: 18px;">Keterangan</th>
                                    <th style="text-align: center; font-size: 18px;">Kisaran Biaya Perjalanan</th>
                                    <th style="text-align: center; font-size: 18px;">Biaya Masuk</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php while ($tampil = mysqli_fetch_array($data)) { ?>
                                <tr>
                                    <td align="center"><?php echo $no++; ?></td>
                                    <td align="center"><?php echo $tampil['nama']; ?></td>
                                    <td align="center"><?php echo $tampil['jns']; ?> <?php echo $tampil['kat']; ?> </td>
                                    <td align="center"><?php echo $tampil['alamat']; ?></td>
                                    <td align="center"><?php echo $tampil['ket']; ?></td>
                                    <td align="center"><?php echo $tampil['harga']; ?></td>
                                    <td align="center"><?php echo $tampil['bm']; ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<br>


<br>
<div style="text-align: center; display: inline-block; float: right;">

</div> 


</body>
</html>