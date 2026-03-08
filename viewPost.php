<?php
include('header.php');
include('index.php');
include('dbconn.php');

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:login.php');
} else {

    //users table fetch
    $id = $_SESSION['user_id'];
    $username = $_SESSION['user_name'];
    //  $sql = "SELECT name FROM `users` WHERE id = $id ";
    //  $result1 = mysqli_query($conn,$sql);
    //  if(!$result1){
    //     die('failed');
    //  }
    //  else{
    //     $row2 = mysqli_fetch_assoc($result1);
    //  }
    $query = "SELECT * FROM `posts` WHERE author_id = '$id' ";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('failed' . $mysqli_query_error());
    }
    // else{
    //      $row = mysqli_fetch_assoc($result);
    // }


    //delete


    if (isset($_GET['id'])) {
        echo "clicked";
        $id = $_GET['id'];
        $sql = "DELETE FROM `posts` WHERE id = '$id'";
        $result2 = mysqli_query($conn,$sql);
        if(!$result2){
            die('failed'.$mysqli_query_error());
        }
        else{
            header('location:viewPost.php?msg=post deleted successfully');
        }
    }

    //like count
  
   
}


?>

<div>
    <?php

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="post d-flex justify-content-center mt-4">

            <div class="p-4 w-50" style="box-shadow:0px 0px 2px gray;">
                <div class="" style="display:flex;justify-content:space-between;">

                    <div class="profile">
                        <img src="profile.jpg" alt="" width="50">
                        <span><?php echo strtoupper($username) ?></span>
                    </div>

                    <!-- <select  name="action">
                        <option  value="edit"><a href="editpost.php?id=<?php echo $row['id']; ?>">✏️ </a> </option>
                        <option  value="delete"><a href="editpost.php?id=<?php echo $row['id']; ?>">🗑️ </a></option>
        </select> -->
                    <div class="editOrdelete">
                        <a href="editpost.php?id=<?php echo $row['id']; ?>"><img src="edit.png" alt="" width="30" height="30"></a>
                        <a href="viewPost.php?id=<?php echo $row['id']; ?>"><img src="delete.png" alt="" width="30" height="30"></a>
                    </div>
                </div>


                <h1 class"text-center""><?php echo $row['title']; ?></h1><br>
                <p><?php echo $row['content'] ?></p><br>
                <div class="">
                    <img style="width:100%;" src="<?php echo $row['image']; ?>" alt="">
                    <div class="reaction" style="background:navy;padding:8px;display:flex;justify-content:space-around;">
                        <a href="viewPost.php" name="like"><img src="like.png" alt=""></a>
                        <a href="" name="comment"><img src="comment.png" alt=""></a>
                        <a href="" name="share"><img src="share.png" alt=""></a>

                    </div>
                </div>
            </div>


        </div>

    <?php
    }


    ?>
<?php
    if(isset($_GET['msg'])){
        "<h6 style='text-align:center;color:red;'>".$_GET['msg']."</h6>";
    }
?>
</div>