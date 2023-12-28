<?php 


require '../config/connection.php';


$data = array();

if(isset($_GET["lost_item"])){

// $stmt = $con->prepare("SELECT * FROM lost_found lf INNER JOIN users u ON lf.uid = u.uid WHERE lf.lost_item LIKE CONCAT('%',?,'%')");
$stmt = $con->prepare("SELECT * FROM lost_found_claim lfc INNER JOIN lost_found lf ON lfc.id = lf.id INNER JOIN users u ON lf.uid = u.uid WHERE lf.lost_item LIKE CONCAT('%',?,'%') AND lfc.status='0' AND lf.status_claim='0'");
$stmt->bind_param("s", $_GET["lost_item"]);
$stmt->execute();
$result = $stmt->get_result();


while($row = $result->fetch_assoc()){
    $data[] = ["id" => $row["id"], "uid" => $row["uid"], "lost_item" => $row["lost_item"], "date_of_lost" => $row["date_of_lost"], "detail_description" => $row["detail_description"], "image" => $row["image"], "uName" => $row["uName"], "address" => $row["address"], "cid" => $row["cid"], "claim_image" => $row["claim_image"], "status" => $row["status"], "status_claim" => $row["status_claim"]];
}
}
    



echo json_encode($data);




header('Content-Type: application/json');



?>