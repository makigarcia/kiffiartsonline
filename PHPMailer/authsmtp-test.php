<?php

require("class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "mail.authsmtp.com"; // specify SMTP server
$mail->SMTPAuth = true; // turn on SMTP authentication

$mail->Username = "themakpacker@gmail.com"; // SMTP username -- CHANGE --
$mail->Password = "kAratekid3?"; // SMTP password -- CHANGE --
$mail->From = "themakpacker@gmail.com"; //From Address -- CHANGE --
$mail->FromName = "Kiffi Arts Print Shop Online"; //From Name -- CHANGE --
$mail->AddAddress("to@your-domain-name.com", "Example"); //To Address -- CHANGE --
$mail->AddReplyTo("you@your-domain-name.com", "Your Company Name"); //Reply-To Address -- CHANGE --

$mail->Port = "25"; // SMTP Port
$mail->WordWrap = 50; // set word wrap to 50 characters
$mail->IsHTML(false); // set email format to HTML
$mail->Subject = "AuthSMTP Test";
$mail->Body= "AuthSMTP Test Message!";

if(!$mail->Send()){
	echo "Message could not be sent. <p>";
	echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
}
echo "Message has been sent";
?>