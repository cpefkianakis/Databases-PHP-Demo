<?php
   
   function OpenCon(){
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "password";
      $db = "db-project-demo";
      
      $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
      
      //echo "Connected successfully";
      return $conn;
   }
   
   function CloseCon($conn){
      $conn -> close();
   }  


?>