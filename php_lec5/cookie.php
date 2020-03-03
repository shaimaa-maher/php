<?php
 
 $str = "";

 if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST['submit'])) 
 {
     
    if(isset($_POST["name"]) && !empty($_POST["name"])){
        $str = $_POST['name'];
        $cookie_name = "name";
        $cookie_value = $str;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    }
   
    else
    {
        setcookie("name","", time() - 3600,"/");
    }
  
    header("location:index.php");// go to index.php again.  
 }



?>