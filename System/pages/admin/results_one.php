<?php
include('../../server_one.php');

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

	//delete cancelled appointment getdate

	$RNo = $_POST['bid'];
	$usern = $_POST['usern'];
   
	 $query3 = "SELECT * FROM `reservation` WHERE `RNo`='$RNo'";
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
	$_SESSION['goto']="set-appointment-secretary.php";
	$_SESSION['text']="Deleting Cancelled Appointment Done";
	$_SESSION['AddDone']=$getdate;


	Header("Location:alerts.php");
	

}else if($url==7){

	$QN = $_POST['QN'];
	$getdate = $_POST['getdate'];
	$usern = $_POST['usern'];

	$query2 = "DELETE FROM `queue` WHERE `Qdate`='$getdate' and `QN`='$QN'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="admin-user-secretary.php";
	$_SESSION['text']="Deleting Waiting Enlistment Done";
	$_SESSION['AddDone']=$getdate;


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

	$design_code = $_POST['form-treatment-name'];
	$ctlg_shape = $_POST['form-tcost'];
	$usern = $_POST['usern'];
	$st="Available";

       $ai = mysql_query("SELECT max(`catalog_ID`) FROM `cakecatalog`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;

	$query2 = "INSERT INTO `cakecatalog`(`catalog_ID`, `design_code`, `ctlg_shape`) VALUES ('$ai','$design_code','$ctlg_shape')";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();
	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="Adding New Service Successful";



	Header("Location:alerts.php");


}else if($url==10){

	$TName = $_POST['form-treatment-name'];

	$TCost = $_POST['form-tcost'];
	$usern = $_POST['usern'];
  
       $ai = mysql_query("SELECT max(`TCode`) FROM `treatment`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;
	$st="Available";

	$query2 = "INSERT INTO `treatment`(`TCode`, `TName`, `TCost`, `status`) VALUES ('$ai','$TName','$TCost','$st')";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();
	$_SESSION['usern']=$usern;

	Header("Location:secretary-treatment.php");


}else if($url==11){

	$Ptitle = $_POST['ptitle'];
	$PDes = $_POST['pdes'];
	$usern = $_POST['usern'];

  $ai = mysql_query("SELECT max(`PNo`) FROM `gen_pres`");

		      $a1 = mysql_fetch_array($ai);
		      $a1=$a1[0];
		      $a1++;



	$query2 = "INSERT INTO `gen_pres`(`PNo`, `PTitle`, `PDescription`) VALUES ('$a1','$Ptitle','$PDes')";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="Adding New Prescription Done";


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



	$TCode = $_POST['tcode'];
	$usern = $_POST['usern'];


	$status="Unavailable";


	$query2 = "UPDATE `treatment` SET `status`='$status' WHERE `TCode`='$TCode'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="Marking Service as Unavailable is Successful";


	Header("Location:alerts.php");


}else if($url==14){



	$TCode = $_POST['tcode'];
	$usern = $_POST['usern'];


	$status="Available";

	$query2 = "UPDATE `treatment` SET `status`='$status' WHERE `TCode`='$TCode'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="Marking Service as Available is Successful";


	Header("Location:alerts.php");
}else if($url==15){



	$PCode = $_POST['pcode'];
	$usern = $_POST['usern'];

	$query2 = "DELETE FROM `gen_pres` WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="Deleting Prescription Successful";


	Header("Location:alerts.php");
}else if($url==16){



	$PCode = $_POST['pcode'];
	$usern = $_POST['usern'];
	$ptitle = $_POST['ptitle'];
	$pdes = $_POST['pdes'];


	$query2 = "UPDATE `gen_pres` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="General Prescription Updating Done";


	//Header("Location:alerts.php");
}else if($url==17){



	$TCode = $_POST['form-treatment-code'];
	$usern = $_POST['usern'];
	$TName = $_POST['form-treatment-name'];
	$TLenght = $_POST['form-time-length'];
	$TCost = $_POST['form-tcost'];


	$PCode = $_POST['ptitle1'];
	$usern = $_POST['usern'];
	$ptitle = $_POST['ptitle'];
	$pdes = $_POST['pdes'];
	


		 $ai = mysql_query("SELECT `TCode`, `TName`, `TCost`, `TLenght`, `status` FROM `treatment` WHERE '$TCode'");
		$a1 = mysql_fetch_array($ai);

		 $a2 = mysql_query("SELECT `PNo`, `PTitle`, `PDescription` FROM `gen_pres` WHERE PNo='$PCode'");
		$a2 = mysql_fetch_array($a2);

	$query2 = "UPDATE `treatment` SET `TName`='$TName',`TCost`='$TCost',`TLenght`='$TLenght' WHERE `TCode`='$TCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="Service Details Update Done";
	Header("Location:alerts.php");

}else{
	//echo $pdes;

	$query2 = "UPDATE `gen_pres` SET `PTitle`='$ptitle',`PDescription`='$pdes' WHERE `PNo`='$PCode'";
	$r1 = @mysql_query($query2, $dbc); 



	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-treatment.php";
	$_SESSION['text']="General Prescription Updating Done";


	Header("Location:alerts.php");
}
	
}else if($url==18){
	
	$usern = $_POST['usern'];
	$id = $_POST['id'];
	

	$query2 = "UPDATE `patient` SET active=2 WHERE `PatientId`='$id'";
	$r1 = @mysql_query($query2, $dbc); 


	session_start();

	$_SESSION['usern']=$usern;
	 $_SESSION['patientsearchid']=$id;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-patient-files.php";
	$_SESSION['text']="DEACTIVATION Done";


	Header("Location:alerts.php");
}else if($url==19){


$usern = $_POST['usern'];
	$id = $_POST['id'];

	$query2 = "UPDATE `patient` SET active=1 WHERE `PatientId`='$id'";
	$r1 = @mysql_query($query2, $dbc); 

	session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['patientsearchid']=$id;
	$_SESSION['alert']=1;
	$_SESSION['goto']="secretary-patient-files.php";
	$_SESSION['text']="ACTIVATION Done";


	Header("Location:alerts.php");
}else if($url==20){


	$ID = $_POST['patientId'];
	$usern = $_POST['usern'];
	$getdate = $_POST['getdate'];
	$treatment = $_POST['treatment'];
	$start_time=$_POST['start_time'];
	$end_time=$_POST['end_time'];
	$timeshow=$_POST['timeshow'];
	$QN=$_POST['QN'];

	$ai = mysql_query("SELECT max(`RNo`) FROM `reservation`");
    $a1 = mysql_fetch_array($ai);
    $a1=$a1[0];
    $a1++;

    $status="Pending";

	$query2 = "INSERT INTO `reservation`(`RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show`) VALUES ('$getdate','$start_time','$ID','$a1','$treatment','$status','$end_time','$timeshow')
                          ";
    $r1 = @mysql_query($query2, $dbc); 

    $status="Done";

   	$query3 = "UPDATE `queue` SET `status`='$status' WHERE `Qdate`='$getdate' and `QN`='$QN'";
    $r3 = @mysql_query($query3, $dbc); 
    session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['AddDone']=$getdate;
	$_SESSION['alert']=1;
	$_SESSION['goto']="set-appointment-secretary.php";
	$_SESSION['text']="Setting appointment for waiting list done!";
		Header("Location:alerts.php");


}else if($url==21){


	$ID = $_POST['patientId'];
	$usern = $_POST['usern'];
	$getdate = $_POST['getdate'];
	$treatment = $_POST['treatment'];
	$start_time=$_POST['start_time'];
	$end_time=$_POST['end_time'];
	$timeshow=$_POST['timeshow'];
	$QN=$_POST['QN'];

	$ai = mysql_query("SELECT max(`RNo`) FROM `reservation`");
    $a1 = mysql_fetch_array($ai);
    $a1=$a1[0];
    $a1++;

    $status="Pending";

	$query2 = "INSERT INTO `reservation`(`RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show`) VALUES ('$getdate','$start_time','$ID','$a1','$treatment','$status','$end_time','$timeshow')
                          ";
    $r1 = @mysql_query($query2, $dbc); 

    $status="Done";

   	$query3 = "UPDATE `queue` SET `status`='$status' WHERE `Qdate`='$getdate' and `QN`='$QN'";
    $r3 = @mysql_query($query3, $dbc); 
    session_start();

	$_SESSION['usern']=$usern;
	$_SESSION['AddDone']=$getdate;
	$_SESSION['alert']=1;
	$_SESSION['goto']="admin-user-secretary.php";
	$_SESSION['text']="Setting appointment for waiting list done!";
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




}

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



?>