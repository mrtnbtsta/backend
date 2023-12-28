<?php 


require '../config/connection.php';

$data = array();

$stmt = $con->prepare("SELECT username, aid FROM admin");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = ["aid" => $row["aid"], "username" => ucfirst($row["username"])];
}


echo json_encode($data);
header("Content-Type: application/json");
?>