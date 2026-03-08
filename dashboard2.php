<?php
include('header.php');
include('index.php');
include('dbconn.php');

//session resume
session_start();

//destroy all the stored data associated with the current session
// session_destroy();
//set session

    if(!isset($_SESSION['user_id'])){
        header('location:login.php');
    }
    else{
          if($_SESSION['user_role'] == "admin"){
        echo "<h6 style='text-align:center;margin-top:10px;'>you are {$_SESSION['user_role']} <a href='category.php'>Add category</a> or  <a href='logout.php'>Log out</a>      </h6>";
    }
    else if($_SESSION['user_role'] == "author"){
       echo "<h6 style='text-align:center;margin-top:10px;'>you are {$_SESSION['user_role']} <a href='post.php'>Create post</a> or  <a href='logout.php'>Log out</a>      </h6>";
    }
    else{
        echo "<h6 style='text-align:center;margin-top:10px;'> your are {$_SESSION['user_role']}  <a href='logout.php'>Log out</a>   </h6>";
    }
       
    }


?>

    
</body>
</html>