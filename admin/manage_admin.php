<?php
include '../include/admin_header.php';
include '../include/connection_db.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Manage Admin`s</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>                            
                                    <?php
                                    $query = "SELECT * FROM `admin` ";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>{$row['admin_id']}</td>";
                                        echo "<td>{$row['username']}</td>";
                                        echo "<td>{$row['email']}</td>";
                                        echo "<td>{$row['password']}</td>";
                                        echo "<td><a href='edit_manage.php?admin_id={$row['admin_id']}'>Edit</a></td>";
                                        echo "<td><a href='delete_manage.php?admin_id={$row['admin_id']}'>Delete</a></td>";
                                        echo "<td></td>";
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