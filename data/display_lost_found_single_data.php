<?php 

require '../config/connection.php';

$data = array();
if(isset($_GET["id"])){
    // $lfid = $_GET["lfid"];
    // $uid = $_GET["uid"];
    $id = $_GET["id"];
    $stmt = $con->prepare("SELECT * FROM lost_found lf LEFT JOIN users u ON lf.uid = u.uid WHERE lf.id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $data = ["uName" => $row["uName"], "address" => $row["address"], "image" => $row["image"], "post_status" => $row["post_status"]];

    // $stmt = $con->prepare("SELECT * FROM lost_found_comments lfc LEFT JOIN lost_found lf ON lfc.lfid = lf.id LEFT JOIN users u ON lfc.uid = u.uid WHERE (lfc.lfid = '$lfid' AND lfc.uid = '$uid') OR (lfc.uid = '$lfid' AND lfc.lfid='$uid')");
    // // $stmt->bind_param("ii", $lfid, $uid);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $row = $result->fetch_assoc();
    
    // if($result->num_rows > 0){
    //     echo json_encode(["name" => $row["uName"], "image" => $row["image"], "profile" => $row["profile"], "id" => $row["id"], "uid" => $row["uid"], "comment" => $row["comment"], "success" => true]);
    //     // $data = ["name" => $row["uName"], "image" => $row["image"], "profile" => $row["profile"], "id" => $row["id"], "uid" => $row["uid"], "comment" => $row["comment"]];
    // }else{
    //     echo json_encode(["no_data" => true]);
    // }
    
}
echo json_encode($data);
header("Content-Type: application/json");
?>