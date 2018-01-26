<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Kiffi Arts Print Shop</title>

<!-- Google fonts -->
    <link href='assets/font/roboto1.css' rel='stylesheet' type='text/css'>
    <link href='assets/font/lobster.css' rel='stylesheet' type='text/css'>
    <link href='assets/font/josephine.css' rel='stylesheet' type='text/css'>
    <link href='assets/bootstrap/css/demo.css' rel='stylesheet' media='screen' /> <!-- Page styles -->
    <link href='assets/bootstrap/css/confirm.css' rel='stylesheet' media='screen' /><!-- Confirm CSS files -->
    <link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet' ><!-- font awesome -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" /><!-- bootstrap -->

<!-- animate.css -->
    <link rel="stylesheet" href="assets/animate/animate.css" />
    <link rel="stylesheet" href="assets/animate/set.css" />
    <link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css"> <!-- gallery -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> <!-- favicon -->
    <link rel="icon" href="images/favicon.icon" type="image/x-icon">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/orangepace.css">
    <script src="pace.min.js"></script>
    <script type="text/javascript"> 

    function disablebackbutton () {} window.history.forward();}
    disablebackbutton(); </script>
</head>





<body>


<div class="topbar animated fadeInLeftBig"></div>

<div class="navbar-wrapper"> <!-- Header Starts -->
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav" style="background-color: black">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"> <img src="images/logoboth.jpg" alt="Smiley face" style="width: 50%"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>


            <!-- Nav Starts -->

            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right cl-effect-21">
                 <li class="hidden"> <a href="#page-top"> </a> </li>
                 <li class="current"> <a href="#home" >Home</a> </li>
                 <li class="page-scroll"> <a href="profile.php" >Profile</a> </li>
                 <li class="page-scroll"> <a href="gallery.php" >Gallery</a></li>
                 <li class="page-scroll"><a href="#" class="mb-control" data-box="#message-box-default">Log Out</a></li>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
      </div>
    </div>
<!-- #Header Starts -->





<!-- ********* #HOME Start ********* -->
<div id="home">
    <div class="banner">
          <img src="images/img2.jpg" alt="banner" class="img-responsive">
          <div class="caption">
            <div class="caption-wrapper">
              <div class="caption-info">              
              <h1 class="animated bounceInDown">WELCOME!</h1>
              <!--h1 class="animated bounceInUp">Best place for great print quality and fast and reliable service</h1-->
              <p class="animated bounceInLeft">Create your own design by drafting here! </p>

              <p> <a class="btn btn-medium btn-orange" href="#portfolioModal1" class="portfolio-link" data-toggle="modal">Start Designing</a> 
              <!-- <a class="btn btn-medium btn-orange" href="#portfolioModal2" class="portfolio-link" data-toggle="modal"> Modify Cake</a> --> </p>

              </i>
              </div>
            </div>
          </div>
    </div>
<!-- ********* #HOME ENDS ********* -->
</div>



<!-- ********* ABOUT US scroll part ********* -->
<div id="menu"  class="container spacer about"> <p> </p> 
<h2 class="text-center wowload fadeInUp">ABOUT US</h2>  
   <p> </p>



   <!-- SAMPLE DIT  
    $link = mysql_connect('localhost', 'root', '');
    mysql_select_db("kiffiarts", $link);

    $query="SELECT * FROM order_list";
    $myData = @mysql_query($query, $link);

    date_default_timezone_set("Asia/Manila");

    while($record=mysql_fetch_array($myData)){ 



   echo "<img src='".$record['canvas']."' />";

   } ?> --> 
    <!-- ====== about DATA ======== -->
  <div class="row">
    <div class="col-sm-6 wowload fadeInLeft">

      <h4><i class="fa fa-users"></i> Introduction </h4> 
      <p>KIFFI ARTS is the best store for T-shirt printing place that adapts all your requirements. Find your favorite photo, design, or image and upload it onto one of our shirt products and exercise your artistic side.  You can free your mind in creative with the online designer tool.</p> 

      <h4><i class="fa fa-phone"></i>  Contact Us </h4>
      <br> <i class="fa fa-phone"> </i>  email us kiffiarts@yahoo.com </br>
        <br> <i class="fa fa-phone"> </i>  Call us  +63 936 241 2255 </br>

    
    </div>

    <div class="col-sm-6 wowload fadeInRight">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <h4><i class="fa fa-certificate "></i> Mission </h4>
          <p>We satisfy Kiffi Arts Print Shop customers with our great print quality and provide fast and reliable service.</p>
          <p> </p>
          <p> </p>
          <p> </p>
        
        <h4><i class="fa fa-certificate "></i> Vision </h4>
          <p>Well-known for its great print quality and providing fast and reliable service.</p>
      </div>
    </div>

  </div>
      <!--  end about DATA -->
  </div>
  </div>

