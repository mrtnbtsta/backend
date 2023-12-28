<?php 


require '../config/connection.php';


$stmt = $con->prepare("SELECT alertid FROM alert");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $stmt = $con->prepare("UPDATE alert SET seen='1' WHERE alertid =?");
    $stmt->bind_param("i", $row["alertid"]);
    $stmt->execute();
}
header("Content-Type: application/json");
?>