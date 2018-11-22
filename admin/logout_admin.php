<?php
include '../include/connection_db.php';
session_start();
session_destroy();
header("location: login.php");
?>