<?php

include 'db_connection.php';

if(isset($_POST)) {
    if(isset($_POST['data'])){
      $obj = json_decode(json_encode ($_POST['data']), FALSE);
      $clear_sql = "UPDATE arrowSteps SET status = 0 ";
      $query = mysqli_query($db_connection,$clear_sql);
    if($query){
        $write_sql = "UPDATE arrowSteps SET status = 1  WHERE arrowname = '$obj[0]'";
        $query = mysqli_query($db_connection,$write_sql);
        echo json_encode('Data Inserted Successfully');
      }else {
        echo  mysqli_error($db_connection);
      }
      mysqli_close($db_connection);
}}

 ?>
