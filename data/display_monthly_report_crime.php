<?php 


require '../config/connection.php';


$data = array();

$stmt= $con->prepare("SELECT asr.month_text, r.type, asr.start_date, asr.end_date FROM admin_summary_report asr INNER JOIN reports r ON r.rid = asr.rid WHERE asr.start_date <= NOW() AND r.type='Crime' GROUP BY asr.month_text");
// $stmt= $con->prepare("SELECT start_date, end_date, month_text, asr_id ,count(*) AS report_count FROM admin_summary_report WHERE start_date >= (LAST_DAY(CURDATE()) + INTERVAL 1 DAY) - INTERVAL 6 MONTH AND start_date < (LAST_DAY(CURDATE()) + INTERVAL 1 DAY) - INTERVAL 1 MONTH GROUP BY month_text");
$stmt->execute();
$result = $stmt->get_result();


while($row = $result->fetch_assoc()){
    $data[] = ["month_text" => $row["month_text"], "type" => $row["type"]];
}

echo json_encode($data);
header("Content-Type: application/json");
?>