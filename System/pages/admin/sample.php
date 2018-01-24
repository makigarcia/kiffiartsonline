<!DOCTYPE html>
<html>
   <head>
     <?php
      include('../../server_one.php');
                session_start();   
                $usern=$_SESSION['usern'];

                $query1 = "SELECT FirstName, MiddleName, LastName FROM admin WHERE admin_id='$usern'";
                 $r1 = @mysql_query($query1, $dbc); 
                 $row1 = mysql_fetch_array($r1); 
         
         
                 $row1['FirstName'] = ucwords($row1['FirstName']);
                 $row1['MiddleName'] = ucwords($row1['MiddleName']);
                 $row1['LastName'] = ucwords($row1['LastName']);
                 $row1['MiddleName'] = substr($row1['MiddleName'], 0, 1);
                 $firstname = $row1['FirstName'];
      
      
                $usrcompletename = $row1['FirstName'];
              
      
      
      
                $_SESSION['usern']=$usern; 
                
      
      
        ?>
      <script src="../../plugins/datepicker-inline/bootstrap-datepicker.js"></script>
      <script src="../../plugins/datepicker-inline/main.js"></script>
      <script>
         $(function(){
         $.noConflict();  //Not to conflict with other scripts
         $.widget.bridge('uibutton', $.ui.button);
         $.fn.modal.Constructor.DEFAULTS.keyboard = true;
         
         
         var nowDate = new Date();
         var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0, 0);
         
         
         loadpage();
         
         
         $('#datepicker').datepicker("setDate",today).on('changeDate',function(e){
         
         fetchdate(e);
         });  // end of changedate-datepicker
         
         
         });
         
         function fetchdate(e) {
          var getdate = e.format("yyyy-mm-dd");
          var usern='<?php echo $usern?>';
                    $.ajax({
                      type: "POST",
                      url: "dbgetdate.php",
                      data: {getdate,usern},
                      cache: false,
                      beforeSend: function() {
                         $('#dboard').html('loading please wait...');
                      },
                      success: function(htmldata) {
                         $('#dboard').html(htmldata);
                      }
                    });
         
                  }   // end of function fetchdate(e)
         
         
      </script>
      <script>
         function loadpage(){
         var usern='<?php echo $usern?>';
         /*var now = new Date();
         var curr_year = now.getFullYear();
         var curr_Month = now.getMonth();
         var curr_date = now.getDate();
         var todayDate = (curr_year + "-" + (curr_Month + 1) + "-" + curr_date);*/
         var todayDate='<?php echo $date?>';
         
           $.post( "dbgetdate.php", { usern:usern, getdate: todayDate}).done(function( data )  {
             $( "#dboard" ).html( data );
           });
         
         }
         
      </script>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Myrna's Admin</title>
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
      <!-- iCheck -->
      <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
      <link rel="stylesheet" href="../../plugins/morris/morris.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <!-- Date Picker -->
      <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
      <link rel="stylesheet" href="../../plugins/datepicker-inline/bootstrap-datepicker.css">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <!---website icon-->
      <link rel="shortcut icon" href="../../images/Title_myrnas1.png">
      <link rel="stylesheet" type="text/css" id="theme" href="../../assets/css/theme-default.css"/>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <!--====================== PHP File ========================-->
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="../../dashboard.php" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><img src="../../images/Title_myrnas1.png"></span>
               <!-- logo for regular state and mobile devices -->
               <p><?php echo $usrcompletename; ?><br><small style="color:gray;"></small></p>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
               <span class="sr-only">Toggle navigation</span>
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
                     <img src="../../images/Title_myrnas1.png" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info" style="line-height: 17px; padding-top: 10px;">
                  </div>
               </div>
               <!-- search form -->
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu">
                  <li class="header">MAIN NAVIGATION</li>
                  <!--Dashboard menu-->
                  <li class="active treeview">
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
                        <li><a href="approved-orders.php"><i class="fa fa-circle-o"></i> Approve Orders</a></li>
                        <li><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                        <li><a href="deliver-orders.php"><i class="fa fa-circle-o"></i> Deliver Orders</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="customer-files.php">
                     <i class="fa fa-files-o"></i><span>Customer Files</span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="billing.php">
                     <i class="fa fa-usd"></i><span>Billing and Delivery</span>
                     </a>  
                  </li>
                  <li class="treeview">
                     <a href="pricelist.php">
                     <i class="fa fa-user-md"></i><span>Price List</span>
                     </a>  
                  </li>
                  <li class=" treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Cake Catalog</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="cake-catalog.php"><i class="fa fa-circle-o"></i> Add Cake Catalog</a></li>
                        <li><a href="edit-cakecatalog.php"><i class="fa fa-circle-o"></i> Edit Cake Catalog</a></li>
                     </ul>
                  </li>
               </ul>
            </section>
            <!-- /.sidebar -->
         </aside>
         <!-- Main content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>
                  Dashboard
                  <small>Control panel</small>
               </h1>
            </section>
            <!-- Main content -->
            <section class="content">

             <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="modal-body">

                        <div class="container contactform center">
                          <h2 class="text-center  wowload fadeInUp">REGISTRATION</h2>
                            <form action="myrnas_registrationresults.php" method="POST">
                            


                          <button class="btn btn-primary" type="submit"><i class="fa fa-user"></i> Register </button>
                              </div>
                            </form>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
               <!-- Small boxes (Stat box) -->
               <div class="row">
                  <div class="col-lg-3 col-xs-6" href="#portfolioModal1"  class="portfolio-link" data-toggle="modal">
                     <!-- small box -->
                     <div class="small-box bg-yellow">
                        <div class="inner">
                           <h3>44</h3>
                           <p>Pending Orders</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-xs-6" href="#portfolioModal2"  class="portfolio-link" data-toggle="modal">
                     <!-- small box -->
                     <div class="small-box bg-aqua">
                        <div class="inner">
                           <h3>150</h3>
                           <p>Deliver Orders</p>
                        </div>
                        <div class="icon">
                           <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-xs-6" href="#portfolioModal3"  class="portfolio-link" data-toggle="modal">
                     <!-- small box -->
                     <div class="small-box bg-red">
                        <div class="inner">
                           <h3>65</h3>
                           <p>Approved Orders</p>
                        </div>
                        <div class="icon">
                           <i class="fa fa-check-square"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                     </div>
                  </div>
                  <!-- ./col -->
               </div>
               <!-- /.row -->
               <div class="form-bottom" id="dboard">
               </div>
               <!-- form bottom -->
               </fieldset>
         </div>
      </div>
      </section> <!-- /.section content -->
      </div><!-- /.content-wrapper -->
      </div>
      <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
               <i class="fa fa-times"></i> 
               <div class="lr">
                  <div class="rl">
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Pending Orders</h3>
                        </div>
                         <div class="col-lg-12" style="margin-top: 10px;">
                        <div class="box border" style="border-top: 3px solid #a96d24;">
                           <div class="box-header"><b>List of Cake and Services</b></div>
                           <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                 <th>Customer_ID</th>
                                 <th>Customer Name</th>
                                 <th>Contact Number</th>
                                 <th>Status</th>
                                 <th></th>
                                 <th></th>
                                 </tr>
                                 <?php
                                    $bi = mysql_query("SELECT Count(`customer_ID`) FROM `customer`");
                                    $b1 = mysql_fetch_array($bi);
                                    $b1=$b1[0];
                                    
                                    
                                    $query3 = "SELECT `customer_ID`, `fname`, `phone_num`, `status` FROM `customer`";
                                    $r3 = @mysql_query($query3, $dbc); 
                                    while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
                                        $storeArray2[][] =  $row3;
                                    }
                                    
                                    for($c=0;  $c<$b1;$c++){
                                      $customer_ID=$storeArray2[$c][0]['customer_ID'];
                                      $fname = $storeArray2[$c][0]['fname'];
                                    
                                      $phone_num = $storeArray2[$c][0]['phone_num'];
                                    
                                         echo '<tr>';
                                        
                                         echo '<td>'.$storeArray2[$c][0]['customer_ID'].'</td>';
                                    
                                         echo '<td>'.$storeArray2[$c][0]['fname'].'  </td>';
                                         echo '<td>'.$storeArray2[$c][0]['phone_num'].'</td>';
                                         echo '<td>'.$storeArray2[$c][0]['status'].'</td>';
                                    
                                        
                                    ?>
                                 <?php
                                    if($storeArray2[$c][0]['status']=="CONFIRMED"){
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form2_<?php echo $c;?>" action="results.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                    <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                    <?php echo'<input type="hidden" name="url" value="13" >'; ?>
                                    <a href="#" onclick="confirm_pres1(<?php echo $c;?>)" class="btndashboard" style="background: #DD4B39;"> Confirmed</a></td>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    }else{
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form3_<?php echo $c;?>" action="results.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                    <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                    <?php echo'<input type="hidden" name="url" value="14" >'; ?>
                                    <a href="#" onclick="confirm_pres2(<?php echo $c;?>)" class="btndashboard" style="background: #00A65A;"> Confirm</a></td>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    }
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form4_<?php echo $c;?>" action="pricelist.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    echo '<td></td>';
                                    echo '</tr>';                                            
                                    
                                    }
                                    
                                    ?>
                              </table>
                           </div>
                        </div>
                  </div>
                     </div>



                  </div>
               </div>
            </div>
         </div>
      </div>
         <!-- END PAGE CONTENT -->


          <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
               <i class="fa fa-times"></i> 
               <div class="lr">
                  <div class="rl">
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Pending Orders</h3>
                        </div>
                        <div class="col-lg-12" style="margin-top: 10px;">
                        <div class="box border" style="border-top: 3px solid #a96d24;">
                           <div class="box-header"><b>List of Cake and Services</b></div>
                           <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                 <th>Customer_ID</th>
                                 <th>Customer Name</th>
                                 <th>Contact Number</th>
                                 <th>Status</th>
                                 <th></th>
                                 <th></th>
                                 </tr>
                                 <?php
                                    $bi = mysql_query("SELECT Count(`customer_ID`) FROM `customer`");
                                    $b1 = mysql_fetch_array($bi);
                                    $b1=$b1[0];
                                    
                                    
                                    $query3 = "SELECT `customer_ID`, `fname`, `phone_num`, `status` FROM `customer`";
                                    $r3 = @mysql_query($query3, $dbc); 
                                    while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
                                        $storeArray2[][] =  $row3;
                                    }
                                    
                                    for($c=0;  $c<$b1;$c++){
                                      $customer_ID=$storeArray2[$c][0]['customer_ID'];
                                      $fname = $storeArray2[$c][0]['fname'];
                                    
                                      $phone_num = $storeArray2[$c][0]['phone_num'];
                                    
                                         echo '<tr>';
                                        
                                         echo '<td>'.$storeArray2[$c][0]['customer_ID'].'</td>';
                                    
                                         echo '<td>'.$storeArray2[$c][0]['fname'].'  </td>';
                                         echo '<td>'.$storeArray2[$c][0]['phone_num'].'</td>';
                                         echo '<td>'.$storeArray2[$c][0]['status'].'</td>';
                                    
                                        
                                    ?>
                                 <?php
                                    if($storeArray2[$c][0]['status']=="CONFIRMED"){
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form2_<?php echo $c;?>" action="results.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                    <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                    <?php echo'<input type="hidden" name="url" value="13" >'; ?>
                                    <a href="#" onclick="confirm_pres1(<?php echo $c;?>)" class="btndashboard" style="background: #DD4B39;"> Confirmed</a></td>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    }else{
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form3_<?php echo $c;?>" action="results.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                    <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                    <?php echo'<input type="hidden" name="url" value="14" >'; ?>
                                    <a href="#" onclick="confirm_pres2(<?php echo $c;?>)" class="btndashboard" style="background: #00A65A;"> Confirm</a></td>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    }
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form4_<?php echo $c;?>" action="pricelist.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    echo '<td></td>';
                                    echo '</tr>';                                            
                                    
                                    }
                                    
                                    ?>
                              </table>
                           </div>
                        </div>
                  </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


 <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
               <i class="fa fa-times"></i> 
               <div class="lr">
                  <div class="rl">
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3 class="panel-title">Pending Orders</h3>
                        </div>
                         <div class="col-lg-12" style="margin-top: 10px;">
                        <div class="box border" style="border-top: 3px solid #a96d24;">
                           <div class="box-header"><b>List of Cake and Services</b></div>
                           <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                 <th>Customer_ID</th>
                                 <th>Customer Name</th>
                                 <th>Contact Number</th>
                                 <th>Status</th>
                                 <th></th>
                                 <th></th>
                                 </tr>
                                 <?php
                                    $bi = mysql_query("SELECT Count(`customer_ID`) FROM `customer`");
                                    $b1 = mysql_fetch_array($bi);
                                    $b1=$b1[0];
                                    
                                    
                                    $query3 = "SELECT `customer_ID`, `fname`, `phone_num`, `status` FROM `customer`";
                                    $r3 = @mysql_query($query3, $dbc); 
                                    while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
                                        $storeArray2[][] =  $row3;
                                    }
                                    
                                    for($c=0;  $c<$b1;$c++){
                                      $customer_ID=$storeArray2[$c][0]['customer_ID'];
                                      $fname = $storeArray2[$c][0]['fname'];
                                    
                                      $phone_num = $storeArray2[$c][0]['phone_num'];
                                    
                                         echo '<tr>';
                                        
                                         echo '<td>'.$storeArray2[$c][0]['customer_ID'].'</td>';
                                    
                                         echo '<td>'.$storeArray2[$c][0]['fname'].'  </td>';
                                         echo '<td>'.$storeArray2[$c][0]['phone_num'].'</td>';
                                         echo '<td>'.$storeArray2[$c][0]['status'].'</td>';
                                    
                                        
                                    ?>
                                 <?php
                                    if($storeArray2[$c][0]['status']=="CONFIRMED"){
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form2_<?php echo $c;?>" action="results.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                    <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                    <?php echo'<input type="hidden" name="url" value="13" >'; ?>
                                    <a href="#" onclick="confirm_pres1(<?php echo $c;?>)" class="btndashboard" style="background: #DD4B39;"> Confirmed</a></td>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    }else{
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form3_<?php echo $c;?>" action="results.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                    <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                    <?php echo'<input type="hidden" name="url" value="14" >'; ?>
                                    <a href="#" onclick="confirm_pres2(<?php echo $c;?>)" class="btndashboard" style="background: #00A65A;"> Confirm</a></td>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    }
                                    ?>
                                 <?php echo '<td>';?>
                                 <form method=POST id="form4_<?php echo $c;?>" action="pricelist.php">
                                    <?php echo '<input type="hidden" name="tcode" value="' .$customer_ID. '" >';?>
                                 </form>
                                 <?php echo '</td>';?>
                                 <?php
                                    echo '<td></td>';
                                    echo '</tr>';                                            
                                    
                                    }
                                    
                                    ?>
                              </table>
                           </div>
                        </div>
                  </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


      </div>
      </div>
      <!-- MESSAGE BOX-->
      <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
         <div class="mb-container">
            <div class="mb-middle">
               <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
               <div class="mb-content">
                  <p>Are you sure you want to remove this row?</p>
                  <p>Press Yes if you sure.</p>
               </div>
               <div class="mb-footer">
                  <div class="pull-right">
                     <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
                     <button class="btn btn-default btn-lg mb-control-close">No</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- END MESSAGE BOX-->
      <!-- jQuery 2.1.4 -->
      <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="../../js/bootstrap.min.js"></script>
      <!-- Sparkline -->
      <script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="../../plugins/knob/jquery.knob.js"></script>
      <!-- daterangepicker -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
      <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
      <!-- datepicker -->
      <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
      <!-- Slimscroll -->
      <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="../../plugins/fastclick/fastclick.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/app.min.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="../../dist/js/pages/dashboard.js"></script>
      <script src="../../js/jquery.js"></script>
      <script src="../../js/signup.js"></script>
   </body>
</html>