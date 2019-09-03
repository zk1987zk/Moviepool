<?php
session_start();
include('connectMySQL.php');
$db = new MySQLDatabase(); // create a Database object
$db->connect("s4460184", "POxPEHj00AhgYxGv", "moviepool");

$uName = $_POST["username"];
$pw = $_POST["newpassword"];
$pw2 = $_POST["newpassword2"];
$uMail = $_POST["email"];

$queryUN = "select Username,email from users where Username = '$uName'";
$countUN = mysqli_query($db->link,$queryUN);
$row = mysqli_fetch_array($countUN);

if(mysqli_num_rows($countUN) == 0){
    $_SESSION['checkUN'] =1;
    unset($_SESSION['checkEM']);
    unset($_SESSION['differnewinfo']);
    header("Location:resetPW.php");
} else if($row['email'] != $uMail){
    unset($_SESSION['checkUN']);
    $_SESSION['checkEM'] =1;
    unset($_SESSION['differnewinfo']);
    echo $row['email'];
    header("Location:resetPW.php");
} else{
    unset($_SESSION['checkUN']);
    unset($_SESSION['checkEM']);
    if($pw === $pw2){
        unset($_SESSION['differnewinfo']);
       $hash_pw = password_hash($pw, PASSWORD_DEFAULT);
	   $query = "update users set Password = '$hash_pw' where Username = '$uName'";
	   $result = mysqli_query($db->link,$query);
	   if(!$result) {
           die(mysqli_error($db->link)); // useful for debugging
       }	
    header("Location:login.php");
       //header("Location:login.php");
    } else if ($pw != $pw2) {
        $_SESSION['differnewinfo']=1;
        header("Location:resetPW.php");
    } 
}

	
$db->disconnect();

?>