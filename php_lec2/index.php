<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<body>

    <?php

$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = "";

     if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST['submit'])) 
     {   
        $name =$_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];

        if (empty($_POST["name"]))
         {
            $nameErr = "Name is required";
         }
         else 
          {
              if (filter_var($name, FILTER_SANITIZE_STRING))
                {
                echo("$name is a valid name");
                 $name = 'Welcome '.$name;
                } 
              else 
                {
                echo("$name is not a valid name");
                }
          }

        echo "<br>";

          if (empty($_POST["email"]))
           {
            $emailErr = "Email is required";
           } 
          else
           {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                  {
                     echo("$email is a valid email address");
                     $email= 'your Email is '. $email;
                     $gender= 'and your gender is '.$gender;
                  }
               else
                  {
                  echo("$email is not a valid email address");
                  }
           }
     }


?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        enter your name : <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br>
        enter your email : <input type="text" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br>
        enter your gender: <br>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="checkbox" name="receive emails">
        <span> receive emails from us!</span>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>


    <?php
echo "<h2>Your Input:</h2>";
echo  "$name";
echo "<br>";
echo "$email";
echo "<br>";
echo "$gender";
?>
<!-- 
    Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?> <br>
Your  gender is: <?php echo $_POST["gender"]; ?>  -->

</body>

</html>