<?php
   include('../../server_one.php');
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <?php
            date_default_timezone_set("Canada/Pacific");
         session_start();  
         if(!empty($_POST['customersearchid'])){
         
             $id = $_POST['customersearchid'];
         } else if (!empty($_SESSION['customersearchid'])){
           $id = $_SESSION['customersearchid'];
         }else{
           $id=0;
         }
         
         
         if(!empty($_SESSION['msg'])){
         
         $msg = $_SESSION['msg'];
         }
         
         
         
           
         
         if(!empty($_POST['rno'])){
         
             $rno= $_POST['rno'];
         } else if (!empty($_SESSION['rno'])){
           $rno = $_SESSION['rno'];
         }else{
           $rno=0;
         }
         
         
         
         
         $usern=$_SESSION['usern'];

         
         $query1 = "SELECT FirstName, MiddleName, LastName FROM admin WHERE admin_id='$usern'";
         $r1 = @mysql_query($query1, $dbc); 
         $row1 = mysql_fetch_array($r1); 
         
         
         $row1['FirstName'] = ucwords($row1['FirstName']);
         $row1['MiddleName'] = ucwords($row1['MiddleName']);
         $row1['LastName'] = ucwords($row1['LastName']);
         $middle= substr($row1['MiddleName'], 0, 1);
         $firstname = $row1['FirstName'];
         
         
         $usercompletename = $row1['FirstName'];
         
         
         
         $querya = "SELECT active FROM customer WHERE customer_ID='$id'";
         $ra = @mysql_query($querya, $dbc); 
         $rowa = mysql_fetch_array($ra); 
         

         $_SESSION['usern']=$usern; 

         
         
         ?>
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Kiffi Arts Admin Dashboard</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.5 -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link href="../../css/font-awesome.min.css" rel="stylesheet">
      <link href="../../css/form-element.css" rel="stylesheet">
      <link href="../../css/additional.css" rel="stylesheet">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
      <!--mediq queries of teeth-->
      <link rel="stylesheet" href="../../dist/css/adult_teeth.css">
      <link rel="stylesheet" href="../../dist/css/child_teeth.css">
      <!---website icon-->
      <link rel="shortcut icon" href="../../images/ico/Title_myrnas1.png">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      <style>
         #wrap{
         background: #ddd; /* Set content background to white */
         width: 615px; /* Set the width of our content area */
         margin: 0 auto; /* Center our content in our browser */
         margin-top: 10px; /* Margin top to make some space between the header and the content */
         padding: 10px; /* Padding to make some more space for our text */
         border: 1px solid #CCC; /* Small border for the finishing touch */
         text-align: center; /* Center our content text */
         color:red;
         }
         #wrap .statusmsg{
         font-size: 12px; /* Set message font size  */
         padding: 3px; /* Some padding to make some more space for our text  */
         background: #EDEDED; /* Add a background color to our status message   */
         border: 1px solid #DFDFDF; /* Add a border arround our status message   */
         }
      </style>
      <script>
         $(function() {
           $( "#psearch" ).autocomplete({
             source: 'search.php',
                 minLength:1,
           select: function(event,ui){
             var code = ui.item.id;
             if(code != '') {
              // alert(code);
                $('#hiddeninput').val(ui.item.id);
             }
           }
           });
         });
      </script>
      <script>
         $(function() { 
             // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
             $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                 // save the latest tab; use cookies if you like 'em better:
                 localStorage.setItem('lastTab', $(this).attr('href'));
             });
         
             // go to the latest tab, if it exists:
             var lastTab = localStorage.getItem('lastTab');
             if (lastTab) {
                 $('[href="' + lastTab + '"]').tab('show');
             }
         
             
             prescription();
         
         
         });
         
      </script>
      <script>
         function prescription(){
         
         var usern='<?php echo $usern?>';
         var rno='<?php echo $rno?>';
         var  id='<?php echo $id?>';
         var diagnosis='<?php echo $diagnosis?>';
         
               $.post( "getprescription.php", {  id:id, diagnosis:diagnosis, usern:usern, rno:rno} ).done(function( data )  {
                 $( "#getprescription" ).html( data );
               });
         
         }
         
      </script>
      <script>
         function checkpass(){
             var status = document.getElementById("pstatus");
             var u = document.getElementById("form-password").value;
             if(u != ""){
                 status.innerHTML = 'checking...';
                 var hr = new XMLHttpRequest();
                 hr.open("POST", "customer-files.php", true);
                 hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 hr.onreadystatechange = function() {
                     if(hr.readyState == 4 && hr.status == 200) {
                         status.innerHTML = hr.responseText;
                     }
                 }
                 var v = "p2check="+u;
                 hr.send(v);
             }
         }
         
      </script>
      <script>
         function checktp(){
             var status = document.getElementById("tpstatus");
             var u = document.getElementById("form-telephoneno").value;
             if(u != ""){
                 status.innerHTML = 'checking...';
                 var hr = new XMLHttpRequest();
                 hr.open("POST", "profile-secretary.php", true);
                 hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 hr.onreadystatechange = function() {
                     if(hr.readyState == 4 && hr.status == 200) {
                         status.innerHTML = hr.responseText;
                     }
                 }
                 var v = "tp2check="+u;
                 hr.send(v);
             }
         }
         
      </script>
      <script>
         function checkcp(){
             var status = document.getElementById("cpstatus");
             var u = document.getElementById("form-cellphoneno").value;
             if(u != ""){
                 status.innerHTML = 'checking...';
                 var hr = new XMLHttpRequest();
                 hr.open("POST", "profile-secretary.php", true);
                 hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 hr.onreadystatechange = function() {
                     if(hr.readyState == 4 && hr.status == 200) {
                         status.innerHTML = hr.responseText;
                     }
                 }
                 var v = "cp2check="+u;
                 hr.send(v);
             }
         }
         
      </script>
      <script>
         function checkusername(){
             var status = document.getElementById("usernamestatus");
             var u = document.getElementById("form-username").value;
             if(u != ""){
                 status.innerHTML = 'checking...';
                 var hr = new XMLHttpRequest();
                 hr.open("POST", "profile-secretary.php", true);
                 hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 hr.onreadystatechange = function() {
                     if(hr.readyState == 4 && hr.status == 200) {
                         status.innerHTML = hr.responseText;
                     }
                 }
                 var v = "name2check="+u;
                 hr.send(v);
             }
         }
         
      </script>
      <script>
         function checkemail(){
             var status = document.getElementById("emailstatus");
             var u = document.getElementById("form-email").value;
             if(u != ""){
                 status.innerHTML = 'checking...';
                 var hr = new XMLHttpRequest();
                 hr.open("POST", "profile-secretary.php", true);
                 hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                 hr.onreadystatechange = function() {
                     if(hr.readyState == 4 && hr.status == 200) {
                         status.innerHTML = hr.responseText;
                     }
                 }
                 var v = "email2check="+u;
                 hr.send(v);
             }
         }
         
      </script>
      <script>
         function checkPass(){
         
         var pass1 = document.getElementById('form-password');
         var pass2 = document.getElementById('form-confirm-password');
         
         var emailstatus = document.getElementById('passstatus');
         
         if(pass1.value == pass2.value ){
         
           emailstatus.innerHTML= '<div style="color:green;">** Password match.</div>';
         }else
         {
         
           emailstatus.innerHTML = '<div style="color:red;">** Password do not match.</div>';
         }
         
         }
         
         
         
      </script>
   </head>
   <!--=========================  PHP CODE =========================-->
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="dashboard.php" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><img src="../../images/Title_myrnas1.png"></span>
               <!-- logo for regular state and mobile devices -->
               <p><?php echo $usercompletename; ?><br><small style="color:gray;"></small></p>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </a>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- User Account: style can be found in dropdown.less -->
                     <li class="treeview">
                        <a href="../../login.php">
                        <i class="fa fa-hand-o-left"></i> <span>Log-out</span>
                        </a>
                     </li>
                     <!-- Control Sidebar Toggle Button -->
                  </ul>
               </div>
            </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
               <!-- Sidebar user panel -->
               <div class="user-panel">
                  <div class="pull-left image">
                     <img src="../../images/Title_myrnas1.jpg" alt="User Image">
                  </div>
                  <div class="pull-left info" style="line-height: 17px; padding-top: 10px;">
                  </div>
               </div>
               <!-- search form -->
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu">
                  <li class="header">MAIN NAVIGATION</li>
                  <li class="  active treeview">
                     <a href="dashboard.php">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                  </li>
                  <!--Account Information menu-->
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Orders</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                       <ul class="treeview-menu">
                        
                        <li ><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                        <li ><a href="deliver-orders.php"><i class="fa fa-circle-o"></i> Confirmed Orders</a></li>
                        <li ><a href="approved-orders.php"><i class="fa fa-circle-o"></i> Approved Orders</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="customer-files.php">
                     <i class="fa fa-files-o"></i><span>Customer Files</span>
                     </a>
                  </li>
                    <li class="treeview">
                     <a href="billing.php">
                     <i class="fa  fa-shopping-cart"></i><span>Delivered/Picked-up Orders</span>
                     </a>  
                  </li>
                  <li class="treeview">
                     <a href="pricelist.php">
                     <i class="fa fa-user-md"></i><span>Price List</span>  
                     </a>  
                  </li>
                  <li class=" treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Ready-Made Design</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="cake-catalog.php"><i class="fa fa-circle-o"></i> Add Ready-Made Design</a></li>
                        <li><a href="edit-cakecatalog.php"><i class="fa fa-circle-o"></i> Edit Ready-Made Design</a></li>
                     </ul>
                  </li>
                     <li class="treeview">
                  <a href="#">
                  <i class="fa fa-edit"></i> <span>Report List</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class=" active treeview-menu">
                     <li ><a href="daily_report.php"><i class="fa fa-circle-o"></i> Daily Succesful Report</a></li>
                     <li ><a href="daily_report1.php"><i class="fa fa-circle-o"></i> Daily Unsuccesful Report</a></li>
                     <li><a href="monthly_report.php"><i class="fa fa-circle-o"></i> Monthly Succesful Report</a></li>
                     <li><a href="monthly_report1.php"><i class="fa fa-circle-o"></i> Monthly Unsuccesful Report</a></li>
                  </ul>
               </li>
                  <li class="treeview">
                     <a href="system_log.php">
                     <i class="fa  fa-cog"></i><span>System log</span>
                     </a>  
                  </li>
               </ul>
            </section>
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <section class="content-header">
               <div class="row">
                  <div class="col-lg-4 col-xs-6">
                     <!-- small box -->
                     <a href="pending-orders.php"></a>
                     <div class="small-box bg-yellow">
                        <div class="inner">
                           <?php
                              $link = mysql_connect("localhost", "root", "");
                              mysql_select_db("myrnas", $link);
                              
                              $result = mysql_query("SELECT * FROM customized_cake WHERE order_pending='pending'", $link);
                              $num_rows = mysql_num_rows($result);

                              $resultadd = mysql_query("SELECT * FROM catalog_orderlist WHERE catalog_status='pending'", $link);
                              $num_rowsadd = mysql_num_rows($resultadd);
                              
                              ?>                   
                           <h3> <?php echo "$num_rowsadd" + "$num_rows\n";?></h3>
                           <p>All Pending Orders </p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-question-circle"></i>
                        </div>
                        <a href="pending-orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                     <!-- small box -->
                     <div class="small-box bg-yellow">
                        <div class="inner">
                           <?php
                              $link = mysql_connect("localhost", "root", "");
                              mysql_select_db("mrynas", $link);
                              
                              $result = mysql_query("SELECT * FROM customized_cake WHERE order_pending='confirmed'", $link);
                              $num_rows = mysql_num_rows($result);

                              $resultadd = mysql_query("SELECT * FROM catalog_orderlist WHERE catalog_status='confirmed'", $link);
                              $num_rowsadd = mysql_num_rows($resultadd);
                              
                              
                              ?>                   
                           <h3> <?php echo "$num_rowsadd" + "$num_rows\n";?></h3>
                           <p>All Confirmed Orders</p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <a href="deliver-orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-4 col-xs-6" >
                     <!-- small box -->
                     <div class="small-box bg-yellow">
                        <div class="inner">
                           <?php
                              $link = mysql_connect("localhost", "root", "");
                              mysql_select_db("mrynas", $link);
                              
                              $result = mysql_query("SELECT * FROM customized_cake WHERE order_pending='approved'", $link);
                              $num_rows = mysql_num_rows($result);

                              $resultadd = mysql_query("SELECT * FROM catalog_orderlist WHERE catalog_status='approved'", $link);
                              $num_rowsadd = mysql_num_rows($resultadd);
                              
                              
                              ?>     
                           <h3> <?php echo "$num_rowsadd" + "$num_rows\n";?></h3>
                          <p>All Approved Orders</p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-check-square"></i>
                        </div>
                        <a href="approved-orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!--CATALOG!-->

                  
            </section>
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Customer Files</li>
               </ol>
               <br>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="center col-lg-12">
                  <!-- Default box -->
                  <div class="box border">
             <center><h3> <?php

