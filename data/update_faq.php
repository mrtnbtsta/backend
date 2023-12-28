<?php 

require '../config/connection.php';


if(isset($_POST["fid"])){

    $id = $_POST["fid"];
    $title = $_POST["title"] ? $con->real_escape_string($_POST["title"]) : "";
    $content = $_POST["content"] ? $con->real_escape_string($_POST["content"]) : "";

    $stmt= $con->prepare("UPDATE faq SET title=?, content=? WHERE fid=?");
    $stmt->bind_param("ssi", $title,$content,$id);
    $stmt->execute();

}


header('Content-Type: application/json');
?>