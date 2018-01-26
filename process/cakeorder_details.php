<?php
    require 'database.php';
    
    $order_ID = null;
    if ( !empty($_GET['order_ID'])) {
        $order_ID = $_REQUEST['order_ID'];
    }
     
    if ( null==$order_ID ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM order_cake where order_ID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($order_ID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Myrna's Bake House</title>

<link href='assets/font/roboto1.css' rel='stylesheet' type='text/css'> <!-- Google fonts -->
<link href='assets/font/lobster.css' rel='stylesheet' type='text/css'>
<link href='assets/font/josephine.css' rel='stylesheet' type='text/css'>
<link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet' > <!-- font awesome -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" /> <!-- bootstrap -->
<link rel="stylesheet" href="assets/animate/animate.css" /> <!-- animate.css -->
<link rel="stylesheet" href="assets/animate/set.css" />
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css"> <!-- gallery -->
<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/style.css">

<!-- pace loading area -->
<link rel="stylesheet" href="assets/bootstrap/css/orangepace.css">
<script src="pace.min.js"></script>
</head>
 
<body>
<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts --><a class="navbar-brand" href="home.php"> <img src="images/logombh.png" alt="Smiley face"></a><!-- #Logo Ends -->

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
              </button>
            </div>

            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right cl-effect-21">
                 <li class="hidden">  <a href="#page-top"> </a>
                 <li class="page-scroll"><a href="home.php">Home</a></li>
                 <li class="current"><a href="#profile"> Profile</a></li>
                 <li class="page-scroll"><a href="gallery.php">Gallery</a></li>
                 <li class="page-scroll"><a href="#" class="mb-control" data-box="#message-box-default">Log Out</a></li>
                 </ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
      </div>
    </div>




<!-- ****** DISPLAY ORDER START ***** -->
<div id="order"  class="container spacer about"><p> </p> <h2 class="text-center wowload fadeInUp">ORDER DETAILS</h2>  
    <div class="row">
        <div class="container contactform center">
                      <div class="sectionprof">
                      <div class="col-sm-10">
                        <h4><i class="fa fa-shopping-cart"></i> Cake Details </h4> 
                          <!-- <p> <label>Order ID</label> : ?php echo $data['order_ID'];?> </p> -->
                          <p> <label>Cake Theme</label> : <?php echo $data['shirt_typenew'];?> </p>
                          <p> <label>Cake Shape and Size</label> : <?php echo $data['cake_shape'];?> <?php echo $data['cake_size'];?> </p>
                          <p> <label>Cake Layer/s</label> : <?php echo $data['cake_layer'];?> </p>
                          <p> <label>Cake Frost Type</label> : <?php echo $data['cake_frost'];?> </p>
                          <p> <label>Cake Frost Color</label> : <?php echo $data['cake_frost_color'];?> </p>
                          <p> <label>Cake Flavor</label> : <?php echo $data['cake_flavor'];?> </p>
                          <p> <label>Cake Designs</label> : <?php echo $data['candle_selection'];?>,<?php echo $data['candle_num'];?>, <?php echo $data['figurine_select'];?>  </p>
                          <p> <label> -- Pick-Up Info -- </label> </p>
                           <label>Service Date</label> <?php echo $data['service_date'];?> </p> 
                          <p> <label>Service Time</label> : <?php echo $data['service_time'];?> </p>
                          <p> <label>Branch/Venue Name</label> : <?php echo $data['branch_name'];?> <?php echo $data['del_venue'];?> </p>                  
                      </div>
                      </div>


                    <div class="sectionact">
                      <div class="col-md-12">
                    
                        <label class="control-label"> DISPLAY THE IMAGE OF CAKE </label>
                        <div style="height: 500px; width: 650px; border: 1px solid black;"> <?php echo $data['file'];?> </div>


                        </div>
                    </div>  

                <a class="btn btn-primary" href="profile.php#profile"><i class="fa fa-arrow-left "></i> BACK </a>

                  
        </div>
    </div>

      <!-- 2nd column -->
  </div>
</div>
<!-- ********* #DISPLAY ORDER Ends ********* -->

   


<script src="assets/jquery.js"></script><!-- jquery -->
<script src="js/actions.js"></script><!-- message alert box -->
<script src="assets/wow/wow.min.js"></script><!-- wow script -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script><!-- boostrap -->
<script src="assets/script.js"></script><!-- custom script -->


<!-- datatable script -->
<script src="assets/datatable/jquery-1.12.3.min.js"></script>    
<script src="assets/datatable/jquery.dataTables.min.js"></script>   
<script src="assets/datatable/jquery.metisMenu.js"></script>
<script src="assets/datatable/dataTables.buttons.min.js"></script>
<script src="assets/datatable/buttons.print.min.js"></script>
<script src="assets/datatable/pdfmake.min.js"></script>
<script src="assets/datatable/vfs_fonts.js"></script>
<script src="assets/datatable/buttons.html5.min.js"></script>
<script src="assets/datatable/bootstrap.min.js"></script>
<script src="assets/datatable/dataTables.bootstrap.js"></script>


  </body>
</html>
