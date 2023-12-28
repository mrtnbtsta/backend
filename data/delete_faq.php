<?php 

require '../config/connection.php';


if(isset($_GET["id"])){

    $id = $_GET["id"];

    $stmt= $con->prepare("DELETE FROM faq WHERE fid=?");
    $stmt->bind_param("i", $id);
    if($stmt->execute()){
        echo json_encode(["success" => true]);
    }else{
        echo json_encode(["success" => false]);
    }

}


header('Content-Type: application/json');
?>