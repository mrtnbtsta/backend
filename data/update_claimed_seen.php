<?php 


require '../config/connection.php';


$stmt = $con->prepare("SELECT cid FROM lost_found_claim");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $stmt = $con->prepare("UPDATE lost_found_claim SET seen='1' WHERE cid =?");
    $stmt->bind_param("i", $row["cid"]);
    $stmt->execute();
}
header("Content-Type: application/json");
?>