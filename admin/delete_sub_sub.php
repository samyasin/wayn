<?php
ob_start();
include '../include/connection_db.php';
$id = $_GET['id'];
$query  = "DELETE FROM `subsubcate` WHERE `id` = $id";
mysqli_query($link, $query);
header("Location: manage_subsubcate.php");
exit();
?>

