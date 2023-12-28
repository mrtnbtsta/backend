<?php 


require '../config/connection.php';

$data = array();

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $con->prepare("SELECT * FROM report_comment rc INNER JOIN reports r ON rc.rid = r.rid INNER JOIN users u ON rc.uid = u.uid WHERE rc.rid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        $data[]= ["comment" => $row["comment"], "name" => $row["uName"], "profile" => $row["profile"]];
    }
}



echo json_encode($data);
header("Content-Type: application/json");
?>