<?php 


require '../config/connection.php';

if(isset($_POST["did"])){

    $did = $_POST["did"];
    $userID = $_POST["user_id"];
    $content = $_POST["content"];

    $stmt = $con->prepare("INSERT INTO user_comments (did, user_id, content) VALUES(?, ?, ?)");
    $stmt->bind_param("iis", $did, $userID, $content);
    $stmt->execute();

}



?>