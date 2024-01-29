<?php 

require '../config/connection.php';


$data = array();

$stmt = $con->prepare("SELECT email, profile, uid FROM users WHERE account_status='1' ORDER BY uid ASC");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = $row;
}


echo json_encode($data);
header('Content-Type: application/json');
?>