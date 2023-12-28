<?php 

require '../config/connection.php';

$data = [];

$stmt = $con->prepare("SELECT * FROM guard_emergency ge LEFT JOIN reports r ON ge.rid = r.rid LEFT JOIN user_report_details urd ON r.rdid = urd.rdid WHERE ge.is_resolved = '0'");
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $data[] = ["name" => $row["name"], "address" => $row["address"], "image" => $row["image"], "type" => $row["typeOfReport"], "location" => $row["locationIncident"], "describe" => $row["describeIncident"], "uid" => $row["uid"], "gid" => $row["g_id"], "status" => $row["status_resolve"], "resolve" => $row["is_resolved"]];
    }
}

echo json_encode($data);
header("Content-Type: application/json");
?>