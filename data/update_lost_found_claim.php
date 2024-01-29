    <?php 


require '../config/connection.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $con->prepare("UPDATE lost_found SET = status_claim='1' WHERE id = ?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
}





header("Content-Type: application/json");
?>