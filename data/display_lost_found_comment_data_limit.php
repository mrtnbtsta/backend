<?php 

require '../config/connection.php';

$data = array();
$stmt = $con->prepare("SELECT * FROM lost_found_comments lfco LEFT JOIN lost_found lf ON lfco.lfid = lf.id LEFT JOIN users u ON lfco.uid = u.uid");
// $stmt->bind_param("ii", $lfid, $uid);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $data[] = ["comment" => $row["comments"], "name" => $row["uName"], "image" => $row["image"], "profile" => $row["profile"], "id" => $row["id"], "uid" => $row["uid"]];
}
echo json_encode($data);
header("Content-Type: application/json");
?>