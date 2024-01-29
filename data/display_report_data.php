<?php 

require '../config/connection.php';


$data = array();

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $stmt = $con->prepare("SELECT * FROM reports r LEFT JOIN user_report_details urd ON r.rdid = urd.rdid LEFT JOIN users u ON urd.uid = u.uid WHERE r.rid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        $data[] = ["image" => $row["image"], "name" => $row["name"], "post_status" => $row["post_status"]];
    }

}



echo json_encode($data);
header("Content-Type: application/json");
?>