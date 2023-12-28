<?php 

require '../config/connection.php';


if(isset($_GET["id"])){
    $id = $_GET["id"];

    $stmt = $con->prepare("DELETE FROM lost_found WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

}


header('Content-Type: application/json');
?>