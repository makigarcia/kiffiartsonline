<!DOCTYPE html>
<html>
   <head>
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
                  <li class="treeview">
                     <a href="dashboard.php">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                  </li>
                  <!--Account Information menu-->
                  <li class="active treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Orders</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                       <ul class="treeview-menu">
                        
                        <li class="active"><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
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
               <h1></h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Pending Orders</li>
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
                           <h3>Pending Orders</h3>
                           <p>List of customers.</p>
                        </div>
                        <div class="form-top-right">
                           <i class="fa  fa-file-text-o"></i>
                        </div>
                     </div>
                     <div class="form-bottom">
                        <ul class="nav nav-tabs" id="myTab" style="margin-top:20px;">
                           <li class="active"><a data-toggle="tab" href="#profile"><i class="fa fa-file-text"></i>&nbsp;New Design Orders</a></li>
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
                                                <th>Order Date</th>
          
                                                <th>Customer Name  </th>
                                                <th hidden>Shirt Order </th>
                                                <th>Amount</th>
                                                <th>Contact Number</th>
                                                <th>View</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <?php      $ai = mysql_query("SELECT Count(`o_idnew`) FROM `order_list`");
                                             $a1 = mysql_fetch_array($ai);
                                             $cnt=$a1[0];
                                             
                                             if($cnt!=0){
                                             
                                                   $query1 = "SELECT * FROM order_list ORDER BY `o_datenew` ASC";
                                                   $r1 = @mysql_query($query1, $dbc); 
                                                   while ($row1 = mysql_fetch_array($r1, MYSQL_ASSOC)) {
                                                        $reserve[][] =  $row1;
                                                   }
                                             
                                                   for($i=0;$i<$cnt; $i++){
                                                     $order=$reserve[$i][0]['o_idnew'];
                                                     $id=$reserve[$i][0]['customer_ID'];
                                                      
                                                         $qtl = mysql_query("SELECT o_idnew FROM  order_list WHERE o_idnew='$order'");
                                                     $t1 = mysql_fetch_array($qtl);
                                                     $o_idnew=$t1[0];
                                             
                                             
                                                     $query2 = "SELECT fname, lname, phone_num  FROM customer WHERE customer_ID='$id'";
                                                     $r2 = @mysql_query($query2, $dbc); 
                                                     $row2 = mysql_fetch_array($r2); 
                                                    
                                             
                                                     $row2['fname'] = ucwords($row2['fname']);
                                                     $row2['lname'] = ucwords($row2['lname']);
                                                     $row2['phone_num'] = ucwords($row2['phone_num']);
                                                     $usrcompletename2 = $row2['fname']." ".$row2['lname'];
                                                     $usrcompletename3 = $row2['phone_num'];
                                             
                                                     
                                                      if($reserve[$i][0]['order_statusnew']=="pending"){
                                                     $ddate1=strtotime($reserve[$i][0]['o_datenew']);
                                                     $ddate=date("F j, Y",$ddate1 );
                                             
                                                     echo '          <tr>';
                                                     echo '          <td>'.$date = $ddate.'</td>';
                                                     echo '          <td>'.$name = $usrcompletename2.'</td>';         
                                                     echo '          <td class="hidden">'.$tname = $o_idnew.'  cake</td>';
                                                     // echo '          <td>'.$diagnosis = $reserve[$i][0]['shirt_typenew'].'</td>';   
                                                     echo '          <td>'.$service = $reserve[$i][0]['pricenew'].'</td>';  
                                                     echo '          <td>'.$name = $usrcompletename3.'</td>';    ?>
                                          <td><a href="customer_search.php?order=<?php echo $order;?>"  class="btndashboard" style="background: #227da0;">view</a></td>
                                          <?php
                                             if($reserve[$i][0]['order_statusnew']=="pending"){
                                             ?>
                                          <?php echo '<td>';?>
                                          <form method=POST id="form2_<?php echo $i;?>" action="results.php">
                                             <?php echo '<input type="hidden" name="o_idnew" value="' .$o_idnew. '" >';?>
                                             <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                             <?php echo'<input type="hidden" name="url" value="20" >'; ?>
                                             <a href="#" onclick="confirm_pres1(<?php echo $i;?>)" class="btndashboard" style="background: #e48e35;"> confirm</a>
                                          </form>
                                          <?php echo '</td>';?>
                                          <?php
                                             }
                                             ?>
                                          <?php echo '<td>';?>
                                          <form method=POST id="form5_<?php echo $i;?>" action="results.php">
                                             <?php echo '<input type="hidden" name="o_idnew" value="' .$o_idnew. '" >';?>
                                             <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                             <?php echo'<input type="hidden" name="url" value="15" >'; ?>
                                             <a href="#" onclick="confirm_pres3(<?php echo $i;?>)" class="btndashboard" style="background: #DD4B39;"> delete</a>
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
                                    <div class="box-body">
                                       <div class="table-responsive">
                                          <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                             <thead>
                                                <tr>
                                                   <th class="hidden">Order Date</th>
                                                   <th>Order Date</th>
                                                   <th>Customer Name  </th>
                                                   <th hidden>Cake Order </th>
                                                   <th>Amount</th>
                                                   <th>Contact Number</th>
                                                   <th>View</th>
                                                   <th>Action</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <?php      $ai = mysql_query("SELECT Count(`orderrmd_id`) FROM `rmd_orderlist`");
                                                $a1 = mysql_fetch_array($ai);
                                                $cnt=$a1[0];
                                                
                                                if($cnt!=0){
                                                
                                                $query1 = "SELECT * FROM rmd_orderlist ORDER BY `o_date` ASC";
                                                   $r1 = @mysql_query($query1, $dbc); 
                                                while ($row1 = mysql_fetch_array($r1, MYSQL_ASSOC)) {
                                                 $reserves[][] =  $row1;
                                                }
                                                
                                                for($c=0;$c<$cnt; $c++){
                                                $orderrmd_id=$reserves[$c][0]['orderrmd_id'];
                                                $id1=$reserves[$c][0]['customer_ID'];
                                                
                                                 $qtl = mysql_query("SELECT orderrmd_id FROM  rmd_orderlist WHERE orderrmd_id='$orderrmd_id'");
                                                $t1 = mysql_fetch_array($qtl);
                                                $orderrmd_id=$t1[0];
                                                
                                                
                                                $query3= "SELECT fname  FROM customer WHERE customer_ID='$id1'";
                                                $r3 = @mysql_query($query3, $dbc); 
                                                $row4 = mysql_fetch_array($r3); 
                                                
                                                $row4['fname'] = ucwords($row4['fname']);
                                                $query7= "SELECT phone_num  FROM customer WHERE customer_ID='$id1'";
                                                $r7 = @mysql_query($query7, $dbc); 
                                                $row7 = mysql_fetch_array($r7); 
                                                
                                                
                                                $row7['phone_num'] = ucwords($row7['phone_num']);
                                                $query5= "SELECT lname  FROM customer WHERE customer_ID='$id1'";
                                                $r5 = @mysql_query($query5, $dbc); 
                                                $row5 = mysql_fetch_array($r5); 
                                                
                                                $row5['lname'] = ucwords($row5['lname']);
                                                $usrcompletename4 = $row4['fname']." ".$row5['lname'];
                                                $num = $row7['phone_num'];
                                                
                                                if($reserves[$c][0]['status']=="pending"){
                                                $ddate1=strtotime($reserves[$c][0]['o_date']);
                                                                    $ddate=date("F j, Y",$ddate1 );
                                                 
                                                      echo '          <tr>';
                                                      echo '          <td>'.$date = $ddate.'</td>';
                                                      echo '          <td>'.$name = $usrcompletename4.'</td>';         
                                                      echo '          <td class="hidden">'.$tname = $orderrmd_id.'  cake</td>';
                                                      // echo '          <td>'.$diagnosis = $reserves[$c][0]['design_code'].'</td>';   
                                                      echo '          <td>'.$service = $reserves[$c][0]['shirt_price'].'</td>';  
                                                      echo '          <td>'.$name = $num.'</td>';    ?>
                                             <td><a href="readymade_search.php?orderrmd_id=<?php echo $orderrmd_id;?>"  class="btndashboard" style="background: #227da0;">view</a></td>
                                             <?php
                                                if($reserves[$c][0]['status']=="pending"){
                                                ?>
                                             <?php echo '<td>';?>
                                             <form method=POST id="form2_<?php echo $c;?>" action="results.php">
                                                <?php echo '<input type="hidden" name="orderrmd_id" value="' .$orderrmd_id. '" >';?>
                                                <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                                <?php echo'<input type="hidden" name="url" value="31" >'; ?>
                                                <a href="#" onclick="confirm_pres1(<?php echo $c;?>)" class="btndashboard" style="background: #e48e35;"> confirm</a>
                                             </form>
                                             <?php echo '</td>';?>
                                             <?php
                                                }
                                                ?>
                                             <?php echo '<td>';?>
                                             <form method=POST id="form5_<?php echo $c;?>" action="results.php">
                                                <?php echo '<input type="hidden" name="orderrmd_id" value="' .$orderrmd_id. '" >';?>
                                                <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                                <?php echo'<input type="hidden" name="url" value="39" >'; ?>
                                                <a href="#" onclick="confirm_pres3(<?php echo $c;?>)" class="btndashboard" style="background: #DD4B39;"> delete</a>
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
                                 <!--End Advanced Tables -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /. PAGE INNER  -->
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
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
         var answer = confirm("Are you sure you want to mark this service as pending?")
             if (answer)
             {
               var mi='form3_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         function confirm_pres3(mine) {
         var answer = confirm("Are you sure you want to Delete this order?")
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
         $(function () {
           $("#dataTables-example2").DataTable();
           $('#example3').DataTable({
             "paging": true,
             "lengthChange": true,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false
           });
         });
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