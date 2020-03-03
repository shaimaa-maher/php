<?php

include 'database.php'; //to insert data after validation ^_^

$fnameErr = $lnameErr =$emailErr = $genderErr = "";
$name = $email = $gender =  "";
$receive = "no";
$error =array();
$conn = connect();

     if ($_SERVER['REQUEST_METHOD'] == "POST"  &&  isset($_POST['submit'])) 
      {  

        $first_name = $_POST["firstName"];
        $last_name = $_POST["lastName"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];

        //if press the checkbox
        
        if(isset($_POST['receive_emails']))
            {
              $receive = $_POST["receive_emails"];
            } 

        // view returned data

        // echo $first_name ."\t". $last_name ."\t". $email ."\t". $gender ."\t".$receive;
        // echo "<br>";
//-----------------------------------------------------------------------------------------------------------------

        //----------------||
        //name validation ||
        //----------------||


        // function test($data) {
        //  // $data = trim($data);
        //   $data = stripslashes($data);
        //   $data = htmlspecialchars($data);
        //   return $data;
        // }
         
        if (empty($_POST["firstName"]))
         {
            $fnameErr = "First Name is required";
            array_push($error,$fnameErr);
         }
        else 
         {
               if (filter_var($first_name, FILTER_SANITIZE_STRING) == false)
                {
                  //echo("$first_name is not a valid name");
                  array_push($error,"is not a valid first name");
                }
         }


         if (empty($_POST["lastName"]))
         {
            $lnameErr = "Last Name is required";
            array_push($error,$lnameErr);
         }
        else 
         {
               if (filter_var($last_name, FILTER_SANITIZE_STRING == false))
                {
                  
                  array_push($error,"is not a valid last name");
                }
         }

         
        
        // email validation
  
         if (empty($_POST["email"]))
             {
               $emailErr = "Email is required";
               array_push($error,$emailErr);
             } 
                   
         else
             {
              if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
                 {
                  
                  array_push($error,"is not a valid email address");
                 }

             }
             
             if (!count($error)) 
             {
                 echo $first_name ."\t". $last_name ."\t". $email ."\t". $gender ."\t".$receive;
                 echo "<br>";
                 insert($conn ,$first_name,$last_name,$email,$gender,$receive);
                 $file = fopen("shaimaa.txt", "a");
                 var_dump($file);
                 $data = $first_name .",". $last_name.",".$email.",".$gender.",".$receive.PHP_EOL;// PHP_EOL : new line
                 fwrite($file,$data);
                 fclose($file);
                 echo "<br>";
                 echo "file inserted";
             }
             else
             {
               foreach ($error as $value) 
               {
                 echo "$value";
                 echo "<br>";
               }
             }
             
             
      }
?>