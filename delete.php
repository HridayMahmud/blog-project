<?php
   
    include('dbconn.php');
    if(isset($_GET['id'])){
       
    $id = $_GET['id'];


    $query = "DELETE FROM `users` WHERE id = '$id'  ";
    
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("error:{$conn->error}");
    }
    else{
        header('location:dashboard.php?dltMessage=user deleted');
        exit();
    }


    }



?>