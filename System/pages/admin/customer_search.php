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
                  <li class=" treeview">
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
                        <li ><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                        <li ><a href="deliver-orders.php"><i class="fa fa-circle-o"></i> Confirmed Orders</a></li>
                        <li ><a href="approved-orders.php"><i class="fa fa-circle-o"></i> Approved Orders</a></li>
                     </ul>
                  </li>
                  <li class=" treeview">
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
                     <i class="fa fa-edit"></i> <span>Manage Ready-Made Designs</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="readymade-designs.php"><i class="fa fa-circle-o"></i> Add Ready-Made Design</a></li>
                        <li><a href="forms/advanced.html"><i class="fa fa-circle-o"></i> Edit Ready-Made Design</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="report_list.php">
                     <i class="fa fa-file-text-o"></i><span>Report</span>
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
                  <li class="active">Billing</li>
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
                           <?php
                              include('configuration.php');
                              
                              $sql = "SELECT  * FROM order_list ORDER BY o_idnew ASC";
                              $result = $conn->query($sql);
                              ?>
                           <?php
                              if(!empty($_GET['order'])){ //search information for temporary / confirmed reviewee
                                 $value = ($_GET['order']);
                                 //echo 'id is ---> ' . $value;
                                 $search_reviewee = mysql_query("SELECT * FROM order_list where o_idnew = '$value'");
                                 $rowa = mysql_fetch_array($search_reviewee); 
                                 // $picture = $rowa['picture'];
                              $customer_ID = $rowa['customer_ID'];
                              
                                  $query3 = "SELECT fname, lname, phone_num  FROM customer WHERE customer_ID='$customer_ID'";
                                  $r3 = @mysql_query($query3, $dbc); 
                                  $row3 = mysql_fetch_array($r3); 
                              
                              
                                  $row3['fname'] = ucwords($row3['fname']);
                                  $row3['lname'] = ucwords($row3['lname']);
                                  $row3['phone_num'] = ucwords($row3['phone_num']);
                                  $usrcompletename3 = $row3['fname']." ".$row3['lname'];
                                  $num = $row3['phone_num'];
                              
                                 ?>
                           <h3><?php echo $name = $usrcompletename3;?>'s order  </p> </h3>
                           <?php } ?>
                           <p>Contact Information: <?php echo $name = $num;?></p>
                        </div>
                        <div class="form-top-right">
                           <i class="fa  fa-file-text-o"></i>
                        </div>
                     </div>
                     <div class="form-bottom">
                        <div class="box-body">
                           <?php
                              include('configuration.php');
                              
                              $sql = "SELECT  * FROM order_list ORDER BY o_idnew ASC";
                              $result = $conn->query($sql);
                              ?>
                           <?php
                              if(!empty($_GET['order'])){ //search information for temporary / confirmed reviewee
                                 $value = ($_GET['order']);
                                 //echo 'id is ---> ' . $value;
                                 $search_reviewee = mysql_query("SELECT * FROM order_list where o_idnew = '$value'");
                                 $rowa = mysql_fetch_assoc($search_reviewee); 
                                 // $picture = $rowa['picture'];
                                 $o_idnew= $rowa['o_idnew'];
                                 $CP= $rowa['cake_price'];
                              
                              
                              
                                  $query3 = "SELECT fname, lname  FROM customer WHERE customer_ID='$value'";
                                  $r3 = @mysql_query($query3, $dbc); 
                                  $row3 = mysql_fetch_array($r3); 
                              
                                   $query5 = "SELECT lname  FROM customer WHERE customer_ID='$value'";
                                  $r5 = @mysql_query($query5, $dbc); 
                                  $row5 = mysql_fetch_array($r5); 
                              
                              
                              
                                  $row3['fname'] = ucwords($row3['fname']);
                                  $row5['lname'] = ucwords($row5['lname']);
                                  $usrcompletename3 = $row3['fname']." ".$row5['lname'];
                              
                                 ?>
                           <div class="row">
                              <div class="container contactform center">
                                 <div class="sectionprof">
                                    <div class="col-sm-10">
                                       <h4><i class="fa  fa-file-text-o"></i> Shirt Details </h4>
                                       <p> <label>Order ID</label> : <?php echo $rowa['o_idnew'];?> </p>
                                       <p> <label>Shirt Type</label> : <?php echo $rowa['shirt_typenew'];?> </p>
                                       <!-- <p> <label>Cake Shape and Size</label> : <?php echo $rowa['cake_shape'];?> <?php echo $rowa['cake_size'];?> </p>
                                       <p> <label>Cake Layer/s</label> : <?php echo $rowa['cake_layer'];?> </p>
                                       <p> <label>Cake Frost Type</label> : <?php echo $rowa['cake_frost'];?> </p> -->
                                       <p> <label>Shirt Color</label> : <?php echo $rowa['cake_coat_color'];?> </p>
                                       <!-- <p> <label>Cake Flavor</label> : <?php echo $rowa['cake_flavor'];?> </p>
                                       <p> <label>Cake Designs</label> : <?php echo $rowa['candle_selection'];?>  , <?php echo $rowa['figurine_other'];?>  </p>
                                       <p> <label>Dedication Text</label> : <?php echo $rowa['dedicationT'];?> </p> -->
                                       <p> <label>Quantity</label> : <?php echo $rowa['cake_quant'];?> </p>
                                       <p> <label>Other Concerns</label> : <?php echo $rowa['other_concerns'];?> </p>
                                       <p> <label>Amount</label> : <?php echo $rowa['cake_price'];?>  
                                       <!--form method=POST id="form4_<?php echo $i;?>" action="secretary-prescription.php">
                                          <?php echo '<input type="hidden" name="o_idnew" value="' .$value. '" >';?>
                                          <a href="#" class="btndashboard edittreat" 
                                             data-am="<?php echo $CP; ?>" 
                                             data-code="<?php echo $o_idnew; ?>"
                                             style="background: #d67c20;" data-toggle="modal" data-target=".edit-treat"> update amount</a></td>
                                       </form-->
                                       </p>
                                       <br>
                                       <h4><i class="fa fa-money"></i> Payment Details </h4>
                                       <p> <label>Payment Amount</label> : <?php echo $rowa['payment_amount'];?>  </p>
                                       <p> <label>Payment Status</label> : <?php echo $rowa['payment_status'];?>  </p>
                                       <br>
                                       <h4><i class="fa fa-shopping-cart"></i> Service Details </h4>
                                       <p> <label>Service Time</label> : <?php echo $rowa['cake_time'];?> </p>
                                       <p> <label>Service Date</label> : <?php echo $rowa['cake_duedate'];?> </p>
                                       <p> <label>Pick-Up Info</label> : <?php echo $rowa['branch_name'];?>  </p>
                                       <p> <label>Delivery Venue</label> : <?php echo $rowa['del_venue'];?>  </p>
                                       <p> <label>Driver Name:</label> : <?php echo $rowa['driver_name'];?>  </p>
                                       <p> <label>Plate Number </label> : <?php echo $rowa['plate_num'];?>  </p>
                                    </div>
                                 </div>
                                 <br>
                                 <br>
                                 <div class="sectionact">
                                    <div class="col-md-12" >
                                       <center><label class="control-label"> DISPLAY THE IMAGE OF SHIRT </label></center>
                                       <br>
                                      <?php 

    $link = mysql_connect('localhost', 'root', '');
    mysql_select_db("kiffiarts", $link);

    $query="SELECT canvas FROM order_list WHERE  o_idnew = '$value'";
    $myData = @mysql_query($query, $link);

    date_default_timezone_set("Asia/Manila");

    while($rowa=mysql_fetch_array($myData)){ 



   echo "<img src='".$rowa['canvas']."' />";

   } ?> 
                                    </div>
                                 </div>
                              </div>
                              <center> <a class="btn btn-primary" href="pending-orders.php"><i class="fa fa-arrow-left "></i> BACK </a>
                                 <button onclick="myFunction()" ><i class = "btn btn-info">Print Customer Order</i></button>
                              </center>
                           </div>
                        </div>
                        <!-- 2nd column -->
                     </div>
                  </div>
                  <?php }
                     else if(!empty($_GET['r_order'])){ //search information for dropped reviewee
                           $value = ($_GET['r_order']);
                           //echo 'id is ---> ' . $value;
                           $search_reviewee = mysql_query("SELECT * from order_list where o_idnew = '$value'");
                           $rowa = mysql_fetch_assoc($search_reviewee); 
                           $picture = $rowa['picture'];
                     
                     
                     
                           $action = 'Searched for applicant number ' . $value;
                     
                     
                           ?>
                  <div class='spacing-30'></div>
                  <div class = 'success-title-l'> <?php echo $rowa['shirt_typenew'] .' ' .$rowa['shirt_typenew']; ?> 's Information</div>
                  <div class = 'spacing-40'> </div>
                  <div class='form-wrapper'>
                     <!-- ***********Personal Information ************ -->
                     <div class='box-title'><span>Personal Information</span></div>
                     <div class = 'spacing-30'> </div>
                     <div class="one-fourth first">
                        <img src="<?php echo "$picture"; ?>" alt="" class="profile-pic">
                     </div>
                     <div class= 'success-msg colored'><span>Name: </span> <?php echo $rowa['shirt_typenew']  . '  ' .$rowa['shirt_typenew']; ?></div>
                     <div class= 'success-msg'><span>ID Number: </span> <?php echo $selected; ?> </div>
                     <div class= 'success-msg colored'><span>Birthdate: </span> <?php echo $rowa['shirt_typenew']; ?> </div>
                     <!-- *************Contact Information*************** -->
                     <div class = 'spacing-30'> </div>
                     <div class='box-title'><span>Contact Information</span></div>
                     <div class = 'spacing-30'> </div>
                     <div class= 'success-msg colored'><span>Address: </span> <?php echo $rowa['shirt_typenew']; ?></div>
                     <div class= 'success-msg'><span>Email: </span> <?php echo $rowa['shirt_typenew']; ?></div>
                     <div class= 'success-msg colored'><span>Telephone: </span> <?php echo $rowa['shirt_typenew']; ?> </div>
                     <!-- *************** Tertiary School *************** -->
                     <div class = 'spacing-30'> </div>
                     <div class='box-title'><span>Tertiary School Information</span></div>
                     <div class = 'spacing-30'> </div>
                     <div class= 'success-msg colored'><span>School Graduated: </span> <?php echo $rowa['shirt_typenew']; ?></div>
                     <div class= 'success-msg'><span>Year Graduated: </span> <?php echo $rowa['shirt_typenew']; ?></div>
                     <div class = 'spacing-40'> </div>
                     <div class="customed-form form-wrapper button-container" style="text-align:center">
                        <form name="frmUser" action="" method="post">
                           <a href="report_dropped.php" class = "btn btn-info"  >Back</a>
                           <input type="button" name="update" value="undo drop"  id="onUpdate" class="btn btn-info"/>
                           <input type="hidden" name="dropped_reviewee" value="<?php echo $value; ?>"/>
                        </form>
                        <div class = 'spacing-20'> </div>
                     </div>
                     <?php }else{
                        echo "<b>Please Select Atleast One Option.</b>";
                        }
                        //}//else submitted
                        ?>
                     <!--End Advanced Tables -->
                  </div>
               </div>
         </div>
      </div>
      <div class="modal fade edit-treat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;"> Update Cake Price</h4>
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
      <?php echo'<input type="hidden" name="url" value="34" >'; ?>
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
      <!-- /. PAGE INNER  -->
      </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      </div>
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
         function myFunction() {
             window.print();
         }
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