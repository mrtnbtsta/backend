<?php 

require '../config/connection.php';

if(isset($_POST["lost_item"])){
    $uid = $_POST["uid"] ?? null;
    $type = $_POST["type"];
    $lost_item = $_POST["lost_item"] ? $con->real_escape_string($_POST["lost_item"]) : "";
    $date_of_lost = $_POST["date_of_lost"] ? $con->real_escape_string($_POST["date_of_lost"]) : "";
    $detail_description = $_POST["detail_description"] ? $con->real_escape_string($_POST["detail_description"]) : "";
    $image =  $_FILES["image"]["name"] ?? "";
    $post_status = $_POST["post_status"];

    
    if($type === "Image"){
        $target_dir_img = "../upload/images/";
        $target_file = $target_dir_img . basename($image);
    }else if($type === "Video"){
        $target_dir_img = "../upload/videos/";
        $target_file = $target_dir_img . basename($image);
    }
    


    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){

        $stmt = $con->prepare("INSERT INTO lost_found (uid,lost_item, date_of_lost, detail_description, image, type, post_status) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("issssss", $uid,$lost_item, $date_of_lost, $detail_description, $image, $type,$post_status);
        if($stmt->execute()){
            echo json_encode(['success' => true]);
        }
       
    }

  


  

}
header("Content-Type: application/json");
?>