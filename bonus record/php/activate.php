<?php

include 'db_connection.php';

if(isset($_POST)){
    if(isset($_POST['data'])){

  $bonusData = $_POST['data'];
  //print_r($songData);
  $obj = json_decode(json_encode ($_POST['data']), FALSE);
  $write_sql = "UPDATE bonus SET active = '' ";
//
  $query = mysqli_query($db_connection,$write_sql);
  if($query){
    $write_sql = "UPDATE bonus SET active = 'Y' WHERE bonus_amount = $bonusData[1]";
    $query = mysqli_query($db_connection,$write_sql);
    echo json_encode('Data inserted Successfully');
    //echo json_encode($_POST);
  } else {
    echo json_encode($_POST);
  }
}
}
 ?>
