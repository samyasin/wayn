<?php
ob_start();
include '../include/connection_db.php';
include '../include/admin_header.php';

$id = $_GET['sub_id'];
$query = "SELECT * FROM `subcate` WHERE sub_id = $id";
$result = mysqli_query($link, $query);
$userSet = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $sub_name = $_POST['sub_name'];
    $cate_id = $_POST['cate_id'];
    if($_FILES['sub_image']['error'] == 0){        
        $image_name = $_FILES['sub_image']['name'];
        $tmp_name = $_FILES['sub_image']['tmp_name'];
        $path = "../image_sub_category/";
        move_uploaded_file($tmp_name, $path . $image_name);
        $sql = "UPDATE `subcate` SET `sub_name`='$sub_name',`sub_image`='$image_name',`cate_id`=$cate_id WHERE sub_id = $id";
    }else{
        $sql = "UPDATE `subcate` SET `sub_name`='$sub_name',`cate_id`=$cate_id WHERE sub_id = $id";
    }  
    mysqli_query($link, $sql);
    header("Location: manage_sub_category.php");
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
                    <li class="active"> Edit Manage Sub Category</li>
                </ol>
            </div><!--/.row--> 
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Add Sub Category</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <input type="text" class="form-control" value="<?php echo $userSet['sub_name']; ?>"  name="sub_name">
                                    </div>     
                                    <div class="form-group">
                                        <label>Image Sub Category</label>
                                        <input type="file" multiple= class="form-control" name="sub_image" value="<?php echo $userSet['sub_image']; ?>" >
                                    </div> 
                                    <div class="form-group">
                                        <label>Category ID </label>
                                        <select class="form-control" name="cate_id">
                                            <?php
                                            $sql = "SELECT * FROM `category`";
                                            $res = mysqli_query($link, $sql);
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                echo "<option value='{$row['cate_id']}'";
                                                if($row['cate_id'] == $userSet['cate_id']){ echo "selected";}
                                                echo ">{$row['cate_name']}</option>";
                                            }
                                            ?>                                       
                                        </select>
                                    </div> 
                                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </body>
                </html>
                <?php
                include '../include/admin_footer.php';
                ?>