<?php 


require '../config/connection.php';

if(isset($_POST["title"])){
   
    $title = $_POST["title"] ? $con->real_escape_string($_POST["title"]) : "";
    $content = $_POST["content"] ? $con->real_escape_string($_POST["content"]) : "";

    $stmt = $con->prepare("INSERT INTO faq (title, content) VALUES(?,?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();

}





// header("Content-Type: application/json");
?>