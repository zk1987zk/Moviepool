<?php
session_start();
include('connectMySQL.php');
$db = new MySQLDatabase(); // create a Database object
$db->connect("s4460184", "POxPEHj00AhgYxGv", "moviepool");

$uName = $_POST["username"];
$pw = $_POST["password"];
$pw2 = $_POST["password2"];
$uMail = $_POST["email"];

$queryUN = "select Username from users where Username = '$uName'";
$countUN = mysqli_query($db->link,$queryUN);

if($pw == "" || $pw2 =="" || $uName == ""|| $uMail == ""){
    unset($_SESSION['duplicateUN']);
    unset($_SESSION['differinfo']);
    $_SESSION['checkinfo'] = 1;
    header("Location:register.php");
} else if(mysqli_num_rows($countUN)>=1){
    unset($_SESSION['differinfo']);
    unset($_SESSION['checkinfo']);
    $_SESSION['duplicateUN']=1;
    header("Location:register.php");
} else{
    unset($_SESSION['duplicateUN']);
    unset($_SESSION['checkinfo']);
    if($pw === $pw2){
        unset($_SESSION['differinfo']);
       $hash_pw = password_hash($pw, PASSWORD_DEFAULT);
	   $query = "insert into users(Username, Password, email) values ('$uName','$hash_pw','$uMail')";
	   $result = mysqli_query($db->link,$query);
	   if(!$result) {
           die(mysqli_error($db->link)); // useful for debugging
       }	
    class User {
        public $uname = "";
        public $password = "";
    }
    $u = new User();
    $u->uname = $uName;
    $u->password = $pw;
    json_encode($u);
    header("Location:login.php");
       //header("Location:login.php");
    } else if ($pw != $pw2) {
        $_SESSION['differinfo']=1;
        header("Location:register.php");
    } 
}

	
$db->disconnect();

?>