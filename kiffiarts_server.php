<?php

$dbc = @mysql_connect('localhost' , 'root','');
@mysql_select_db('kiffiarts', $dbc);

date_default_timezone_set("Asia/Manila");

?>