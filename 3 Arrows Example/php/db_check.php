<?php
include 'db_connection.php';
  $sql_read = "SELECT `typeOfSale`, `startDate`, `endDate` FROM setDate";
    if($result = mysqli_query($db_connection, $sql_read)){
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_all($result)){
            $output = array($row);
            $jsonOutput = json_encode($output, JSON_PRETTY_PRINT);
            $check = $output[0];
          }
           //  print_r($output[0][0]); echo "<br>";
           //  print_r($output[0][1]); echo "<br>";
           //  print_r($output[0][2]); echo "<br>";
           // Free result set
            mysqli_free_result($result);

        } else{
            echo "NoRecords";
        }
    }
// Close connection
//mysqli_close($db_connection);


 ?>
