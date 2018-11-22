<?php
include '../include/connection_db.php';
$sub_id = $_GET['sub_id'];
$query = "DELETE FROM `subcate` WHERE sub_id = $sub_id"; 
$result = mysqli_query($link, $query);
header("location:manage_sub_category.php");
exit();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
