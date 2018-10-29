
<?php
require "db.php";

?>
<?php if(isset($_SESSION['logged_user']) ) : /* checking if user already authorised  and if yes then*/ ?>

Authorised!!! <br>
Hello , <?php echo $_SESSION['logged_user'];
echo "<br>";
$login = $_SESSION['logged_user'];
$get_log_query =  "SELECT * FROM logs WHERE login = '$login'";
$log_string = mysqli_query($db_log, $get_log_query);

while($string_output = mysqli_fetch_array($log_string,MYSQLI_ASSOC)){
  echo $string_output['login'] ;
  echo "<br>";
  echo $string_output['date'] ;
  echo "<br>";
  echo $string_output['ip'] ;
  echo "<br>";
  echo "Successful connection - " . $string_output['success'] ;
  echo "<br>";
  echo "<hr>";
}

 ?>
<hr>
<a href="/logout.php">log Out</a>
<?php else : ?>
  You are not authorized! <br>
<a href="/login.php">Log In</a> <br>
<a href="/signup.php">Sign Up</a>
<?php endif; ?>

<?php echo $dyn_table; ?>
