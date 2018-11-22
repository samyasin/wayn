<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';
$user_id = $_GET['user_id'];
$query = "SELECT * FROM `users` WHERE  user_id = $user_id";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
if (isset($_POST['update'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $phone = $_POST['phone'];
    
        for($i=0; $i < count($_FILES['image']['name']);$i++)
        {
        $allimages[] = $_FILES['image']['name'][$i];
        $image_name  = $_FILES['image']['name'][$i];
        $image_tmp   = $_FILES['image']['tmp_name'][$i];
        $path        = "../image_user/";
        move_uploaded_file($image_tmp,$path.$image_name);
        }
        $imgs = serialize($allimages);
        $query = "UPDATE `users` SET `username`='$name',"
                . "`email`='$email',`password`='$pass',`phone`='$phone',`image`='$imgs' WHERE user_id = $user_id";
        mysqli_query($link, $query);
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
                    <li class="active">Manage Users</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Users</h1>
                </div>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Users</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group" >
                                        <label>User Name</label>
                                        <input class="form-control" placeholder="User Name" name="username" value="<?php echo $row['username'] ?>">
                                    </div>   
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="email" name="email" value="<?php echo $row['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="password" name="password" value="<?php echo $row['password'] ?>">
                                    </div>
                                    <div class="form-group"P
                                         <label>Phone</label>
                                        <input class="form-control" placeholder="Phone" name="phone" value="<?php echo $row['phone'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image[]" multiple>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>                       
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </body>
</html>
<?php include '../include/admin_footer.php'; ?>