<?php 

require '../config/connection.php';

if(isset($_POST["lost_item"])){
    $uid = $_POST["uid"] ?? null;
    $lost_item = $_POST["lost_item"] ? $con->real_escape_string($_POST["lost_item"]) : "";
    $date_of_lost = $_POST["date_of_lost"] ? $con->real_escape_string($_POST["date_of_lost"]) : "";
    $detail_description = $_POST["detail_description"] ? $con->real_escape_string($_POST["detail_description"]) : "";
    $video =  $_FILES["video"]["name"] ?? "";

    
    $target_dir_video = "../upload/videos/";
    $target_file = $target_dir_video . basename($video);
    
    // if(str_ends_with($image, "png") || str_ends_with($image, "jpg")){
    //     $target_file = $target_dir_img . basename($image);
    // }else if(str_ends_with($video, "mp4")){
    //     $target_file = $target_dir_video . basename($video);
    // }
    
    


    // $target_file = $target_dir . basename($fileType);

    if(move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)){

       
        $stmt = $con->prepare("INSERT INTO lost_found1 (uid,lost_item1, date_of_lost1, detail_description1, video, status_claim1) VALUES(?,?,?,?,?,'0')");
        $stmt->bind_param("issss", $uid,$lost_item, $date_of_lost, $detail_description, $video);
        $stmt->execute();
       
    }

  


  

}
header("Content-Type: application/json");
?>