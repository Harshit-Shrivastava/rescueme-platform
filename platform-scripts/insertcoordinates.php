<?php 
header('Access-Control-Allow-Origin: *');
include_once('dbconfig.php');

$uuid = $_POST['uuid'];
$lat = $_POST['lat'];
$long = $_POST['lng'];


$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die('Failed to Connect to Database');
$query = sprintf("insert into users(uuid, lat, lng) values('%s', %f, %f)", $uuid, $lat, $long);
//echo $query;
$res = mysqli_query($conn, $query) or die('Failed to execute Query');

if(mysqli_affected_rows($conn) != 1) {
	//Failed to insert uuid
	$json_ob = array("status" => -1);
//print_r($json_ob);


} else {
	$json_ob = array("status" => 0);
}

header('Content-Type: application/json');
//echo $jss;
echo json_encode($json_ob);

?>
