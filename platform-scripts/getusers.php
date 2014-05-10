<?php 

header('Access-Control-Allow-Origin: *');
include_once('dbconfig.php');

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die('Failed to Connect to Database');
$query = "select * from users";
//echo $query;
$res = mysqli_query($conn, $query) or die('Failed to execute Query');

$arr = array();

while($row = mysqli_fetch_assoc($res)) {
	extract($row);
	$temp = array("uuid" => $uuid, "lat" => $lat, "lng" => $lng);
	array_push($arr, $temp);
}

header('Content-Type: application/json');
//echo $jss;
echo json_encode($arr);

//print_r($arr);

?>