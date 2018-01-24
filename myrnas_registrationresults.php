
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Kiffi Arts Print Shop</title>

<!-- Google fonts -->
<link rel="stylesheet" href="assets/font/fontstyle.css" />
<link rel="stylesheet" href="assets/font/fontawesome.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

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

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav" style="background-color: black">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="index.php"> <img src="images/logoboth.jpg" alt="Smiley face" style="width: 50%"></a>
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
          <img src="images/img2.jpg" alt="banner" class="img-responsive">
          <div class="caption">
            <div class="caption-wrapper">
              <div class="caption-info">              
              <i class="fa fa-home fa-5x animated bounceInDown"></i>

<?php

use PHPMailer;

date_default_timezone_set('Etc/UTC');



    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $cust_uname = $_POST['cust_uname'];
    $cust_pword = $_POST['cust_pword'];
    $con_password = $_POST['con_password'];

    $code = md5(uniqid(rand())); 

    if($cust_pword!=$con_password)
    {
            echo " <p> <h1> Password does not match! </h1> </p> ";
        }
    
    else{
    $dbc = @mysql_connect('localhost' , 'root', '');
    @mysql_select_db('myrnas', $dbc);

    session_start();

    $query = "INSERT INTO customer (fname, lname, address, phone_num, birthdate, email, cust_uname, cust_pword, active, email_verify) VALUES('$fname','$lname','$address','$phone_num','$birthdate','$email','$cust_uname','$cust_pword', 1, '$code')";

    

    if(@mysql_query($query,$dbc)){

      print '<p> <h1> You can now log in! </h1> </p> ';

      //$_SESSION["email"] = $email;
      //$email = $_SESSION['email'];

      /*$to = $email;
      $subject = 'Kiffi Arts Print Shop Online Account | Registration';
      //$header = 'From:Kiffi Arts Print Shop(myrnascake.com)';
      $headers =  'MIME-Version: 1.0' . "\r\n"; 
      $headers .= 'From: Kiffi Arts Print Shop <themakpacker@gmail.com>' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      $message = '<h3> <p>  You are now Registered on Kiffi Arts Print Shop! </p> ' . "\r\n";
      $message .= 'Please click this link to activate your account:' . "\r\n";
      $message .= 'http://www.myrnasonlinecakecom.000webhostapp.com/index.php?email='.$email.'&code='.$code. "\r\n"
      
      ; // Our message above including the link

      mail($to, $subject, $headers, $message);
        }  
        else{
        print '<p> Oooppps, please register again!. '.mysql_error().'</p>';
        }*/

include "PHPMailer/PHPMailerAutoload.php";

      

      $mail = new PHPMailer();
      $mail->IsSMTP(); // set mailer to use SMTP
      $mail->Host = "mail.authsmtp.com"; // specify SMTP server
      $mail->SMTPAuth = true; // turn on SMTP authentication

      $mail->Username = "themakpacker@gmail.com"; // SMTP username -- CHANGE --
      $mail->Password = "kAratekid3?"; // SMTP password -- CHANGE --
      $mail->From = "themakpacker@gmail.com"; //From Address -- CHANGE --
      $mail->FromName = "Kiffi Arts Print Shop Online"; //From Name -- CHANGE --
      $mail->AddAddress($email, "Example"); //To Address -- CHANGE --
      $mail->AddReplyTo("themakpacker@gmail.com", "Your Company Name"); //Reply-To Address -- CHANGE --

      $mail->Port = "25"; // SMTP Port
      $mail->WordWrap = 50; // set word wrap to 50 characters
      $mail->IsHTML(false); // set email format to HTML
      $mail->Subject = "AuthSMTP Test";
      $mail->Body= "AuthSMTP Test Message!";

      if(!$mail->Send()){
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
      }
      echo "Message has been sent";



    }
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
                              <form action="myrnas_login.php" method="POST">

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


<!-- ***************** REGISTRATION APPEARS ***************** -->
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
                    <div class="col-lg-10">
                    <div class="modal-body">

                        <div class="container contactform center">
                          <h2 class="text-center  wowload fadeInUp">REGISTRATION</h2> <hr> </hr>
                            <form action="myrnas_registrationresults.php" method="POST">

                              <div class="col-sm-6 col-xs-12">  

                           <input type="text" name="fname" required data-validation-required-message="Please enter your name." placeholder="First Name"> <!--label>First Name</label-->
        
                           <input type="text" name="lname" required data-validation-required-message="Please enter your Last name." placeholder="Last Name"> <!--label>Last Name</label-->

                           <input type="text" name="address" required data-validation-required-message="Please enter your Home Address." placeholder="Home Address"> <!--label>Home Address</label-->

                           <input type="date" name="birthdate" required data-validation-required-message="Please enter your Birthdate." placeholder="Date of Birth"> <!--label>Date of Birth</label-->
                  
                           <input type="text" name="phone_num" required data-validation-required-message="Please enter your Phone Number." placeholder="Phone Number"> </div> <!--label>Phone Number</label-->

                           	  <div class="col-sm-6 col-xs-12">  
                           <input type="email" name="email" required data-validation-required-message="Please enter your email." placeholder="Email Address"> <!--label>Email Address</label-->

                          <input type="text" name="cust_uname" required data-validation-required-message="Please enter your Username." placeholder="User Name"> <!--label>Username</label--> 

                          <input type="password" name="cust_pword" required data-validation-required-message="Please enter your password." placeholder="Password"> <!--label>Password</label--> 

                          <input type="password" name="con_password" required data-validation-required-message="Please enter your confirm password." placeholder="confirm password"> <!--label>Confirm Password</label-->
                          	  </div>

                          <button class="btn btn-primary"><i class="fa fa-user"></i>Register</button>
                              
                            </form>
                        </div>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- (*******REGISTRATION ENDS  *********** -->




<!-- Footer Starts -->
<div class="footer text-center spacer"  style="background-color: black">
<p class="wowload flipInX"><a href="#"><i class="fa fa-facebook fa-2x"></i></a> <a href="#"><i class="fa fa-instagram fa-2x"></i></a> <a href="#"><i class="fa fa-twitter fa-2x"></i></a> <a href="#"><i class="fa fa-flickr fa-2x"></i></a> </p>
Copyright © Kiffi Arts Print Shop 2017. All rights reserved.
</div>
<!-- # Footer Ends -->
<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>




<!-- LOG IN APPEARS -->
      <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">  <div class="rl"> </div>  </div>
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




<script src="assets/jquery.js"></script>  <!-- jquery -->
<script src="assets/wow/wow.min.js"></script> <!-- wow script -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>  <!-- boostrap -->

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>
<!-- <script src='https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js'></script>  -->


<!-- custom script -->
<script src="assets/script.js"></script>

</body>
</html>