<?php 

require '../config/connection.php';

if(isset($_POST["message"])){
   
    $message = $_POST["message"] ? $con->real_escape_string($_POST["message"]) : "";
    $gid = $_POST["gid"];
    $uid = $_POST["uid"];
    $g_id = $_POST["g_id"];

    $stmt = $con->prepare("INSERT INTO send_notif_user (uid, gid, g_id ,message) VALUES(?,?,?,?)");
    $stmt->bind_param("iiis", $uid, $gid, $g_id ,$message);
    $stmt->execute();

}

?>