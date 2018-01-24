<?php
include('../../server.php');
date_default_timezone_set('Asia/Taipei');

$getdate = $_POST['getdate'];
$usern = $_POST['usern'];
//echo $getdate;

$datenow=date('Y-m-d');
$checktime=date('G:i:s');
session_start();
$_SESSION['usern']=$usern; 

?>

<head>

    <script src="../../plugins/datepicker-inline/bootstrap-datepicker.js"></script>
    <script src="../../plugins/datepicker-inline/main.js"></script>
        <!-- Date Picker -->
    <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../../plugins/datepicker-inline/bootstrap-datepicker.css">

    <script>

       $(function(){

       $.noConflict();  //Not to conflict with other scripts
       $.widget.bridge('uibutton', $.ui.button);
       $.fn.modal.Constructor.DEFAULTS.keyboard = true;


      var clicker = '<?php echo json_encode($getdate); ?>';
      var date2 = new Date(clicker);
      var nowDate = new Date();
      var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0, 0);

      $("#datepicker").datepicker({ 
      startDate: today
      });

      $("#datepicker").datepicker({cookie:'yes'});
      

      $('#datepicker').datepicker().on('changeDate',function(e){
      fetchdate(e);
      });  // end of changedate-datepicker


      });


      
    </script>



</head>
<body>


<?php

     echo '<div class="row">';


     echo '<div class="col-lg-5">';

?>
            <!-- Left col -->
              <div class="box border" style="border-top: 3px solid #428BCA">
                 <div class="datepicker" id="datepicker"></div>
              </div>
<?php
     echo '</div>';
?>


<!--bla bla bla -->



<?php 
     echo '<div class="col-lg-7">';

     echo '<div class="box border" style="border-top: 3px solid #428BCA">';
     $ddate=strtotime($getdate);
     $ddate=date("F j, Y", $ddate);
     echo '<div class="box-header"><b>Appointment for '.$ddate.' :</b></div>';

     echo '<div class="box-body table-responsive no-padding">';
     echo '<table class="table table-hover">';
     echo '<tr>';
     echo '<th>Time</th>';
     echo '<th>ID</th>';
     echo '<th>Name</th>';
     echo '<th>Contact #</th>';
     echo '<th>Type</th>';
     echo '<th></th>';
     echo '<th></th>';
     echo '<th></th>';

     echo '</tr>';

     ?>

     <?php 

      $st="Cancelled";
      $st2="Rescheduled";
      $ai = mysql_query("SELECT Count(`RNo`) FROM `reservation` WHERE `RDate`='$getdate' and `status`!='$st'and `status`!='$st2'");

      $a1 = mysql_fetch_array($ai);
      $cnt=$a1[0];



      $query1 = "SELECT `RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show` FROM `reservation` WHERE `RDate`='$getdate' and `status`!='$st' and `status`!='$st2'order by `RTime` ASC";
      $r1 = @mysql_query($query1, $dbc); 
      while ($row1 = mysql_fetch_array($r1, MYSQL_ASSOC)) {
           $reserve[][] =  $row1;
      }


      $bi = mysql_query("SELECT Count(`DNo`) FROM `dentist_sched` WHERE `d_date`='$getdate'");

      $b1 = mysql_fetch_array($bi);
      $cnt1=$b1[0];



                


               
                   /*$available=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);

                  $available=array_merge(array_diff($available, $unavailable),array_diff($unavailable, $available));



                  sort($available);
                  $ac=sizeof($available,0);*/

                  

?>

