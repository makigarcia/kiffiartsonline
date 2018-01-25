<?php

//-*********For online hostting************
/*$host 		= "localhost"; // Hostname
$username	= "nrc_thesis"; // Host username
$password	= "89utgg"; // Host password
$db			= "nrc_db"; //Database name
$dbc = mysql_connect($host, $username, $password) or die("Oops! Coudn't connect to server"); // Connect to the server
mysql_select_db($db) or die("Oops! Coudn't select Database"); // Select the database
$conn = new mysqli("$host", "$username", "$password", "$db");*/

//-***************For local hosting******
$host 		= "localhost"; // Hostname
$username	= "root"; // Host username
$password	= ""; // Host password
$db			= "kiffiarts"; //Database name
$dbc = mysql_connect($host, $username, $password) or die("Oops! Coudn't connect to server"); // Connect to the server
mysql_select_db($db) or die("Oops! Coudn't select Database"); // Select the database
$conn = new mysqli("$host", "$username", "", "$db");

?>