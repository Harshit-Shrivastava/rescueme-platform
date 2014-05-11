<?php 
header('Access-Control-Allow-Origin: *');
include_once('dbconfig.php');

$uuid2 = $_POST['uuid']
$arr = $_POST['array'];

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die('Failed to Connect to Database');

foreach($arr as $item)
{
	$query = sprintf("insert into vicinity(uuid1,uuid2) values('%s', '%s')", $item, $uuid2);
	$res = mysqli_query($conn, $query) or die('Failed to execute Query');
}

$conn.close();
?>