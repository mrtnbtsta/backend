<?php 


require '../config/connection.php';


$data = array();

// $stmt = $con->prepare("SELECT * FROM lost_found_claim lfc LEFT JOIN lost_found lf ON lfc.id = lf.id LEFT JOIN users u ON lf.uid = u.uid");
$stmt = $con->prepare("SELECT * FROM lost_found INNER JOIN users ON lost_found.uid = users.uid WHERE type='Image'");
$stmt->execute();
$result = $stmt->get_result();


while($row = $result->fetch_assoc()){
    $data[] = ["id" => $row["id"], "uid" => $row["uid"], "lost_item" => $row["lost_item"], "date_of_lost" => $row["date_of_lost"], "detail_description" => $row["detail_description"], "image" => $row["image"], "uName" => $row["uName"], "address" => $row["address"]];
}
    



echo json_encode($data);




header('Content-Type: application/json');



?>