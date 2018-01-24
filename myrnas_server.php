<?php

$dbc = @mysql_connect('localhost' , 'root','');
@mysql_select_db('myrnas', $dbc);

date_default_timezone_set("Asia/Manila");

?>