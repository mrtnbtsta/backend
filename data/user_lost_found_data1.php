<?php 


require '../config/connection.php';

$data = array();

$stmt = $con->prepare("SELECT * FROM lost_found lf LEFT JOIN users u ON lf.uid = u.uid WHERE status_claim='0' AND type='Video'");
// $stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = ["name" => $row["uName"], "address" => $row["address"], "image" => $row["image"], "id" => $row["id"], "uid" => $row["uid"], "lost_item" => $row["lost_item"], "type" => $row["type"], "post_status" => $row["post_status"]];
}


echo json_encode($data);
header("Content-Type: application/json");
?>
