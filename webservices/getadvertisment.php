<?php
include '../include/connection_db.php';

header("Content-Type: application/json");
$query  = "SELECT * FROM `advertisement` ";

$result  = mysqli_query($link, $query);
if ($result) {
    $resultArr = array();
    while ($rowData = mysqli_fetch_assoc($result)) {
        $resultArr[count($resultArr)] = $rowData;
    }
    echo json_encode($resultArr);
}
?>

