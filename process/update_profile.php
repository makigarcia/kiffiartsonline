<?php

include('../kiffiarts_server.php');



session_start();
$customer = $_SESSION['customer_ID'];

$newfirstname = $_POST['newfirstname'];
$newlastname = $_POST['newlastname'];
$newaddress = $_POST['newaddress'];
$newcontactnumber = $_POST['newcontactnumber'];


if ($_POST['newfirstname'] != null){
$query = "UPDATE customer SET fname='$newfirstname' WHERE customer_ID='$customer'";
@mysql_query($query, $dbc);
}

if ($_POST['newlastname'] != null){
$query = "UPDATE customer SET lname='$newlastname' WHERE customer_ID='$customer'";
@mysql_query($query, $dbc);
}

if ($_POST['newaddress'] != null){
$query = "UPDATE customer SET address='$newaddress' WHERE customer_ID='$customer'";
@mysql_query($query, $dbc);
}

if ($_POST['newcontactnumber'] != null){
$query = "UPDATE customer SET phone_num='$newcontactnumber' WHERE customer_ID='$customer'";
@mysql_query($query, $dbc);
}


header('Location:../profile.php');






?>