<?php
session_start(); 
include('connectMySQL.php');
$db = new MySQLDatabase(); // create a Database object
$db->connect("root", "", "moviepool");

$comment = $_POST['comment'];
$m_id = $_GET['id'];
echo $m_id;
echo $comment;
if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
	$query = "insert into comments(Username, contents, comment_datetime, m_id) values ('$username','$comment',NOW(),'$m_id')";
	$result = mysqli_query($db->link,$query);
	header("Location:movie_info.php?id=".$m_id);
	if(!$result){
		die(mysqli_error($db->link)); // useful for debugging
	}
}

$db->disconnect();
?>
