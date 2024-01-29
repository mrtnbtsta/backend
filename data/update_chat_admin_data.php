<?php 


require '../config/connection.php';

$data = array();
if(isset($_POST["reply"])){
    $reply = $_POST["reply"];
    // $userID = $_POST["userID"];
    // $adminID = $_POST["adminID"];
    $chatCID = $_POST["chatCID"];
    $stmt = $con->prepare("UPDATE chat SET reply=? WHERE cid=?");

    $stmt->bind_param("si", $reply, $chatCID);
    $stmt->execute();
    $data["success"] = true;
    
}

   




echo json_encode($data);
header("Content-Type: application/json");
?>