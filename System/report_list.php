

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      <!---website icon-->
      <link rel="shortcut icon" href="../../images/ico/Title_myrnas1.png">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- DataTables -->
      <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
      <link rel="stylesheet" href="../../css/style-custom.css">
   </head>
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
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
      <header class="main-header">
         <!-- Logo -->
         <a href="admin-user-secretary.php" class="logo">
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
                  <img src="../../images/Title_myrnas1.png" class="img-circle" alt="User Image">
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
                        <li><a href="approved-orders.php"><i class="fa fa-circle-o"></i> Approve Orders</a></li>
                        <li><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                        <li><a href="deliver-orders.php"><i class="fa fa-circle-o"></i> Deliver Orders</a></li>
                  </ul>
               </li>
               <li class=" treeview">
                  <a href="customer-files.php">
                  <i class="fa fa-files-o"></i><span>Customer Files</span>
                  </a>
               </li>
               <li class=" active treeview">
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
                     <li><a href="readymade-designs.php"><i class="fa fa-circle-o"></i> Add Cake Catalog</a></li>
                     <li><a href="forms/advanced.html"><i class="fa fa-circle-o"></i> Edit Cake Catalog</a></li>
                  </ul>
               </li>


               <li class="treeview">
                  <a href="pricelist.php">
                  <i class="pull-right has-submenu ti-angle-right"></i><span>Report\</span>
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
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="center col-lg-12">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="page-content-wrap">
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form-horizontal">
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          <h3 class="panel-title"><strong>BILLING</strong></h3>
                                       </div>


                                        <div class="box-body">

                       <form role="form" action="customer-files.php" method="post" class="searchpatient">  
                      
                          <div class="center input-group col-md-5" >

                            <label class="sr-only" for="form-pID">patientid:</label>
                            <?php

                              if($id!=0){

                                echo'<input type="text" id="psearch" placeholder="Patient Name (e.g. First Middle Last Name)" class="patientsearchname form-control" name="patientsearchname">';
                                echo'<input type="hidden" id="hiddeninput" class="patientsearchid form-control" name="patientsearchid" value="'.$id.'";>';

                              }else{

                                echo'<input type="text" id="psearch" placeholder="Patient Name (e.g. First Middle Last Name)" class="patientsearchname form-control" name="patientsearchname">
                             <input type="hidden" id="hiddeninput" class="patientsearchid form-control" name="patientsearchid">';                                    
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
                                      </div>
                                          <div class="form-group">
                                             <label class="col-md-3 col-xs-12 control-label"><i class="fa fa-money"></i> Enter payment amount:</label>
                                             <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                   <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                   <input type="text" class="form-control"/>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-md-3 col-xs-12 control-label"><i class="fa fa-calendar"></i> Enter date of payment:</label>
                                             <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                   <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                   <input type="text" class="form-control"/>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="panel-footer">
                                          <button class="btn btn-default">Clear Form</button>  
                                          <button class="btn btn-primary pull-right">Submit</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        </form>
                     </div>
                     <!--padded-->
                  </div>
                  <!-- Form Container -->
               </div>
               <!--form bottom -->
            </div>
      </div>
      </section><!-- /.content -->
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
      <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script>
         $(function () {
           $("#example1").DataTable();
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