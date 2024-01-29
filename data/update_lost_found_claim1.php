<?php 


require '../config/connection.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $con->prepare("UPDATE lost_found_claim lfc LEFT JOIN lost_found lf ON lfc.id = lf.id SET lfc.status='1' WHERE lfc.cid=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
}





header("Content-Type: application/json");
?>