<?php
session_start();
include('connectMySQL.php');
$db = new MySQLDatabase(); // create a Database object
$db->connect("root", "", "moviepool");

$st = $_POST["start_time"];
$et = $_POST["end_time"];

echo $st;
echo $et;
$queryUN = "select m_id, count(distinct m_id) from comments where comment_datetime between '$st' and '$et'";
$countUN = mysqli_query($db->link,$queryUN);
$row = mysqli_fetch_array($countUN);

var_dump($row);

	
$db->disconnect();

?>