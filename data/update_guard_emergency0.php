<?php 

require '../config/connection.php';

if(isset($_GET["gid"])){
    $gid = $_GET["gid"];

    $stmt = $con->prepare("UPDATE guard_emergency SET status_resolve='0', is_resolved='1', resolvedDate=now() WHERE g_id = ?");
    $stmt->bind_param("i", $gid);
    if($stmt->execute()){
        echo json_encode(["success" => true]);
    }else{
        echo json_encode(["success" => false]);
    }

}
header("Content-Type: application/json");
?>