<!DOCTYPE html>
<html>
  <head>
  <?php

  include('../../server.php');
  
        session_start();   
           
        if(!empty($_POST['QN'])){
          $QN= $_POST['QN'];
        }else{
        $QN=0;
        }


        if(!empty($_POST['usern'])){
          $usern=$_POST['usern'];
        }else{
        $usern=$_SESSION['usern'];
        }

        
          if(!empty($_SESSION['AddDone'])){
            
            $date=$_SESSION['AddDone'];    
          }else{
            $date=date('Y-m-d');
          }


      
          $query1 = "SELECT FirstName, MiddleName, LastName FROM patient WHERE PatientId='$usern'";
          $r1 = @mysql_query($query1, $dbc); 
          $row1 = mysql_fetch_array($r1); 


          $row1['FirstName'] = ucwords($row1['FirstName']);
          $row1['MiddleName'] = ucwords($row1['MiddleName']);
          $row1['LastName'] = ucwords($row1['LastName']);
          $row1['MiddleName'] = substr($row1['MiddleName'], 0, 1);
          $firstname = $row1['FirstName'];


          $usrcompletename = $row1['FirstName'];
 
          session_start();
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
    <title>Kiffi Arts Admin</title>
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
              <a href="dashboard.php">
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
              <a href="update.php">
                <i class="fa fa-user"></i> <span>Pending Orders</span>
              </a>
            </li>


            <li class="treeview">
              <a href="manage-cake.php">
                <i class="fa fa-plus"></i> <span>Manage Orders</span>
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
            </li>          

             

             

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
  
               <div class="center col-lg-12">
              <div class="box border">

                            <fieldset>
     <!-- **** / START-of-WIDGETS**** -->
          <?php include ('widgets.php');?>
          <!-- **** / END-of-WIDGETS**** -->
                                      <div class="form-top" style="padding-bottom:0px;">
                                            <div class="form-top-left">


                                            </div>
                                            <div class="form-top-right">
                                                <i class="fa fa-dashboard"></i>
                                            </div>
                                                                                           
    
                                    </div>    

                                    <div class="form-bottom" id="dboard">
                                      

                                    </div> <!-- form bottom -->
                            </fieldset>
                </div>
               </div>

        </section> <!-- /.section content -->
      </div><!-- /.content-wrapper -->



     

    </div>



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
