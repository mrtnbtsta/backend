<?php 

require '../config/connection.php';

if(isset($_POST["userid"])){
    $userid = $_POST["userid"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    
    $stmt = $con->prepare("INSERT INTO alert (userid, latitude, longitude, status) VALUES(?,?,?,'1')");
    $stmt->bind_param("idd", $userid, $latitude, $longitude);
    $stmt->execute();

}

?>