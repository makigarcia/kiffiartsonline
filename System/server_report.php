<?php
$host 		= "localhost"; // Hostname
$username	= "root"; // Host username
$password	= ""; // Host password
$db			= "kiffiarts"; //Database name
$dbc = @mysql_connect('localhost','root','');
@mysql_select_db('kiffiarts', $dbc);
$conn = new mysqli("$host", "$username", "", "$db");
?>