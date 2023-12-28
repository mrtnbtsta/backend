<?php 


require '../config/connection.php';



if(isset($_GET["adminID"])){
    $data = array();
    $adminID = $_GET["adminID"];
    $userID = $_GET["userID"];


$stmt = $con->prepare("SELECT * FROM chat c LEFT JOIN users u ON c.from_id = u.uid LEFT JOIN admin a ON c.to_id = a.aid WHERE (c.to_id = ".$adminID." AND c.from_id = ".$userID.") OR (c.from_id = ".$adminID." AND c.to_id = ".$userID.") ");
$stmt->execute();
$result = $stmt->get_result();
// $data[] = ["uid" => $results["uid"], "aid" => $results["aid"], "uName" => $results["uName"], "username" => $results["username"], "cid" => $results["cid"], "message" => $results["message"], "sentBy" => $results["sentBy"], "date" => $results["date"]];
if($result->num_rows > 0){
    foreach($result as $results){
        $data[] = ["uid" => $results["uid"], "aid" => $results["aid"], "uName" => $results["uName"], "username" => $results["username"], "cid" => $results["cid"], "message" => $results["message"], "sentBy" => $results["sentBy"], "date" => $results["date"]];
    }
}

}

echo json_encode($data);
header("Content-Type: application/json");
?>