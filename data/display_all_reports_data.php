<?php 

require '../config/connection.php';

$data = array();

$stmt = $con->prepare("SELECT * FROM reports r LEFT JOIN user_report_details urd ON r.rdid = urd.rdid WHERE completed='1' ORDER BY type ASC");

$stmt->execute();


$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);
header("Content-Type: application/json");

?>