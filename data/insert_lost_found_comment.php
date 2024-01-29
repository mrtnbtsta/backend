<?php 

require '../config/connection.php';


if(isset($_POST["comment"])){

    $comment = $_POST["comment"] ? $con->real_escape_string($_POST["comment"]) : "";
    $lfid = $_POST["lfid"];
    $uid = $_POST["uid"];


    $stmt = $con->prepare("INSERT INTO lost_found_comments (comment, lfid, uid) VALUES(?,?,?)");
    $stmt->bind_param("sii", $comment, $lfid, $uid);
    $stmt->execute();
    
}

?>