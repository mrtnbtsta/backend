<?php 

require '../config/connection.php';

if(isset($_POST["username"])){

    $loginType = $_POST["loginType"] ? $con->real_escape_string($_POST["loginType"]) : "";
    $username = $_POST["username"] ? $con->real_escape_string($_POST["username"]) : "";
    $password = $_POST["password"] ? $con->real_escape_string($_POST["password"]) : "";

    if(!empty($loginType) && empty($username) && empty($password)){
        echo json_encode(["all_fields" => true]);
    }else{
        $stmt = $con->prepare("SELECT * FROM admin WHERE username = ? AND password=? AND loginType=?");
        $stmt->bind_param("sss", $username,$password, $loginType);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if($result->num_rows > 0){
            
            echo json_encode(["success" => "admin", "aid" => $row["aid"], "username" => $row["username"]]);

        }else{
            echo json_encode(["no_account" => true]); 
        }
        
    }


    

}

header('Content-Type: application/json');
?>