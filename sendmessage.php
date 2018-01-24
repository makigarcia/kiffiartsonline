<?php
include "smsGateway.php";
$smsGateway = new SmsGateway('jyseungri@gmail.com', 'iloveseungri11'); // wag na galawin

$deviceID = 71106; // wag na rin galawin
$number = '09057342446'; //plitan mo na lg ng variable name ng nasa database nyo
$message = 'Hello World!'; // eto yung message, edit nyo na lg



$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);



?>