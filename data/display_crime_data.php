<?php 


require '../config/connection.php';

$data = array();
$stmt = $con->prepare("SELECT * FROM reports INNER JOIN user_report_details ON user_report_details.rdid = reports.rdid  WHERE type='Crime' AND completed='0'");
$stmt->execute();
$result = $stmt->get_result();


foreach($result as $results){
    $data[] = ["rid" => $results["rid"], "name" => $results["name"], "address" => $results["address"], "typeOfReport" => $results["typeOfReport"], "describeIncident" => $results["describeIncident"], "locationIncident" => $results["locationIncident"], "image" => $results["image"]];
}

echo json_encode($data);
header('Content-Type: application/json');



?>