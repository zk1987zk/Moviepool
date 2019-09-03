<?php
	include('connectMySQL.php');
	$db = new MySQLDatabase(); // create a Database object
	$db->connect("s4460184", "POxPEHj00AhgYxGv", "moviepool");

	$movie_id = $_GET["mid"];
	$comment_id = $_GET["cid"];

	$query = "delete from comments where m_id=".$movie_id." and comment_id=".$comment_id;
	echo $query;
	$result = mysqli_query($db->link,$query);
	if(!$result){
		die(mysqli_error($db->link)); // useful for debugging
	}
	$db->disconnect();
	header("Location:movieInfo.php?id=".$movie_id);
?>