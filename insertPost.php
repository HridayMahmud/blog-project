<?php
include('header.php');
include('dbconn.php');
 
session_start();

    if(!isset($_SESSION['user_id'])){
        header('location:login.php');
    }
    else{
    if($_SESSION['user_role'] == "author"){
        header('location:createPost.php');

    }
    else{
        echo"you are not author , you can not create post";
    }

    }

?>