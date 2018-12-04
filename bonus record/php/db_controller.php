<?php

include 'db_connection.php';


// make a record

$data = $_POST;


// msql query insert
/*$sql_insert = "INSERT INTO `bonus` (`id`, `bonus_pct`, `bonus_amount`) VALUES (NULL, '25', '50')";

if ($db_connection->query($sql_insert) === TRUE){
  echo "records created";
} else{
  echo 'insert error' . mysqli_error($db_connection);
}
*/
//mysql read query


$sql_read = "SELECT * FROM bonus";
$result = $db_connection->query($sql_read);

if($result->num_rows > 0 ){
  //output data of each row
    while($row = $result->fetch_assoc()) {
    echo $row['id'] . " " . " bonus pct:" . $row['bonus_pct'] . ' bonus_amount: ' . $row['bonus_amount'];

  //fetch mysql result to array
}

}

?>
