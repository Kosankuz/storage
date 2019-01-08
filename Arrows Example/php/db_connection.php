<?php

$server = "127.0.0.1:3306";
$user = "root";
$db_password = "root";
$db_name = "maindatabase";
// Create connection
$db_connection = new mysqli($server, $user , $db_password, $db_name);
// check connection
if($db_connection->connect_error){
  die('Connection failed:') . $db_connection->connect_error ;
}

//echo "Connected Successfully" . "<br><hr>" ;

// $conn->close(); // remember to close the connection

 ?>
