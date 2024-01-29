<?php 


require '../config/connection.php';

$data = array();


if(isset($_GET["userID"])){
    $userID = $_GET["userID"];
    $adminID = $_GET["adminID"];


$stmt = $con->prepare("SELECT * FROM chat c LEFT JOIN users u ON c.from_id = u.uid LEFT JOIN admin a ON c.to_id = a.aid WHERE (c.from_id = ".$userID." AND c.to_id = ".$adminID.") OR (c.to_id = ".$userID." AND c.from_id = ".$adminID.") ");

$stmt->execute();
$result = $stmt->get_result();

foreach($result as $results){
    $data[] = ["uid" => $results["uid"], "aid" => $results["aid"], "uName" => $results["uName"], "username" => $results["username"], "cid" => $results["cid"], "message" => $results["message"], "sentBy" => $results["sentBy"], "date" => $results["date"]];
}

}

echo json_encode($data);
header("Content-Type: application/json");
?>