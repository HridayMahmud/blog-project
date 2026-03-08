<?php
    include('header.php');
    include('index.php');
    include('dbconn.php');

    // session_start();
    // if(isset($_SESSION['user_id'])){
        
    //     header('location:login.php');
    // }
    // else{
    //     if($_SESSION['user_role'] == "admin"){
    //         header('location:categorypage.php');
    //     }
    //     else{
    //         header('location:login.php');
    //     }
    // }
    
    if(isset($_POST['add_category'])){
        $name = $_POST['name'];

        $sql = "INSERT INTO `categories` (`name`) VALUES ('$name')";
        $result = mysqli_query($conn,$sql);

        if(!$result){
        die('failed'.mysqli_connect_error());
    }
    else{
        header('location:categoryPage.php?msg=category added successfully');
    }
   
    }

?>

<body>
    <h5 class="text-center mt-4" style="color:tomato;">Add category</h5>
    <div class="category-container d-flex justify-content-center">
        <div class="category w-25 p-4 ">
        <form action="categoryPage.php" method="post" class="form-control p-4">
                <input class="form-control" type="text" name="name" placeholder="enter category name" id=""><br>
                <input class="btn btn-success" type="submit" name="add_category" value="add category">
        </form>
    </div>
    </div>
    <?php 
    if(isset($_GET['msg'])){
        echo "<h5 style='text-align:center;color:green;'>".$_GET['msg']."</h5>";
    }
    ?>
    
</body>

