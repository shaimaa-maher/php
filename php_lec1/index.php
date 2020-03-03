<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php


include 'config.php';
require 'users.php';
$limit = $_GET['limit'];



echo "Server :"."\t".$_SERVER['argc']."\t".$_SERVER['SERVER_SOFTWARE']."\t".$_SERVER['SERVER_ADDR'];
echo "<br>";
echo "<br>";

echo "Aplication name :"."\t".$version;
echo "<br>";
echo "<br>";

echo "<table class='anyClass'>";
echo "<tr>
      <th>Name</th>
      <th>Email</th>
      <th>Status</th>
     </tr>";
     $key = $limit;

     function compare($a, $b)
     {
       return strcmp($b['status'], $a['status']);
     }
   
     usort($user, 'compare');


    
foreach ($user as $key => $value)
 {
   if ($value['status'] == 0)
    {
       $value['status'] = "offline";
       echo 
    "<tr>
    <td>".$value['name']."</td> 
    <td>".$value['email']."</td> 
    <td>".$value['status']."</td>
    </tr>";
    }
    else
    {
        $value['status'] = "online";
    
    
    echo 
    "<tr >
    <td style ='color:red'>".$value['name']."</td> 
    <td style ='color:red'>".$value['email']."</td> 
    <td style ='color:red'>".$value['status']."</td>
    </tr>";
    }
   
    if($key+1 == $limit)
    {
    break;
    }
     
}
 


echo "</table>";


?>
</body>
</html>