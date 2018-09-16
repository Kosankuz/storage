<?php
//Step1
 $db = mysqli_connect('127.0.0.1','root','root','crypto_db')
 or die('Error connecting to MySQL server.');
?>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL</h1>

<?php
//Step2
$query = "SELECT * FROM users";
mysqli_query($db, $query) or die('Error querying database.');

//Step3
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "user id " . $row['user_id'] . "<br>" ;
echo "user name " . $row['user_login'] . "<br>" ;





//Step 4
mysqli_close($db);
?>

</body>
</html>
