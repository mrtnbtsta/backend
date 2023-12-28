<?php 


require '../config/connection.php';


$data = array();
if(isset($_GET["id"])){
    $cid = $_GET["id"];

    $stmt = $con->prepare("UPDATE chat SET seen='1' WHERE cid =? ");
    $stmt->bind_param("i", $cid);
    $stmt->execute();
}

echo json_encode($data);
header("Content-Type: application/json");
?>