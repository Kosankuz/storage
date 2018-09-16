<?php
require "db.php";

 $data = $_POST;                // all variables that returned by POST
 if( isset($data['do_signup']) )  //do_signup is a button  and we are checking if this buttona had been pressed
   // 3десь регистрация
{
$errors = array();      // array where we store all errors
if( trim($data['login']) == '') //checking login if it is empty
{
  $errors[] = 'Please enter Login!';
}
if( trim($data['email']) == '') //checking email if it is empty
{
  $errors[] = 'Please enter email!';
}
if( $data['password'] == '') //checking if password is not empty
{
  $errors[] = 'Please enter password!';
}

if( $data['password_2'] != $data['password']) //checking if 1 and and 2nd passwords match
{
  $errors[] = 'Passwords dont match!';
}

if( R::count('users',"login = ?", array($data['login'])) > 0  )
{
  $errors[] = 'User with this login already exists!';
}

if( R::count('users',"email = ?", array($data['email'])) > 0  )
{
  $errors[] = 'User with this email already exists!';
}

if( empty($errors) ){
  //all good no errors so we can register

$user = R::dispense('users');   // the following will create table and add necessary rows to the table Red Bean Library does this
$user->login = $data['login'];
$user->email = $data['email'];
$user->password = password_hash($data['password'],PASSWORD_DEFAULT); // password_hash() creates a new password hash using a strong one-way hashing algorithm. password_hash() is compatible with crypt(). Therefore, password hashes created by crypt() can be used with password_hash().
R::store($user);
echo '<div style="color:green;">Congratulations you have registered</div> <hr>' ; // displays only first element of errors array

} else {
  echo '<div style="color:red;">' . array_shift($errors) . ' </div> <hr>' ; // displays only first element of errors array
}
}
 ?>

 <form class="" action="signup.php" method="post">
   <p> <strong>Your Login</strong>: </p>
   <p> <input type="text" name="login" value="<?php echo @$data['login'] ?>"> </p>

   <p> <strong>Your Email </strong>: </p>
   <p> <input type="email" name="email" value="<?php echo @$data['email'] ?>"> </p>

   <p> <strong>Your Password</strong>: </p>
   <p> <input type="password" name="password" value=""> </p>

   <p> <strong>Please enter your password one more time</strong>: </p>
   <p> <input type="password" name="password_2" value=""> </p>

   <p>
<button type="submit" name="do_signup">Register</button>
   </p>
 </form>
