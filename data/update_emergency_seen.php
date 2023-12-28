<?php 


require '../config/connection.php';


$stmt = $con->prepare("SELECT rid FROM reports");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $stmt = $con->prepare("UPDATE reports SET seen='1' WHERE rid =?");
    $stmt->bind_param("i", $row["rid"]);
    $stmt->execute();
}
header("Content-Type: application/json");
?>