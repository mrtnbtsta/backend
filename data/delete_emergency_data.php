<?php 

require '../config/connection.php';


if(isset($_GET["rid"])){

    $rid = $_GET["rid"];

    // $stmt = $con->prepare("DELETE reports FROM reports LEFT JOIN user_report_details ON reports.rid = user_report_details.rdid WHERE reports.rid=?");
    // $stmt = $con->prepare("DELETE user_report_details FROM user_report_details INNER JOIN reports ON user_report_details.rdid = reports.rdid WHERE user_report_details.rdid=?");
    $stmt = $con->prepare("DELETE reports FROM reports INNER JOIN user_report_details ON reports.rdid = user_report_details.rdid WHERE reports.rid = ?");
    $stmt->bind_param("i", $rid);
    if($stmt->execute()){
        echo json_encode(["result" => "success"]);
    }else{
        echo json_encode(["result" => "failed"]);
    }

}
header('Content-Type: application/json');
?>