</div>
<!-- ********* END ABOUT US scroll part ********* -->

<div id="contact" class="spacer">



</div>

</div>





<!-- ***********  Footer Starts *******************-->
<div class="footer text-center spacer" style="background-color: black">
  
  <div class="row">
<div class="col-md-1"> </div> <!-- extra space -->
    
    <div class="col-md-2"> 
      <h3 class="text-center  wowload fadeInUp">Follow Us</h3>  <hr> </hr>
        <p class="wowload flipInX">
        <a href="https://www.facebook.com/Myrnasbakehouse.Zamboanga/info/?entry_point=page_nav_about_item"><i class="fa fa-facebook fa-2x"></i></a>
        <a href="https://www.instagram.com"><i class="fa fa-instagram fa-2x"></i></a> 
        <a href="https://www.twitter.com"><i class="fa fa-twitter fa-2x"></i></a>  
    </div>
   

      <div class="col-md-3">
        <h3 class="text-center  wowload fadeInUp">Branches</h3>  <hr> </hr>
        <br> Suterville, Zamboanga City, Philippines</br>
        <br> San Jose Gusu, Zamboanga City, Philippines</br>
      </div>
 
    <div class="col-md-5">
      <h3 class="text-center  wowload fadeInUp">Visit Us</h3>  <hr> </hr>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.816130358435!2d122.05966685121865!3d6.912575594980798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x325041e76fdb1347%3A0x53653e623130adb4!2sKiffi+Arts+Print+Shop!5e0!3m2!1sen!2sph!4v1512716623020" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

<div class="col-md-1"> </div> <!-- extra space -->
  </div> <!-- end of row -->

  <p> </p> <hr> </hr>
  <b> Copyright © Kiffi Arts Print Shop 2017. All rights reserved. </b>
</div>

<!-- *****************# Footer Ends *******************-->





<!-- ***************** P  O  P       O U T S !!!  **************** -->

        <!-- Message Boxes -->
        <!-- default -->
        <div class="message-box" id="message-box-default">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-home"></span> Logout </strong></div>
                    <div class="mb-content">
                        <p> Oh hey <?php echo "".$_SESSION['cust_uname']."" ?>, are you sure you want to log out?</p> 

                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">No</button>
                          <a href="logout.php" class="btn btn-default btn-lg pull-right" >Yes</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end default -->


        <!--  Start Cake Customization Modal  -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                <h2><span style="color: red">REMINDERS</span></h2> <hr> </hr>
                    <div class="col-lg-12"> <!-- <h3> --> 
                        <div class="modal-body">                
                            <span style="text-align: left"><h4><p> <i class="fa fa-circle"></i> Orders must be placed <b> at least 2 weeks before </b> the desired date for delivery/pick-up. </p>                            
                            <i class="fa fa-circle"></i> Changes in orders can be made <b> only when the status is pending</b>.
                            <p></p>
                             <p> <i class="fa fa-circle"></i> Only bulk orders are eligible for delivery.</p>
                             <p><i class="fa fa-circle"></i> No online payment.</p></h4></span>
                            <div class="button-form"> <a href="customization/index.php" class="btn btn-primary btn-large btn-block" type="submit"> Start Designing</a> </div> 
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
        <!-- Start Cake Customization Modal    E N D -->




<!-- MODIFY CAKE CATALOG BUTTON APPEARS-->
      <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"> <!-- ok -->
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div> <!-- ok  end-->
            <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="modal-body">

                        <<div class="container contactform center">
                          <h2 class="text-center  wowload fadeInUp">Check out the cakes we've made that might suit your taste and modify it!</h2>

                    &nbsp; <p> <h4>
                     <p> > order must be placed <b> at least 3 days </b> before the desired date. </p> &nbsp;
                     > You may only customized minor details such as <b> "Figurines" and "Dedication Text". </b> </p>
                     <p> Pick-up at Myrna's Bake House Main Branch, Pasonanca from 9 AM - 7 PM. </p></h4>
                    &nbsp;
                      <a href="gallery.php" class="btn btn-primary btn-large btn-block" type="submit"><i class="fa fa-birthday-cake"></i> Modify Cake  </a>
      
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div> <!-- modal-content -->

      </div> <!-- portfolioModal_2 -->


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




<script src="assets/jquery.js"></script> <!-- jquery -->
<script src="assets/script.js"></script> <!-- custom script -->
<script src="assets/wow/wow.min.js"></script><!-- wow script -->
<script src="js/actions.js"></script><!-- message alert box -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script><!-- boostrap -->
<script src="assets/mobile/touchSwipe.min.js"></script><!-- jquery mobile -->
<script src="assets/respond/respond.js"></script>
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script> <!-- gallery -->
<!-- <script src='https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js'></script>  -->

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 9447515;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->



</body>
</html>