<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';

$admin_id  = $_GET['admin_id'];
$query     = " SELECT * FROM `admin` WHERE admin_id = $admin_id ";
$ress = mysqli_query($link, $query);
$userSet = mysqli_fetch_assoc($ress);

if(isset($_POST['submit']))
{
    $username  = $_POST['username'] ;
    $emial     = $_POST['email'];
    $pass      = $_POST['password'];
    
    $sql  = "UPDATE `admin` SET `username`='$username',"
            . "`email`='$emial',`password`='$pass' WHERE `admin_id` = $admin_id";
    
    mysqli_query($link, $sql);
    header("Location: manage_admin.php");
    
    
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
                    <li class="active">Edit manager admin</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Manager Admin</h1>
                </div>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Admin</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <label>UserName</label>
                                        <input class="form-control" name="username" value="<?php echo $userSet['username'];   ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" value="<?php echo $userSet['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>PassWord</label>
                                        <input class="form-control" name="password" value="<?php echo $userSet['password'];  ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>                       
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
include '../include/admin_footer.php';
?>