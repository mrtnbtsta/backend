<?php 

require '../config/connection.php';

if(isset($_POST["name"])){
    $time = time();
    $name = $_POST["name"] ? $con->real_escape_string($_POST["name"]) : "";
    $description = $_POST["description"] ? $con->real_escape_string($_POST["description"]) : "";
    $image = $_FILES["image"]["name"];


    $target_dir = "../upload/images/";
    $target_file = $target_dir . basename($image);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        $stmt = $con->prepare("INSERT INTO discussion (name, time, image, description) VALUES(?,?,?,?)");
        $stmt->bind_param("siss", $name, $time, $image, $description);
        $stmt->execute();
    }

}

?>