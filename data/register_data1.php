<?php 

require '../config/connection.php';

if(isset($_POST["name"])){

    $name = $_POST["name"] ? $con->real_escape_string($_POST["name"]) : "";
    $address = $_POST["address"] ? $con->real_escape_string($_POST["address"]) : "";
    $email = $_POST["email"] ? $con->real_escape_string($_POST["email"]) : "";
    $contact = $_POST["contact"] ? $con->real_escape_string($_POST["contact"]) : "";
    $password = $_POST["password"] ? $con->real_escape_string($_POST["password"]) : "";
    $loginType = $_POST["loginType"] ? $con->real_escape_string($_POST["loginType"]) : "";
    $image = $_FILES["image"]["name"] ?? "default";

    $stmt = $con->prepare("INSERT INTO users (uName, address, email, contact, password, profile, loginType) VALUES(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $address, $email, $contact, $password, $image, $loginType);
    $stmt->execute();
}

// header('Content-Type: application/json');
?>