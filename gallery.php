<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "kiffiarts");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'order'               =>     $_POST["hidden_number"], 
                     'item_size'               =>     $_POST["shirtsize"],
                     'item_color'               =>     $_POST["shirtcolor"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"],
                     'sesh'          =>     $_SESSION['customer_ID']  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'order'               =>     $_POST["hidden_number"],
                     'item_size'               =>     $_POST["shirtsize"],
                     'item_color'               =>     $_POST["shirtcolor"],   
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"],
                     'sesh'          =>     $_SESSION['customer_ID']   
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'order'               =>     $_POST["hidden_number"],  
                'item_size'               =>     $_POST["shirtsize"],
                     'item_color'               =>     $_POST["shirtcolor"], 
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"],
                'sesh'          =>     $_SESSION['customer_ID']   
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="gallery.php"</script>';  
                }  
           }  
      }  
 }  
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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
    <script>
        jQuery(function($){ // wait until the DOM is ready
            $("#pickdeldate").datepicker({minDate: 3}).on('change', function() {
      if($('#pickdeldate').val() != "")
      {
        $('#submitcart').prop('disabled', false);
        //console.log("hello");
      }
      else 
      {
        $('#submitcart').prop('disabled', true);
      }
    });
        });
    </script>

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
                 <li class="current"> <a href="gallery.php">Gallery</a></li>
                 <li class="page-scroll"><a href="#" class="mb-control" data-box="#message-box-default">Log Out</a></li>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
      </div>
    </div> <!-- #Header Starts -->


<!-- cart -->

