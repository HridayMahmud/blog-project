<?php

  define('hostname','localhost');
  define('username','root');
  define('password','');
  define('database','blogpostdb');
   


  $conn = mysqli_connect(hostname,username,password,database);
  if(!$conn){
    die('connection failed'.mysqli_connect_error());
  }
 


?>