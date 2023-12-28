<?php 


require '../config/connection.php';

    $data = array();

    $stmt = $con->prepare("SELECT * FROM bulletin");
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

    }


echo json_encode($data);
header("Content-Type: application/json");
?>
