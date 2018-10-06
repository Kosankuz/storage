<?php

require 'db.php';
//require 'db_log.php';
require 'get_ip.php';

$data = $_POST;

if(isset($data['do_login']) ){ // if login button is pressed do
$errors = array();
$login = strtolower($data['login']);
$password = $data['password'];
$sql_login = "SELECT login FROM users WHERE login = '$login'";
$sql_password = "SELECT password FROM users WHERE login = '$login'";
$result_login = mysqli_query($db,$sql_login);
$result_password = mysqli_query($db,$sql_password);
$password_array = mysqli_fetch_array($result_password,MYSQLI_ASSOC);
$count = mysqli_num_rows($result_login);
$user_ip = getUserIP();


$time_stamp = date('l \t\h\e jS') ." ". date("h:i:sa");


if($count == 1 ){    // checking if login exists

if ( password_verify($data['password'],$password_array['password']) ) // checking if password match
{ //if all good we need to login the user and log the user
$login_status = "yes";
$log_query = "INSERT INTO logs  VALUES (NULL, '$login', '$time_stamp', '$user_ip' , '$login_status')";
mysqli_query($db, $log_query);

$_SESSION['logged_user'] = $login;
header('Location: /index.php');

} else{
  $errors[] = "Invalid password";

}

}else{
  $errors[] = "Invalid Login";

}
if( ! empty($errors) ){
  $login_status = "No";
  $log_query = "INSERT INTO logs  VALUES (NULL, '$login', '$time_stamp', '$user_ip' , '$login_status')";
  mysqli_query($db, $log_query);

echo '<div style="color:red;">'. array_shift($errors). '</div><hr>';
 }
}

 ?>
 <form class="" action="/login.php" method="POST">
   <p>
    <p> <strong>Login</strong>:</p>
     <input type="text" name="login" value="">
   </p>

   <p>
    <p> <strong>Password</strong>:</p>
     <input type="password" name="password" value="">
   </p>

   <p>

   <button type="submit" name="do_login">Log In</button>

   </p>

<p>
<a href="/register.php" type="button">register</a>
</p>
 </form>
