<?php
    include('dbconn.php');
    include('header.php');
    include('index.php');

?>
    <div class="darshboard-container">
        <h1 class="text-center" style="color:tomato;">Database</h1>
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <thead>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Delete</th>
                </thead>
            </tr>
            <tbody>
    <?php
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die('failed'.$mysqli_error());
    }
    else{
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id'] ;?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['role']  ?></td>
                    <td><a href="delete.php?id=<?php echo $row['id'];?>"  class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
    }
    ?>

                
                    
                
            </tbody>
        </table>
    <?php
    if(isset($_GET['dltMessage'])){
        echo "<h6 style='text-align:center;color:red;'>".$_GET['dltMessage']."</h6>";
    }
    ?>
    </div>
    <?php include('footer.php')?>

