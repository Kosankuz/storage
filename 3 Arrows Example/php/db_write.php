<?php

include 'db_connection.php';
include 'db_check.php';


if(isset($_POST)) {
    if(isset($_POST['data'])){
      $obj = json_decode(json_encode ($_POST['data']), FALSE);
        $write_sql = "UPDATE setDate SET startDate ='$obj[0]' , endDate = '$obj[1]'  WHERE typeOfSale = '$obj[2]'";

  //echo "obj[2]  =  " . $obj[2]; echo '<br>';
//  echo "obj[2]  =  " . $check[0][1]; echo '<br>';
//  echo "obj[2]  =  " . $check[0][2]; echo '<br>';
//  echo "obj[0]  =  " . $obj[0]; echo '<br>';
  //echo "obj[1]  =  " . $obj[1]; echo '<br>';

echo $check[1][0];
echo $check[1][2];


        if($obj[2]==$check[0][0]){
//private sale
          if($obj[0] <= $check[1][1] || $obj[0] >=$check[1][2]){
              if($obj[1] <= $check[1][1] || $obj[1] >=$check[1][2]){
                $query = mysqli_query($db_connection,$write_sql);
              }

          } elseif ($obj[2]==$check[1][0]) {
//pre-sale
            if($obj[0] <= $check[0][1] || $obj[0] >=$check[0][2]){
             if($obj[1] <= $check[0][1] || $obj[1] >=$check[0][2]){
                $query = mysqli_query($db_connection,$write_sql);
             }
            }
          } elseif ($obj[2]==$check[2][0]) {
//public sale
            if($obj[0] >= $check[2][1] || $obj[0] >= $check[2][2]){
              if($obj[1] >= $check[2][1] || $obj[1] >= $check[2][2]){
                $query = mysqli_query($db_connection,$write_sql);
              }

            }
          }

        }  else {
          echo 'check the '.$obj[2] .' start and end date';
          }



      if($query){
        echo json_encode('Data Inserted Successfully');
        //print_r($obj);
      //  print_r($check);
      }else {
      echo  mysqli_error($db_connection);
      }
      mysqli_close($db_connection);
      }}

 ?>
