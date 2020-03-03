<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> cookie </title>
</head>
<body>

<form action ="cookie.php" method = "post" >
<input type = "text" name = "name" >
<input type = "submit" name ="submit" value ="add">
</form>


<br>

<form action ="session.php" method ="post">

<input type = "text" name = "text">
<input type = "submit" name ="start" value = "start session">
<input type = "submit" name ="end" value = "end session">

<br>

<?php

if(isset($_COOKIE["name"]) && !empty($_COOKIE["name"]))
{
    echo "added cookies"."\t".$_COOKIE["name"];
}
else
{
    echo "no text found"."<hr>";
    echo "<br>";

}

?>


<?php

if(isset($_SESSION["mysession"]) && !empty($_SESSION["mysession"]))
{
    echo $_SESSION["mysession"];

    //  session_unset();
     //session_destroy();
    // unset($_SESSION["mysession"]);
}
else
{
    echo "session doesn't set";   

}

?>
    
</body>
</html>