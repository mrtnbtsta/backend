<?php 

require '../config/connection.php';

if(isset($_POST["message"])){
    $message = $_POST["message"] ? $con->real_escape_string($_POST["message"]) : "";
    $toID = $_POST["toID"] ?? "";
    $fromID = $_POST["fromID"] ?? "";

    $stmt = $con->prepare("INSERT INTO chat (from_id, to_id, message, date , sentBy) VALUES(?,?,?,now() ,'user')");
    $stmt->bind_param("iis", $fromID, $toID, $message);
    $stmt->execute();
    

}

?>