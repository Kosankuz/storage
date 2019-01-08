<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <?php
     include 'php_template/link_script.php';
     ?>
  </head>
  <body>

    <div class="container">

      <?php
       include 'php_template/header.php';
       ?>



    <div class="body mouse" id="body">

    <div class="row">
     <div class="col-md-12 ">
      <h2 style="margin:15px 0 0 15px;"class="headerText">CSS Example</h2>

      <div class="" style="display:flex">
        <p id="cssText" class="bodyContent" style="border:solid 1px black">

       .headerText{<br>
         color:<span style="color:white;background-color:black">white;</span><br>
         font-family: Palatino;<br>
         margin-top:10px;<br>
       }<br>

       .body{<br>
       background-color:<span style="color:#b1c9c1;background-color:black">#b1c9c1;</span><br>
       height:auto;<br>
       margin: 5px;<br>

       }<br>
       .bodyContent{<br>
         margin:15px;<br>
         padding: 15px;<br>
         width:200px;<br>
         background-color:<span style="color:#cfd4e4;background-color:black"> #cfd4e4;</span><br>
       }<br>

     </p>
     <p id="bodyText" class="bodyContent bodyText"  style="border:solid 1px black;width:100%;word-wrap:break-word" >

     Cascading Style Sheets (CSS) is a style
     sheet language used for describing the
     presentation of a document written in a markup language like HTML.
     On the left hand side , you can see simple example of
     CSS code. With this code we have manged to add style to current page. <br>
     "." - symbol is a reference to a class of HTML element. <br>
     Also you can use differnet symbols to target element by : <br>
     <em>"#"</em> - Element ID. <br>
     <em>"tagName(div)"</em> - Tag element . <br>
     </p>
      </div>

   </div>
  </div>
 </div>
 <?php
  include 'php_template/footer.php';
  ?>

    </div>

  </body>
</html>
