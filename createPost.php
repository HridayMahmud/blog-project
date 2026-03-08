<?php
    include('header.php');
    include('index.php');
    
    include('dbconn.php');
    session_start();
    $author_id = $_SESSION['user_id'];
    if(!isset($_SESSION['user_id'])){
        header('location:login.php');
    }
    else{
        if($_SESSION['user_role'] == "author"){
        
        //sql for fetch value from categories table
            $sql = "SELECT * FROM `categories`";
            $result2 = mysqli_query($conn,$sql);

            if(!$result2){
                die('failed'.$mysqli_connect_error());
            }
        else{   
        if(isset($_POST['create_post'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_name = $_POST['category'];
        $name = $_FILES['image']['name'];

        $tmp_location = $_FILES['image']['tmp_name'];
        $our_location = "image/";
        if(!empty($name)){
            move_uploaded_file($tmp_location,$our_location.$name);
        }
        $query1 = "SELECT id FROM `categories` WHERE name = '$category_name' ";
        $result3 = mysqli_query($conn,$query1);
        $row = mysqli_fetch_assoc($result3);
        if($result3->num_rows > 0){
            $categoryId = $row['id'];
        }
        
        $query = "INSERT INTO `posts` (`title`,`content`,`author_id`,`category_id`,`image`) 
        VALUES ('$title','$content','$author_id','$categoryId','$name')";   

        $result = mysqli_query($conn,$query);
        if(!$result){
        die('failed'.$mysqli_connect_error());
        }
        else{
        header('location:createPost.php?postmsg=post successfully created');
        }
        }
   
    }

    }

    }

  

?>
<div class="post-container  d-flex justify-content-center">


 <div class="create-post col-12 col-md-8 col-lg-6 p-4">
      <form class="form-control" action="createPost.php" method="POST" enctype="multipart/form-data">
    
    <div>
        <label>Post Title:</label><br>
        <input class="form-control" type="text" name="title" required>
    </div>
    
    <br>

    <div>
        <label>Post Content:</label><br>
        <textarea  class="form-control" name="content" rows="7" cols="20" placeholder="What's on your mind?" required></textarea>
    </div><br>
    
    <label for="">Category</label><br>
    <select class="form-control" name="category" id="">
        <?php
        while($row = mysqli_fetch_assoc($result2)){
            ?>
        <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
        <?php

        }
        ?>
      
    </select><br>
     <!-- Image Upload Section -->
    <div>
        <label>Upload Image:</label><br>
        <input class="form-control" type="file" name="image"  id="">
    </div>

    <br>

    <button class="form-control btn btn-primary" type="submit" name="create_post">create Post</button>

</form>
    </div>
</div>
<?php
    if(isset($_GET['postmsg'])){
        echo "<h6 style='text-align:center;color:green;'>".$_GET['postmsg']."</h6>";
    }
?>