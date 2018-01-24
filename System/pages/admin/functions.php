<?php

function admin_session(){	
	
	$user = $_SESSION["level"];

		if(!isset($user)) {
	    	header("Location:../login.php");
	   	}else{
	 		if($user != 'Admin' ){
	 			header("Location:../login.php");
	 		}
	 	}
}


//<!--**********Management Session*********-->
function management_session(){	
	$user = $_SESSION["level"];

		if(!isset($user)) {
	    	header("Location:../login.php");
	   	}else{
	 		if($user != 'Management' ){
	 			header("Location:../login.php");
	 		}
	 	}
}

//<!--**********Faculty Session*********-->
function faculty_session(){	
	$user = $_SESSION["level"];

		if(!isset($user)) {
	    	header("Location:../login.php");
	   	}else{
	 		if($user != 'Faculty' ){
	 			header("Location:login.php");
	 		}
	 	}
}



//<!--**********Reviewee Session*********-->
function reviewee_session(){
	$user = $_SESSION["username"];

		if(!isset($user)) {
		    header("Location:../login.php");
		   }
		 else {
		 	if($user == 'management'){
		 		header("Location:admin/index.php");
		 	}
		 	else if($user == 'admin'){
		 		header("Location:admin/index.php");
		 	}
		 	else if($user == 'faculty'){
		 		header("Location:faculty.php");
		 	}
		 }
 
}


//<!--**********Management / Admin Session*********-->
function admanage_session(){
	$user = $_SESSION["level"];

		if(!isset($user)) {
	    	header("Location:../login.php");
	   	}else{
	 		if(($user != 'Management' ) and ($user != 'Admin' )){
	 			header("Location:../login.php");
	 		}
	 	}
}




//*******************Logs*********************
function create_log ($user, $action ){
 // Construct query
include('configuration.php');
$ip='';
$ip = get_ip($ip);

 $sql = "INSERT INTO logs (user, action, ip) VALUES('$user','$action', '$ip')";
 // Execute query and save data
  $result = $conn->query($sql);
 
  /*if($result) {
    return array(status => true);  
  	echo 'okay';
  }
  else {
    return array(status => false, message => 'Unable to write to the database');
  	echo 'fail!';
  }*/
}
 
function get_ip($ip){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }

//echo  "<br />".$ip;
return $ip;
}


?>