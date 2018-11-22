<?php
include '../include/connection_db.php';
$id = $_GET['video_id'];
$query = "DELETE FROM `video` WHERE id = $id";
mysqli_query($link, $query);
header("Location: video.php");
exit();


?>
