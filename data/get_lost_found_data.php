<?php 


require '../config/connection.php';


$data = array();

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $stmt = $con->prepare("SELECT * FROM lost_found WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        // $data[] = ["lost_item" => $row["lost_item"], "date_of_lost" => $row["date_of_lost"], "detail_description" => $row["detail_description"], "image" => $row["image"]];
        $data[] = $row;
    }

}

echo json_encode($data);




header('Content-Type: application/json');



?>