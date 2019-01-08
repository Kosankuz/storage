<?php

include 'db_connection.php';

$data = intval($_GET['q']);

$sql_read = "SELECT * FROM arrowSteps";

if($result = mysqli_query($db_connection, $sql_read)){
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_all($result)){
        $output = array($row);
        $jsonOutput = json_encode($output, JSON_PRETTY_PRINT);
         echo $jsonOutput;
      }
       // Free result set
        mysqli_free_result($result);
    } else{
        echo "NoRecords";
    }
}

// Close connection
mysqli_close($db_connection);
?>
