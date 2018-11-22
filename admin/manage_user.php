<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
        $allimges[] = $_FILES['image']['name'][$i];
        $image_name = $_FILES['image']['name'][$i];
        $image_tmp = $_FILES['image']['tmp_name'][$i];
        $path = "../image_user/";
        move_uploaded_file($image_tmp, $path . $image_name);
    }
    $imgs = serialize($allimges);
    $sql = "INSERT INTO `users`(`username`, `email`, `password`, `phone`, `image`) "
            . "VALUES ('$name','$email','$password','$phone','$imgs')";
    mysqli_query($link, $sql);
    header("Location:manage_user.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Manage User</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Add User`s</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>UserName</label>
                                        <input class="form-control" placeholder="Username" name="username">
                                    </div>   

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" placeholder="Email" name="email">
                                    </div> 
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div> 
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" placeholder="Phone" name="phone">
                                    </div> 
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" multiple class="form-control" placeholder="Image" name="image[]">
                                    </div>  
                                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">View User</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post">
                                    <table class="table table-hover">
                                        <?php
                                        $query = "SELECT * FROM users ";
                                        $result = mysqli_query($link, $query);
                                        $users = array();
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $users [] = $row;
                                        }
                                        echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>UserName</th>";
                                        echo " <th>Email</th>";
                                        echo "<th>password</th>";
                                        echo "<th>Phone</th>";                                       
                                        echo "<th>Image</th>";
                                        echo "<th>Image</th>";
                                        echo " <th>Edit</th>";
                                        echo " <th>Delete</th>";
                                        echo "  </tr>";


                                        foreach ($users as $user) {
                                            echo "<tr>";
                                            echo "<td>{$user['user_id']}</td>";
                                            echo "<td>{$user['username']}</td>";
                                            echo "<td>{$user['email']}</td>";
                                            echo "<td>{$user['password']}</td>";
                                            echo "<td>{$user['phone']}</td>";
                                            $imgs = unserialize($user['image']);
                                            foreach ($imgs as $value) {
                                                echo "<td><img widht='50px;' height='50px;'  src='../image_user/{$value}'></td>";
                                            }

                                            echo "<td><a href='edituser.php?user_id={$user['user_id']}'>Edit</a></td>";
                                            echo "<td><a href='deleteuser.php?user_id={$user['user_id']}'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>

                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include '../include/admin_footer.php'; ?>