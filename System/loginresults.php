<?php
$uusername = $_POST['lusername'];
$upassword = $_POST['lpassword'];


include('server_one.php');

$query1 = "SELECT admin_id FROM admin WHERE Password='$upassword' and UserName='$uusername' and active=1";
$r1 = @mysql_query($query1, $dbc);
$row1 = mysql_fetch_array($r1);

if (is_null($row1['admin_id']))
{
    	$msg = 'Login Failed! Please make sure that you enter the correct details and that you have activated your account.';
    	session_start();
    	$_SESSION['msg'] = $msg;
		Header("Location:login.php");
}
else
{
	session_start();
		 $_SESSION['usern']=$row1['admin_id'];	

		
		 if($row1['admin_id']=='1')
		{
			Header("Location: pages/admin/dashboard.php");
		}
		else if($row1['admin_id']=='2')
		{

			Header("Location: pages/admin/dashboard.php");
		}
		else{

			header("Location: pages/admin/dashboard\	.php");
		}
}
 			
?>