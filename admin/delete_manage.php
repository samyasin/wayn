<?php
include '../include/connection_db.php';
$admin_id = $_GET['admin_id'];

$sql = "DELETE FROM `admin` WHERE `admin_id` = $admin_id";
mysqli_query($link, $sql);
header("location:manage_admin.php");
exit();

?>