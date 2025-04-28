<?php
//header("Access-Control-Allow-Origin: *");
//header('Access-Control-Allow-Credentials: true');
//header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//header("Content-Type: application/json; charset=UTF-8");

$server = "localhost";
$username = "root";
$password = "";
$dbname = "digital-library";
$con = mysqli_connect("$server","$username","$password","$dbname");

if(!$con){
	die("Connection error: " . mysqli_connect_error());
}
?>