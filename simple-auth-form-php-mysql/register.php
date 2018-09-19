<?php
require "db.php"
?>

<?php

$data = $_POST;

if (isset($_POST['do_register']) ){

$errors = array(); // array where we store all our errors
if ( trim($data['username']) == '' ) // checking if username entry is empty or not
{
  $errors[] = 'Please eneter username';

}
if ( trim($data['login']) == '' ) // checking if login entry is empty or not
{
  $errors[] = 'Please eneter login';
}

if ( trim($data['email']) == '' ) // checking if email entry is empty or not
{
  $errors[] = 'Please eneter email';
}

if ( $data['password'] == '' ) // checking if password entry is empty or not
{
  $errors[] = 'Please eneter password';

}



$username = $data['username'];
$login = $data['login'];
$email = $data['email'];
$password = $data['password'];
$r_password = $data['r_password'];

if ($password != $r_password){
  $errors[] = 'Password dont match';
}



$password = password_hash($password,PASSWORD_DEFAULT);
$check_user = "SELECT * FROM users WHERE username = '$login'";
$check_email = "SELECT * FROM users WHERE email = '$email'";
$result_user = mysqli_query($db, $check_user);
$result_email = mysqli_query($db, $check_email);

if (mysqli_num_rows($result_user) > 0 ) {
  $errors[] = "Sorry this login is already taken";

}
if (mysqli_num_rows($result_email) > 0 ) {
  $errors[] = "Sorry this email is already taken";
}
if ( empty($errors) ){

  $query = "INSERT INTO users  VALUES (NULL, '$username', '$login', '$email', '$password')";
  mysqli_query($db, $query);
  mysqli_close($db);
  echo '<div style="color:green;">Congratulations you have registered</div> <hr>' ; // displays only first element of errors array
  header('Location /');
} else {
echo '<div style="color:red;">' . array_shift($errors) . ' </div> <hr>' ; // displays only first element of errors array
}

}
 ?>

<form class="" action="register.php" method="post" >
  <input type="text" name="username" value="" required placeholder="Enter User Name" > <br>
  <input type="text" name="login" value="" required placeholder="Enter Login" > <br>
  <input type="email" name="email" value="" required placeholder="Enter Email" ><br>
  <input type="password" name="password" value="" required placeholder="Enter password" ><br>
  <input type="password" name="r_password" value="" required placeholder="Re-Enter password" ><br>
  <button type="submit" name="do_register" >register</button>
</form>
