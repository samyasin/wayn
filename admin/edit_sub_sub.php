<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';
$id = $_GET['id'];
$query = "SELECT * FROM `subsubcate` WHERE `id`= $id ";
$result = mysqli_query($link, $query);
$userSet = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
        $name      = $_POST['name'];
        $address   = $_POST['address'];
        $location  = $_POST['location'];
        $contact   = $_POST['contact'];
        $notes     = $_POST['notes'];
        $sub_id    = $_POST['sub_id'];
        
        if($_FILES['image']['error'][0] == 0){
            for($i=0 ; $i<count($_FILES['image']['name']);$i++)
            {
                $allimages[]  = $_FILES['image']['name'][$i];
                $image_name   = $_FILES['image']['name'][$i];
                $tmp_name     = $_FILES['image']['tmp_name'][$i];
                $path = "../sub_sub_image/";
                move_uploaded_file($tmp_name, $path . $image_name);
            }
            $imgs = serialize($allimages);
            $sql = "UPDATE `subsubcate` SET `name`='$name',`address`='$address',"
                . "`location`='$location',`contact`='$contact',`notes`='$notes',`imagesubsub`='$imgs',`sub_id`= $sub_id WHERE id = $id";
        }else{
            $sql = "UPDATE `subsubcate` SET `name`='$name',`address`='$address',"
                . "`location`='$location',`contact`='$contact',`notes`='$notes',`sub_id`= $sub_id WHERE id = $id";
        }
        //echo $sql;die;
        
        $resultt = mysqli_query($link, $sql);
        header("Location: manage_subsubcate.php");
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
                    <li class="active">Edit Manage Sub Sub Category</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Sub Sub Category</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Sub Category Name</label>
                                        <select class="form-control" name="sub_id">
                                            <?php
                                            $query = "SELECT * FROM `subcate` ";
                                            $res = mysqli_query($link, $query);
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                echo "<option value='{$row['sub_id']}'";
                                                if($row['sub_id'] == $userSet['sub_id']){ echo "selected";}
                                                echo ">{$row['sub_name']}</option>";
                                            }
                                            ?>                                       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Sub Name</label>
                                        <input class="form-control" value="<?php echo $userSet['name']; ?>" name="name">
                                    </div>  

                                    <div class="form-group">
                                        <label>Sub Sub Address</label>
                                        <input class="form-control" value="<?php echo $userSet['address']; ?>" name="address">
                                    </div>  

                                    <div class="form-group">
                                        <label>Sub Sub Location</label>
                                        <input class="form-control" value="<?php echo $userSet['location']; ?>" name="location">
                                    </div> 

                                    <div class="form-group">
                                        <label>Contact</label>
                                        <input class="form-control" value="<?php echo $userSet['contact']; ?>" name="contact">
                                    </div>  
                                    <div class="form-group">
                                        <label>Sub Sub Notes</label>
                                        <textarea class="form-control" rows="7" name="notes"><?php echo $userSet['notes']; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Sub Image </label>
                                        <input type="file" multiple class="form-control" name="image[]" multiple placeholder=" Sub Sub Image">
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