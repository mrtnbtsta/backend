<?php 


require '../config/connection.php';

if(isset($_POST["comment"])){

    $comment = $_POST["comment"];
    $rid = $_POST["rid"];
    $uid = $_POST["uid"];
    

    $stmt = $con->prepare("INSERT INTO report_comment (rid, uid ,comment) VALUES(?,?,?)");
    $stmt->bind_param("iis", $rid, $uid ,$comment);
    $stmt->execute();

}



?>