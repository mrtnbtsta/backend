<?php 


require '../config/connection.php';


$data = array();

$stmt= $con->prepare("SELECT start_date, end_date, month_text, count(*) AS report_count FROM admin_summary_report GROUP BY month_text");
// $stmt= $con->prepare("SELECT start_date, end_date, month_text, asr_id ,count(*) AS report_count FROM admin_summary_report WHERE start_date >= (LAST_DAY(CURDATE()) + INTERVAL 1 DAY) - INTERVAL 6 MONTH AND start_date < (LAST_DAY(CURDATE()) + INTERVAL 1 DAY) - INTERVAL 1 MONTH GROUP BY month_text");
$stmt->execute();
$result = $stmt->get_result();


while($row = $result->fetch_assoc()){
    $data[] = ["start_date" => $row["start_date"], "end_date" => $row["end_date"], "month_text" => $row["month_text"], "total" => $row["report_count"]];
}

echo json_encode($data);
header("Content-Type: application/json");
?>