<?php

/*$temp_files = glob(__dir__.'/referral/css/*.css');

foreach($temp_files as $file) {
  echo "$file <br>";
} */

//foreach (glob(__dir__. '/referral/css/*.css') as $filename) {
  //  echo "$filename размер " . filesize($filename) . "\n";
//}

$post = $_POST;
if(isset($_POST['write'])){
  $fh = fopen('test.html', 'a+') or exit('Unable to open a file]');
  fwrite($fh, "<script>alert('You made it!')</script>" );
  fclose($fh);


echo $_POST['html'];
$fileContent = file_get_contents('test.html');

}




 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<form class="" action="index.php" method="post">

  <textarea name="html" rows="8" cols="80"></textarea>
  <br>
  <button type="submit" name="write">submit</button>
</form>

<div class="">
  <p> <?php echo "Body of html : " . $fileContent  ; ?> </p>
</div>
  </body>
</html>
