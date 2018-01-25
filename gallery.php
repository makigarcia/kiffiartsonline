<?php

  $connect = mysql_connect("localhost", "root", "", "kiffiarts");
  $query = "SELECT * FROM cakecatalog";
  $result = mysql_query($connect, $query);

  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Kiffi Arts Print Shop</title>
<!-- Google fonts -->
<link href='assets/font/roboto1.css' rel='stylesheet' type='text/css'>
<link href='assets/font/lobster.css' rel='stylesheet' type='text/css'>
<link href='assets/font/josephine.css' rel='stylesheet' type='text/css'>
<link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel="stylesheet" type='text/css' > <!-- font awesome -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" /> <!-- bootstrap -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css"><!-- gallery -->
<link rel="stylesheet" href="assets/animate/animate.css" />
<link rel="stylesheet" href="assets/animate/set.css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> <!-- favicon -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/style.css"> <!-- other design , late -->
<link rel="stylesheet" href="assets/bootstrap/css/orangepace.css">
</head>

<body>
  <div class="topbar animated fadeInLeftBig"></div>

  <div class="navbar-wrapper"><!-- Header Starts -->
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav" style="background-color: black">
          <div class="container">
            <div class="navbar-header"> 
              <a class="navbar-brand" href="home.php"> <img src="images/logoboth.jpg" alt="Smiley face" style="width: 50%"></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> </div>

            <div class="navbar-collapse  collapse"> <!-- Nav Starts -->
              <ul class="nav navbar-nav navbar-right cl-effect-21">
                 <li class="hidden"> <a href="#page-top"> </a> </li>
                 <li class="page-scroll"> <a href="home.php">Home</a> </li>
                 <li class="page-scroll"> <a href="profile.php">Profile</a> </li>
                 <li class="current"> <a href="#foods">Gallery</a></li>
                 <li class="page-scroll"><a href="#" class="mb-control" data-box="#message-box-default">Log Out</a></li>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
      </div>
    </div> <!-- #Header Starts -->



<div id="foods"  class=" clearfix grid">

    <p> <h2 class="text-center  wowload fadeInUp"> READY-MADE DESIGNS </h2> </p>

    <?php
                      include 'database.php';
                      $pdo = Database::connect();
                      $sql = "SELECT * FROM cakecatalog ORDER BY catalog_ID ASC";
                      foreach ($pdo->query($sql) as $row) {
                        // echo ' <tr> <td>'. $row['design_code'] . '</td>';
                        // echo ' <td> </td>';
                        // echo '<td>'. $row['ctlg_flavor'] . '</td>';
                        // echo '<td>'. $row['ctlg_price'] . '</td>';                            
                        // echo '<td><center><a class="btn btn-medium btn-orange" id="button" href="readymadedesigns.php?catalog_ID='.$row['catalog_ID'].'">View More</a> </center></td> </tr>'; 
                      
                          if ($row ['status']=="Available"){
    echo ' <figure class="effect-oscar  wowload fadeInUp">';
    echo ' <img src="System/pages/admin/uploads/'.$row['picture'].'"> ';
        echo  '<figcaption>';
            echo '<p>Ready-made shirt designs by kiffi arts print shop<br>';
            echo '<a href="readymadedesigns.php?catalog_ID='.$row['catalog_ID'].'">VIEW DETAILS</a></p>';           
        echo '</figcaption>';
    echo '</figure>'; 
      }
    }



      Database::disconnect();
    ?>


    
  </div>


    <!-- <div class="row">
     <div class="container contactform center">
      <div class="sectioncatalog1">
        <div class="col-md-2"> 
        </div>
    </div>

    <div class="sectioncatalog2">
      <div class="row">
        <div class="col-md-12"> <center>
         <div class="table-responsive">
            
            <div class="panel panel-default">
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered" id="dataTables-example">
                        <thead>
                          <tr> 
                            <th> <center>Design Code</center></th>
                            <th> <center>Image</center></th>
                            <th><center> Flavor </center></th>
                            <th> <center> Price </center></th>
                            <th> <center> View More </center></th>  
                           </tr>
                         </thead>
                      <tbody>

                   <!?php
                      include 'database.php';
                      $pdo = Database::connect();
                      $sql = "SELECT * FROM cakecatalog ORDER BY catalog_ID ASC";
                      foreach ($pdo->query($sql) as $row) {
                        echo ' <tr> <td>'. $row['design_code'] . '</td>';
                        echo ' <td> </td>';
                        echo '<td>'. $row['ctlg_flavor'] . '</td>';
                        echo '<td>'. $row['ctlg_price'] . '</td>';                            
                        echo '<td><center><a class="btn btn-medium btn-orange" id="button" href="readymadedesigns.php?catalog_ID='.$row['catalog_ID'].'">View More</a> </center></td> </tr>'; }
                        Database::disconnect();
                    ?>
                       </tbody>
                      </table>
                     </div>
                   </div>
                  </div>

                </div>
              </div></center>
          </div>
        </div>
      </div>
    </div> -->

        <!-- <table style="border:none;"> <tbody>
            <tr>
              <td> <img src="images/cakecatalog/dedi_1.png" alt="dedi_1" height="280" width="400" /> </td>

               <td><img src="images/cakecatalog/dedi_2.png" alt="dedi_2" height="280" width="400"/></td>

                </tr>
         <tr>
           ?php include 'database.php';
                 $pdo = Database::connect();
                 $sql = 'SELECT * FROM cakecatalog ORDER BY catalog_ID ASC';
                 foreach ($pdo->query($sql) as $row) { 
                  echo '<tr>' ;
                  echo '<td> <center> '
                  echo '<td> <center> <a class="btn btn-orange" href="readymadedesigns.php?catalog_ID='.$row['catalog_ID'].'">VIEW</a> </td>'; 
                  echo '<tr>' ;

                  }  ?>

                  !- <tr> <td> <p> </p> </td></tr>
                  <tr> <td> <img src="images/cakecatalog/bday_1.png" alt="wed_4" height="280" width="400"/> </td>
                       <td> <img src="images/cakecatalog/dedi_5.png" alt="wed_5" height="280" width="400"/> </td>
                       <td> <img src="images/cakecatalog/dedi_6.png" alt="wed_6" height="280" width="400"/> </td>
                  </tr>


                  ?php foreach ($pdo->query($sql) as $row) { echo '<td> <center> <a class="btn btn-orange" href="readymadedesigns.php?catalog_ID='.$row['catalog_ID'].'"> VIEW </a> </td>'; } Database::disconnect(); ?> 

                  </tbody>
          </table> -->

