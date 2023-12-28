<?php 

require '../config/connection.php';

if(isset($_GET["id"])){
    $data = [];

    $id = $_GET["id"];

    $stmt = $con->prepare("SELECT * FROM faq WHERE fid=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $data = $row;
}

echo json_encode($data);
header("Content-Type: application/json");
?>