<?php

include 'db_connection.php';

if(isset($_POST)){
    if(isset($_POST['data'])){

  $bonusData = $_POST['data'];
  //print_r($songData);
  $obj = json_decode(json_encode ($_POST['data']), FALSE);


$remove_sql = "DELETE FROM bonus WHERE bonus_pct= $obj[1] AND bonus_amount=$obj[2] ; ";
//
  $query = mysqli_query($db_connection,$remove_sql);
  if($query){

    echo json_encode('Data inserted Successfully');
    //echo json_encode($_POST);
  } else {
    echo json_encode($_POST);
  }
}
}
 ?>
