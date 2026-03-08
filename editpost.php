<?php
include('dbconn.php');
include('header.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
} else {
    if ($_SESSION['user_role'] == 'author') {
          //get id from spacific post
        $id = $_GET['id'];
        //sql for find id and fetch data
        $sql = "SELECT * FROM `posts` WHERE  id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
      
       
        //sql for fetch value from categories table
        $sql2 = "SELECT * FROM `categories`";
        $result2 = mysqli_query($conn, $sql2);

        if (!$result2) {
            die('failed' . $mysqli_connect_error());
        }
        
          //update post
        if(isset($_POST['edit_post'])){
            $id = $_POST['id'];
            $author_id = $_SESSION['user_id'];
            $category_id = $_POST['category'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $name = $_FILES['image']['name'];
            $tmp_location = $_FILES['image']['tmp_name'];
            $our_location = "image/";
            if(!empty($name)){
                move_uploaded_file($tmp_location, $our_location.$name);
            }

            $SQL = "UPDATE `posts` SET title = '$title', content = '$content', category_id = '$category_id', author_id = '$author_id' , image = '$name'  WHERE id = '$id'
            
             ";
            $result3 = mysqli_query($conn,$SQL);
            if(!$result3){
                die('failed'.mysqli_connect_error());
            }
            else{
                header('location:editpost.php?msg=post edited successfully');
            }

        }

      
    }
}

?>

<div class="post-container  d-flex justify-content-center">
    <div class="create-post col-12 col-md-8 col-lg-6 p-4">
        <form class="form-control" action="editpost.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

            <div>
                <label>Post Title:</label><br>
                <input class="form-control" type="text" name="title" value="<?php echo $row['title']; ?>" required>
            </div>

            <br>

            <div>
                <label>Post Content:</label><br>
                <textarea class="form-control" name="content" rows="7" cols="20" placeholder="What's on your mind?" required> <?php echo $row['content']; ?></textarea>
            </div><br>

            <label for="">Category</label><br>
            <select class="form-control" name="category" id="">
                <?php
                while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>

                    <option  value="<?php echo $row2['id']; ?>"> <?php echo $row2['name']; ?> </option>
                <?php
                }
                ?>

            </select><br>
            <!-- Image Upload Section -->
            <div>
                <label>Upload Image:</label><br>
                <input class="form-control" type="file" name="image" /><br>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">
           
            <button class="form-control btn btn-primary" type="submit"  name="edit_post">Edit Post</button>

        </form>
    </div>
    <?php      
    if(isset($_GET['msg'])){
        "<h6 style='text-align:center;color:green;'>".$_GET['msg']."</h6>";
    }
    ?>
</div>