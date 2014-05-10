<?php 
header('Access-Control-Allow-Origin: *');
include_once('dbconfig.php');

$uuid = $_POST['uuid'];
$lat = $_POST['lat'];
$long = $_POST['long'];

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die('Failed to Connect to Database');
$query = sprintf("insert into users(uuid, lat, lng) values('%s', %f, %f)", $uuid, $lat, $long);
echo $query;
$res = mysqli_query($conn, $query) or die('Failed to execute Query');

if(mysqli_affected_rows($conn) != 1) {
	//Failed to insert uuid
	echo "-1";
} 

?>
