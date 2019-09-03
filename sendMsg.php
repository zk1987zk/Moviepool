<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//include PHPMailerAutoload.php
require 'vendor/autoload.php';



if (isset($_POST["name"])||isset($_POST["email"])||isset($_POST["message"]) ){
	$form_message = 'A messge by '.$_POST["name"].' from '.$_POST["email"].' says "'.$_POST["message"].'"';
	sendMail($form_message);
}

function sendMail($content){
	try {
		//Create a new PHPMailer instance
	$mail = new PHPMailer(true);
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Set the hostname of the mail server
	$mail->SMTPDebug = 1;
	$mail->Host = 'smtp.gmail.com';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "kan9871zhang@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "kan0402699623";
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'ssl';
	//set a port
	$mail->Port = 465;
	//set subject
	//mail->Subjet = "test email";
	//set body
	$mail->Body = $content;
	//set who is sending an email
	$mail->setFrom('kan9871zhang@gmail.com', 'Kan Zhang');
	//set where we are sending
	$mail->addAddress('zk1987zk@hotmail.com', 'Kan Zhang');
	//send an email
	if($mail->send()){
		echo "<script type='text/javascript'>alert('The message has been sent successfully!')</script>";
		header("Location:index.php"); 	
	}else{
		echo "<script type='text/javascript'>alert('The message is not sent!')</script>";
		header("Location:contact.php");
	}
		
	} catch (phpmailerException $e) {
		echo $e->errorMessage();
		exit;
		
	} catch(Exception $e){
		echo $e->getMessage();
		exit;
	}
	
}
?>