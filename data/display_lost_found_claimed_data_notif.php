<?php 


require '../config/connection.php';


if(isset($_GET["id"])){
    $id = $_GET["id"];

    $data = array();

    $stmt = $con->prepare("SELECT * FROM lost_found_claim lfc LEFT JOIN lost_found lf ON lfc.id = lf.id LEFT JOIN users u ON lfc.uid = u.uid WHERE lfc.uid=? AND lfc.status='1' AND lfc.seen='0'");
    $stmt->bind_param("i", $id);
    // $stmt = $con->prepare("SELECT * FROM lost_found INNER JOIN users ON lost_found.uid = users.uid");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
        $data[] = ["cid" => $row["cid"], "uName" => $row["uName"], "claim_image" => $row["claim_image"]];
    }
  

}  



echo json_encode($data);




header('Content-Type: application/json');



?>