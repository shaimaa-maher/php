<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>file system</title>
</head>
<body>
    <?php

        $arr_file = array();        
        //echo file_exists("/php_lec4/my_file.txt");
        $file =  file_get_contents("my_file.txt");

        //Output lines until EOF is reached
            // while(! feof($file)) {
            // $line = fgets($file);
            // echo $line. "<br>";
            // }
       foreach (preg_split("/\s+/",$file) as $value)
        {
          $value = strtolower($value);
          
          if (isset($arr_file[$value]))
           {
            $arr_file[$value] ++ ;
           }
           else
           {
               $arr_file[$value] =1;
           }
        }


       // print_r($arr_file);
        arsort($arr_file);

        // foreach ($arr_file as $key => $value)
        //  {
        //    echo $key ."=>".$value.
        // "<br>" ;      
        // }

        $val=key($arr_file);//get first index in array.
        echo $val."=>".$arr_file[$val] ;

        fclose($file);

    ?>
</body>
</html>