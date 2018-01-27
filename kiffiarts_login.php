<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Kiffi Arts Print Shop</title>

<!-- Google fonts -->
<link href='assets/font/roboto1.css' rel='stylesheet'>
<link href='assets/font/lobster.css' rel='stylesheet' type='text/css'>
<link href='assets/font/josephine.css' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href='assets/font/font-awesome.min.css' rel='stylesheet' type='text/css' >

<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/animate/animate.css" />
<link rel="stylesheet" href="assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="assets/style.css">
</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="index.php"> <img src="images/logombh.png" alt="Smiley face"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                 <li class="hidden"> <a href="#page-top"> </a> </li>
                 <li class="page-scroll"> <a href="#home"></a></li>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
      </div>
    </div>
<!-- #Header Starts -->



<div id="home">
<!-- Slider Starts -->
<div class="banner">
          <img src="images/marshamallow_cake.jpg" alt="banner" class="img-responsive">
          <div class="caption">
            <div class="caption-wrapper">
              <div class="caption-info">              
              <i class="fa fa-birthday-cake fa-5x animated bounceInDown"></i>
<?php
include('kiffiarts_server.php');

$Regusername = $_POST['cust_uname'];
$Regpassword = $_POST['cust_pword'];



$read_customer = mysql_query("SELECT * FROM customer WHERE cust_pword='$Regpassword' and cust_uname='$Regusername' and active=1");

$r1 = mysql_fetch_array($read_customer); // username

if (is_array($r1))
  {
    session_start();
    $_SESSION['customer_ID'] = $r1['customer_ID'];
    $_SESSION['cust_uname'] = $r1['cust_uname']; 

    Header("Location: home.php");
  }
else
  {
  print '<p> <h1> Ooops, error login, please try again. </h1></p>'; 

  }

?>

              <p> <a class="btn btn-medium btn-orange" href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
              LogIn</a> <a class="btn btn-medium btn-orange" href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
              Register</a> </p>

              </div>
            </div>
          </div>
</div>
<!-- #Slider Ends -->
</div>

    <!-- VIEW THE LOG IN -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"> <!-- the close button -->
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                      <div class="modal-body">

                        <div class="container contactform center">
                            <h2 class="text-center  wowload fadeInUp">LOG IN</h2>
                              <p> </p> <hr> 
                              <form action="kiffiarts_login.php" method="POST">

                                <div class="col-sm-6 col-sm-offset-3 col-xs-12">  
                                <label>Username</label> <input type="text" name="cust_uname" required data-validation-required-message="Please enter your username." placeholder="Username">
        
                                <label>Password</label> <input type="password" name="cust_pword" required data-validation-required-message="Please enter your paswword." placeholder="Password">

                                <button class="btn btn-primary" name="login" type="submit"><i class="fa fa-user"></i> LogIn </button>
                                </div>
                              </form>
                        </div>
                         <p> </p> <hr> 

                      </div>
                    </div>

                </div>
            </div>
      </div>
      </div>

<!-- LOG IN APPEARS -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="modal-body">

                        <div class="container contactform center">
                          <h2 class="text-center  wowload fadeInUp">REGISTRATION</h2>
                            <form action="kiffiarts_registrationresults.php" method="POST">
                              <div class="col-sm-6 col-xs-12">  
                                <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>First Name</label> <input type="text" class="form-control" name="fname" required data-validation-required-message="Please enter your name." placeholder="First Name"> </div> </div>
        
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls"> <label>Last Name</label> <input type="text" class="form-control" name="lname" required data-validation-required-message="Please enter your Last name." placeholder="Last Name"> </div> </div>

                            <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Home Address</label> <input type="text" class="form-control" name="address" required data-validation-required-message="Please enter your Home Address." placeholder="Home Address"> </div> </div>

                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Date of Birth</label> <input type="date" class="form-control" name="birthdate" required data-validation-required-message="Please enter your Birthdate." placeholder="Date of Birth"> </div> </div>
                          
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Phone Number</label> <input type="number" class="form-control" name="phone_num" required data-validation-required-message="Please enter your Phone Number." placeholder="Phone Number"> </div> </div> </div>

                             <div class="col-sm-6 col-xs-12">  
                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Email Address</label> <input type="email" class="form-control" name="email" required data-validation-required-message="Please enter your email." placeholder="Email Address"> </div> </div>

                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Username</label> <input type="text" class="form-control" name="cust_uname" required data-validation-required-message="Please enter your Username." placeholder="User Name"> </div> </div>

                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Password</label> <input type="password" class="form-control" name="cust_pword" required data-validation-required-message="Please enter your password." placeholder="Password"> </div> </div>

                          <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Confirm Password</label> <input type="password" class="form-control" name="con_password" required data-validation-required-message="Please enter your confirm password." placeholder="confirm password"> </div> </div>
                          </div>




                          <button class="btn btn-primary" type="submit"><i class="fa fa-user"></i> Register </button>
                              </div>
                            </form>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>

</div>




<!-- Footer Starts -->
<div class="footer text-center spacer">
<p class="wowload flipInX"><a href="#"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-instagram fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a> <a href="#"><i class="fa fa-flickr fa-2x"></i></a> </p>
Copyright © Myrna's Bake House 2017. All rights reserved.
</div>
<!-- # Footer Ends -->
<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>




<!-- LOG IN APPEARS -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>


        </div>
        </div>


<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>


<script src="assets/jquery.js"></script><!-- jquery -->
<script src="assets/wow/wow.min.js"></script><!-- wow script -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script><!-- boostrap -->
<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>
<script src="assets/respond/respond.js"></script>
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script><!-- gallery -->
<!-- <script src='https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js'></script>  -->
<script src="assets/script.js"></script><!-- custom script -->

</body>
</html>