<?php 

require '../config/connection.php';


if(isset($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $con->prepare("SELECT * FROM users u LEFT JOIN user_comments uc ON u.uid = uc.user_id LEFT JOIN report_comment rc ON u.uid = rc.uid LEFT JOIN lost_found_comments lf ON u.uid = lf.uid WHERE u.uid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    // $row = $result->fetch_assoc();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row["ucid"] !== null){
                $stmt = $con->prepare("DELETE FROM user_comments WHERE ucid=?");
                $stmt->bind_param("i", $row["ucid"]);
                $stmt->execute();
            }
            if($row["lfc"] !== null){
                $stmt = $con->prepare("DELETE FROM lost_found_comments WHERE lfc=?");
                $stmt->bind_param("i", $row["lfc"]);
                $stmt->execute();
            }
            if($row["rcid"] != null){
                $stmt = $con->prepare("DELETE FROM report_comment WHERE rcid=?");
                $stmt->bind_param("i", $row["rcid"]);
                $stmt->execute();
            }
        }
    }

}


header('Content-Type: application/json');
?>