<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
      table {
               width: 40%;
               border-collapse: collapse;
            }

      table, th, td {
                          border: 1px solid black;         
            }
    </style>
</head>
<body>

   <a href="/php_lec3/form.php">Regiser</a>
   <br>

   <?php

    //connection.
    include 'database.php'; // to connect to mysql.
     $conn = connect();
    echo "<br>";
    //var_dump($conn);
    
    //view table

    $query = "SELECT * FROM user"; 
    $result =  mysqli_query($conn,$query);

    echo "<table>"; // table tag in the HTML
    echo "<tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>receive</th>
      <th>action</th>
      <th>Update</th>
     </tr>";
     

     //to delete a record from the table
     if ($_SERVER['REQUEST_METHOD'] == "POST") 
     {
         $userID = $_POST['id'];
         delete($conn ,$userID);
     }

    //extract the data from database into the table
     while($row = mysqli_fetch_assoc($result))
     { 
       $id= $row['id'];
       echo "<tr>";
       echo "<td>" . $row['first_name'] ."</td>";
       echo "<td>" . $row['last_name'] . "</td>";
       echo "<td>" . $row['email'] .     "</td>";
       echo "<td>" . $row['gender'] .    "</td>";
       echo "<td>" . $row['receive'] .   "</td>";
       echo "<td>" ."<form method = 'post' action = 'index.php'>
                        <button>Delete</button>
                        <input type='hidden' name = 'id' value = '$id'>
                    </form>".
            "</td>" ;
       echo "<td>" ."<form method = 'get' action = 'index.php'>
                           <button>Update</button>
                           <input type='hidden' name = 'id' value = '$id'>
                     </form>".
            "</td>" ;
       echo " </tr>";
             
     }
   
    echo "</table>"; //Close the table in HTML
    mysqli_close($conn);
 
   ?>
</body>
</html>