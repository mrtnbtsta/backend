<?php 


require '../config/connection.php';

$data = array();


if(isset($_GET["adminID"])){
    $adminID = $_GET["adminID"];
    $userID = $_GET["userID"];


    $stmt = $con->prepare("SELECT * FROM chat c INNER JOIN users u ON c.from_id = u.uid INNER JOIN admin a ON c.to_id = a.aid WHERE (c.from_id = ".$userID." AND c.to_id = ".$adminID.") OR (c.from_id = ".$adminID." AND c.to_id = ".$userID.") ");

$stmt->execute();
$result = $stmt->get_result();

foreach($result as $results){
    $data[] = ["uName" => $results["uName"], "message" => $results["message"], "profile" => $results["profile"], "cid" => $results["cid"], "uid" => $results["uid"], "aid" => $results["aid"]];
}

}

echo json_encode($data);
header("Content-Type: application/json");
?>