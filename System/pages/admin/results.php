<?php
include('../../server_one.php');

include "smsGateway.php";
$smsGateway = new SmsGateway('jyseungri@gmail.com', 'iloveseungri11');

$url=$_POST['url'];
if(!empty($_POST['checkstatus'])){
$checkstatus = $_POST['checkstatus'];
}else{
  $checkstatus = " ";
}
if($checkstatus==0){
if($url==1){

//delete  appointment dashboard
	$RNo = $_POST['bid'];
$usern = $_POST['usern'];

	$query3 = "SELECT `RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show` FROM `reservation` WHERE `RNo`='$RNo'";
	$r3 = @mysql_query($query3, $dbc); 
	while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
	$storeArray2[][] =  $row3;
	}

	$getdate=$storeArray2[0][0]['RDate'];


	$query2 = "DELETE FROM `reservation` WHERE RNo='$RNo'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="admin-user-secretary.php";
	$_SESSION['text']="Deleting Appointment Done";
	$_SESSION['AddDone']=$getdate;

	
	Header("Location:alerts.php");


}else if($url==2){
	// delete cancelled appointment dashboard
	$RNo = $_POST['bid'];
	$usern = $_POST['usern'];

	$query3 = "SELECT `RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show` FROM `reservation` WHERE `RNo`='$RNo'";
	$r3 = @mysql_query($query3, $dbc); 
	while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
	$storeArray2[][] =  $row3;
	}

	$getdate=$storeArray2[0][0]['RDate'];


	$query2 = "DELETE FROM `reservation` WHERE RNo='$RNo'";
     $r1 = @mysql_query($query2, $dbc); 


    session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="admin-user-secretary.php";
	$_SESSION['text']="Deleting Cancelled Appointment Done";
	$_SESSION['AddDone']=$getdate;


	
	Header("Location:alerts.php");




}else if($url==3){

	//add-dentist sched

		$getdate = $_POST['getdate'];
		$usern = $_POST['usern'];
		$start_time = $_POST['start_time'];
		$end_time= $_POST['end_time'];

        $array_stime=  Array();
        $array_stime = explode('-', $start_time);
            
        $start_time=$array_stime[0];
        $stimeshow=$array_stime[1];

        $array_etime=  Array();
        $array_etime = explode('-', $end_time);
            
        $end_time=$array_etime[0];
        $etimeshow=$array_etime[1];

        $time_show=$stimeshow.'-'.$etimeshow;

    $cct = mysql_query("SELECT count(`DNo`) FROM `dentist_sched` where d_date='$getdate'");

	$cct1 = mysql_fetch_array($cct);
	$a1=$a1[0];
	
	$qcct = mysql_query("SELECT * FROM `dentist_sched` where d_date='$getdate'");

	$qcct1 = mysql_fetch_array($qcct);



      if($end_time<$start_time){

      				session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=2;
					$_SESSION['goto']="secretary-dentist-scheduling.php";
					$_SESSION['text']="Updating Dentist Schedule Unsuccessful \n  Please Check Inputted time";
					$_SESSION['date']=$getdate;


					Header("Location:alerts.php");

      }else{


				       $ai = mysql_query("SELECT max(`DNo`) FROM `dentist_sched`");

						      $a1 = mysql_fetch_array($ai);
						      $a1=$a1[0];
						      $a1++;

						      $query2 = "INSERT INTO `dentist_sched`(`start_time`, `end_time`, `d_date`, `DNo`,`Time_Show`) VALUES ('$start_time','$end_time','$getdate','$a1','$time_show')
						";
						      $r1 = @mysql_query($query2, $dbc); 

				 $bi = mysql_query("SELECT Count(`RNo`) FROM `reservation` WHERE `RDate`='$getdate'");

				      $b1 = mysql_fetch_array($bi);
				      $b1=$b1[0];


				      $query3 = "SELECT `RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show` FROM `reservation` WHERE `RDate`='$getdate'order by `RTime` ASC";
				      $r3 = @mysql_query($query3, $dbc); 
				      while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
				           $storeArray2[][] =  $row3;
				      }


				                  $crno=array();
				                  $ccnt=0;
				                 

				                 
				                    $ts=$start_time;
				                    $te=$end_time;

				                    for($j=0;$j<$b1;$j++){
				                      $stime=$storeArray2[$j][0]['RTime'];
				                      $etime=$storeArray2[$j][0]['RETime'];

				                      if($stime<$te&& $etime>$ts){
				                        $crno[$ccnt]=$storeArray2[$j][0]['RNo'];
				                        $ccnt++;
				                  
				                      }
				                      
				                    }   

				$st="Cancelled";

				                    for($i=0;$i<$ccnt; $i++){

				                        $rn=$crno[$i];

				                        $query1 = "UPDATE `reservation` set `status`='$st' where `RNo`='$rn'";
				                        $r11 = @mysql_query($query1, $dbc); 
				                    }


				     session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=1;
					$_SESSION['goto']="secretary-dentist-scheduling.php";
					$_SESSION['text']="Updating Dentist Schedule Done";
					$_SESSION['date']=$getdate;


					Header("Location:alerts.php");

				    
	}

}else if($url==4){
	//add appointment
		$cdate=date('Y-m-d');
		$getdate = $_POST['getdate'];
		$time = $_POST['time'];
		$timeshow = $_POST['timeshow'];
		$patientID= $_POST['patientID'];
		$treatment = $_POST['treatment'];                       
		$usern  = $_POST['usern'];
		$checkstatus  = $_POST['checkstatus']; 


$ddate=strtotime($getdate);
                    $ddate=date("F j, Y", $ddate);

		 $ai = mysql_query("SELECT max(`RNo`) FROM `reservation`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;


		$array_time=  Array();
        $array_time = explode('-', $time);
            
        $start_time=$array_time[0];
        $end_time=$array_time[1];


         $check = mysql_query("SELECT count(`RNo`) FROM `reservation` where `RDate`='$getdate' and `PatientId`='$patientID'");

		 $check1 = mysql_fetch_array($check);
		 
if($cdate==$getdate and empty($patientID)){

	session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=2;
					$_SESSION['goto']="set-appointment-secretary.php";
					$_SESSION['text']="Adding Appointment Unsuccessful!".'\n'." Please Check Inputted Patient Name or ID and Date Choosen";
					$_SESSION['AddDone']=$getdate;


					Header("Location:alerts.php");

}else if(empty($patientID)){

	session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=2;
					$_SESSION['goto']="set-appointment-secretary.php";
					$_SESSION['text']="Adding Appointment Unsuccessful! \n You forgot to Input  Patient Name or ID";
					$_SESSION['AddDone']=$getdate;


					Header("Location:alerts.php");

	
}else {
			$status="Pending";

			      $query2 = "INSERT INTO `reservation`(`RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show`) VALUES ('$getdate','$start_time','$patientID','$a1','$treatment','$status','$end_time','$timeshow')
			";
			      $r1 = @mysql_query($query2, $dbc); 

			 if($checkstatus!=0){
			 	$status="Done";

			 	$array_time=  Array();
			    $array_time = explode('/', $checkstatus);
			            
			    $QN=$array_time[0];
			    $QDate=$array_time[1];

			    $query3 = "UPDATE `queue` SET `status`='$status' WHERE `Qdate`='$QDate' and `QN`='$QN'";
			    $r3 = @mysql_query($query3, $dbc); 
			 }

			       session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=1;
					if(!empty($checkstatus)){
					$_SESSION['goto']="set-appointment-secretary.php";
					}else{
						$_SESSION['goto']="admin-user-secretary.php";
					}
					$_SESSION['text']="Adding Appointment Reservation Done";
					$_SESSION['AddDone']=$getdate;


					Header("Location:alerts.php");
   }/*else{
   			session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=2;
					$_SESSION['goto']="set-appointment-secretary.php";
					$_SESSION['text']="Adding Appointment Unsuccessful! \n You already have an Appointment Reservation for ".$ddate;
					$_SESSION['AddDone']=$getdate;


					Header("Location:alerts.php");

   }*/



}else if($url==5){
	//add waiting list


		$getdate = $_POST['getdate'];

		$patientID= $_POST['patientID'];
		$treatment = $_POST['treatment'];                       
		$usern  = $_POST['usern']; 

		$ddate=strtotime($getdate);
                    $ddate=date("F j, Y", $ddate);

		 $check = mysql_query("SELECT count(`QN`) FROM `queue` where `Qdate`='$getdate' and PatientId='$patientID'");
		 $check1 = mysql_fetch_array($check);

		 $checka = mysql_query("SELECT count(`RNo`) FROM `reservation` where `RDate`='$getdate' and `PatientId`='$patientID'");
		 $checka1 = mysql_fetch_array($checka);


		 $ai = mysql_query("SELECT max(`QN`) FROM `queue` where `Qdate`='$getdate'");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;



	$status="Pending";
if(empty($patientID)){

	session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=2;
					$_SESSION['goto']="set-appointment-secretary.php";
					$_SESSION['text']="Waiting List Enlist Unsuccessful! \n Please check inputted Patient Name/ID and Date choosen";
					$_SESSION['AddDone']=$getdate;


					Header("Location:alerts.php");
}else{

      $query2 = "INSERT INTO `queue`(`QN`, `PatientId`, `status`, `TCode`, `Qdate`) VALUES ('$a1','$patientID','$status','$treatment','$getdate')";
      $r1 = @mysql_query($query2, $dbc); 

/*echo $a1;
echo '<br>';
echo $patientID;
echo '<br>';
echo $status;
echo '<br>';
echo $treatment;
echo '<br>';
echo $getdate;*/


      session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="set-appointment-secretary.php";
	$_SESSION['text']="Waiting List Enlistment Done";
	$_SESSION['AddDone']=$getdate;


	Header("Location:alerts.php");
}


}else if($url==6){

	$orderrmd_id = $_POST['orderrmd_id'];
	$usern = $_POST['usern'];



	$status="picked-up";


	$query2 = "UPDATE `rmd_orderlist` SET `status`='$status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="dashboard.php";
	$_SESSION['text']="Marking Service as PICKED-UP is Successful";


	Header("Location:alerts.php");
	
	

}else if($url==7){

$o_idnew = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$order_statusnew="delivered";


	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="dashboard.php";
	$_SESSION['text']="Marking Service as DELIVERED is Successful";


	Header("Location:alerts.php");
	

}else if($url==8){

	$QN = $_POST['QN'];
	$getdate = $_POST['getdate'];
	$usern = $_POST['usern'];

	$query2 = "DELETE FROM `queue` WHERE `Qdate`='$getdate' and `QN`='$QN'";
	$r1 = @mysql_query($query2, $dbc); 


	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="set-appointment-secretary.php";
	$_SESSION['text']="Deleting Enlistment Done";
	$_SESSION['AddDone']=$getdate;


	Header("Location:alerts.php");


}else if($url==9){

	$design_code = $_POST['form-dcode'];
	$ctlg_shape = $_POST['form-shape'];
	$ctlg_size = $_POST['form-size'];
	$ctlg_flavor = $_POST['form-flavor'];
	$shirt_color = $_POST['form-color'];
	$shirt_type = $_POST['form-frost'];
	$ctlg_acces = $_POST['form-ac'];
	$ctlg_time = $_POST['form-ct'];
	$shirt_price = $_POST['form-price'];

	$usern = $_POST['usern'];
	$st="Available";

       $ai = mysql_query("SELECT max(`design_id`) FROM `readymadedesigns`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;
	
	$new_file_name="";
	$file=$_FILES["form-image"]["tmp_name"];
	
	if ($file!="") {
			$filename= basename($_FILES["form-image"]["name"]);
			$explode = explode(".", $filename);
			$extension = strtolower(end($explode));
			$imgvalidation=imageValidation(basename($_FILES["form-image"]["name"]), $_FILES["form-image"]["size"], $_FILES["form-image"]["type"]);
			if ($imgvalidation==true){					
				$new_file_name  = $filename;
				$folder_path = 'uploads/';
				$sourcePath = $_FILES["form-image"]["tmp_name"];
				$targetPath = $folder_path . $new_file_name;
				
				move_uploaded_file($sourcePath,$targetPath);		
			}else{
				echo $imgvalidation;	
			}
	}

	$query2 = "INSERT INTO `readymadedesigns`(`design_id`,`design_code`, `ctlg_shape`, `ctlg_size`, `ctlg_flavor`, `shirt_color`,`shirt_type`, `ctlg_acces`, `ctlg_time`, `shirt_price`, `status`, `picture`) VALUES ('$ai','$design_code','$ctlg_shape','$ctlg_size','$ctlg_flavor','$shirt_color','$shirt_type','$ctlg_acces', '$ctlg_time','$shirt_price', '$st', '$new_file_name')";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();
	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="readymade-designs.php";
	$_SESSION['text']="Adding New Service Successful";



	Header("Location:alerts.php");


}else if($url==10){

	$design_code = $_POST['form-dcode'];
	$catalog_shape = $_POST['form-shape'];
	$ctlg_size = $_POST['form-size'];
	$ctlg_flavor = $_POST['form-flavor'];
	$shirt_color = $_POST['form-color'];
	$shirt_type = $_POST['form-frost'];
	$ctlg_acces = $_POST['form-ac'];
	$ctlg_time = $_POST['form-ct'];
	$shirt_price = $_POST['form-price'];

	$usern = $_POST['usern'];
  
       $ai = mysql_query("SELECT max(`design_id`) FROM `readymadedesigns`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;
	$st="Available";

	$query2 = "INSERT INTO `readymadedesigns`(`design_code`, `ctlg_shape`, `ctlg_size`, `ctlg_flavor`, `shirt_color`,`shirt_type`, `ctlg_acces`, `ctlg_time`, `shirt_price`) VALUES ('$ai','$design_code','$ctlg_shape','$ctlg_size','$ctlg_flavor','$shirt_color','$shirt_type','$ctlg_acces', '$ctlg_time','$shirt_price', '$st')";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();
	$_SESSION['usern']=$usern;

	Header("Location:secretary-treatment.php");


}else if($url==11){

$o_idnew = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$order_statusnew="cancelled";


	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer-files.php";
	$_SESSION['text']="Marking Service as delete is Successful";


	Header("Location:alerts.php");

}else if($url==12){

$Pres = $_POST['pres'];
$usern = $_POST['usern'];
$rno = $_POST['rno'];
$service=$_POST['service'];
$diagnosis=$_POST['diagnosis'];
$id=$_POST['id'];


$status="Done";
$date=date('Y-m-d');

	$query2 = "UPDATE `reservation` SET `status`='$status' WHERE `RNo`='$rno'";
	$r1 = @mysql_query($query2, $dbc); 

	$PatientId=$id;


	$query5 = mysql_query("SELECT * FROM `treatment` WHERE `TCode`='$service'");
	$r5 = mysql_fetch_array($query5); 
	$bill=$r5['TCost'];

	       $ai = mysql_query("SELECT max(`ANo`) FROM `appointment`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;
	/*echo $rno;
	echo "</br>";
	echo $date;
	echo "</br>";
	echo $PatientId;
	echo "</br>";
	echo $a1;
	echo "</br>";
	echo $service;
	echo "</br>";
	echo $Pres;
	echo "</br>";
	echo $diagnosis;
	echo "</br>";
	echo $bill;*/
	$query4 = "INSERT INTO `appointment`(`ADate`, `PatientId`, `ANo`, `TCode`, `prescription`, `diagnosis`, `bill`) VALUES ('$date','$PatientId','$a1','$service','$Pres','$diagnosis','$bill')";
	$r4 = @mysql_query($query4, $dbc); 

	session_start();
	$_SESSION['usern']=$usern;
	$_SESSION['ANo']=$a1;
	$_SESSION['id']=$id;


	Header("Location:secretary-billing.php");


}else if($url==13){



	$design_id = $_POST['design_id'];
	$usern = $_POST['usern'];


	$status="Unavailable";


	$query2 = "UPDATE `readymadedesigns` SET `status`='$status' WHERE `design_id`='$design_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="edit-readymade.php";
	$_SESSION['text']="Marking Service as Unavailable is Successful";


	Header("Location:alerts.php");


}else if($url==14){



	$design_id = $_POST['design_id'];
	$usern = $_POST['usern'];


	$status="Available";

	$query2 = "UPDATE `readymadedesigns` SET `status`='$status' WHERE `design_id`='$design_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="edit-readymade.php";
	$_SESSION['text']="Marking Service as Available is Successful";


	Header("Location:alerts.php");
}else if($url==15){

$o_idnew = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$order_statusnew="cancelled";


	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pending-orders.php";
	$_SESSION['text']="Marking Service as delete is Successful";


	Header("Location:alerts.php");

}else if($url==16){


	$o_idnew = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$order_statusnew="approved";


	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pending-orders.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");

	//Header("Location:alerts.php");
}else if($url==17){

	echo $design_id = $_POST['form-code'];
	$usern = $_POST['usern'];
	$design_code = $_POST['form-dcode'];
	$ctlg_shape = $_POST['form-shape'];
	$ctlg_size = $_POST['form-size'];
	$ctlg_flavor = $_POST['form-flavor'];
	$shirt_color = $_POST['form-color'];
	$shirt_type = $_POST['form-frost'];
	$ctlg_acces = $_POST['form-ac'];
	$ctlg_time = $_POST['form-ct'];
	$shirt_price = $_POST['form-price'];
	
	
	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `design_id`, `design_code`, `ctlg_shape`, `ctlg_size`,`ctlg_flavor`, `shirt_color`, `shirt_type`, `ctlg_acces`, `ctlg_time`, `shirt_price`, `status`, `picture` FROM `readymadedesigns` WHERE design_id='$design_id'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);

	$new_file_name=$a1['picture'];
	$file=$_FILES["form-image1"]["tmp_name"];
	if ($file!="") {
			$filename= basename($_FILES["form-image1"]["name"]);
			$explode = explode(".", $filename);
			$extension = strtolower(end($explode));
			$imgvalidation=imageValidation(basename($_FILES["form-image1"]["name"]), $_FILES["form-image1"]["size"], $_FILES["form-image1"]["type"]);
			if ($imgvalidation==true){					
				$new_file_name  = $filename;
				$folder_path = 'uploads/';
				$sourcePath = $_FILES["form-image1"]["tmp_name"];
				$targetPath = $folder_path . $new_file_name;
				unlink($folder_path.$a1['picture']);
				move_uploaded_file($sourcePath,$targetPath);		
			}else{
				echo $imgvalidation;	
			}
	}

	if($design_code!=$a1['design_code'] ||$ctlg_shape!=$a1['ctlg_shape'] ||$ctlg_size!=$a1['ctlg_size'] ||$ctlg_flavor!=$a1['ctlg_flavor'] ||$shirt_color!=$a1['shirt_color']  ||$shirt_type!=$a1['shirt_type'] ||$ctlg_acces!=$a1['ctlg_acces'] ||$ctlg_time!=$a1['ctlg_time']||$shirt_price!=$a1['shirt_price']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `readymadedesigns` SET `design_code`='$design_code',`ctlg_shape`='$ctlg_shape',`ctlg_size`='$ctlg_size', `ctlg_flavor`='$ctlg_flavor', `shirt_color`='$shirt_color', `shirt_type`='$shirt_type', `ctlg_acces`='$ctlg_acces', `ctlg_time`='$ctlg_time', `shirt_price`='$shirt_price',`picture`='$new_file_name' WHERE `design_id`='$design_id'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="edit-readymade.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="edit-readymade.php";
	$_SESSION['text']="Updating Of Cake Catalog Done";


	Header("Location:alerts.php");
}
	
}else if($url==18){
	
	$usern = $_POST['usern'];
	$id = $_POST['id'];
	

	$query2 = "UPDATE `customer` SET active=2 WHERE `customer_ID`='$id'";
	$r1 = @mysql_query($query2, $dbc); 


	session_start();

	$_SESSION['usern']=$usern;
	 $_SESSION['customersearchid']=$id;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer-files.php";
	$_SESSION['text']="DEACTIVATION Done";


	Header("Location:alerts.php");
}else if($url==19){


$usern = $_POST['usern'];
	$id = $_POST['id'];

	$query2 = "UPDATE `customer` SET active=1 WHERE `customer_ID`='$id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['customersearchid']=$id;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer-files.php";
	$_SESSION['text']="ACTIVATION Done";


	Header("Location:alerts.php");
}else if($url==20){


	$o_idnew = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$order_statusnew="confirmed";


	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

$deviceID = 71106; // wag na rin galawin
$number = '09057342446'; //plitan mo na lg ng variable name ng nasa database nyo
$message = 'Your order is already confirmed! I love Seungri! -Mamon'; // eto yung message, edit nyo na lg



$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pending-orders.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");


}else if($url==21){



	$design_id = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$status="pending";

	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="Marking Service as pending is Successful";


	Header("Location:alerts.php");


}else if($url==22){
	// delete cancelled appointment dashboard
	$dno = $_POST['dno'];
	$usern = $_POST['usern'];

	$query3 = "SELECT `start_time`, `end_time`, `d_date`, `DNo`, `Time_Show` FROM `dentist_sched` WHERE `DNo`='$dno'";
	$r3 = @mysql_query($query3, $dbc); 
	while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
	$storeArray2[][] =  $row3;
	}

	$getdate=$storeArray2[0][0]['RDate'];


	$query2 = "DELETE FROM `dentist_sched` WHERE DNo='$dno'";
     $r1 = @mysql_query($query2, $dbc); 


    session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-dentist-scheduling.php";
	$_SESSION['text']="Deleting dentist Unavailable Schedule done";
	$_SESSION['AddDone']=$getdate;


	
	Header("Location:alerts.php");




}else if($url==23){


	$price_ID = $_POST['form-code'];
	$usern = $_POST['usern'];
	$election_price = $_POST['form-one'];
	$cotton_price = $_POST['form-two'];
	$ownelec_price = $_POST['form-three'];
	$owncot_price = $_POST['form-four'];




	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `price_ID`, `election_price`, `cotton_price`,  `ownelec_price`,  `owncot_price`, FROM `pricelist` WHERE '$price_ID'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($election_price!=$a1['election_price'] ||$cotton_price!=$a1['cotton_price'] || $ownelec_price!=$a1['ownelec_price'] || $owncot_price!=$a1['owncot_price']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `pricelist` SET `election_price`='$election_price', `cotton_price`='$cotton_price', `ownelec_price`='$ownelec_price', `owncot_price`='$owncot_price'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="shirt_price.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pricelist.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}



}else if($url==24){


	$price_ID = $_POST['form-code'];
	$usern = $_POST['usern'];
	$circle_default_price = $_POST['form-one'];
	$circle_small1_price = $_POST['form-two'];
	$circle_small2_price = $_POST['form-three'];
	$circle_semi1_price = $_POST['form-four'];
	$circle_semi2_price = $_POST['form-five'];
	$circle_semi3_price = $_POST['form-six'];
	$rect_default_price = $_POST['form-seven'];
	$rect_small_price = $_POST['form-eight'];
	$rect_semi1_price = $_POST['form-nine'];




	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `price_ID`, `circle_default_price`,`circle_small1_price`,`circle_small2_price`, `circle_semi1_price`, `circle_semi1_price`, `circle_semi2_price`, `circle_semi3_price`, `rect_default_price`, `rect_small_price`, `rect_semi1_price` WHERE '$price_ID'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`cotton_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);

if($circle_default_price!=$a1['circle_default_price'] ||$circle_small1_price!=$a1['circle_small1_price'] || $circle_small2_price!=$a1['circle_small2_price'] || $circle_semi1_price!=$a1['circle_semi1_price'] ||$circle_semi2_price!=$a1['circle_semi2_price'] || $circle_semi3_price!=$a1['circle_semi3_price'] || $rect_default_price!=$a1['rect_default_price'] ||$rect_small_price!=$a1['rect_small_price'] || $rect_semi1_price!=$a1['rect_semi1_price'] ){
			$check=1;
		}else{
			$check=2;
		}

	
	      
if($check==1){
	
	$query2 = "UPDATE `pricelist` SET `circle_default_price`='$circle_default_price',`circle_small1_price`='$circle_small1_price',`circle_small2_price`='$circle_small2_price',`circle_semi1_price`='$circle_semi1_price',`circle_semi2_price`='$circle_semi2_price',`circle_semi3_price`='$circle_semi3_price',`rect_default_price`='$rect_default_price',`rect_small_price`='$rect_small_price',`rect_semi1_price`='$rect_semi1_price' ";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="shape_price.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pricelist.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}

}else if($url==25){


	$price_ID = $_POST['form-code'];
	$usern = $_POST['usern'];
	$frost_sugar_price = $_POST['form-one'];
	$frost_bcream_price = $_POST['form-two'];
	$frost_mmallow_price = $_POST['form-three'];
	$textilepaint = $_POST['form-four'];



	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `price_ID`, `frost_sugar_price`, `frost_bcream_price`, `frost_mmallow_price`, `textilepaint` FROM `pricelist` WHERE '$price_ID'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($frost_sugar_price!=$a1['frost_sugar_price'] ||$frost_bcream_price!=$a1['frost_bcream_price'] || $frost_mmallow_price!=$a1['frost_mmallow_price'] || $textilepaint!=$a1['textilepaint']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `pricelist` SET `frost_sugar_price`='$frost_sugar_price',`frost_bcream_price`='$frost_bcream_price',`frost_mmallow_price`='$frost_mmallow_price',`textilepaint`='$textilepaint'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="frost_type.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pricelist.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}

}else if($url==26){


	$price_ID = $_POST['form-code'];
	$usern = $_POST['usern'];
	$ordinaryrv = $_POST['form-one'];
	$reflectorized = $_POST['form-two'];
	$glowinthedark = $_POST['form-three'];
	$gamuza = $_POST['form-four'];
	$sublimation = $_POST['form-five'];
	$transferpaper = $_POST['form-six'];




	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `price_ID`, `ordinaryrv`, `reflectorized`, `glowinthedark`, `gamuza`, `sublimation`, `transferpaper` FROM `pricelist` WHERE '$price_ID'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($ordinaryrv!=$a1['ordinaryrv'] ||$reflectorized!=$a1['reflectorized'] || $glowinthedark!=$a1['glowinthedark'] || $gamuza!=$a1['gamuza'] || $sublimation!=$a1['sublimation'] || $transferpaper!=$a1['transferpaper']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `pricelist` SET `ordinaryrv`='$ordinaryrv',`reflectorized`='$reflectorized',`glowinthedark`='$glowinthedark',`gamuza`='$gamuza',`sublimation`='$sublimation',`transferpaper`='$transferpaper'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="printtype_price.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pricelist.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}
}else if($url==30){


	$o_idnew = $_POST['form-code'];
	$usern = $_POST['usern'];
	$branch_name = $_POST['form-am'];
	$payment_status = $_POST['form-stat'];
	$driver_name = $_POST['form-one'];
	$plate_num = $_POST['form-two'];

	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `o_idnew`, `branch_name`, `payment_status` FROM `order_list` WHERE '$o_idnew'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($payment_amount!=$a1['payment_amount'] ||$payment_status!=$a1['payment_status']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `order_list` SET `branch_name`='$branch_name',`payment_status`='$payment_status',`driver_name`='$driver_name',`plate_num`='$plate_num' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="dashboard.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}




}else if($url==31){


	$orderrmd_id = $_POST['orderrmd_id'];
	$usern = $_POST['usern'];


	$status="confirmed";


	$query2 = "UPDATE `rmd_orderlist` SET `status`='$status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pending-orders.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");


}else if($url==32){

$orderrmd_id = $_POST['orderrmd_id'];
	$usern = $_POST['usern'];


	$status="approved";



	$query2 = "UPDATE `rmd_orderlist` SET `status`='$status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");


}else if($url==33){


	$orderrmd_id = $_POST['form-codes'];
	$usern = $_POST['usern'];
	$payment_amount = $_POST['form-ams'];
	$payment_status = $_POST['form-stats'];


	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `orderrmd_id`, `payment_amount`, `payment_status` FROM `rmd_orderlist` WHERE '$orderrmd_id'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($payment_amount!=$a1['payment_amount'] ||$payment_status!=$a1['payment_status']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `rmd_orderlist` SET `payment_amount`='$payment_amount',`payment_status`='$payment_status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders-one.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}

}else if($url==34){


	$o_idnew = $_POST['form-code'];
	$usern = $_POST['usern'];
	$pricenew = $_POST['form-am'];



	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `o_idnew`, `pricenew` FROM `order_list` WHERE o_idnew='$o_idnew'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($pricenew!=$a1['pricenew'] ){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `order_list` SET `pricenew`='$pricenew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}


}else if($url==35){


	$o_idnew = $_POST['form-code'];
	$usern = $_POST['usern'];
	$driver_name = $_POST['form-am'];
	$plate_num = $_POST['form-stat'];



	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `o_idnew`, `driver_name`,`plate_num` FROM `order_list` WHERE '$o_idnew'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($driver_name!=$a1['driver_name'] ||$plate_num!=$a1['plate_num']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `order_list` SET `driver_name`='$driver_name', `plate_num`='$plate_num' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer_search.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer_search.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}


}else if($url==36){


	$o_idnew = $_POST['form-code'];
	$usern = $_POST['usern'];
	$pricenew = $_POST['form-am'];

	$figurine_select = $_POST['form-one'];
	$branch_name = $_POST['form-two'];
	$d_datenew = $_POST['form-three'];
	$dedicationT = $_POST['form-four'];
	$shirt_colornew = $_POST['form-five'];
	$cake_frost = $_POST['form-six'];
	$candle_selection = $_POST['form-seven'];





	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `o_idnew`, `pricenew`, `figurine_select`,`branch_name`,`d_datenew`, `dedicationT`, `shirt_colornew`,`cake_frost`,`candle_selection` FROM `order_list` WHERE '$o_idnew'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($pricenew!=$a1['pricenew'] ||$figurine_select!=$a1['figurine_select'] ||$branch_name!=$a1['branch_name'] ||$d_datenew!=$a1['d_datenew'] ||$dedicationT!=$a1['dedicationT'] ||$shirt_colornew!=$a1['shirt_colornew'] ||$cake_frost!=$a1['cake_frost'] ||$candle_selection!=$a1['candle_selection']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `order_list` SET `pricenew`='$pricenew', `figurine_select`='$figurine_select', `branch_name`='$branch_name', `d_datenew`='$d_datenew',`dedicationT`='$dedicationT',`shirt_colornew`='$shirt_colornew',`cake_frost`='$cake_frost',`candle_selection`='$candle_selection' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer-files.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer_search.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}
}else if($url==37){


	$o_idnew = $_POST['form-code'];
	$usern = $_POST['usern'];
	$branch_name = $_POST['form-am'];
	$del_venue = $_POST['form-stat'];
	$driver_name = $_POST['form-one'];
	$plate_num = $_POST['form-two'];


	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `o_idnew`, `branch_name`, `del_venue`,`driver_name`, `plate_num` FROM `order_list` WHERE '$o_idnew'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($branch_name!=$a1['branch_name'] ||$del_venue!=$a1['del_venue'] ||$driver_name!=$a1['driver_name'] ||$plate_num!=$a1['plate_num']){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `order_list` SET `branch_name`='$branch_name',`del_venue`='$del_venue',`driver_name`='$driver_name',`plate_num`='$plate_num' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="dashboard.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}


}else if($url==38){


	$orderrmd_id = $_POST['form-code'];
	$usern = $_POST['usern'];
	$shirt_price = $_POST['form-am'];



	
	$tl1=explode(" ", $TLenght);
	$TLenght=$tl1[0];
	
	$tc1=explode(" ", $TCost);
	$TCost=$tc1[0];

		 $ai = mysql_query("SELECT `orderrmd_id`, `shirt_price` FROM `rmd_orderlist` WHERE '$orderrmd_id'");
		$a1 = mysql_fetch_array($ai);

	 $a2 = mysql_query("SELECT `price_ID`,`election_price`, `cotton_price`, `ownelec_price` FROM `pricelist` WHERE price_ID='$price_ID'");
		$a2 = mysql_fetch_array($a2);


	if($shirt_price!=$a1['shirt_price'] ){
			$check=1;
		}else{
			$check=2;
		}
	      
if($check==1){
	
	$query2 = "UPDATE `rmd_orderlist` SET `shirt_price`='$shirt_price' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 





	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders-one.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `pricelist` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="customer_search.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}

}else if($url==39){


	$orderrmd_id = $_POST['orderrmd_id'];
	$usern = $_POST['usern'];


	$status="cancelled";


	$query2 = "UPDATE `rmd_orderlist` SET `status`='$status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pending-orders_one.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");

}else if($url==40){


	$orderrmd_id = $_POST['orderrmd_id'];
	$usern = $_POST['usern'];


	$status="cancelled";


	$query2 = "UPDATE `rmd_orderlist` SET `status`='$status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders-one.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");

	}else if($url==41){

$o_idnew = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$order_statusnew="cancelled";


	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="Marking Service as delete is Successful";


	Header("Location:alerts.php");



}else if($url==42){


	$o_idnew = $_POST['o_idnew'];
	$usern = $_POST['usern'];


	$order_statusnew="approved";


	$query2 = "UPDATE `order_list` SET `order_statusnew`='$order_statusnew' WHERE `o_idnew`='$o_idnew'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");

}else if($url==43){


	$orderrmd_id = $_POST['orderrmd_id'];
	$usern = $_POST['usern'];


	$status="approved";


	$query2 = "UPDATE `rmd_orderlist` SET `status`='$status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="deliver-orders-one.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");

}else if($url==44){


	$orderrmd_id = $_POST['orderrmd_id'];
	$usern = $_POST['usern'];


	$status="confirmed";


	$query2 = "UPDATE `rmd_orderlist` SET `status`='$status' WHERE `orderrmd_id`='$orderrmd_id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="pending-orders_one.php";
	$_SESSION['text']="Marking Service as Confirmed is Successful";


	Header("Location:alerts.php");



}else if($checkstatus!=" "){


	//add appointment
		$cdate=date('Y-m-d');
		$getdate = $_POST['getdate'];
		$time = $_POST['time'];
		$timeshow = $_POST['timeshow'];
		$patientID= $_POST['patientID'];
		$treatment = $_POST['treatment'];                       
		$usern  = $_POST['usern'];
		$checkstatus  = $_POST['checkstatus']; 
 
		 $ai = mysql_query("SELECT max(`RNo`) FROM `reservation`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;
		$rrno=$a1;


		$array_time=  Array();
        $array_time = explode('-', $time);
            
        $start_time=$array_time[0];
        $end_time=$array_time[1];

		 

			$status="Pending";

			      $query2 = "INSERT INTO `reservation`(`RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show`) VALUES ('$getdate','$start_time','$patientID','$a1','$treatment','$status','$end_time','$timeshow')
			";
			      $r1 = @mysql_query($query2, $dbc); 

			if($checkstatus!=0){
			 	$status="Rescheduled";

			 	
			    $query3 = "UPDATE `reservation` SET `status`='$status' WHERE RNo='$checkstatus'";
			    $r3 = @mysql_query($query3, $dbc); 

			    $ai = mysql_query("SELECT max(`ResNo`) FROM `resched`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;

		      $query3 = "INSERT INTO `resched`(`CRNo`, `RRNo`, `ResNo`) VALUES ('$checkstatus','$rrno','$a1')";
			    $r3 = @mysql_query($query3, $dbc); 

			 }

			       session_start();

					$_SESSION['usern']=$usern;
					$_SESSION['alert']=1;
					if(!empty($checkstatus)){
					$_SESSION['goto']="set-appointment-secretary.php";
					}else{
						$_SESSION['goto']="admin-user-secretary.php";
					}
					$_SESSION['text']="Rescheduling Appointment Reservation Done";
					$_SESSION['AddDone']=$getdate;


					Header("Location:alerts.php");
   

}
///$url="admin-user-secretary.php";
//Header("Location:$url");
}

function imageValidation($flname, $flsize, $fltype) {
	    $filename= basename($flname);
		$filesize= $flsize;
		$filetype = $fltype;
				
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$explode = explode(".", $filename);
		$extension = strtolower(end($explode));
			
		if ((($filetype == "image/gif")
			|| ($filetype == "image/jpeg")
			|| ($filetype == "image/jpg")
			|| ($filetype == "image/png"))
			&& in_array($extension, $allowedExts)){
			if ($filesize < 2000000){					
				return true;
			}else{
				return 'Invalid image size! Note: The size of the file must be below 2MB';	
			}		
		}else {
			return 'File format not supported!';
		}
}


?>