echo "Deliver/Pickup for " . date("F j, Y") . "<br>";


?></h3></center>
            <fieldset>

            <div class="form-bottom">
             <ul class="nav nav-tabs" id="myTab" style="margin-top:20px;">
                              <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-file-text"></i>&nbsp; New Design Orders</a></li>
                            
                              <!-- <li><a data-toggle="tab" href="#past"><i class="fa fa-file-text"></i>&nbsp;Past Orders</a></li> -->
                              <li><a data-toggle="tab" href="#billing"><i class="fa fa-file-text"></i>&nbsp;Ready-Made Design Orders</a></li>
                           </ul>
            <div class="box border" style="margin-top:10px; border-top: 3px solid #bd4a07">
            <div class="box-header">

            </div>
            <!-- /.box-header -->

            <div class="box-body">
         <div class="tab-content">
                             <div id="profile" class="tab-pane fade in active">
            <div class="table-responsive">
           
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  
            <thead>
            <tr>
            <th class="hidden">Order Date</th>
                                    
                                    <th>Order Date To Be Pick-Up/Deliver</th>
                                    <th>Order Time </th>
                                    <th>Customer Name </th>

                                    <th hidden>Cake Order</th>
                                    <th>Price</th>
                               
                                    <th>Payment Amount</th>

                                    <th>Contact Number</th>
                                    <th>Service Details</th>
                                    <th>Update Service Details</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    
                                 </tr>
                              </thead>
                              <?php      $ai = mysql_query("SELECT Count(`cake_ID`) FROM `customized_cake` WHERE `cake_duedate`=CURDATE()");
               $a1 = mysql_fetch_array($ai);
               $cnt=$a1[0];
               
               if($cnt!=0){
               
                                 
                                       $query1 = "SELECT * FROM customized_cake ";
                     $r1 = @mysql_query($query1, $dbc); 
                     while ($row1 = mysql_fetch_array($r1)) {
                          $reserve[][] =  $row1;
                     }
               
                                 
                                       for($i=0;$i<$cnt; $i++){
                                         $order=$reserve[$i][0]['cake_ID'];
                                         $id=$reserve[$i][0]['customer_ID'];
                                         $PA=$reserve[$i][0]['payment_amount'];
                                          $PS=$reserve[$i][0]['payment_status'];

                                           $BN=$reserve[$i][0]['branch_name'];
                                          $DV=$reserve[$i][0]['del_venue'];
                                           $DN=$reserve[$i][0]['driver_name'];
                                          $PN=$reserve[$i][0]['plate_num'];


                                          
                                             $qtl = mysql_query("SELECT cake_ID FROM  customized_cake WHERE cake_ID='$order'");
                                         $t1 = mysql_fetch_array($qtl);
                                         $cake_ID=$t1[0];
                                 
                                 
                                         $query2 = "SELECT fname, lname, phone_num  FROM customer WHERE customer_ID='$id'";
                                         $r2 = @mysql_query($query2, $dbc); 
                                         $row2 = mysql_fetch_array($r2); 
                                        
                                 
                                         $row2['fname'] = ucwords($row2['fname']);
                                         $row2['lname'] = ucwords($row2['lname']);
                                         $row2['phone_num'] = ucwords($row2['phone_num']);
                                         $usrcompletename2 = $row2['fname']." ".$row2['lname'];
                                         $usrcompletename3 = $row2['phone_num'];
                                 
                                         
                                          if($reserve[$i][0]['order_pending']=="approved"){
                                         $ddate1=strtotime($reserve[$i][0]['cake_duedate']);
                                         $ddate=date("F j, Y",$ddate1 );
                                 
                                         echo '          <tr>';
                                        
                                         echo '          <td>'.$date = $ddate.'</td>';
                                          echo '          <td>'.$diagnosis = $reserve[$i][0]['cake_time'].'</td>';
                                         echo '          <td>'.$name = $usrcompletename2.'</td>';       
                                         echo '          <td class="hidden">'.$tname = $cake_ID.'  cake</td>';
                                         // echo '          <td>'.$diagnosis = $reserve[$i][0]['cake_theme'].'</td>';  
                                         echo '          <td>'.$cake = $reserve[$i][0]['cake_price'].'</td>';   
                                        
                                         echo '          <td>'.$service = $reserve[$i][0]['payment_amount'].'</td>';  
                                         echo '          <td>'.$name = $usrcompletename3.'</td>';   
                                          echo '          <td>'.$service = $reserve[$i][0]['branch_name'].' '.$service = $reserve[$i][0]['del_venue'].' </td>';  ?>

                                           <?php echo '<td>';?>
                              <form method=POST id="form4_<?php echo $i;?>" action="secretary-prescription.php">
                                 <?php echo '<input type="hidden" name="cake_ID" value="' .$cake_ID. '" >';?>
                                 <a href="#" class="btndashboard edittreat" 
                                    data-am="<?php echo $BN; ?>" 
                                    data-stat="<?php echo $DV;?>"
                                    data-one="<?php echo $DN;?>"
                                    data-two="<?php echo $PN;?>"

                                    data-code="<?php echo $cake_ID; ?>"
                                    style="background: #F39C12;" data-toggle="modal" data-target=".edit-treat"> Update</a></td>
                              </form>
                              <?php echo '</td>';?>
                              <td><a href="customer_search.php?order=<?php echo $order;?>"  class="btndashboard" style="background: #227da0;">View</a></td>
          
            <?php echo '<td>';?>
            <form method=POST id="form5_<?php echo $i;?>" action="results.php">
            <?php echo '<input type="hidden" name="cake_ID" value="' .$order. '" >';?>
            <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
            <?php echo'<input type="hidden" name="url" value="7" >'; ?>
            <a href="#" onclick="confirm_pres3(<?php echo $i;?>)" class="btndashboard" style="background: #DD4B39;"> Deliver</a></td>
            </form>
            <?php echo '</td>';?>
                            
                             
                            
                              <?php              
                                 echo '        </tr>';    
                                 
                                 }   }
                                 }?>
                              </tbody>
                           </table>
                        </div>
                     </div>
       

                               <div id="billing" class="tab-pane fade">
         
          
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example3" >
            <thead>
            <tr>
            <th>Order Date</th>

            <th>Customer Name  </th>
            <th class="hidden">Customer Name  </th>
            <th>Cake Order </th>
            <th>Payment Status</th>
            <th>Payment Amount</th>
            <th>Cake Price</th>
            <th>Action</th>
            <th>Action</th>
            </tr>
            </thead>

            <?php      $bi = mysql_query("SELECT Count(`order_catalog`) FROM `catalog_orderlist` WHERE `duedate_catalog`=CURDATE()");
               $b1 = mysql_fetch_array($bi);
               $cnt1=$b1[0];
               
               if($cnt1!=0){
               
                     $query2 = "SELECT * FROM catalog_orderlist";
                     $r4 = @mysql_query($query2, $dbc); 
                     while ($row3 = mysql_fetch_array($r4, MYSQL_ASSOC)) {
                          $reserves[][] =  $row3;
                     }
               
                     for($c=0;$c<$cnt1; $c++){
                       $order_catalog=$reserves[$c][0]['order_catalog'];
                       $id1=$reserves[$c][0]['customer_ID'];


                           $qtl1 = mysql_query("SELECT order_catalog FROM  catalog_orderlist WHERE order_catalog='$order_catalog' ");
                       $t2 = mysql_fetch_array($qtl1);
                       $orderID=$t2[0];
               
               
                       $query3= "SELECT fname, lname  FROM customer WHERE customer_ID='$id1'";
                       $r3 = @mysql_query($query3, $dbc); 
                       $row4 = mysql_fetch_array($r3); 
               
                       $row4['fname'] = ucwords($row4['fname']);
                       $query5= "SELECT lname  FROM customer WHERE customer_ID='$id1'";
                       $r5 = @mysql_query($query5, $dbc); 
                       $row5 = mysql_fetch_array($r5); 
               
                       $row5['lname'] = ucwords($row5['lname']);
                       $usrcompletename4 = $row4['fname']." ".$row5['lname'];
                       
                       if($reserves[$c][0]['catalog_status']=="approved"){
                       $ddate1=strtotime($reserves[$c][0]['duedate_catalog']);
                       $ddate=date("F j, Y",$ddate1 );
               
                       echo '          <tr>';
                       echo '          <td>'.$date = $ddate.'</td>';

                       echo '          <td>'.$name1 = $usrcompletename4.'</td>';         
                       echo '          <td class="hidden">'.$tname = $orderID.'  cake</td>';
                       echo '          <td>'.$diagnosis = $reserves[$c][0]['catalog_code'].'</td>';   
                       echo '          <td>'.$service = $reserves[$c][0]['payment_status'].'</td>';  
                       echo '          <td>'.$diagnosis = $reserves[$c][0]['payment_amount'].'</td>';    
                       echo '          <td>'.$diagnosis = $reserves[$c][0]['catalog_price'].'</td>';    ?>
             <td><a href="catalog_search.php?order_catalog=<?php echo $order_catalog;?>"  class="btndashboard" style="background: #227da0;">view</a></td>
     
            <?php echo '<td>';?>
            <form method=POST id="form6_<?php echo $c;?>" action="results.php">
            <?php echo '<input type="hidden" name="order_catalog" value="' .$order_catalog. '" >';?>
            <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
            <?php echo'<input type="hidden" name="url" value="6" >'; ?>
            <a href="#" onclick="confirm_pres4(<?php echo $c;?>)" class="btndashboard" style="background: #DD4B39;"> pick-up</a></td>
            </form>
            <?php echo '</td>';?>
            <?php              
               echo '        </tr>';    
               
               }   }
               }?>
            </tbody>
            </table>
            </div>
            </div>
                        
                     </div>
                  </div>
               </div>
         </div>

         <!-- ** EDIT TREATMENT-->
      <div class="modal fade edit-treat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title" style="text-align:center;">Payment Status</h4>
      </div>
      <div class="modal-body">
      <!-- content goes here -->
      <p style="text-align:center">Please fill out the fields. </p>
      <form method="post" action="results.php" id="form4_<?php echo $i;?>">
      <label class="sr-only" for="form-code">price ID</label>
      <input type="hidden" name="form-code" placeholder="Treatment Code" class="form-code1 form-control" id="form-code">
      <div class="form-group">
                                            <label class="sr-only" for="form-am">Time Length</label>
                                                <select name="form-am" class="dental-am1 form-control" id="form-am1" style="margin:auto;">
                                                  <option value="San Jose Branch">San Jose Branch</option>
                                                  <option value="Yubenco Branch">Yubenco Branch</option>
                                                  <option value="KCC Mall Branch">KCC Mall Branch</option>
                                                  <option value="Pilar Street Branch">Pilar Street Branch</option>
                                                  <option value="Gov. Alvarez Branch">Gov. Alvarez Branch</option>
                                                  <option value="Pasonanca Main Branch">Pasonanca Main Branch</option>
                                              </select>   
                                        </div>                      
       <div class="form-group">
                                            <label class="sr-only" for="form-stat">Time Length</label>
                                                <select name="form-stat" class="dental-stat1 form-control" id="form-stat" style="margin:auto;">
                                                  <option value="downpayment">downpayment</option>
                                                  <option value="fullypaid">Fully paid</option>
                                                
                                              </select>   
                                        </div>   
