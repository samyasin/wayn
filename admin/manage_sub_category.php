<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';
$query = "SELECT * FROM category ";
$result = mysqli_query($link, $query);



if (isset($_POST['submit'])) {
    $sub_name = $_POST['sub_name'];
    $cate_id = $_POST['cate_id'];
    if($_FILES['sub_image']['error'] == 0) {
        $image_name = $_FILES['sub_image']['name'];
        $image_tmp = $_FILES['sub_image']['tmp_name'];
        $path = "../image_sub_category/";
        move_uploaded_file($image_tmp, $path.$image_name);
    }    
    $sql = "INSERT INTO `subcate`(`sub_name`, `sub_image`, `cate_id`) VALUES ('$sub_name','$image_name',$cate_id)";
    mysqli_query($link, $sql);
    header("Location:manage_sub_category.php");
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
                    <li class="active">Manage Sub Category</li>
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
                                        <input type="text" class="form-control" placeholder="Sub Category" name="sub_name">
                                    </div>     
                                    <div class="form-group">
                                        <label>Image Sub Category</label>
                                        <input type="file" multiple class="form-control" name="sub_image" placeholder=" Sub Image">
                                    </div> 

                                    <div class="form-group">
                                        <label>Category ID </label>
                                        <select class="form-control" name="cate_id">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$row['cate_id']}'>{$row['cate_name']}</option>";
                                            }
                                            ?>                                       
                                        </select>
                                    </div> 
                                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">View Sub Category</div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <?php
                                        $sqll = "SELECT *,category.cate_name FROM `subcate`
                                            inner join category on subcate.cate_id = category.cate_id";
                                        $res = mysqli_query($link, $sqll);
                                        $users = array();
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            $users [] = $row;
                                        }
                                        echo "<tr>";
                                        echo "<th>Sub Name</th>";
                                        echo "<th>Category Name</th>";
                                        echo "<th>Image</th>";
                                        echo " <th>Edit</th>";
                                        echo "<th>Delete</th>";
                                        echo "<tr>";
                                        foreach ($users as $row) {
                                            echo "<tr>";
                                            echo "<td>{$row['sub_name']}</td>";
                                            echo "<td>{$row['cate_name']}</td>";                                   
                                            echo "<td><img src='../image_sub_category/{$row['sub_image']}' width='50px' height='50px'></td>";
                                            echo "<td><a href='editsub.php?sub_id={$row['sub_id']}'>Edit</a></td>";
                                            echo "<td><a href='deletesub.php?sub_id={$row['sub_id']}'>Delete</a></td>";
                                            echo "</tr>";
                                        }                                       
                                        

//                                        while ($row = mysqli_fetch_assoc($res)) {
//                                            echo "<tr>";
//                                            echo "<td>{$row['sub_id']}</td>";
//                                            echo "<td>{$row['sub_name']}</td>";
//                                            $imgs = unserialize($row['image']);
//                                            foreach ($imgs as $value) {
//                                                echo "<td><img src='../image_sub_category/{$value}' width='50px' height='50px'></td>";
//                                            }
//
//                                            echo "<td><a href='editsub.php?sub_id={$row['sub_id']}'>Edit</a></td>";
//                                            echo "<td><a href='deletesub.php?sub_id={$row['sub_id']}'>Delete</a></td>";
//                                            echo "</tr>";
//                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
<?php include '../include/admin_footer.php'; ?>
