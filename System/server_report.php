<?php
$host 		= "localhost"; // Hostname
$username	= "root"; // Host username
$password	= ""; // Host password
$db			= "myrnas"; //Database name
$dbc = @mysql_connect('localhost','root','');
@mysql_select_db('myrnas', $dbc);
$conn = new mysqli("$host", "$username", "", "$db");
?>