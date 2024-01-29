<?php 


require '../config/connection.php';


$stmt = $con->prepare("SELECT g_id FROM guard_emergency");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $stmt = $con->prepare("UPDATE guard_emergency SET seen='1' WHERE g_id =?");
    $stmt->bind_param("i", $row["g_id"]);
    $stmt->execute();
}
header("Content-Type: application/json");
?>