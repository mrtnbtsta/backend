<?php 


require '../config/connection.php';


$data = array();
$stmt = $con->prepare("SELECT * FROM discussion");
$stmt->execute();
$result = $stmt->get_result();



while($row = $result->fetch_assoc()){
   $data[] = $row;
}


echo json_encode($data);
header('Content-Type: application/json');



?>