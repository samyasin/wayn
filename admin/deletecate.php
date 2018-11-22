<?php
include '../include/connection_db.php';
$cate_id = $_GET['cate_id'];
$query   = "DELETE FROM `category` WHERE cate_id = $cate_id";
mysqli_query($link, $query);
header("location: manage_category.php");
exit();

?>

