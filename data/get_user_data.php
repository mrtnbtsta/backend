<?php 


require '../config/connection.php';

$data = array();

$stmt = $con->prepare("SELECT * FROM users");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = ["uid" => $row["uid"], "uName" => ucfirst($row["uName"])];
}


echo json_encode($data);
header("Content-Type: application/json");
?>