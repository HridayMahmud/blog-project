<?php
  
    include('header.php');
    include('index.php');
    session_start();

    include('dbconn.php');

    if(!isset($_SESSION['user_id'])){
      
        header('location:login.php');
    }
    else{

        if($_SESSION['user_role'] == "admin"){
        header('location:categoryPage.php');
        }

        else{
            header('location:dashboard2.php');
            
        }
    }

  
    
   ?>

