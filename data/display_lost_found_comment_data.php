<?php 

require '../config/connection.php';

$data = array();


if(isset($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $con->prepare("SELECT * FROM lost_found_comments lfco LEFT JOIN lost_found lf ON lfco.lfid = lf.id LEFT JOIN users u ON lfco.uid = u.uid WHERE lfco.lfid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            // echo json_encode(["success" => true,"comment" => $row["comment"], "name" => $row["uName"], "image" => $row["image"], "profile" => $row["profile"], "id" => $row["id"], "uid" => $row["uid"]]);
            $data[] = ["comment" => $row["comment"], "name" => $row["uName"], "image" => $row["image"], "profile" => $row["profile"], "id" => $row["id"], "uid" => $row["uid"]];
        }
    }
}


echo json_encode($data);
header("Content-Type: application/json");
?>