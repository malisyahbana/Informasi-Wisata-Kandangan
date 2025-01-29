<?php

  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
  header("Content-Type: application/json; charset=utf-8");

  include "config.php";
  
  $postjson = json_decode(file_get_contents('php://input'), true);
  $today    = date('Y-m-d');


  if($postjson['aksi']=='getdata'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM ewisata WHERE jns = 'wisata' ");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'idWt' => $row['idWt'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'ket' => $row['ket'],
        'foto' => $row['foto'],
        'harga' => $row['harga'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }

  elseif($postjson['aksi']=='getpenginapan'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM ewisata WHERE jns = 'penginapan' ");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'idWt' => $row['idWt'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'ket' => $row['ket'],
        'harga' => $row['harga'],
        'foto' => $row['foto'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }

  elseif($postjson['aksi']=='getkontak'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM telpon ORDER BY idTelp ASC ");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'idTelp' => $row['idTelp'],
        'nama' => $row['nama'],
        'telp' => $row['telp'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }

  elseif($postjson['aksi']=='getfav'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM ewisata WHERE jns = 'wisata' ORDER BY fav DESC ");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'idWt' => $row['idWt'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'ket' => $row['ket'],
        'foto' => $row['foto'],
        'harga' => $row['harga'],
        'bm' => $row['bm'],
        'fav' => $row['fav'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }

  elseif($postjson['aksi']=='getrm'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM ewisata WHERE jns = 'Rumah Makan' ");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'idWt' => $row['idWt'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'ket' => $row['ket'],
        'foto' => $row['foto'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }

  elseif($postjson['aksi']=="register"){
    $password = md5($postjson['password']);
    $query = mysqli_query($mysqli, "INSERT INTO admin SET
      nama = '$postjson[nama]',
      telp     = '$postjson[telp]',
      tanggal     = '$postjson[tanggal]',
      username    = '$postjson[username]',
      password    = '$password',
      status    = '$postjson[status]',
      log         = 'y'
    ");

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false, 'msg'=>'error, please try again'));

    echo $result;
  }

  elseif($postjson['aksi']=="berfav"){
    $query = mysqli_query($mysqli, "INSERT INTO kategori SET
      idWt = '$postjson[idWt]',
      fav     = '$postjson[fav]'
    ");

    if($query) $result = json_encode(array('success'=>true));
    else $result = json_encode(array('success'=>false, 'msg'=>'error, please try again'));

    echo $result;
  }

  elseif($postjson['aksi']=="login"){
    $password = md5($postjson['password']);
    $query = mysqli_query($mysqli, "SELECT * FROM admin WHERE username='$postjson[username]' AND password='$password'");
    $check = mysqli_num_rows($query);

    if($check>0){
      $data = mysqli_fetch_array($query);
      $datauser = array(
        'id' => $data['id'],
        'username' => $data['username'],
        'password' => $data['password']
      );

      if($data['log']=='y'){
        $result = json_encode(array('success'=>true, 'result'=>$datauser));
      }else{
        $result = json_encode(array('success'=>false, 'msg'=>'Username atau Password Akun Salah')); 
      }

    }else{
      $result = json_encode(array('success'=>false, 'msg'=>'Akun Tidak Terdaftar'));
    }

    echo $result;
  }
  elseif($postjson['aksi']=='getwisata'){
    $data = array();
    $query = mysqli_query($mysqli, "SELECT * FROM ewisata ");

    while($row = mysqli_fetch_array($query)){

      $data[] = array(
        'idWt' => $row['idWt'],
        'jns' => $row['jns'],
        'nama' => $row['nama'],
        'alamat' => $row['alamat'],
        'ket' => $row['ket'],
        'harga' => $row['harga'],
        'foto' => $row['foto'],
        'lat' => $row['lat'],
        'lng' => $row['lng'],
      );
    }

    if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
    else $result = json_encode(array('success'=>false));

    echo $result;

  }


?>