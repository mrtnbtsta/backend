<?php 
require '../config/connection.php';

if(isset($_POST["email"])){

    $loginType = $_POST["loginType"] ? $con->real_escape_string($_POST["loginType"]) : "";
    $email = $_POST["email"] ? $con->real_escape_string($_POST["email"]) : "";
    $password = $_POST["password"] ? $con->real_escape_string($_POST["password"]) : "";


    if(!empty($loginType) && empty($email) && empty($password)){
        echo json_encode(["all_fields" => true]);
    }else{
        $stmt = $con->prepare("SELECT * FROM users WHERE email=? AND password=? AND loginType=?");
        $stmt->bind_param("sss", $email, $password, $loginType);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();    
            echo json_encode(["success" => "user", "uid" => $row["uid"], "uName" => $row["uName"], "profile" => $row["profile"], "address" => $row["address"], "contact" => $row["contact"]]);
        }else{
            echo json_encode(["no_account" => true]);
        }
    }

}

header('Content-Type: application/json');

?>