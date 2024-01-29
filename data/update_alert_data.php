<?php 


require '../config/connection.php';

if(isset($_GET["id"])){

    $id = $_GET["id"];

    $stmt = $con->prepare("UPDATE alert SET seen='1', status='0' WHERE alertid=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

}




echo json_encode($data);
header("Content-Type: application/json");
?>