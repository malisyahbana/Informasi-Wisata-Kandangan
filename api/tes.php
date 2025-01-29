  <?php
  
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  header("Content-Type: application/json; charset=utf-8");

  include "config.php";

  $postjson = json_decode(file_get_contents('php://input'), true);
  $today    = date('Y-m-d');

if($postjson['aksi']=='getmasjid'){
    $data  = $mysqli->query("SELECT * FROM ewisata ORDER BY idWt ");
    $hasil = array();

    while($tampil = mysqli_fetch_array($data)){

      $hasil[] = $tampil;
    }

    if($data) $result = json_encode(array('success'=>true, 'result'=>$hasil));
    else $result = json_encode(array('success'=>false));

    echo $result;

}
  elseif ($postjson['aksi']=='getmushola'){
    $data  = $conn->query("SELECT * FROM tb_tempat WHERE id_kategori = 'KTG002'");
    $hasil = array();

    while($tampil = mysqli_fetch_array($data)){

      $hasil[] = $tampil;
    }

    if($data) $result = json_encode(array('success'=>true, 'result'=>$hasil));
    else $result = json_encode(array('success'=>false));

    echo $result;

}
?>