<div id="space"  class=" clearfix grid"> <p> <hr> </p> </div>




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

  <p> </p> <hr> </hr> <b> Copyright © Kiffi Arts Print Shop 2017. All rights reserved. </b>
</div>
<!-- *****************# Footer Ends *******************-->



<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"> </div><!-- The container for the modal slides -->
    <h3 class="title">Title</h3><!-- Controls for the borderless lightbox -->
    <button> Order Now </button>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
</div>     <!-- The modal dialog, which will be used to wrap the lightbox content -->    







        <!-- Message Boxes of LOG OUT-->
        <div class="message-box" id="message-box-default">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-home"></span> Logout </strong></div>
                    <div class="mb-content"> <p> Oh hey <?php echo "".$_SESSION['cust_uname']."" ?>, are you sure you want to log out?</p>  </div>
                    <div class="mb-footer"> <button class="btn btn-default btn-lg pull-right mb-control-close">No</button>
                       <a href="logout.php" class="btn btn-default btn-lg pull-right" >Yes</a> </div>
                </div>
            </div>
        </div>
        <!-- end default -->








<script src="assets/jquery.js"></script><!-- jquery -->
<script src="js/jquery.min.js"></script><!-- jquery -->
<script src="assets/datepicker.js"></script>
<script src="assets/daterangepicker.js"></script>
<script src="js/bootstrap.min.js"></script><!-- jquery -->
<script src="js/actions.js"></script><!-- message alert box -->
<script src="pace.min.js"></script> <!--loading-->
<script src="assets/wow/wow.min.js"></script><!-- wow script -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script><!-- boostrap -->
<script src="assets/script.js"></script><!-- custom script -->
<script src="assets/mobile/touchSwipe.min.js"></script> <!-- jquery mobile -->
<script src="assets/respond/respond.js"></script>
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script> <!-- gallery -->
<!-- <script src='https://maps.googleapis.com/maps/api/js?key=&sensor=false&extension=.js'></script>  -->

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 9327300;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->



</body>
</body>
</html>