<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';

if (isset($_POST['submit'])) {
    $name      = $_POST['cate_name'];
    $cat_order = $_POST['cat_order'];
    if($_FILES['cate_image']['error'] == 0){
        $image_name = $_FILES['cate_image']['name'];        
        $tmp_name   = $_FILES['cate_image']['tmp_name'];
        $path = "../image_category/";
        $mov = move_uploaded_file($tmp_name, $path . $image_name);
    }   
    $query = "INSERT INTO `category`(`cate_name`, `image`,cat_order) VALUES ('$name','$image_name',$cat_order)";
    mysqli_query($link, $query);
    header("location:manage_category.php");
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
                    <li class="active">Manage Category</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Add Categoty</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" placeholder="Category_name" name="cate_name">
                                    </div>   

                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file"  class="form-control" placeholder="Category_Image" name="cate_image">
                                    </div>  
                                    <div class="form-group">
                                        <label>Category Order</label>
                                        <select name="cat_order" class="form-control">
                                            <?php for ($index = 1; $index <= 20; $index++) {
                                                echo "<option value='$index'>$index</option>";
                                            } ?>
                                        </select>                                        
                                    </div>  
                                    <button type="submit" class="btn btn-primary" name="submit">Create</button>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">View Category</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Order</th>
                                        <th>Image</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>                            
                                    <?php
                                    $sql = "SELECT * FROM category";

                                    $res = mysqli_query($link, $sql);

                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<tr>";
                                        echo "<td>{$row['cate_name']}</td>";                                           
                                        echo "<td>{$row['cat_order']}</td>";                                           
                                        echo "<td><img style='width:70px;' src='../image_category/{$row['image']}'></td>";                                        
                                        echo "<td><a href='edit_category.php?cate_id={$row['cate_id']}'>Edit</a></td>";
                                        echo "<td><a href='deletecate.php?cate_id={$row['cate_id']}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php include '../include/admin_footer.php'; ?>