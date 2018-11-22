<?php
ob_start();
include '../include/admin_header.php';
include '../include/connection_db.php';

if (isset($_POST['submit'])) {
    if ($_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $path  = "../AdvertisementImage/";
        move_uploaded_file($tmp_name, $path . $image_name);
        $title = $_POST['title'];
        $adshow = $_POST['sel'];
        
    }
        $query = "INSERT INTO `advertisement`(`image`, `title`,`adshow`) VALUES ('$image_name','$title','$adshow')";
        $result = mysqli_query($link, $query);
        header("location:advertisement.php");
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
                    <li class="active">Manage Advertisement</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Add Advertisement</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>advertisement Image</label>
                                        <input type="file" class="form-control" placeholder="image" name="image">
                                    </div>  
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" placeholder="Title" name="title">                                     
                                    </div>

                                    <div class="form-group">
                                        <label>show</label>
                                        <select name="sel" class="form-control">
                                            <option value="Home Page">Home Page</option>
                                            <option value="Internal Page">Internal Page</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">ADD</button>
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
                                        <th>Advertisement ID</th>
                                        <th>Advertisment Image</th>
                                        <th>Title</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>                            
                                    <?php
                                    $sql = "SELECT * FROM advertisement";
                                    $res = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<tr>";
                                        echo "<td>{$row['id']}</td>";
                                        echo "<td><img width='50px'  src='../advertisementImage/{$row['image']}.'jpg'></td>";
                                        echo "<td>{$row['title']}</td>";
                                        echo "<td>{$row['adshow']}</td>";
                                        echo "<td><a href='edit_adver.php?id={$row['id']}'>Edit</a></td>";
                                        echo "<td><a href='delete_adver.php?id={$row['id']}'>Delete</a></td>";
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