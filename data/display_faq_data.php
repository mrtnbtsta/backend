<?php 

require '../config/connection.php';

$data = [];

$stmt = $con->prepare("SELECT * FROM faq");
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);
header("Content-Type: application/json");
?>