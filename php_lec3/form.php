<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registration</title>
    <style>
          .error {color: #FF0000;}
    </style>
    
</head>
<body>


<?php
 include 'register.php';
?> 


<form method = "post" action ="register.php" class="form">

    enter your first name : <input type = "text" name = "firstName">
    <br>

    enter your last name : <input type = "text" name = "lastName">
    <br>

    enter your email :  <input type = "text" name = "email">
    <br>

    enter your gender: <br> 
   <input type="radio" name="gender" value="male" checked> Male<br>
   <input type="radio" name="gender" value="female"> Female<br>

   <input type="checkbox" name="receive_emails" value = "yes" >
   <span> receive emails from us!</span>
   <br>

   <input type = "submit" name = "submit" value = "Registe">

</form>


<?php
      echo $emailErr;
      echo "<br>";
?>

</body>
</html>