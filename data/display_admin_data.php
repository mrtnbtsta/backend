<?php 


require '../config/connection.php';

$data = array();




$stmt = $con->prepare("SELECT aid FROM admin");

$stmt->execute();
$result = $stmt->get_result();

foreach($result as $results){
    $data[] = ["aid" => $results["aid"]];
}

// }

echo json_encode($data);
header("Content-Type: application/json");
?>