<?php 


require '../config/connection.php';


$data = array();

$stmt= $con->prepare("SELECT r.typeOfReport, asr.start_date, asr.end_date, r.type ,count(r.typeOfReport) as type_count FROM admin_summary_report asr INNER JOIN reports r ON r.rid = asr.rid WHERE asr.start_date <= LAST_DAY(asr.end_date) AND r.type='Crime' GROUP BY r.typeOfReport");
// $stmt= $con->prepare("SELECT start_date, end_date, month_text, asr_id ,count(*) AS report_count FROM admin_summary_report WHERE start_date >= (LAST_DAY(CURDATE()) + INTERVAL 1 DAY) - INTERVAL 6 MONTH AND start_date < (LAST_DAY(CURDATE()) + INTERVAL 1 DAY) - INTERVAL 1 MONTH GROUP BY month_text");
$stmt->execute();
$result = $stmt->get_result();


while($row = $result->fetch_assoc()){
    $data[] = ["typeOfReport" => $row["typeOfReport"], "total_count" => $row["type_count"]];
}

echo json_encode($data);
header("Content-Type: application/json");
?>