<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';
$id = $_GET['cate_id'];
$query = "SELECT * FROM `category` WHERE cate_id = $id";
$res = mysqli_query($link, $query);
$userSet = mysqli_fetch_assoc($res);


if (isset($_POST['update'])) {
    $name      = $_POST['name'];
    $cat_order = $_POST['cat_order'];
    if($_FILES['image']['error'] == 0)
    {
        $image_name  = $_FILES['image']['name'];        
        $image_tmp    = $_FILES['image']['tmp_name'];
        $path         = "../image_category/";
        move_uploaded_file($image_tmp,$path.$image_name);
        $sql = "UPDATE `category` SET `cate_name`='$name',`image`='$image_name', cat_order = $cat_order WHERE cate_id = $id";
    }else{
        $sql = "UPDATE `category` SET `cate_name`='$name',cat_order = $cat_order WHERE cate_id = $id";
    }
    mysqli_query($link, $sql);
    header("Location:manage_category.php");
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
                    <li class="active">Edit Manage Category</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Categoty</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" value="<?php echo $userSet['cate_name']; ?>" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Category Order</label>
                                        <select name="cat_order" class="form-control">
                                            <?php for ($index = 1; $index <= 20; $index++) {
                                                echo "<option value='$index'";
                                                if($index == $userSet['cat_order']){ echo "selected";}
                                                echo ">$index</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
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
include '../include/connection_db.php';
?>