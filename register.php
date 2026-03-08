<?php
 include('dbconn.php');
 include('header.php');
 include('index.php');

 if(isset($_POST['register'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    //session start here
    session_start();
    
    $sql = "SELECT *FROM `users` WHERE email = '$email'";
    $find = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($find);
    if($find->num_rows > 0){
        header('location:register.php?exist=user already exist');
    }
    else{

        $query = "INSERT INTO `users` (`name`,`email`,`password`,`role`)
        values ('$name','$email','$password','$role')
      ";

    $result = mysqli_query($conn,$query);
    if(!$result){
        die('registration failed'.mysqli_error());
    }
    else{
        header('location:register.php?message=registration successfull');
    } 
    }

     
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="register-container mt-4 d-flex justify-content-center">
    <div class="register w-25">
          <h2 class="text-center text-success">Register Your Accout</h2>
        <form class="form-control" action="register.php" method="post">
            <input type="text" style="margin-top:10px;" class="form-control" name="name" required placeholder="Enter your name" id=""><br>
            <input type="text" class="form-control" name="email" required placeholder="Enter your email" id=""><br>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" id=""><br>
            Role:<br>
            <select class="form-control" name="role" id=""><br>
                <option  value="author">author</option>
                <option value="subscriber">subscriber</option>
                <option value="admin">admin</option>
            </select><br>
            <input type="submit" style="margin-bottom:10px;" class="form-control btn btn-success" name="register" value="register">
            <p class="text-center">Registered? <span><a href="login.php">login</a></span></p>
            
        </form>
    </div>

    </div>
    <?php 
  
     if(isset($_GET['message'])){
        echo "<h6 style='text-align:center;color:green;'>".$_GET['message']."</h6>";
    }
      if(isset($_GET['exist'])){
        echo "<h6 style='text-align:center;'>".$_GET['exist']."</h6>";
    }

    ?>
    <?php include('footer.php');?>
</body>
</html>
