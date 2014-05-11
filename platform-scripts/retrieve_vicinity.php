<?php 
header('Access-Control-Allow-Origin: *');
include_once('dbconfig.php');

$uuid1 = $_POST['uuid1'];

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die('Failed to Connect to Database');

$query = sprintf("select uuid2 from vicinity where uuid1 = '%s' ", $uuid1);
$res = mysqli_query($conn, $query) or die('Failed to execute Query');

$arr = array();
while($row = mysqli_fetch_array($res))
{
	extract($row);
	$temp = array("uuid" => $uuid2);
	array_push($arr, $temp);
}

header('Content-Type: application/json');
json_decode($arr);
