<?php 

require '../config/connection.php';


if(isset($_GET["id"])){

    $id = $_GET["id"];

    $stmt = $con->prepare("DELETE FROM lost_found_claim WHERE cid =?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        echo json_encode(["success" => true]);
    }

}
header('Content-Type: application/json');
?>