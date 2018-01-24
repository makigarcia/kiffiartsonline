<?php
include('database.php');

session_start();
$customer = $_SESSION["customer_ID"];

$query = "SELECT * FROM customer WHERE email='$customer'";
$r = @mysql_query($$query, $dbc);
$row = mysql_fetch_array($r);

$code = $row['verifyemail'];
$email = $customer;
$firstname = $row['fname'];
$lastname = $row['lname'];
$to = $email;
$subject = 'Myrnas Bake House Online Personalized Cake Account | Resend Verification';
$header = "From:Myrnas Bake House"."\r\n";
$message = '
 Email Verification Resent!
Your account has been created before, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Name: '.$firstname." ".$lastname.'
Email: '.$email.'
------------------------
 
Please click this link to activate your account:
http://www.myrnasonlinecakecom.000webhostapp.com.com/process/emailverification.php?email='.$email.'&code='.$code.'
 
'; // Our message above including the link

?>