<?php
   include('../../server_one.php');
                session_start();   
                
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
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Price List</title>
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
      <!-- Date Picker -->
      <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
      <link rel="stylesheet" href="../../plugins/datepicker-inline/bootstrap-datepicker.css">
      <!--mediq queries of teeth-->
      <link rel="stylesheet" href="../../dist/css/child_teeth.css">
      <link rel="stylesheet" href="../../js-table/jquery.dataTables.min.css">
      <!---website icon-->
      <link rel="shortcut icon" href="../../images/ico/Title_myrnas1.png">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <!--=========================  PHP CODE =========================-->
   <?php
   
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
   <script type="text/javascript">
      function validateform1(){
        var a=document.forms["Form"]["form-treatment-name"].value;
        var b=document.forms["Form"]["form-treatment-cost"].value;
      
      if(a==null||a=="", b==null||b==""){
        alert("Please fill all required field");
        return false;
      }
      
      }
      
      function validateform2(){
        var a=document.forms["Form1"]["ptitle"].value;
        var b=document.forms["Form1"]["pdes"].value;
      
      if(a==null||a=="", b==null||b==""){
        alert("Please fill all required field");
        return false;
      }
      
      }
      
   </script>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="admin-user-secretary.php" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><img src="../../images/Title_myrnas1.jpg"></span>
               <!-- logo for regular state and mobile devices -->
               <p><?php echo $usrcompletename; ?><br><small style="color:gray;"></small></p>
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
                  <li class=" treeview">
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
                        <li ><a href="approved-orders.php"><i class="fa fa-circle-o"></i> Approve Orders</a></li>
                        <li class="active"><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                        <li ><a href="deliver-orders.php"><i class="fa fa-circle-o"></i> Deliver Orders</a></li>
                     </ul>
                  </li>
                  <li class=" treeview">
                     <a href="customer-files.php">
                     <i class="fa fa-files-o"></i><span>Customer Files</span>
                     </a>
                  </li>
                   <li class="treeview">
                     <a href="billing.php">
                     <i class="fa  fa-shopping-cart"></i><span>Delivered Orders</span>
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
                        <li><a href="forms/advanced.html"><i class="fa fa-circle-o"></i> Edit Cake Catalog</a></li>
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
                        <li class="active treeview">
                     <a href="system_log.php">
                     <i class="fa fa-users"></i><span>System Log</span>
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
               <h1></h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">System Log</li>
               </ol>
               <br>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="center col-lg-12">
                  <div class="box border">
                     <fieldset>
                     <div class="form-top" style="padding-bottom:0px;">
                        <div class="form-top-left">
                           <h3>Login Logs</h3>
                           <p>List of log details.</p>
                        </div>
                        <div class="form-top-right">
                           <i class="fa  fa-file-text-o"></i>
                        </div>
                     </div>
                     <div class="form-bottom">
                        <div class="box border" style="margin-top:10px; border-top: 3px solid #bd4a07">
                           <div class="box-header">
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                              <div class="table-responsive">
                                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                          
                                          <th>log ID</th>
                                          <th>Date and Time</th>
                                          <th>User </th>
                                          <th>Action</th>
                                          <th>ip</th>
                                        
                                       </tr>
                                    </thead>

                                    <?php    
                                         include('configuration.php');   $sql = "SELECT * FROM logs ORDER BY log_id ASC";
                $result = $conn->query($sql);
                                       
                                      if ($result->num_rows > 0) { // output data of each row?>
                           <tbody>
                               <?php  while($row = $result->fetch_assoc()) {
                               ?>
                                 
                                  <?php {                         //this form will display the set of pending applications
                                          
                                          echo'<tr>';
                                          echo '<td>' . $row['log_id'] . '</td>';
                                          echo '<td>' . $row['date'] . '</td>';
                                          echo '<td>' . $row['user'] . '</td>';
                                          echo '<td>' . $row['action'] . '</td>';
                                          echo '<td>' . $row['ip'] . '</td>';
                                      echo'</tr>';
                                      }
                                  ?>
                             
                          <?php   } //while statement
                          ?>
                                  
                                    </tbody>
                                 </table>
                     
                          <?php
                          }else {
                              echo "0 results";
                          }
                ?>
                              </div>
                           </div>
                        </div>
                        <!--End Advanced Tables -->
                     </div>
                  </div>
               </div>
         </div>
         <!-- /. PAGE INNER  -->
         </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      </div>
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



      <?php
         $get_info = mysql_query("SELECT fname, lname FROM customer where active = '2'");
         $info = mysql_fetch_array($get_info);
         $fname = $info['fname'];
         $lname = $info['lname'];
         ?>
      <!-- jQuery 2.1.4 -->
      <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="../../js/bootstrap.min.js"></script>
      <!-- Slimscroll -->
      <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="../../plugins/fastclick/fastclick.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/app.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <!-- DataTables -->
      <script src="assets/jquery-1.12.3.min.js"></script>    
      <script src="assets/jquery.dataTables.min.js"></script>   
      <script src="assets/js/jquery.metisMenu.js"></script>
      <script src="assets/dataTables.buttons.min.js"></script>
      <script src="assets/buttons.print.min.js"></script>
      <script src="assets/pdfmake.min.js"></script>
      <script src="assets/vfs_fonts.js"></script>
      <script src="assets/buttons.html5.min.js"></script>
      <script src="assets/assets/js/bootstrap.min.js"></script>
      <script src="assets/assets/js/dataTables/dataTables.bootstrap.js"></script>
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