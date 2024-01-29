<?php 

require '../config/connection.php';

if(isset($_GET["uid"])){

    $uid = $_GET["uid"];
    $data = [];

    $stmt = $con->prepare("SELECT * FROM users WHERE uid=?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){

        $row = $result->fetch_assoc();
        $data[] = $row;

    }
}

echo json_encode($data);
header('Content-Type: application/json');
?>