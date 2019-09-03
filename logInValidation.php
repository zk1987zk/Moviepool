<?php
session_start();
include('connectMySQL.php');
$db = new MySQLDatabase(); // create a Database object
$db->connect("s4460184", "POxPEHj00AhgYxGv", "moviepool");

$username = $_REQUEST['username'];
$password = $_POST['password'];

if($username === "admin" && $password === "admin"){
	$_SESSION['admin']=1;
	header("Location:admin.php");
	exit();
}

$query = "select Username,Password  from users where Username='$username'";
$result = mysqli_query($db->link,$query);
if (mysqli_num_rows($result) == 0){
	//user name is not valid
	unset($_SESSION['wrongPW']);
	$_SESSION['UserNE']=1;
	header("Location:login.php");
} else if($result){
	$row = mysqli_fetch_array($result);
	if(password_verify($password, $row['Password'])){
		unset($_SESSION['wrongPW']);
		unset($_SESSION['UserNE']);
    	$_SESSION['username']=$username;
    	header("Location:index.php");
	} else {
		//wrong password
		unset($_SESSION['UserNE']);
		$_SESSION['wrongPW']=1;
		header("Location:login.php");
	}
}
 else {
	die(mysqli_error($db->link)); // for debugging
}

$db->disconnect();


?>