<?php
    
       $c=0;

     for($i=0; $i<16;$i++){

        if(!empty($unavailable) && $i==$unavailable[$c][0]){

          if($unavailable[$c][1]=="ami1"){
                  
                echo '<tr>';
                echo '<td>'.$tsarrayshow[$i].'-'.$tearrayshow[$i].'</td>';
                
                echo '<td></td>';
                echo '<td><b>Dentist is Unavailable</b></td>';
                echo '</tr>';              
          }else{

             $rrno=$unavailable[$c][1];

              $q1 = "SELECT `RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show` from `reservation` WHERE `RNo`='$rrno'";
              $q11 = @mysql_query($q1, $dbc); 
              $rr = mysql_fetch_array($q11);


              $time=$rr['Time_Show'];
              $ID=$rr['PatientId'];
              $bid=$rr['RNo'];
              $status=$rr['status'];
              $treatment=$rr['TCode'];

                              $query1 = "SELECT FirstName, MiddleName, LastName, Address, Birthday, Sex, Age, Employer, CivilStatus, Occupation, CellphoneNo, TelephoneNo, Zip, UserName, Password, EmailAdd, EFirstName, EMiddleName, ELastName, ERelationship, ECellphoneNo FROM patient WHERE PatientId='$ID'";
                          $r1 = @mysql_query($query1, $dbc); 
                          $row1 = mysql_fetch_array($r1);


                          $row1['FirstName'] = ucwords($row1['FirstName']);
                          $row1['MiddleName'] = ucwords($row1['MiddleName']);
                          $row1['LastName'] = ucwords($row1['LastName']);
                          $usrcompletename = $row1['FirstName']." ".$row1['MiddleName']." ".$row1['LastName'];
                          $ContactNo=$row1['CellphoneNo'];
                          
                          
                          $qtl = mysql_query("SELECT `TName` FROM  `treatment` WHERE `TCode`='$treatment'");
                          $t1 = mysql_fetch_array($qtl);
                          $treatment_name=$t1[0];



                           echo '<tr>';
                           echo '<td>'.$time.'</td>';
                           echo '<td>'.$ID.'</td>';
                           echo '<td>'.$usrcompletename.'</td>';
                           echo '<td>'.$ContactNo.'</td>';
                           echo '<td>'.$treatment_name.'</td>';
                           $pending='Pending';
                             if($status==$pending){
                           
 ?>
   
                <?php echo '<td>';?>



                <form method=POST name="form5_<?php echo $i;?>" action="secretary-patient-files.php">
                <?php echo '<input type="hidden" name="patientsearchid" value="' .$ID. '" >';?>
                <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                <?php echo '<input type="hidden" name="ami" value="00" >';?>
                <?php echo '<input type="hidden" name="rno" value="' .$bid. '" >';?>
                <a href="#" onClick="document.form5_<?php echo $i;?>.submit(); return false;" class="btndashboard" style="background: #00A65A;">Update</a>
                </form>

                <?php echo '</td>';?>


                <?php echo '<td>';?>

             
                <form method=POST id="form1_<?php echo $i;?>" action="results.php">
                        
                    <?php echo '<input type="hidden" name="bid" value="' .$bid. '" >';?>
                    <?php echo '<input type="hidden" name="url" value="1" >';?>
                    <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                    <a href="#" onclick="confirm_deleteA(<?php echo $i;?>)" class="btndashboard" style="background: #DD4B39;">Delete</a>
     
                  </form>


                <?php echo '</td>';
                  echo '<td></td>';

                ?>

                           
<?php
            }else{
              echo '<td>Done</td>';


            } 


          }

           $c++;


                if(empty($size1)){

                }else if($c==$size1){
                  $c=0;
                }

            
        }else{

          if($datenow==$getdate ){

          echo '<tr>';
          echo '<td>'.$tsarrayshow[$i].'-'.$tearrayshow[$i].'</td>';
          echo '<td></td>'; 
          echo '<td>Unavailable for Reservation<td>';
          echo '<td></td>';
          echo '<td></td>';
          echo '<td></td>';
          echo '<td></td>'; //wag lang tanggalin para maayos ang line
          echo '</tr>';

          }else{

          echo '<tr>';
         
          echo '<td></td>'; 
          echo '<td>Available for Reservation<td>';
          echo '<td></td>';
          echo '<td></td>';
          echo '<td></td>';
          echo '<td></td>'; //wag lang tanggalin para maayos ang line
          echo '</tr>';
          }

        }

        
     }


 echo '</table>';
 echo '</div>'; //body
 echo '</div>'; //box


?>





