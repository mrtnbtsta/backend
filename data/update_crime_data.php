<?php 


require '../config/connection.php';

if(isset($_GET["id"])){

    $id = $_GET["id"];

    $stmt = $con->prepare("UPDATE reports SET completed='1' WHERE rid=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

}




echo json_encode($data);
header("Content-Type: application/json");
?>