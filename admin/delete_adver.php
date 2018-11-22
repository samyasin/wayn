<?php
include '../include/connection_db.php';
$id  = $_GET['id'];
$query  = "DELETE FROM `advertisement` WHERE id = $id ";
mysqli_query($link, $query);
header("Location: advertisement.php");
exit();
?>
