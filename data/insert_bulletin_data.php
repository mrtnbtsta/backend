<?php 

require '../config/connection.php';

if(isset($_POST["title"])){
   
    $title = $_POST["title"] ? $con->real_escape_string($_POST["title"]) : "";
    $description = $_POST["description"] ? $con->real_escape_string($_POST["description"]) : "";
    $type = $_POST["type"] ? $con->real_escape_string($_POST["type"]) : "";
    $image = $_FILES["image"]["name"];

    $target_dir = "../upload/images/";
    $target_file = $target_dir . basename($image);

    //if successfully added image to the uploaded file we will add the data to databases
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

        $stmt = $con->prepare("INSERT INTO bulletin (title, image, description, type) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $title, $image, $description, $type);
        $stmt->execute();

    }

}

?>