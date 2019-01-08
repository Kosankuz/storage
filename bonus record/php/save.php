<?php

include 'db_connection.php';

if(isset($_POST)) {
    if(isset($_POST['data'])){
    //print_r($songData);
      $obj = json_decode(json_encode ($_POST['data']), FALSE);

      if ($obj[1] < 101 && $obj[1] >=0 ){
        if ($obj[2] < 101 && $obj[2] >=0 ){
      $updateSql = "UPDATE bonus SET bonus_pct = $obj[1] , bonus_amount = $obj[2] WHERE id= $obj[0]";

      $query = mysqli_query($db_connection,$updateSql);
      if($query){
        echo json_encode('Data inserted Successfully');
      }
    }
  } else {
        echo json_encode($_POST);
        echo mysqli_error($db_connection);
      }

}}
?>
