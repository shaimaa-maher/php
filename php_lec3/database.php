<?php

include 'config.php';
 
//connection
function connect()
{
     $servername = serverName ;
     $username = userName;
     $password = Password;
     $db = db;

     $conn = mysqli_connect($servername, $username, $password,$db);

 // Check connection

         if (!$conn)
           {
               die("Connection failed: " . mysqli_connect_error());
           }
            //echo "Connected successfully";
            //echo "<br>";
            // var_dump($conn);
            return $conn;
            
}

//insert function

           
    function insert($conn , $first_name,$last_name,$email,$gender,$receive)
    {
        $sql = "INSERT INTO `user` (`first_name` , `last_name`, `email`, `gender`, `receive`)
                 VALUES ('$first_name','$last_name','$email','$gender','$receive')";
        $res = mysqli_query($conn, $sql);

     if ($res)
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    }     
    
    
    
     //delete from database

     function delete($conn,$id)
     {
        //var_dump($conn);
        echo"<br>";
        $sql = "DELETE FROM `user` WHERE `id`=$id";

        if (mysqli_query($conn, $sql)) 
        {
            echo "Record deleted successfully";
        } 
        else
         {
            echo "Error deleting record: " .mysqli_error($conn);
        }
        
        mysqli_close($conn);
        
     }


     ?>
