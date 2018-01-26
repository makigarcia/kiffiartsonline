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
   <!-- <script type="text/javascript">
      function validateform1(){
        var a=document.forms["Form"]["form-code"].value;
        var b=document.forms["Form"]["form-shape"].value;
        \
      
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
       -->
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="../../dashboard.php" class="logo">
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
                  <li class="active treeview">
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
                 
               </ol>
               <br>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="center col-lg-11">
                  <div class="box border">
                     <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h2 class="page-header">Pricelist for New Design Shirts</h2>
            </div>

            <center><div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="shirt_price.php">
                    <img class="img-responsive" src="uploads/shirtprice.jpg" alt="">
                </a>
            </div></center>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="printtype_price.php">
                    <img class="img-responsive" src="uploads/typeofprintprice.jpg" alt="">
                </a>
            </div>


            <!-- <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="shape_price.php">
                    <img class="img-responsive" src="uploads/s1.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="frost_type.php">
                    <img class="img-responsive"  src="uploads/frost.png" alt="">
                </a>
            </div> -->
            
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </footer>

    </div>
      </div>
      <!-- ** EDIT TREATMENT-->
      <div class="modal fade edit-treat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Edit Treatment</h4>
      </div>
      <div class="modal-body">
      <!-- content goes here -->
      <p style="text-align:center">Please fill out the fields. </p>
      <form method="post" action="results.php" id="form4_<?php echo $c;?>">
      <label class="sr-only" for="form-code">price ID</label>
      <input type="hidden" name="form-code" placeholder="Treatment Code" class="form-code1 form-control" id="form-code">
      <div class="form-group">
      <label class="sr-only" for="form-one">Wedding Price</label>
      <input type="text" name="form-one" placeholder="price" class="form-one1 form-control" id="form-one">
      </div>                      
      <?php echo'<input type="hidden" name="url" value="23" >'; ?>
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
      <!-- ** EDIT TREATMENT-->
      <div class="modal fade edit-treat1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Edit Treatment</h4>
      </div>
      <div class="modal-body">
      <!-- content goes here -->
      <p style="text-align:center">Please fill out the fields. </p>
      <form method="post" action="results.php" id="form5_<?php echo $c;?>">
      <label class="sr-only" for="form-code">price ID</label>
      <input type="hidden" name="form-code" placeholder="Treatment Code" class="form-code1 form-control" id="form-code">
      <div class="form-group">
      <label class="sr-only" for="form-two">Wedding Price</label>
      <input type="text" name="form-two" placeholder="price" class="form-two1 form-control" id="form-two">
      </div>                      
      <?php echo'<input type="hidden" name="url" value="24" >'; ?>
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
      <div class="modal fade edit-treat2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Edit Treatment</h4>
      </div>
      <div class="modal-body">
      <!-- content goes here -->
      <p style="text-align:center">Please fill out the fields. </p>
      <form method="post" action="results.php" id="form6_<?php echo $c;?>">
      <label class="sr-only" for="form-code">price ID</label>
      <input type="hidden" name="form-code" placeholder="Treatment Code" class="form-code1 form-control" id="form-code">
      <div class="form-group">
      <label class="sr-only" for="form-three">Wedding Price</label>
      <input type="text" name="form-three" placeholder="price" class="form-three1 form-control" id="form-three">
      </div>                      
      <?php echo'<input type="hidden" name="url" value="25" >'; ?>
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
      <div class="modal fade edit-treat3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Edit Treatment</h4>
      </div>
      <div class="modal-body">
      <!-- content goes here -->
      <p style="text-align:center">Please fill out the fields. </p>
      <form method="post" action="results.php" id="form7_<?php echo $c;?>">
      <label class="sr-only" for="form-code">price ID</label>
      <input type="hidden" name="form-code" placeholder="Treatment Code" class="form-code1 form-control" id="form-code">
      <div class="form-group">
      <label class="sr-only" for="form-four">Wedding Price</label>
      <input type="text" name="form-four" placeholder="price" class="form-four1 form-control" id="form-four">
      </div>                      
      <?php echo'<input type="hidden" name="url" value="25" >'; ?>
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
      </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- jQuery 2.1.4 -->
      <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="../../js/bootstrap.min.js"></script>
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
         var answer = confirm("Are you sure you want to mark this service as Unavailable?")
             if (answer)
             {
               var mi='form2_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
         function confirm_pres2(mine) {
         var answer = confirm("Are you sure you want to mark this service as Available?")
             if (answer)
             {
               var mi='form3_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         function confirm_pres3(mine) {
         var answer = confirm("Are you sure you want to Delete this Prescription?")
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
         
                 var code = $(this).data('code');
                 var one = $(this).data('one');
                 var two = $(this).data('two');
                 var three = $(this).data('three');
                 var four = $(this).data('four');
                 var color = $(this).data('color');
                  var frost = $(this).data('frost');
                 var ac = $(this).data('ac');
                 var ct = $(this).data('ct');
                 var price = $(this).data('price');
         
                 $(".form-code1").val(code);
                 $(".form-one1").val(one);
                 $(".form-two1").val(two);
                 $(".form-three1").val(three);
                 $(".form-four1").val(four);
                  $(".form-color1").val(color);
                 $(".form-frost1").val(frost);
                 $(".form-ac1").val(ac);
                 $(".form-ct1").val(ct);
                 $(".form-price1").val(price);
                  
             });
         
      </script>
      <script>
         $(document).on( "click", '.editpres',function(e) {
         
                 var name = $(this).data('title');
                 var code = $(this).data('code');
                 var des = $(this).data('desc');
         
                 $(".form-pres-title").val(name);
                 $(".form-pres-code").val(code);
                 $(".form-pres-det").val(des);
         
         
             });
         
      </script>
   </body>
</html>