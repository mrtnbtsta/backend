<?php 


require '../config/connection.php';


$data = array();

$stmt = $con->prepare("SELECT * FROM lost_found_claim lfc LEFT JOIN lost_found lf ON lfc.id = lf.id LEFT JOIN users u ON lf.uid = u.uid WHERE lfc.status='1' AND lf.status_claim='0'");
// $stmt = $con->prepare("SELECT * FROM lost_found INNER JOIN users ON lost_found.uid = users.uid");
$stmt->execute();
$result = $stmt->get_result();


while($row = $result->fetch_assoc()){
    $data[] = ["id" => $row["id"], "uid" => $row["uid"], "lost_item" => $row["lost_item"], "date_of_lost" => $row["date_of_lost"], "detail_description" => $row["detail_description"], "image" => $row["image"], "uName" => $row["uName"], "address" => $row["address"], "cid" => $row["cid"], "claim_image" => $row["claim_image"], "status" => $row["status"], "status_claim" => $row["status_claim"] ,"success_found" => true];
}
    



echo json_encode($data);




header('Content-Type: application/json');



?>