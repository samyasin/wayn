<?php
include '../include/connection_db.php';

header("Content-Type: Application/json");

$sub_id  = $_GET['sub_id'];
$query   = "SELECT * FROM `subsubcate` WHERE sub_id = $sub_id";

$result  = mysqli_query($link, $query);

if($result){
    $resultArr = array();
    while($rowData = mysqli_fetch_assoc($result))
    {
        $resultArr[count($resultArr)] = $rowData;
    }
    echo json_encode($resultArr);
}
?>