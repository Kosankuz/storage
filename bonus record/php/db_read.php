<?php

include 'db_connection.php';

$data = intval($_GET['q']);

$sql_read = "SELECT * FROM bonus ORDER BY bonus_pct ASC";

if($result = mysqli_query($db_connection, $sql_read)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_all($result)){

        $output = array($row);

        $jsonOutput = json_encode($output, JSON_PRETTY_PRINT);
      //  var_dump( $row[0]);
        //echo $row[0][1];
         echo $jsonOutput;
      }

        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
}

// Close connection
mysqli_close($db_connection);
?>
