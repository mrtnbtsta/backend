<?php 


require '../config/connection.php';

$data = array();
$stmt = $con->prepare("SELECT * FROM reports LEFT JOIN user_report_details ON user_report_details.rdid = reports.rdid LEFT JOIN users ON user_report_details.uid = users.uid  WHERE completed='0' ORDER BY rid ASC");
$stmt->execute();
$result = $stmt->get_result();


foreach($result as $results){
    $data[] = ["rid" => $results["rid"], "rdid" => $results["rdid"], "uid" => $results["uid"], "name" => $results["uName"], "address" => $results["address"], "typeOfReport" => $results["typeOfReport"], "describeIncident" => $results["describeIncident"], "locationIncident" => $results["locationIncident"], "image" => $results["image"], "post_status" => $results["post_status"]];
}

echo json_encode($data);
header('Content-Type: application/json');



?>