<br />  
           <div class="container" style="width:1000px;"> 
           <h5 align="center"></h5><br />   
                <h3 align="center"><strong>READY-MADE DESIGNS</strong></h3><br /> 
                 
                <?php  
                $query = "SELECT * FROM readymadedesigns ORDER BY design_id ASC";  
                $result = mysqli_query($connect, $query);

                $order_number = mt_rand(1,100000);;

                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                      if ($row ['status']=="Available")
                      {
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="gallery.php?action=add&id=<?php echo $order_number; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src=System/pages/admin/uploads/<?php echo $row['picture']; ?> class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["design_code"]; ?></h4>  
                               <h4 class="text-danger">P <?php echo $row["shirt_price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" placeholder="Quantity" required/>  
                               <select id="shirtsize" name="shirtsize" placeholder="Size">
                                  <option value="XS">XS</option>
                                  <option value="S">S</option>
                                  <option value="M">M</option>
                                  <option value="L">L</option>
                                  <option value="XL">XL</option>
                                  <option value="XXL">XXL</option>
                                </select> </td>
                                <?php if($row['shirt_color']=='Any'){
                                  echo "
                                  <select id='shirtcolor' name='shirtcolor'>
                                    <option value='White'>White</option>
                                    <option value='Black'>Black</option>
                                    <option value='Blue'>Blue</option>
                                    <option value='Red'>Red</option>
                                    <option value='Green'>Green</option>
                                    <option value='Yellow'>Yellow</option>
                                    <option value='Brown'>Brown</option>
                                    <option value='Pink'>Pink</option>
                                    <option value='Cream'>Cream</option>
                                    <option value='Orange'>Orange</option>
                                    <option value='Violet'>Violet</option>
                                  </select>"; }
                                  else{
                                    echo "<select id='shirtcolor' name='shirtcolor'>
                                    <option value='Black'>Black Only</option>
                                  </select>";
                                  } ?>
                                <input type="hidden" name="hidden_number" value="<?php echo $order_number; ?>" /> 
                               <input type="hidden" name="hidden_name" value="<?php echo $row["design_code"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["shirt_price"]; ?>" />
                               <input type="hidden" name="hidden_sesh" value="<?php echo $_SESSION['customer_ID']; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                      }
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />
                <center><h4 style="color: red;"><strong>Pick-up at Kiffi Arts Print Shop Suterville branch only. Pick-up time is from 9AM-5PM.</strong></h4></center>  
                <h3>Order Details</h3>
                  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               
                               <!--th width="10%">Order Number</th-->
                               <th width="30%">Item Name</th>
                               <th width="10%">Size</th>  
                               <th width="10%">Color</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                                if($values["sesh"]==$_SESSION['customer_ID'] ){
                          ?>  
                          <tr>  
                               
                               <!--td><?php echo $values["order"]; ?></td-->  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_size"]; ?></td> 
                               <td><?php echo $values["item_color"]; ?></td> 
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>P <?php echo $values["item_price"]; ?></td>  
                               <td>P <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="gallery.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                                  }
                               }  
                          ?>  
                          <tr>  
                               <td colspan="5" align="right">Total</td>  
                               <td align="right">P <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  

           </div>  
           <form role="form" id="catalog_order" name="catalog_order" method="POST" action="process/submitcart.php">
            <center><label for="pickdeldate">Pick-up Date: <input type="text" name="pickdeldate" id="pickdeldate" placeholder="MM-DD-YYYY" /></label><center>
            <center><input type="submit" id="submitcart" class="btn btn-orange" value="Order Now" disabled /></center>
           </form>


<!-- end of cart -->



<!-- <div id="foods"  class=" clearfix grid">

    <p> <h2 class="text-center  wowload fadeInUp"> READY-MADE DESIGNS </h2> </p>

    <?php
                      include 'database.php';
                      $pdo = Database::connect();
                      $sql = "SELECT * FROM readymadedesigns ORDER BY design_id ASC";
                      foreach ($pdo->query($sql) as $row) {
                        // echo ' <tr> <td>'. $row['design_code'] . '</td>';
                        // echo ' <td> </td>';
                        // echo '<td>'. $row['ctlg_flavor'] . '</td>';
                        // echo '<td>'. $row['shirt_price'] . '</td>';                            
                        // echo '<td><center><a class="btn btn-medium btn-orange" id="button" href="readymadedesigns.php?design_id='.$row['design_id'].'">View More</a> </center></td> </tr>'; 
                      
                          if ($row ['status']=="Available"){
    echo ' <figure class="effect-oscar  wowload fadeInUp">';
    echo ' <img src="System/pages/admin/uploads/'.$row['picture'].'"> ';
        echo  '<figcaption>';
            echo '<p>Ready-made shirt designs by kiffi arts print shop<br>';
            echo '<a href="readymadedesigns.php?design_id='.$row['design_id'].'">VIEW DETAILS</a></p>';           
        echo '</figcaption>';
    echo '</figure>'; 
      }
    }



      Database::disconnect();
    ?>


    
  </div> -->


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
                      $sql = "SELECT * FROM readymadedesigns ORDER BY design_id ASC";
                      foreach ($pdo->query($sql) as $row) {
                        echo ' <tr> <td>'. $row['design_code'] . '</td>';
                        echo ' <td> </td>';
                        echo '<td>'. $row['ctlg_flavor'] . '</td>';
                        echo '<td>'. $row['shirt_price'] . '</td>';                            
                        echo '<td><center><a class="btn btn-medium btn-orange" id="button" href="readymadedesigns.php?design_id='.$row['design_id'].'">View More</a> </center></td> </tr>'; }
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
                 $sql = 'SELECT * FROM readymadedesigns ORDER BY design_id ASC';
                 foreach ($pdo->query($sql) as $row) { 
                  echo '<tr>' ;
                  echo '<td> <center> '
                  echo '<td> <center> <a class="btn btn-orange" href="readymadedesigns.php?design_id='.$row['design_id'].'">VIEW</a> </td>'; 
                  echo '<tr>' ;

                  }  ?>

                  !- <tr> <td> <p> </p> </td></tr>
                  <tr> <td> <img src="images/cakecatalog/bday_1.png" alt="wed_4" height="280" width="400"/> </td>
                       <td> <img src="images/cakecatalog/dedi_5.png" alt="wed_5" height="280" width="400"/> </td>
                       <td> <img src="images/cakecatalog/dedi_6.png" alt="wed_6" height="280" width="400"/> </td>
                  </tr>


                  ?php foreach ($pdo->query($sql) as $row) { echo '<td> <center> <a class="btn btn-orange" href="readymadedesigns.php?design_id='.$row['design_id'].'"> VIEW </a> </td>'; } Database::disconnect(); ?> 

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





<script type="text/javascript">
    function submit_order(design_id, design_code, shirt_price, $form) {
    $.ajax({
      url   : "process/catalog_ordersent.php", 
      type  : "POST",
      cache : false,
      data  : $form.serialize() + '&design_id=' + design_id + '&design_code=' + design_code + '&shirt_price=' + shirt_price,
      success: function(response) {

        swal(response);
        if(response == "ORDER SENT! <p> Thank You for Ordering! </p>")  {
          } 
      }
    });
  }


      $('#submit').click(function(){ /* when the submit button in the modal is clicked, submit the form */
        swal({
          title: "Are you sure?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#ff5c33",
          confirmButtonText: "Order Now!",
          closeOnConfirm: false
        },

        
        function(isConfirm){
          if (isConfirm) {
            // console.log($('#shirt_price').html());
            submit_order($('#design_id').html(), $('#design_code').html(), $('#shirt_price').html(), $('#catalog_order'));
            //swal("Deleted!", "Your imaginary file has been deleted.", "success");
          } 
        });

        return false;
      });
  </script>

  <script type="text/javascript">

$(function(){
     $("#pickdeldate").datepicker({
         minDate: 3, //1 week before
         dateFormat: "yy-m-d",
         changeMonth: true,
         numberOfMonths: 1,
         changeYear: true,         
     }).on('change', function() {
      if($('#pickdeldate').val() != "")
      {
        $('#submit').prop('disabled', false);
        //console.log("hello");
      }
      else 
      {
        $('#submit').prop('disabled', true);
      }
    });
 });

</script>






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