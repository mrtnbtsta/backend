<?php 


require '../config/connection.php';

if(isset($_POST["id"])){
    $id = $_POST["id"];
    $uid = $_POST["uid"];

    $image = $_FILES["image"]["name"];
    $target_dir = "../upload/images/";
    $target_file = $target_dir . basename($image);


    //upload data with mage
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        $stmt = $con->prepare("INSERT INTO lost_found_claim (id, uid, claim_image, status) VALUES(?,?,?,'0')");
        $stmt->bind_param("iis", $id, $uid ,$image);
        $stmt->execute();
    }

}





// header("Content-Type: application/json");
?>