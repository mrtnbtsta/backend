<?php 

require '../config/connection.php';


if(isset($_POST["name"])){

    $name = $_POST["name"] ? $con->real_escape_string($_POST["name"]) : "";
    $date = $_POST["date"] ? $con->real_escape_string($_POST["date"]) : "";
    $post_status = $_POST["post_status"] ? $con->real_escape_string($_POST["post_status"]) : "";
    $address = $_POST["address"] ? $con->real_escape_string($_POST["address"]) : "";
    $contact = $_POST["contact"] ? $con->real_escape_string($_POST["contact"]) : "";
    $typeOfReport = $_POST["typeOfReport"] ? $con->real_escape_string($_POST["typeOfReport"]) : "";
    $describeIncident = $_POST["describeIncident"] ? $con->real_escape_string($_POST["describeIncident"]) : "";
    $locationIncident = $_POST["locationIncident"] ? $con->real_escape_string($_POST["locationIncident"]) : "";
    $specifyIncident = $_POST["specifyIncident"] ? $con->real_escape_string($_POST["specifyIncident"]) : "";
    $monthText = $_POST["monthText"] ? $con->real_escape_string($_POST["monthText"]) : "";
    // $startDate = $_POST["startDate"] ? $con->real_escape_string($_POST["startDate"]) : "";
    // $endDate = $_POST["endDate"] ? $con->real_escape_string($_POST["endDate"]) : "";
    $type = $_POST["type"] ? $con->real_escape_string($_POST["type"]) : "";
    $uid = $_POST["uid"];
    $image = $_FILES["image"]["name"];

    $target_dir = "../upload/images/";
    $target_file = $target_dir . basename($image);


    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        $stmt = $con->prepare("INSERT INTO user_report_details (uid,name, date, address, contact, post_status) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("isssss", $uid, $name, $date, $address, $contact, $post_status);
        if($stmt->execute()){
            //get the last id inserted
            $last_id = $con->insert_id;
            $stmt = $con->prepare("INSERT INTO reports (rdid ,typeOfReport, describeIncident, locationIncident, specifyIncident ,image, type) VALUES(?,?,?,?,?,?,?)");
            $stmt->bind_param("issssss", $last_id ,$typeOfReport, $describeIncident, $locationIncident, $specifyIncident ,$image, $type);
            if($stmt->execute()){
                $last_rid = $con->insert_id;
                $stmt = $con->prepare("INSERT INTO admin_summary_report (rid, month_text, start_date, end_date) VALUES(?,?,NOW(), LAST_DAY(NOW()))");
                $stmt->bind_param("is", $last_rid, $monthText);
                $stmt->execute();
            }

        }
    }





}

?>