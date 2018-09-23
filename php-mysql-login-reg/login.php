<?php

require 'db.php';
$data = $_POST;
if(isset($data['do_login']) )   //if button login is pressed
{
  $errors = array();
  $user = R::findOne('users', 'login = ?', array($data['login'])); //red bean lib usage  please see red bean for reference https://redbeanphp.com/index.php?p=/crud
  if( $user )
  {
//if login exists

if( password_verify($data['password'], $user->password) )
{

// all good now we have to login user

$_SESSION['logged_user'] = $user;
echo '<div style="color:green;">"You have logged in <br> You now can go to <a href="/"> Main </a> page! "</div><hr>';

} else {
  $errors[] = 'Incorrect password';
}

  }else{
    $errors[] = 'User  with this login doesnt exist';
  }
  if( ! empty($errors) )
  {
    echo '<div style="color:red;">'. array_shift($errors). '</div><hr>';
  }
}
 ?>

 <form class="" action="login.php" method="POST">
   <p>
    <p> <strong>Login</strong>:</p>
     <input type="text" name="login" value="<?php echo @$data['login'] ?>">
   </p>

   <p>
    <p> <strong>Password</strong>:</p>
     <input type="password" name="password" value=" <?php echo @$data['password'] ?> ">
   </p>

   <p>

   <button type="submit" name="do_login">Log In</button>

   </p>

 </form>
