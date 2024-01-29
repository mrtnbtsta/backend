<?php 

require '../config/connection.php';


if(isset($_GET["id"])){

    $id = $_GET["id"];

    $stmt = $con->prepare("SELECT * FROM reports r LEFT JOIN user_report_details urd ON r.rdid = urd.rdid LEFT JOIN users u ON urd.uid = u.uid WHERE u.uid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        if($row["rdid"] !== null){
            $stmt = $con->prepare("DELETE FROM user_report_details WHERE rdid=?");
            $stmt->bind_param("i", $row["rdid"]);
            $stmt->execute();
        }
    }

}


header('Content-Type: application/json');
?>