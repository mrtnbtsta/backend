<?php 

require '../config/connection.php';


if(isset($_GET["id"])){
    $id = $_GET["id"];

    $stmt = $con->prepare("UPDATE users SET account_status='1' WHERE uid = ?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        echo json_encode(["success" => true]);
    }

}


header('Content-Type: application/json');
?>