<?php
   include('../../server_one.php');
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <?php
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
               <span class="logo-mini"><img src="../../images/Title_myrnas1.jpg"></span>
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
                  <li class="treeview">
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
                  <li class="active treeview">
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
                        <li><a href="readymade-designs.php"><i class="fa fa-circle-o"></i> Add Ready-Made Design</a></li>
                        <li><a href="edit-readymade.php"><i class="fa fa-circle-o"></i> Edit Ready-Made Design</a></li>
                     </ul>
                  </li>
                     <li class="treeview">
                  <a href="#">
                  <i class="fa fa-edit"></i> <span>Report List</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
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
                     <fieldset>
                     <div class="form-top" style="padding-bottom:0px;">
                        <div class="form-top-left">
                           <h3>Customer Files</h3>
                           <p>View Customer's profile and shirt orders</p>
                        </div>
                        <div class="form-top-right">
                           <i class="fa fa-files-o"></i>
                        </div>
                     </div>
                     <div class="form-bottom">
                        <div class="box-body">
                           <form role="form" action="customer-files.php" method="post" class="searchpatient">
                              <div class="center input-group col-md-5">
                                 <label class="sr-only" for="form-pID">patientid:</label>
                                 <?php
                                    if($id!=0){
                                    
                                      echo'<input type="text" id="psearch" placeholder="Customer Name (e.g. First Last Name)" class="patientsearchname form-control" name="patientsearchname">';
                                      echo'<input type="hidden" id="hiddeninput" class="customersearchid form-control" name="customersearchid" value="'.$id.'";>';
                                    
                                    }else{
                                    
                                      echo'<input type="text" id="psearch" placeholder="Customer Name (e.g. First Last Name)" class="patientsearchname form-control" name="patientsearchname">
                                    <input type="hidden" id="hiddeninput" class="customersearchid form-control" name="customersearchid">';                                    
                                    }
                                    
                                    ?>
                                 <span class="input-group-btn">
                                 <button type="submit" class="btn btn-search" style="line-height:0px; height:34px;">Search</button>
                                 </span>
                              </div>
                              <div style="margin-top:0px; margin-left:308px; width:220px;">
                                 <div id="display"></div>
                              </div>
                           </form>
                           <ul class="nav nav-tabs" id="myTab" style="margin-top:20px;">
                              <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-user"></i>&nbsp;View Profile</a></li>
                            
                              <!-- <li><a data-toggle="tab" href="#past"><i class="fa fa-file-text"></i>&nbsp;Past Orders</a></li> -->
                              <li><a data-toggle="tab" href="#billing"><i class="fa fa-file-text"></i>&nbsp;Update Customer Order</a></li>
                           </ul>
                           <div class="tab-content">
                              <div id="profile" class="tab-pane fade in active">
                                 <h3 style="text-align:center;">Customer Profile</h3>
                                 <div class="center col-lg-10" style="margin-top:30px;">
                                    <?php 
                                       if(isset($msg)){  
                                         // echo '<div id="wrap" class="statusmsg" style="margin-bottom:10px;">'.$msg.'</div>'; 
                                        } 
                                       
                                       
                                       
                                        if($rowa[0]==1){
                                       ?>
                                  <form method=POST id="form2_<?php echo $id;?>" action="results.php">
                                             <?php echo '<input type="hidden" name="usern" value="' .$usern. '" >';?>
                                             <?php echo'<input type="hidden" name="id" value="' .$id. '" >'; ?>
                                             <?php echo'<input type="hidden" name="url" value="18" >'; ?>
                                             <div class="pull-right btndashboard"  style="background: #e48e35;"><a href="#" style="text-decoration:none; color:white;" onclick="confirm_pres1(<?php echo $id;?>)"> DEACTIVATE ACCOUNT</a></div> 
                                          </form>
                                    <?php
                                       }else if($rowa[0]==2){
                                       ?>
                                    <form method=POST id="form5_<?php echo $id;?>" action="results.php">
                                       <?php echo'<input type="hidden" name="usern" value="'.$usern.'" >'; ?>
                                       <?php echo'<input type="hidden" name="id" value="'.$id.'" >'; ?>
                                       <?php echo'<input type="hidden" name="url" value="19" >'; ?>
                                       <div class="pull-right btndashboard" style="background: #00A65A;"><a href="#" style="text-decoration:none; color:white;" onclick="confirm_pres3(<?php echo $id;?>)"> Activate Account</a></div>
                                    </form>
                                    <?php
                                       }
                                       ?>
                                    <?php
                                       if ($id!=0) 
                                       {
                                       $query1 = "SELECT fname, lname, address, phone_num, birthdate, email, cust_uname, cust_pword FROM customer WHERE customer_ID='$id'";
                                       $r1 = @mysql_query($query1, $dbc); 
                                       $row1 = mysql_fetch_array($r1); 
                                       
                                       if(!empty($row1)){
                                       
                                       $row1['fname'] = ucwords($row1['fname']);
                                       $row1['lname'] = ucwords($row1['lname']);
                                       
                                       
                                       $fname = $row1['fname'];
                                       $lname = $row1['lname'];
                                       
                                       $row1['address'] = ucwords($row1['address']);
                                       $address=$row1['address'];
                                       $row1['phone_num'] = ucwords($row1['phone_num']);
                                       $phone_num=$row1['phone_num'];
                                       $row1['birthdate'] = ucwords($row1['birthdate']);
                                       $birthdate=$row1['birthdate'];
                                       
                                       
                                       $cust_uname = $row1['cust_uname']; //username
                                       
                                       
                                       $emailadd = $row1['email']; //email
                                       
                                       $pwords = $row1['cust_pword'];
                                       $cust_pword = $row1['cust_pword']; //password
                                       $cust_pword= strlen($cust_pword);
                                       
                                       
                                       
                                       
                                       
                                       $usrcompletename = $row1['fname']." ".$row1['lname'];
                                       $birthday = date('m-d-Y', strtotime($row1['birthdate']));
                                       
                                       
                                       ?>              
                                    <h3 class="profile-username" style="font-size:15px;">Personal Information</h3>
                                    <ul class="list-group list-group-unbordered">
                                       <li class="list-group-item" style="padding-left:15px; padding-right:15px;">
                                          <b>First Middle Last Name</b> <a class="pull-right"><?php echo $usrcompletename; ?></a>
                                       </li>
                                       <li class="list-group-item" style="padding-left:15px; padding-right:15px;">
                                          <b>Delivery Address</b> <a class="pull-right"><?php echo $address; ?></a>
                                       </li>
                                       <li class="list-group-item" style="padding-left:15px; padding-right:15px;">
                                          <b>Date of Birth</b> <a class="pull-right"><?php echo $birthdate; ?></a>
                                       </li>
                                       <li class="list-group-item" style="padding-left:15px; padding-right:15px;">
                                          <b>Contact Number</b> <a class="pull-right"><?php echo $phone_num; ?></a>
                                       </li>
                                    </ul>
                                    <h3 class="profile-username" style="font-size:15px;">Account Information</h3>
                                    <ul class="list-group list-group-unbordered">
                                       <li class="list-group-item" style="padding-left:15px; padding-right:15px;">
                                          <b>Username</b> <a class="pull-right"><?php echo $cust_uname; ?></a>
                                       </li>
                                       <li class="list-group-item" style="padding-left:15px; padding-right:15px;">
                                          <b>Password</b> <a class="pull-right"><?php for($i=0;$i<$cust_pword;$i++){print "*";}?></a>
                                       </li>
                                       <li class="list-group-item" style="padding-left:15px; padding-right:15px;">
                                          <b>E-mail Address</b> <a class="pull-right"><?php echo $emailadd; ?></a>
                                       </li>
                                    </ul>
                                    <?php } 
                                       }else{
                                       
                                       
                                       
                                                     echo'<h3 class="profile-username" style="font-size:15px; margin-top:30px;">Personal Information</h3> ';
                                                     echo'<ul class="list-group list-group-unbordered"> ';
                                                     
                                                     echo'<li class="list-group-item" style="padding-left:15px; padding-right:15px;">';
                                                     echo'<b>First Middle Last Name</b> <a class="pull-right"> </a> ';
                                                     echo'</li>';
                                                     
                                                     echo'<li class="list-group-item" style="padding-left:15px; padding-right:15px;">';
                                                     echo'<b>Delivery Address</b> <a class="pull-right"></a>';
                                                     echo'</li>';
                                                    
                                                     echo'<li class="list-group-item" style="padding-left:15px; padding-right:15px;">';
                                                     echo'<b>Date of Birth</b> <a class="pull-right"></a>';
                                                     echo'</li>';
                                                     
                                               
                                       
                                                    
                                       
                                                     echo'<li class="list-group-item" style="padding-left:15px; padding-right:15px;">';
                                                     echo'<b>Cellphone Number</b> <a class="pull-right"></a>';
                                                     echo'</li>';
                                       
                                       
                                               
                                                     echo'</ul>';
                                       
                                                     echo'<h3 class="profile-username" style="font-size:15px;">Account Information</h3>';
                                       
                                                     echo'<ul class="list-group list-group-unbordered">';
                                       
                                                     echo'<li class="list-group-item" style="padding-left:15px; padding-right:15px;">';
                                                     echo'<b>Username</b> <a class="pull-right"></a>';
                                                     echo'</li>';
                                       
                                                     echo'<li class="list-group-item" style="padding-left:15px; padding-right:15px;">';
                                                     echo'<b>Password</b> <a class="pull-right"></a>';
                                                     echo'</li>';
                                       
                                                     echo'<li class="list-group-item" style="padding-left:15px; padding-right:15px;">';
                                                     echo'<b>E-mail Address</b> <a class="pull-right"></a>';
                                                     echo'</li>';
                                       
                                                     echo'</ul>';
                                       
                                                   
                                       
                                                     echo'</ul>';
                                       
                                       
                                       
                                                     }
                                       
                                       ?>
                                 </div>
                              </div>
                              <div id="billing" class="tab-pane fade">
                                 <!-- end of modal popup -->
                                 <?php 
                                    if ($id!=0) {
                                    
                                    echo '<div class="box border" style="margin-top:50px; border-top: 3px solid #ca4f42">';
                                    echo '  <div class="box-header">';
                                    echo '    <div class="box-title">Billing And Delivery</div>';
                                    echo '  </div><!-- /.box-header -->';
                                    echo '  <div class="box-body">';
                                    echo '    <table id="example2" class="table table-bordered table-striped">';
                                    echo '      <thead>';
                                    echo '        <tr>';
                                    echo '          <th>Order Date</th>';
                                    echo '          <th>Cake Occasion</th>';
                                    echo '          <th>Order Status</th>';
                                    echo '          <th>Service</th>';
                                    echo '          <th>Payment Status</th>';
                                    echo '        </tr>';
                                    echo '      </thead>';
                                    echo '      <tbody>';
                                    
                                    
                                       
                                         $ai = mysql_query("SELECT Count(`o_idnew`) FROM `order_list` WHERE `customer_ID`='$id'");
                                    
                                         $a1 = mysql_fetch_array($ai);
                                         $cnt=$a1[0];
                                         
                                         if($cnt!=0){
                                    
                                         $query1 = "SELECT * FROM `order_list`WHERE `customer_ID`='$id' order by `o_idnew` DESC";
                                         $r1 = @mysql_query($query1, $dbc); 
                                         while ($row1 = mysql_fetch_array($r1, MYSQL_ASSOC)) {
                                              $reserve[][] =  $row1;
                                         }
                                    
                                         for($i=0;$i<$cnt; $i++){
                                           $order=$reserve[$i][0]['o_idnew'];
                                           $PA=$reserve[$i][0]['payment_amount'];
                                           $PS=$reserve[$i][0]['payment_status'];
                                    
                                           $ddate1=strtotime($reserve[$i][0]['d_datenew']);
                                           $ddate=date("F j, Y",$ddate1 );
                                    
                                    echo '        <tr>';
                                    echo '          <td>'.$ddate.'</td>';
                                     echo '          <td>'.$reserve[$i][0]['shirt_typenew'].'</td>';  
                                    echo '          <td>'.$reserve[$i][0]['order_statusnew'].'</td>';    
                                      echo '          <td>'.$diagnosis = $reserve[$i][0]['branch_name'].'</td>';   
                                               echo '          <td>'.$service = $reserve[$i][0]['payment_status'].'</td>';  
                                    

                                      echo '<td>';?>
                                 <a href="customer_search_update.php?order=<?php echo $order;?>"  class="btndashboard" style="background: #227da0;">view</a>
                                    <?php echo '</td>';?>



                                    
                                    <?php              
                                       echo '        </tr>';    
                                    
                                    }
                                    }
                                    echo '      </tbody>';           
                                    echo '    </table>';
                                    echo '  </div><!-- /.box-body -->';
                                    echo '</div><!-- /.box -->';
                                    
                                    
                                    
                                    
                                       }else{
                                    
                                       }
                                    
                                         ?>
                              </div>
                              <!-- wag mo tanggalin -->
                              <div id="past" class="tab-pane fade">
                                 <?php 
                                    if ($id!=0) {
                                    
                                    echo '<div class="box border" style="margin-top:50px; border-top: 3px solid #ca4f42">';
                                    echo '  <div class="box-header">';
                                    echo '    <div class="box-title">Past Appointments</div>';
                                    echo '  </div><!-- /.box-header -->';
                                    echo '  <div class="box-body">';
                                    echo '    <table id="example1" class="table table-bordered table-striped">';
                                    echo '      <thead>';
                                    echo '        <tr>';
                                    echo '          <th>Date</th>';
                                    echo '          <th>Cake Occasion</th>';
                                    echo '          <th>Order Status</th>';
                                    
                                    echo '        </tr>';
                                    echo '      </thead>';
                                    echo '      <tbody>';
                                    
                                    
                                         $ai = mysql_query("SELECT Count(`o_idnew`) FROM `order_list` WHERE `customer_ID`='$id'");
                                    
                                         $a1 = mysql_fetch_array($ai);
                                         $cnt=$a1[0];
                                         
                                         if($cnt!=0){
                                    
                                         $query1 = "SELECT `o_idnew`, `order_statusnew`, `d_datenew`, `branch_name`, `customer_ID` FROM `order_list` WHERE `customer_ID`='$id' order by `o_idnew` DESC";
                                         $r1 = @mysql_query($query1, $dbc); 
                                         while ($row1 = mysql_fetch_array($r1, MYSQL_ASSOC)) {
                                              $reserve[][] =  $row1;
                                         }
                                    
                                         for($i=0;$i<$cnt; $i++){
                                           $cake=$reserve[$i][0]['d_datenew'];
                                           $order=$reserve[$i][0]['o_idnew'];
                                           $theme=$reserve[$i][0]['customer_ID'];
                                    
                                    
                                           $qtl = mysql_query("SELECT `shirt_typenew`, `d_datenew` FROM  `cakechoices` WHERE `o_idnew`='$cake'");
                                           $t1 = mysql_fetch_array($qtl);
                                           $cake_name=$t1[0];
                                    
                                           $ddate1=strtotime($reserve[$i][0]['d_datenew']);
                                           $ddate=date("F j, Y",$ddate1 );
                                    
                                    echo '        <tr>';
                                    echo '          <td>'.$ddate.'</td>';
                                    echo '          <td>'.$theme.'</td>';

                                    echo '          <td>'.$reserve[$i][0]['order_status'].'</td>';    
                                    
                                    
                                    }
                                    }
                                      echo '<td>';?>
                                                  <form method=POST id="form5_<?php echo $i;?>" action="results.php">

                                                      <?php echo '<input type="hidden" name="o_idnew" value="' .$order. '" >';?>
                                                      <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                                      <?php echo'<input type="hidden" name="url" value="11" >'; ?>
                                                      <a href="#" onclick="confirm_pres4(<?php echo $i;?>)" class="btndashboard" style="background: #DD4B39;"> delete</a></td>

                                                    </form>




                                                    
                                                  <?php echo '</td>';?>

                                 <?php echo '<td>';?>
                                 <form method=POST id="form6_<?php echo $i;?>" action="results.php">
                                    <?php echo '<input type="hidden" name="o_idnew" value="' .$cake. '" >';?>
                                    <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                    <?php echo'<input type="hidden" name="url" value="16" >'; ?>
                                    <a href="customer-search" class="btndashboard editpres" style="background: #F39C12;"  data-cake="<?php echo $o_idnew; ?>" data-title="<?php echo $PT; ?>" data-desc="<?php echo $PD; ?>" data-toggle="modal" data-target=".edit-pres"> View</a></td>
                                 </form>
                                 <?php echo '</td>';?>

                                 
                                 <?php
                                    echo '</tr>';
                                    
                                     }else{
                                    
                                    }
                                    
                                    ?>
                                 </table>
                              </div>
                           </div>
                           <!--end of second col-->
                        </div>
                        <!-- div past id-->
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
      <label class="sr-only" for="form-am">Wedding Price</label>
      <input type="text" name="form-am" placeholder="price" class="form-am1 form-control" id="form-am">
      </div>                      
       <div class="form-group">
                                            <label class="sr-only" for="form-stat">Time Length</label>
                                                <select name="form-stat" class="dental-stat1 form-control" id="form-stat" style="margin:auto;">
                                                  <option value="downpayment">downpayment</option>
                                                  <option value="fullypaid">Fully paid</option>
                                                
                                              </select>   
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
         var answer = confirm("Are you sure you want to mark this service DEACTIVATE?")
             if (answer)
             {
               var mi='form2_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
         function confirm_pres3(mine) {
         var answer = confirm("Are you sure you want to mark this service ACTIVATE?")
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
         
                 $(".form-am1").val(am);
                 $(".form-stat1").val(stat);
                 $(".form-code1").val(code);
         
         
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
             "searching": false,
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