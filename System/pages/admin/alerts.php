<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mynra's Bakehouse | Alert</title>
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

  </head>
    <?php

        include('../../server_one.php');
        
        session_start();   
        $usern=$_SESSION['usern'];
        $alert=$_SESSION['alert'];
        $goto=$_SESSION['goto'];
        $text=$_SESSION['text'];
        


           $query1 = "SELECT FirstName, MiddleName, LastName FROM admin WHERE admin_id='$usern'";
                 $r1 = @mysql_query($query1, $dbc); 
                 $row1 = mysql_fetch_array($r1); 
         
         
                 $row1['FirstName'] = ucwords($row1['FirstName']);
                 $row1['MiddleName'] = ucwords($row1['MiddleName']);
                 $row1['LastName'] = ucwords($row1['LastName']);
                 $row1['MiddleName'] = substr($row1['MiddleName'], 0, 1);
                 $firstname = $row1['FirstName'];
         
         
                 $usrcompletename = $row1['FirstName'];
      
      $mvalue=1;




          $_SESSION['usern']=$usern; 
     
          

  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="admin-user-patient.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="../../images/Title_myrnas1.png"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ADMIN</b></span>
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
              <<li class="treeview">
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
              <
            </div>
          </div>
          <!-- search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
           <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

          <!--Dashboard menu-->
          <li class=" treeview">
                     <a href="dashboard.php">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                  </li>
             <li class=" treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Orders</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                       <ul class="treeview-menu">
                        
                        <li ><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                        <li ><a href="deliver-orders.php"><i class="fa fa-circle-o"></i> Confirmed Orders via phone</a></li>
                        <li ><a href="approved-orders.php"><i class="fa fa-circle-o"></i> Approved Orders</a></li>
                     </ul>
                  </li>
                  <li class="  treeview">
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
                        <li><a href="readymade-designs.php"><i class="fa fa-circle-o"></i> Add Cake Catalog</a></li>
                        <li><a href="edit-readymade.php"><i class="fa fa-circle-o"></i> Edit Cake Catalog</a></li>
                     </ul>
                  </li>
                   <li class="treeview">
                     <a href="report_list.php">
                     <i class="fa fa-file-text-o"></i><span>Report</span>
                     </a>  
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
            <li><a href="admin-user-patient.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Past Appointments</li>
          </ol>
        </section>




        <!-- Main content -->

  <section class="content">
                        <div class="modal fade myModal1"  data-backdrop="static" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg">

            <div class="modal-content">
             <div class="modal-header">
              <?php
            echo'<form action="'.$goto.'">';

            echo '<button type=submit class="close" >&times;</button>';
          echo  '</form>';
          ?>
                
<?php
                if($alert==1){
                  echo'<h4 class="modal-title" style="text-align:center; color: #428BCA;">Successful</h4>';
                }else{
                  echo'<h4 class="modal-title" style="text-align:center; color: #DD4B39;">Warning</h4>';
                }
?>
                
              </div>
            <div class="modal-body">

                <!-- content goes here -->
                  <?php echo '<div style="text-align:center;">'.$text.'</div>'; ?>

          <div class="modal-footer">
            <?php
            echo'<form action="'.$goto.'">';

            echo '<button type=submit class=btndashboard>OK</button>';
          echo  '</form>';
          ?>
          </div>
            
          </div>
      </div>
  </div>
</div>




        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


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
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>

if('<?php echo $mvalue == 1 ?>')
{    $(window).load(function(){
        $('.myModal1').modal('show');
    });

}
else if('<?php echo $mvalue == 2 ?>')
{
  $(window).load(function(){
        $('.myModal2').modal('show');
    });

}
else{

  $(window).load(function(){
        $('.myModal3').modal('show');
    });

}





</script>
   
  
  </body>
</html>
