<?php 
header('Access-Control-Allow-Origin: *');
include_once('dbconfig.php');

$uuid = $_POST['uuid'];
$lat = $_POST['lat'];
$long = $_POST['lng'];

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die('Failed to Connect to Database');
$query = sprintf("update users set lat=%f, lng=%f where uuid='%s'", $lat, $long, $uuid);
echo $query;
$res = mysqli_query($conn, $query) or die('Failed to execute Query');

if(mysqli_affected_rows($conn) != 1) {
	//Failed to update uuid
	echo "-1";
} 

?>