<br>
<br>
                               Driver Name:        <div class="form-group">
      <label class="sr-only" for="form-one">Driver Name</label>
      <input type="text" name="form-one" placeholder="" class="form-one1 form-control" id="form-one">
      </div> 
      Plate Number:        <div class="form-group">
      <label class="sr-only" for="form-two">Driver Name</label>
      <input type="text" name="form-two" placeholder="" class="form-two1 form-control" id="form-two">
      </div> 

      <?php echo'<input type="hidden" name="url" value="30" >'; ?>
      <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
      </div>
      <div class="modal-footer">
      <button type="button" class="btndashboard" data-dismiss="modal">Back</button>            
      <button type="submit" class="btndashboard">Submit</button>
      <form>
      </div>
      </div>
      </div>
      </div>

         <!-- ** View Cake Order-->
         <div class="modal fade edit-pres" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
         <div class="modal-dialog modal-lg">
         <div class="modal-content">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title" style="text-align:center;">View Cake Order</h4>
         </div>
         <div class="modal-body">
         <!-- content goes here -->
         <p style="text-align:center">Customer Order Details. </p>
         HAHAHAHAH
         </div>
         <div class="modal-footer">
         <button type="button" class="btndashboard" data-dismiss="modal">Back</button>
         <button type="submit" class="btndashboard">Submit</button>
         </form>
         </div>
         </div>
         </div>
         </div>
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- jQuery 2.1.4 -->
      <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="../../js/bootstrap.min.js"></script>
      <!-- DataTables -->
      <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="../../plugins/fastclick/fastclick.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/app.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <script src="../../js/jquery.js"></script>
      <script src="../../js/signup.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.noConflict();  //Not to conflict with other scripts
         $.widget.bridge('uibutton', $.ui.button);
      </script>
      <script>
         function confirm_pres(mine) {
         var answer = confirm("Are you sure you want to add another prescription?")
             if (answer)
             {
               var mi='form1_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
         function confirm_pres1(mine) {
         var answer = confirm("Are you sure you want to mark this service Confirmed?")
             if (answer)
             {
               var mi='form2_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
         function confirm_pres2(mine) {
         var answer = confirm("Are you sure you want to mark this service as deactive?")
             if (answer)
             {
               var mi='form3_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         function confirm_pres3(mine) {
         var answer = confirm("Are you sure do you want to deliver?")
             if (answer)
             {
               var mi='form5_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
         function confirm_pres4(mine) {
         var answer = confirm("Are you sure you want to edit this Prescription?")
             if (answer)
             {
               var mi='form6_'+mine;
                 document.getElementById(mi).submit();
             }
         }
             
      </script>
       <script>
         $(document).on( "click", '.edittreat',function(e) {
         
                 var am = $(this).data('am');
                 var code = $(this).data('code');
                 var stat = $(this).data('stat');
                 var one = $(this).data('one');
                 var two = $(this).data('two');

         
                 $(".form-am1").val(am);
                 $(".form-stat1").val(stat);
                 $(".form-code1").val(code);
                $(".form-one1").val(one);
                 $(".form-two1").val(two);
         
             });
         
      </script>
      <script>
         $(document).ready(function () {
            table = $('#dataTables-example').DataTable({
            
               dom: 'Bfrtip',
                 buttons: [
                     'print'
                 ]
             });
         });
      </script>
      <script>
         $(function () {
           $("#dataTables-example").DataTable();
           $('#example2').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false
           });
         });
         
         
      </script>
      <script>
         function confirm_print() {
         var answer = confirm("Are you sure you want to print?")
             if (answer)
             {
                // window.open('secretary-printing.php','_blank');
                 document.getElementById("printing").submit();
         
             }
         }
         
             
      </script>
   </body>
</html>