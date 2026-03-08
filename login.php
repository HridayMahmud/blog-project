<?php
include('dbconn.php');
include('header.php');
include('index.php');

    if(isset($_POST['login'])){
      
        $email = $_POST['email'];
        $password = $_POST['password'];

    //session start
    session_start();

    $query = "SELECT * FROM `users` WHERE email = '$email' ";
    $result = mysqli_query($conn,$query);
    
    if(!$result){
        echo "error:".$mysqli_connect_error();
    }

      else{
       if($result->num_rows > 0){
            // get all rows as associated arrow
        $row = mysqli_fetch_assoc($result);

        // check password or email
        if($password == $row['password']){

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_role'] = $row['role'];
            header('location:login.php?msg=Login Successfull');
            exit();
        }
        else{
            header('location:login.php?validation_msg=Wrong password!');
            exit();
        }
        
       }
       else{
        header('location:login.php?exist_msg=User NOT EXIST!');
       }
    }
  
        
    }

?>


    <div class="login-container mt-4 mb-4 d-flex justify-content-center" >
    <div class="login w-25" >
          <h2 class="text-center" style="color:tomato;">Login Into Your Account</h2>
        <form class="form-control" action="login.php" method="post">
            <input type="text" class="form-control" name="email" required placeholder="Enter your email" id=""><br>
            <input type="password" class="form-control" placeholder="Enter your password" name="password" id=""><br>
            <input type="submit" style="margin-bottom:10px;" class="form-control btn btn-success" name="login" value="Login">
            <p class="text-center">Logged In? <span><a href="register.php">Register</a></span></p>
            
        </form>
    </div>

    </div>
    <?php 
     if(isset($_GET['msg'])){
        echo "<h5 style='color:green;text-align:center;margin-top:10px;'>".$_GET['msg']. "<a href='dashboard2.php'>Dashboard</a>"."</h5>";
    }

    if(isset($_GET['validation_msg'])){
        echo "<h5 style='color:red;text-align:center;'>".$_GET['validation_msg']."</h5>";
    }

    if(isset($_GET['exist_msg'])){
        echo "<h5>".$_GET['exist_msg']."</h5>";
        
    }
    ?>

    <?php include('footer.php');?>

