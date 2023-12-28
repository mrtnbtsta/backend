<?php 


require '../config/connection.php';

$data = array();

$stmt = $con->prepare("SELECT r.seen, r.rid, rd.uid ,rd.name, rd.address, r.image FROM reports r LEFT JOIN user_report_details rd ON r.rdid = rd.rdid WHERE seen = 0");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = ["seen" => $row["seen"], "name" => $row["name"], "address" => $row["address"], "rid" => $row["rid"], "uid" => $row["uid"] ,"image" => $row["image"]];
}


echo json_encode($data);
header("Content-Type: application/json");
?>