<?php


                    $st="Cancelled";
                    $st2="Rescheduled";
                    $ai = mysql_query("SELECT Count(`RNo`) FROM `reservation` WHERE `RDate`='$getdate' and `status`!='$st'and `status`!='$st2'");

                    $a1 = mysql_fetch_array($ai);
                    $cnt=$a1[0];



                    $query1 = "SELECT `RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show` FROM `reservation` WHERE `RDate`='$getdate' and `status`!='$st' and `status`!='$st2'order by `RTime` ASC";
                    $r1 = @mysql_query($query1, $dbc); 
                    while ($row1 = mysql_fetch_array($r1, MYSQL_ASSOC)) {
                         $reserve[][] =  $row1;
                    }



                    $bi = mysql_query("SELECT Count(`DNo`) FROM `dentist_sched` WHERE `d_date`='$getdate'");

                    $b1 = mysql_fetch_array($bi);
                    $cnt1=$b1[0];



                    $query3 = "SELECT * from `dentist_sched` WHERE `d_date`='$getdate' order by `start_time` ASC";
                    $r2 = @mysql_query($query3, $dbc); 
                    while ($row1 = mysql_fetch_array($r2, MYSQL_ASSOC)) {
                          $reserve1[][] =  $row1;
                    }




                  $tsarray=array();
                  $tearray=array();
                  $tsarrayshow=array();
                  $tearrayshow=array();

                  $tsarray[0]="08:00:00"; $tsarray[1]="08:30:00"; $tsarray[2]="09:00:00"; $tsarray[3]="09:30:00"; 
                  $tsarray[4]="10:00:00"; $tsarray[5]="10:30:00"; $tsarray[6]="11:00:00"; $tsarray[7]="11:30:00"; 
                  $tsarray[8]="13:00:00"; $tsarray[9]="13:30:00"; $tsarray[10]="14:00:00"; $tsarray[11]="14:30:00"; 
                  $tsarray[12]="15:00:00";  $tsarray[13]="15:30:00";  $tsarray[14]="16:00:00";  $tsarray[15]="16:30:00";  

                  $tsarrayshow[0]="08:00"; $tsarrayshow[1]="08:30"; $tsarrayshow[2]="09:00"; $tsarrayshow[3]="09:30"; 
                  $tsarrayshow[4]="10:00"; $tsarrayshow[5]="10:30"; $tsarrayshow[6]="11:00"; $tsarrayshow[7]="11:30"; 
                  $tsarrayshow[8]="01:00"; $tsarrayshow[9]="01:30"; $tsarrayshow[10]="02:00"; $tsarrayshow[11]="02:30"; 
                  $tsarrayshow[12]="03:00";  $tsarrayshow[13]="03:30";  $tsarrayshow[14]="04:00";  $tsarrayshow[15]="04:30";  



                  $tearray[0]="08:30:00"; $tearray[1]="09:00:00"; $tearray[2]="09:30:00"; $tearray[3]="10:00:00"; 
                  $tearray[4]="10:30:00"; $tearray[5]="11:00:00"; $tearray[6]="11:30:00"; $tearray[7]="12:00:00"; 
                  $tearray[8]="13:30:00"; $tearray[9]="14:00:00"; $tearray[10]="14:30:00"; $tearray[11]="15:00:00"; 
                  $tearray[12]="15:30:00";  $tearray[13]="16:00:00";  $tearray[14]="16:30:00";  $tearray[15]="17:00:00";

                   $tearrayshow[0]="08:30 AM"; $tearrayshow[1]="09:00 AM"; $tearrayshow[2]="09:30 AM"; $tearrayshow[3]="10:00 AM"; 
                  $tearrayshow[4]="10:30 AM"; $tearrayshow[5]="11:00 AM"; $tearrayshow[6]="11:30 AM"; $tearrayshow[7]="12:00 NN"; 
                  $tearrayshow[8]="01:30 PM"; $tearrayshow[9]="02:00 PM"; $tearrayshow[10]="02:30 PM"; $tearrayshow[11]="03:00 PM"; 
                  $tearrayshow[12]="03:30 PM";  $tearrayshow[13]="04:00 PM";  $tearrayshow[14]="04:30 PM";  $tearrayshow[15]="05:00 PM";



                  $unavailable2=array();
                  $uc2=0;
                 

                  for($i=0; $i<16; $i++)
                  {
                    $ts=$tsarray[$i];
                    $te=$tearray[$i];

                    for($j=0;$j<$cnt;$j++){
                      $stime=$reserve[$j][0]['RTime'];
                      $etime=$reserve[$j][0]['RETime'];

                      if($stime<=$ts&& $etime>$ts){
                        $unavailable2[$uc2]=$i;
                        $uc2++;
                        $j=$cnt;

                      }
                    }   

                  }

                  sort($unavailable2);


                  $unavailable1=array();
                  $uc1=0;


                   for($i=0; $i<16; $i++)
                  {
                    $ts=$tsarray[$i];
                    $te=$tearray[$i];

                    for($j=0;$j<$cnt1;$j++){
                      $stime=$reserve1[$j][0]['start_time'];
                      $etime=$reserve1[$j][0]['end_time'];

                      if($stime<=$ts&& $etime>$ts){
                        $unavailable1[$uc1]=$i;
                      
                        $uc1++;
                        $j=$cnt1;
                        

                      }
                    }
                    
                  }


                  sort($unavailable1);


                  $uc=0;
                  $unavailable=array();
                  


                  $unavailable=array_merge($unavailable1,$unavailable2);

                  array_unique($unavailable);
                  sort($unavailable);

                  $uc=sizeof($unavailable,0);


                  $available=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);

                  $available=array_merge(array_diff($available, $unavailable),array_diff($unavailable, $available));



                  sort($available);
                  $ac=sizeof($available,0);

                  if($getdate==$datenow){
                    
                  $unavailable3=array();
                  $uc3=0;

                         
                          for($j=0;$j<$ac;$j++){
                            $stime=$tsarray[$available[$j]];
                            
                            if($checktime>=$stime){
                              $unavailable3[$uc3]=$available[$j];
                            
                              $uc3++;
                              
                            }
                          }

                 $unavailable=array_merge($unavailable3,$unavailable);

                  array_unique($unavailable);
                  sort($unavailable);

                  $uc=sizeof($unavailable,0);

                   $available=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);

                  $available=array_merge(array_diff($available, $unavailable),array_diff($unavailable, $available));



                  sort($available);
                  $ac=sizeof($available,0);

                  }





                  $display=array();
                  $dcnt=0;
                  $tcode=2;
                  $checked=array();
                  $checkedcnt=0;

                  //60 min
                  if($tcode==2 || $tcode==5 )
                  {
                    for($c=0;$c<$ac; $c++)
                    {
                      
                      $checker=$c+1;
                      if($checker!=$ac){

                      $time1=$tsarray[$available[$c]];
                      $time2=$tearray[$available[$checker]];
                      $timed1=$tsarrayshow[$available[$c]];
                      $timed2=$tearrayshow[$available[$checker]];

                      $diff=( strtotime($time2) - strtotime($time1) ) / 60;

                      if($diff==60)
                      {
                        $display[$dcnt]['times']=$time1."-".$time2;
                        $display[$dcnt]['timed']=$timed1."-".$timed2;
                        $display[$dcnt]['one']=$available[$c];
                        $checked[$checkedcnt]=$available[$c];
                        $checkedcnt++;

                        $display[$dcnt]['two']=$available[$checker];
                        $checked[$checkedcnt]=$available[$checker];
                        $checkedcnt++;
                        $dcnt++;
                        $c=$c+1;
                      }
                      
                      }
                    }

                  }

                  $available1=array_diff($available,$checked);

                  sort($available1);

                  


                  


                  //120
                 $display1=array();
                  $dcnt1=0;
                  $checked=array();
                  $checkedcnt=0;
                  $tcode=3;

                  if($tcode==3)
                  {
                    for($y=0;$y<$ac;$y++){
                      $checker=$y+3;

                      if($checker<$ac){
                        $time1=$tsarray[$available[$y]];
                        $time2=$tearray[$available[$checker]];
                        $timed1=$tsarrayshow[$available[$y]];
                        $timed2=$tearrayshow[$available[$checker]];
                        $diff=( strtotime($time2) - strtotime($time1) ) / 60;

                        if($diff==120)
                        {
                          
                          $display1[$dcnt1]['times']=$time1."-".$time2;
                          $display1[$dcnt1]['timed']=$timed1."-".$timed2;

                          $display1[$dcnt1]['one']=$available[$y];
                          $checked[$checkedcnt]=$available[$y];
                          $checkedcnt++;
                          $display1[$dcnt1]['two']=$available[$checker];
                          $checked[$checkedcnt]=$available[$checker];
                          $checkedcnt++;
                          $dcnt1++;
                          $y=$y+3;
                        }

                      }


                    }
                    
                  }
                                              

                  $available2=array_diff($available,$checked);

                  sort($available2);




                                  //90
                 $display3=array();
                  $dcnt3=0;

                  $tcode=4;

                  if($tcode==4)
                  {
                    for($y=0;$y<$ac;$y++){
                      $checker=$y+2;

                      if($checker<$ac){
                        $time1=$tsarray[$available[$y]];
                        $time2=$tearray[$available[$checker]];
                        $timed1=$tsarrayshow[$available[$y]];
                        $timed2=$tearrayshow[$available[$checker]];
                        $diff=( strtotime($time2) - strtotime($time1) ) / 60;

                        if($diff==90)
                        {
                          
                          $display3[$dcnt3]['times']=$time1."-".$time2;
                          $display3[$dcnt3]['timed']=$timed1."-".$timed2;
                          $display3[$dcnt3]['one']=$available[$y];
                          $display3[$dcnt3]['two']=$available[$checker];
                          $dcnt3++;
                          $y=$y+2;
                        }

                      }


                    }
                    
                  }
                       

                //150
                 $display4=array();
                  $dcnt4=0;

                  $tcode=5;

                  if($tcode==5)
                  {
                    for($y=0;$y<$ac;$y++){
                      $checker=$y+4;

                      if($checker<$ac){
                        $time1=$tsarray[$available[$y]];
                        $time2=$tearray[$available[$checker]];
                        $timed1=$tsarrayshow[$available[$y]];
                        $timed2=$tearrayshow[$available[$checker]];
                        $diff=( strtotime($time2) - strtotime($time1) ) / 60;

                        if($diff==150)
                        {
                          
                          $display4[$dcnt4]['times']=$time1."-".$time2;
                          $display4[$dcnt4]['timed']=$timed1."-".$timed2;
                          $display4[$dcnt4]['one']=$available[$y];
                          $display4[$dcnt4]['two']=$available[$checker];
                          $dcnt4++;
                          $y=$y+4;
                        }

                      }


                    }
                    
                  }



  //180
                 $display5=array();
                  $dcnt5=0;

                  $tcode=6;

                  if($tcode==6)
                  {
                    for($y=0;$y<$ac;$y++){
                      $checker=$y+5;

                      if($checker<$ac){
                        $time1=$tsarray[$available[$y]];
                        $time2=$tearray[$available[$checker]];
                        $timed1=$tsarrayshow[$available[$y]];
                        $timed2=$tearrayshow[$available[$checker]];
                        $diff=( strtotime($time2) - strtotime($time1) ) / 60;

                        if($diff==180)
                        {
                          
                          $display5[$dcnt5]['times']=$time1."-".$time2;
                          $display5[$dcnt5]['timed']=$timed1."-".$timed2;
                          $display5[$dcnt5]['one']=$available[$y];
                          $display5[$dcnt5]['two']=$available[$checker];
                          $dcnt5++;
                          $y=$y+5;
                        }

                      }


                    }
                    
                  }



