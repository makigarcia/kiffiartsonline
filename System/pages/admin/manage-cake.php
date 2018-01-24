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
<!DOCTYPE html>
<html>

  <head>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="../../plugins/datepicker-inline/bootstrap-datepicker.js"></script>
    <script src="../../plugins/datepicker-inline/main.js"></script>

  <script src="../js/sweetalert.min.js"></script>

    


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Secretary | Manage Cake Orders</title>
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
            <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">

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


   <!--- End of jqueries--> 
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="../../images/tooth-king.png"></span>
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
            
          </div>
          <!-- search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
           <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

          <!--Dashboard menu-->
             <li class="treeview">
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <!--Account Information menu-->
            <li class="treeview">
              <a href="update.php">
                <i class="fa fa-user"></i> <span>Pending Orders</span>
              </a>
            </li>


            <li class="active treeview">
              <a href="manage-cake.php">
                <i class="fa fa-plus"></i> <span>Manage Cake Orders</span>
              </a>
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
            </li>          s

    
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
            <li class="active">Manage Cake Orders</li>
          </ol>
        </section>

        <!-- Main content -->
       <!-- Main content -->
        <section class="content">

          
               <div class="center col-lg-12">
              <div class="box border">

                            <fieldset>

                                      <div class="form-top" style="padding-bottom:0px;">
                                            <div class="form-top-left">
                                                <h3>Manage Cake Orders</h3>
                                         
                                            </div>
                                          
                                    </div>    

                                    <div class="form-bottom">

                                      <div class="row">

                                       <section class="col-lg-7" style="margin-bottom:15px;">


 <section class="panel panel-info">
                <header class="panel-heading">
                  <h4 class="panel-title">Orders</h4>
                </header>
                <div class="panel-body">

                  <?php
                    include('configuration.php');
                    $sql = "SELECT  application_number, firstname, middlename, lastname, status FROM reviewee ORDER BY status ASC";
                    $result = $conn->query($sql);
                  ?> 

                  <form name="frmUser" action="" method="post"> 
                      <table class="table table-striped datatable" id="datatables">
                        <thead>
                          <tr>
                            
                            <th>Order Number</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                         
                           <?php
                              if ($result->num_rows > 0) { // output data of each row?>
                               <tbody>
                                   <?php  
                                   while($row = $result->fetch_assoc()) {
                                      if($row['status']=='t'){ 
                                          $status = 'Pending';
                                          $application_number = $row['application_number'];
                                           //this form will display the set of pending applications ?>     
                                            <tr>
                                              <td><input type="checkbox" name="selected[]" value="<?php echo $row['application_number']; ?>" class="checkbox-info"/></td>
                                              <td><?php echo $application_number; ?></td>
                                              <td><?php echo $row['firstname']; ?></td>
                                              <td><?php echo $row['middlename']; ?></td>
                                              <td><?php echo $row['lastname']; ?></td>
                                              <td><?php echo $status; ?></td>
                                              <td><a href="reviewee_search.php?id=<?php echo $application_number;?>"><img src="img/view.png" title="View Profile"style="width:24px;height:24px;border:none;"></a></td>
                                            </tr>
                                  <?php } //if statement
                                        else if($row['status'] == 'c'){
                                          $status = 'Confirmed';
                                           $application_number = $row['application_number'];?>
                                          <tr>
                                              <td><input type="checkbox" name="selected[]" value="<?php echo $row['application_number']; ?>" class="checkbox-info"/></td>
                                              <td><?php echo $row['application_number']; ?></td>
                                              <td><?php echo $row['firstname']; ?></td>
                                              <td><?php echo $row['middlename']; ?></td>
                                              <td><?php echo $row['lastname']; ?></td>
                                              <td><?php echo $status; ?></td>
                                              <td><a href="reviewee_search.php?id=<?php echo $application_number;?>"><img src="../img/view.png" title="View Profile"style="width:24px;height:24px;border:none;"></a>
                                                  <a href="process_delete.php?id=<?php echo $application_number;?>"><img src="../img/undo.png" title="Undo Confirm"style="width:24px;height:24px;border:none;"></a>
                                                  <a href="print_payment.php?id=<?php echo $application_number;?>"><img src="../img/print.png" title="Print Payment"style="width:24px;height:24px;border:none;"></a></td>
                                            </tr>
                                    <?php }
                                  } //while statement
                              ?>
                                </tbody>  
                      </table>
                                  <div class="spacing-50"></div>
                                  <div class="customed-form form-wrapper button-container" style="text-align:center">
                                    <input type="button" name="delete" value="Delete"  id="onDelete" class="btn btn-info" style="margin-left:30px"/>
                                    <input type="button" name="update" value="Update"  id="onUpdate" class="btn btn-info" />
                                  </div>
                                  <div class="spacing-70"></div>
                  </form>

                              <?php
                              }else {
                                  echo "0 results";
                              }
                              ?>

                                            
                                    

                                        </section>

                    
                                      <div id="datething"></div> 
                                    </div> <!-- form bottom -->
                            </fieldset>
                </div>
               </div>
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   

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
    

<script src="../../js/animsition/dist/js/jquery.animsition.min.js"></script>
  <script src="../../js/datatables/media/js/jquery.dataTables.min.js"></script>

  <script src="../../js/includes.js"></script>
  <script src="../../js/sugarrush.js"></script>
  <script src="../../js/sugarrush.tables.js"></script>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/signup.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    </script>
  </body>
</html>
