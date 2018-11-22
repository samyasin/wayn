<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';
$id = $_GET['id'];
$query = "SELECT * FROM `advertisement` WHERE `id` = $id";
$result = mysqli_query($link, $query);
$userSet = mysqli_fetch_assoc($result);


if (isset($_POST['submit'])) {
    if ($_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $path = "../AdvertisementImage/";
        move_uploaded_file($tmp_name, $path . $image_name);
        $title = $_POST['title'];
        $adshow = $_POST['sel'];

        $query = "UPDATE `advertisement` SET `image`='$image_name',`title`='$title',`adshow`='$adshow' WHERE id = $id";
        $result = mysqli_query($link, $query);
        header("Location: advertisement.php");
        exit();
    }
    else{
        if ($_FILES['image']['error'] == 4) {
       $image_name = $userSet['image'];
        $title = $_POST['title'];
        $adshow = $_POST['sel'];

        $query = "UPDATE `advertisement` SET `image`='$image_name',`title`='$title',`adshow`='$adshow' WHERE id = $id";
        $result = mysqli_query($link, $query);
        header("Location: advertisement.php");
        exit();
    }
    }
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
                    <li class="active"> Edit Manage Advertisement</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Edit Advertisement</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>advertisement Image</label>
                                        <input type="file" class="form-control"  name="image">
                                    </div>  
                                    <div class="form-group">

                                        <label>Title</label>
                                        <input class="form-control" value="<?php echo $userSet['title']; ?>" name="title">                                     
                                    </div>

                                    <div class="form-group">
                                        <label>show</label>
                                        <select name="sel" class="form-control">
                                            <option value="Home Page" <?php if($userSet['adshow'] == "Home Page"){ echo "selected";} ?>>Home Page</option>
                                            <option value="Internal Page" <?php if($userSet['adshow'] == "Internal Page"){ echo "selected";} ?>>Internal Page</option>
                                        </select>
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