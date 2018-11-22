<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';

$query = "SELECT * FROM subcate";
$result = mysqli_query($link, $query);


if (isset($_POST['submit'])) {   
    $name     = $_POST['name'];
    $address  = $_POST['address'];
    $location = $_POST['location'];
    $contact  = $_POST['contact'];
    $notes    = $_POST['notes'];
    $sub_id   = $_POST['sub_id'];
    for($i = 0 ;$i<count($_FILES['image']['name']);$i++)
    {
        $allimages[]  = $_FILES['image']['name'][$i];
        $image_name   = $_FILES['image']['name'][$i];
        $image_tmp    = $_FILES['image']['tmp_name'][$i];
        $path         = "../sub_sub_image/";
        move_uploaded_file($image_tmp,$path .$image_name);
    }
    $imgs  = serialize($allimages);
    $query  = "INSERT INTO `subsubcate`(`name`, `address`, `location`, `contact`, `imagesubsub`, `sub_id`,`notes`) "
            . "VALUES ('$name','$address','$location','$contact','$imgs',$sub_id,'$notes')";
    mysqli_query($link, $query);
    header("Location: manage_subsubcate.php");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script type="text/javascript">

        </script>
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Manage Sub Sub Category</li>
                </ol>
            </div><!--/.row-->  
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Add Sub Sub Category</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Sub Category Name</label>
                                        <select class="form-control" name="sub_id">
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='{$row['sub_id']}' id='{$row['sub_name']}'>{$row['sub_name']}</option>";
                                            }
                                            ?>                                       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Sub Name</label>
                                        <input class="form-control" placeholder="Sub Sub Name" name="name">
                                    </div>  

                                    <div class="form-group">
                                        <label>Sub Sub Address</label>
                                        <input class="form-control" placeholder="Sub Sub Address" name="address">
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label>Sub Sub Location</label>
                                        <input class="form-control" placeholder="Sub Sub Location" name="location">
                                    </div> 

                                    <div class="form-group">
                                        <label>Sub Sub Contact</label>
                                        <input class="form-control" placeholder="Sub Sub Contact" name="contact">
                                    </div>  
                                    <div class="form-group">
                                        <label>Sub Sub Notes</label>
                                        <textarea class="form-control" rows="7" name="notes"></textarea>
                                    </div>  

                                    
                                    <div class="form-group">
                                        <label>Sub Sub Image </label>
                                        <input type="file" multiple class="form-control" name="image[]"  placeholder=" Sub Sub Image">
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
                        <div class="panel-heading">View Sub Sub Category</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Contact</th>
                                        <th>Image</th>
                                        <th>Sub Cat Name</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>                            
                                    <?php
                                    $sql = "SELECT *,subcate.sub_name,category.cate_name FROM `subsubcate` 
                                            inner join subcate on subcate.sub_id = subsubcate.sub_id
                                            inner join category on subcate.cate_id = category.cate_id";
                                    //echo $sql;die;
                                    $res = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        //echo '<pre>';print_r($row);//die;
                                        //$imgs = unserialize($row['imagesubsub']);
                                        //print_r($imgs);die;
                                        $location = substr($row['location'], -10);
                                        echo "<tr>";                                        
                                        echo "<td>{$row['name']}</td>";
                                        echo "<td>{$row['address']}</td>";
                                        echo "<td>{$location}</td>";
                                        echo "<td>{$row['contact']}</td>";     
                                        echo "<td>";
                                        $imgs = unserialize($row['imagesubsub']);
                                        //print_r($imgs);die;
                                        foreach ($imgs as $value) {
                                           echo "<img width='50px' height='50px' src='../sub_sub_image/{$value}'>";
                                        } 
                                        echo "</td>";
                                        echo "<td>{$row['sub_name']}</td>";
                                        echo "<td>{$row['cate_name']}</td>";
                                        echo "<td><a href='edit_sub_sub.php?id={$row['id']}'>Edit</a></td>";
                                        echo "<td><a href='delete_sub_sub.php?id={$row['id']}'>Delete</a></td>";
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
<?php
include '../include/admin_footer.php';
?>