?>




<?php


     echo '<div class="box border waitinglist" style="border-top: 3px solid #428BCA;">';
     echo '<div class="box-header"><b>Waiting List</b></div>';
     echo '<div class="box-body table-responsive no-padding">';
     echo '<table class="table table-hover">';
     echo '<tr>';
     echo '<th>QN</th>';
     echo '<th>Name</th>';
     echo '<th>Treatment</th>';
     echo '<th>Contact #</th>';
     echo '<th></th>';
     echo '</tr>';


     $wstatus="Done";
      $wq= mysql_query("SELECT Count(`Qdate`) FROM `queue` WHERE `Qdate`='$getdate' and `status`!='$wstatus'");

      $wc = mysql_fetch_array($wq);
      $wc=$wc[0];


      $queryw = "SELECT `QN`, `PatientId`, `status`, `TCode`, `Qdate` FROM `queue` WHERE `Qdate`='$getdate' and `status`!='$wstatus' order by `QN` ASC";
      $rw = @mysql_query($queryw, $dbc); 
      while ($roww = mysql_fetch_array($rw, MYSQL_ASSOC)) {
           $storeArrayw[][] =  $roww;
      }  

                      for($i=0;$i<$wc;$i++){
                    $QN=$storeArrayw[$i][0]['QN'];
                    $ID=$storeArrayw[$i][0]['PatientId'];
                    $status=$storeArrayw[$i][0]['status'];

                    $query1 = "SELECT FirstName, MiddleName, LastName, Address, Birthday, Sex, Age, Employer, CivilStatus, Occupation, CellphoneNo, TelephoneNo, Zip, UserName, Password, EmailAdd, EFirstName, EMiddleName, ELastName, ERelationship, ECellphoneNo FROM patient WHERE PatientId='$ID'";
                    $r1 = @mysql_query($query1, $dbc); 
                    $row1 = mysql_fetch_array($r1); 

                    $row1['FirstName'] = ucwords($row1['FirstName']);
                    $row1['MiddleName'] = ucwords($row1['MiddleName']);
                    $row1['LastName'] = ucwords($row1['LastName']);
                    $usrcompletename = $row1['FirstName']." ".$row1['MiddleName']." ".$row1['LastName'];
                    $ContactNo=$row1['CellphoneNo'];
                    
                    $treatment=$storeArrayw[$i][0]['TCode'];
                    $qtl = mysql_query("SELECT `TName`, `TLenght` FROM  `treatment` WHERE `TCode`='$treatment'");
                    $t1 = mysql_fetch_array($qtl);
                    $treatment_name=$t1['TName'];
                    $tlenght=$t1['TLenght'];
                    $bid=$storeArrayw[$i][0]['QN'];


if( ($tlenght==30&&!empty($available)) or ($tlenght==60&&!empty($display)) or ($tlenght==120&&!empty($display1)) or ($tlenght==90&&!empty($display3)) or ($tlenght==150&&!empty($display4)) or ($tlenght==180&&!empty($display5)) ){

                              echo '<tr style="background: #00A65A;">';
                              echo '<td>'.$QN.'</td>';

                              echo '<td>'.$usrcompletename.'</td>';
                              
                              echo '<td>'.$treatment_name.'</td>';
                              echo '<td>'.$ContactNo.'</td>';


                               if($tlenght==30&&!empty($available)){

                                $start_time=$tsarray[$available[0]];
                                $end_time=$tearray[$available[0]];
                                $timeshow=$tsarrayshow[$available[0]]."-".$tearrayshow[$available[0]];

                              }else if($tlenght==60&&!empty($display)){

                                $start_time=$tsarray[$display[0]['one']];
                                $end_time=$tearray[$display[0]['two']];
                                $timeshow=$tsarrayshow[$display[0]['one']]."-".$tearrayshow[$display[0]['two']];

                              }else if($tlenght==120&&!empty($display1)){

                                $start_time=$tsarray[$display1[0]['one']];
                                $end_time=$tearray[$display1[0]['two']];
                                $timeshow=$tsarrayshow[$display1[0]['one']]."-".$tearrayshow[$display1[0]['two']];

                              }else if($tlenght==90&&!empty($display3)){

                                $start_time=$tsarray[$display3[0]['one']];
                                $end_time=$tearray[$display3[0]['two']];
                                $timeshow=$tsarrayshow[$display3[0]['one']]."-".$tearrayshow[$display3[0]['two']];

                              }else if($tlenght==150&&!empty($display4)){

                                $start_time=$tsarray[$display4[0]['one']];
                                $end_time=$tearray[$display4[0]['two']];
                                $timeshow=$tsarrayshow[$display4[0]['one']]."-".$tearrayshow[$display4[0]['two']];
                              
                              }else if($tlenght==180&&!empty($display5)){
                                $start_time=$tsarray[$display5[0]['one']];
                                $end_time=$tearray[$display5[0]['two']];
                                $timeshow=$tsarrayshow[$display5[0]['one']]."-".$tearrayshow[$display5[0]['two']];
                              }
                              
                              
                    
      ?>                     <?php echo '<td>';?>
                              <form method=POST id="form4_<?php echo $QN;?>" action="results.php">
                                  <?php echo '<input type="hidden" name="url" value="21" >';?>  
                                  <?php echo '<input type="hidden" name="QN" value="' .$QN. '" >';?>
                                  <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                                  <?php echo '<input type="hidden" name="getdate" value="' .$getdate. '" >';?>
                                  <?php echo '<input type="hidden" name="patientId" value="' .$ID. '" >';?>
                                  <?php echo '<input type="hidden" name="start_time" value="' .$start_time. '" >';?>
                                  <?php echo '<input type="hidden" name="end_time" value="' .$end_time. '" >';?>
                                  <?php echo '<input type="hidden" name="timeshow" value="' .$timeshow. '" >';?>
                                  <?php echo '<input type="hidden" name="treatment" value="' .$treatment. '" >';?>
                                  
                                  <a href="#" onclick="confirm_update(<?php echo $QN;?>)" class="btndashboard" style="background: #428BCA;"> Update</a>

                   
                                </form>
            <?php echo '</td>';?>       


                              <?php echo '<td>';?>
                              <form method=POST id="form2_<?php echo $QN;?>" action="results.php">
                                      
                                  <?php echo '<input type="hidden" name="QN" value="' .$QN. '" >';?>
                                  <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                                  <?php echo '<input type="hidden" name="getdate" value="' .$getdate. '" >';?>
                                  <?php echo '<input type="hidden" name="url" value="7" >';?>
                                  <a href="#" onclick="confirm_deleteW(<?php echo $QN;?>)" class="btndashboard" style="background: #DD4B39;"> Delete</a></td>

                   
                                </form>
                              <?php echo '</td>';?>


<?php
                              

                                echo '</tr>';
                          }else{



                              echo '<tr>';
                              echo '<td>'.$QN.'</td>';

                              echo '<td>'.$usrcompletename.'</td>';
                              
                              echo '<td>'.$treatment_name.'</td>';
                              echo '<td>'.$ContactNo.'</td>';
                              
                              
                    
      ?>                      

                              <?php echo '<td>';?>
                              <form method=POST id="form2_<?php echo $QN;?>" action="results.php">
                                      
                                  <?php echo '<input type="hidden" name="QN" value="' .$QN. '" >';?>
                                  <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                                  <?php echo '<input type="hidden" name="getdate" value="' .$getdate. '" >';?>
                                  <?php echo '<input type="hidden" name="url" value="7" >';?>
                                  <a href="#" onclick="confirm_deleteW(<?php echo $QN;?>)" class="btndashboard" style="background: #DD4B39;"> Delete</a></td>

                   
                                </form>
                              <?php echo '</td>';?>


<?php

                                echo '</tr>';


                          }

                  }  



     echo '</table>';
     echo '</div><!-- /.box-body -->';
     echo ' </div> <!-- /.box -->';
