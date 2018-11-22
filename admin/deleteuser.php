<?php
include '../include/connection_db.php';
$user_id = $_GET['user_id'];
$query  = "DELETE FROM `users` WHERE  user_id = $user_id ";
mysqli_query($link, $query);
header("location: manage_user.php");

?>
