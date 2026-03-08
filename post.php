<?php
include('header.php');
include('index.php');

session_start();
include('dbconn.php');

if(!$_SESSION['user_id']){
        header('location:login.php');
}
    else{
        if($_SESSION['user_role'] == "author"){
            header('location:createPost.php');
        }
        else{
            header('location:dashboard2.php');
        }
    }



?>