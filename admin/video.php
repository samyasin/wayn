<?php
ob_start();
include '../include/connection_db.php';
include '../include/admin_header.php';
if (isset($_POST['submit'])) {
    $url = $_POST['url'];
    $query = "INSERT INTO `video`(`video`) VALUES ('$url')";
    $result = mysqli_query($link, $query);
    header("Location: video.php");
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
                    <li class="active">Manage Video`s</li>
                </ol>
            </div><!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add Video</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" >
                                    <div class="form-group">
                                        <label>Add Url</label>
                                        <input class="form-control" placeholder="Add URL" name="url">
                                    </div>                                        
                                    <button type="submit" class="btn btn-primary" name="submit">add url</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">View Video`s</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Video</th>
                                        <th>Delete</th>
                                    </tr>                            
                                    <?php
                                    $sql = "SELECT * FROM video";
                                    $res = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<tr>";
                                        if(strpos($row['video'], 'watch?')){
                                            $x = str_replace('watch?', 'embed/',$row['video']);
                                            $v = str_replace('v=','',$x);
                                        }else{
                                            $v = $row['video'];
                                        }
                                        echo "<td><iframe src='$v'></iframe></td>";
                                        echo "<td><a href='delete_video.php?video_id={$row['id']}'>Delete</a></td>";
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