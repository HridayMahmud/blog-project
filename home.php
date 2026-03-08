<?php
include('header.php');
include('index.php');
session_start();

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
else{
    $user = $_SESSION['user_name'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view-post</title>
</head>
<body>
  <div class="view-post ml-4 d-flex gap-2 m-4">
     
     <div class="d-flex">
    <span ><?php echo $user; ?>'s</span>
     </div>
     <a  type="button" name="view-post" href="viewPost.php" style="text-decoration:none;color:blue;" >Feed</a>
     <a  type="button" name="view-post" href="allposts.php" style="text-decoration:none;color:blue;" >All posts</a>
     <a  type="button" name="view-post" href="createPost.php" style="text-decoration:none;color:blue;" >create post</a>
     

  </div>
</body>
</html>
