<?php

include 'db_connection.php';

if(isset($_POST)) {
    if(isset($_POST['data'])){


      //print_r($songData);
      $obj = json_decode(json_encode ($_POST['data']), FALSE);

      $write_sql = "INSERT INTO `bonus` (`id`, `bonus_pct`, `bonus_amount`,`active`) VALUES  (NULL,$obj[0],$obj[1],'')";

      if($obj[0] < 101 && $obj[0] >=0 ){
        if ($obj[1] < 101 && $obj[1] >=0 ) {
          $query = mysqli_query($db_connection,$write_sql);

          if($query){
            echo json_encode('Data inserted Successfully');

            //echo json_encode($_POST);
          }
        }


      } else{
        echo json_encode($_POST);
      }



}}




 ?>
