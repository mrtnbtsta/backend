<?php 

require '../config/connection.php';

if(isset($_POST["rid"])){
    $rid = $_POST["rid"];

    $stmt = $con->prepare("INSERT INTO guard_emergency (rid, status_resolve) VALUES(?,'0')");
    $stmt->bind_param("i", $rid);
    $stmt->execute();

}

?>