<?php 


require '../config/connection.php';

$data = array();


if(isset($_GET["gid"])){
$userID = $_GET["uid"];
$guardID = $_GET["gid"];


$stmt = $con->prepare("SELECT gu.username, s.message, ge.is_resolved, ge.g_id, r.typeOfReport, r.image, urd.name, ge.resolvedDate FROM send_notif_user s LEFT JOIN guard_user gu ON s.gid = gu.gid LEFT JOIN users u ON s.uid = u.uid LEFT JOIN guard_emergency ge ON s.g_id = ge.g_id LEFT JOIN reports r ON ge.rid = r.rid LEFT JOIN user_report_details urd ON r.rdid = urd.rdid WHERE (s.uid = ".$userID." AND s.gid = ".$guardID." AND ge.seen='0') OR (s.uid = ".$guardID." AND s.gid = ".$userID." AND ge.seen='0') ");

$stmt->execute();
$result = $stmt->get_result();

foreach($result as $results){
    $data[] = ["username" => $results["username"], "message" => $results["message"], "resolve" => $results["is_resolved"], "gid" => $results["g_id"], "type" => $results["typeOfReport"], "image" => $results["image"], "name" => $results["name"], "resolveDate" => $results["resolvedDate"]];
}

}

echo json_encode($data);
header("Content-Type: application/json");
?>