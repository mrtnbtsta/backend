<?php 
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST');
// header("Access-Control-Allow-Headers: X-Requested-With");

$con = mysqli_connect("localhost", "root", "", "xevcurity_db") or die("Could not connect");

if(!$con){
    // echo "Not connected";
 }else{
    // echo "Connected";
}

?>