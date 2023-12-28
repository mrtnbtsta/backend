<?php 


require '../config/connection.php';

$data = array();
if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $stmt = $con->prepare("SELECT uc.content, uc.did, d.id, u.uName, u.profile
    FROM user_comments uc LEFT JOIN 
    discussion d ON d.id = uc.did LEFT JOIN
    users u ON u.uid = uc.user_id WHERE uc.did = ?");
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $result = $stmt->get_result();

    foreach($result as $results){
        $data[] = ["did" => $results["did"], "content" => $results["content"], "profile" => $results["profile"], "uName" => $results["uName"]];
    }

}



echo json_encode($data);
header("Content-Type: application/json");
?>