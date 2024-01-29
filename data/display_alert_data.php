<?php 

require '../config/connection.php';

$data = array();

$stmt = $con->prepare("SELECT * FROM alert LEFT JOIN users ON alert.userid = users.uid WHERE status='1' AND seen='0'");

$stmt->execute();


$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = ["alertid" => $row["alertid"], "uName" => $row["uName"], "address" => $row["address"], "profile" => $row["profile"], "seen"  => $row["seen"], "latitude" => $row["latitude"], "longitude" => $row["longitude"]];
}

echo json_encode($data);
header("Content-Type: application/json");

?>