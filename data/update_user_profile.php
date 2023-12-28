<?php 

require '../config/connection.php';

if(isset($_POST["name"])){

    
    $uid = $_GET["uid"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];
    $image = $_FILES["image"]["name"] ?? "";

    $target_dir = "../upload/profile/";
    $target_file = $target_dir . basename($image);

    $select = $con->prepare("SELECT * FROM users WHERE uid=?");
    $select->bind_param("i", $uid);
    $select->execute();
    $result = $select->get_result();
    $row = $result->fetch_assoc();

    //get the current image 
    $profile = $row["profile"];
    $current_profile = $target_dir . basename($profile);
    //delete the current image
    unlink($current_profile);
 

    //upload the new image  
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        $stmt = $con->prepare("UPDATE users SET uName=?, address=?, email=?, contact=?, password=?, profile=? WHERE uid=?");
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssssi", $name, $address, $email, $contact, $password, $image, $uid);
        $stmt->execute();
    }else{
        $stmt = $con->prepare("UPDATE users SET uName=?, address=?, email=?, contact=?, password=? WHERE uid=?");
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sssssi", $name, $address, $email, $contact, $password, $uid);
        $stmt->execute();
    }
    


 


}

// header('Content-Type: application/json');
?>