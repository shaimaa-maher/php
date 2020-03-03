<?php
session_start();
$str = "";

if($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST['start']))
{
    
    $str = $_POST["text"];
    $_SESSION["mysession"] = $str;
    header("location:index.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST['end']))
{
    
    session_unset();
    session_destroy();
    header("location:index.php");
}
?>