?>


<?php

     echo '<div class="box border cancelledapp" style="border-top: 3px solid #428BCA;">';
     echo '<div class="box-header"><b>Cancelled Appointment</b></div>';
     echo '<div class="box-body table-responsive no-padding">';
     echo '<table class="table table-hover">';
     echo '<tr>';
     echo '<th>Time</th>';
     echo '<th>Name</th>';
     echo '<th>Treatment</th>';
     echo '<th>Contact #</th>';
     echo '<th></th>';
     echo '</tr>';

     $st="Cancelled";
      $cq= mysql_query("SELECT Count(`RNo`) FROM `reservation` WHERE `RDate`='$getdate' and `status`='$st'");

      $cc = mysql_fetch_array($cq);
      $cancelc=$cc[0];


      $query3 = "SELECT `RDate`, `RTime`, `PatientId`, `RNo`, `TCode`, `status`, `RETime`,`Time_Show` FROM `reservation` WHERE `RDate`='$getdate' and `status`='$st'order by `RTime` ASC";
      $r3 = @mysql_query($query3, $dbc); 
      while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
           $storeArray2[][] =  $row3;
      }

              for($i=0; $i<$cancelc; $i++){

                  $time=$storeArray2[$i][0]['Time_Show']; 
                  $ID=$storeArray2[$i][0]['PatientId'];
                  $crno=$storeArray2[$i][0]['RNo'];

                  $query1 = "SELECT FirstName, MiddleName, LastName, Address, Birthday, Sex, Age, Employer, CivilStatus, Occupation, CellphoneNo, TelephoneNo, Zip, UserName, Password, EmailAdd, EFirstName, EMiddleName, ELastName, ERelationship, ECellphoneNo FROM patient WHERE PatientId='$ID'";
                  $r1 = @mysql_query($query1, $dbc); 
                  $row1 = mysql_fetch_array($r1); 

                  $row1['FirstName'] = ucwords($row1['FirstName']);
                  $row1['MiddleName'] = ucwords($row1['MiddleName']);
                  $row1['LastName'] = ucwords($row1['LastName']);
                  $usrcompletename = $row1['FirstName']." ".$row1['MiddleName']." ".$row1['LastName'];
                  $ContactNo=$row1['CellphoneNo'];
                  
                  $treatment=$storeArray2[$i][0]['TCode'];
                  $qtl = mysql_query("SELECT `TName` FROM  `treatment` WHERE `TCode`='$treatment'");
                  $t1 = mysql_fetch_array($qtl);
                  $treatment_name=$t1[0];
                  $bid=$storeArray2[$i][0]['RNo'];

                  echo '<tr>';
                  echo '<td>'.$time.'</td>';
                  
                  echo '<td>'.$usrcompletename.'</td>';
                  echo '<td>'.$treatment_name.'</td>';
                  echo '<td>'.$ContactNo.'</td>';
                  


                  ?>
                <td>
                <form method=POST id="form17_<?php echo $crno;?>" action="set-appointment-secretary.php">
                        
                    <?php echo '<input type="hidden" name="crno" value="' .$crno. '" >';?>
                    <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                    <a href="#" onclick="confirm_deleteCrno(<?php echo $crno;?>)" class="btndashboard" style="background: #428BCA;"> Reschedule</a>

     
                  </form>
                  </td>
                <td>
                <form method=POST id="form3_<?php echo $bid;?>" action="results.php">
                        
                    <?php echo '<input type="hidden" name="bid" value="' .$bid. '" >';?>
                    <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                    <?php echo '<input type="hidden" name="url" value="2" >';?>

              <a href="#" onclick="confirm_deleteC(<?php echo $bid;?>)" class="btndashboard" style="background: #DD4B39;"> Delete</a>

     
                  </form>
                </td>

                 <?php
                //  echo '</td>';
                  echo '</tr>';

                }


     echo '</table>';
     echo '</div><!-- /.box-body -->';
     echo '</div> <!-- /.box -->';
?>



<?php


 echo '</div>'; //end of row 

 ?>
 


 <script>

function confirm_deleteW(mine) {
var answer = confirm("Are you sure you want to delete enlistment in waiting list?")
    if (answer)
    {
      var mi='form2_'+mine;
        document.getElementById(mi).submit();
    }
}

function confirm_deleteC(mine) {
var answer = confirm("Are you sure you want to delete this Cancelled Appointment?")
    if (answer)
    {
      var mi='form3_'+mine;
        document.getElementById(mi).submit();
    }
}


function confirm_deleteA(mine) {
var answer = confirm("Are you sure you want to delete this Appointment?")
    if (answer)
    {
         var mi='form1_'+mine;
        document.getElementById(mi).submit();
    }
}

function confirm_update(mine) {
var answer = confirm("Are you sure you want to update enlistment in waiting list?")
    if (answer)
    {
      var mi='form4_'+mine;
        document.getElementById(mi).submit();
    }
}
function confirm_deleteCrno(mine) {
var answer = confirm("Are you sure you want to Reschedule this Cancelled Appointment?")
    if (answer)
    {
      var mi='form17_'+mine;
        document.getElementById(mi).submit();
    }
}

    </script>

                                                                                    
                        
</body>

</html>