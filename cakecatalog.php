<?php
    require 'database.php';
    $catalog_ID = null;
    if ( !empty($_GET['catalog_ID'])) {
        $catalog_ID = $_REQUEST['catalog_ID'];
    }
     
    if ( null==$catalog_ID ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM cakecatalog where catalog_ID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($catalog_ID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

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
<link href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' rel='stylesheet' > <!-- font awesome -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" /> <!-- bootstrap -->
<!-- animate.css -->
<link rel="stylesheet" href="assets/animate/animate.css" />
<link rel="stylesheet" href="assets/animate/set.css" />
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css"> <!-- gallery -->
  <link rel="stylesheet" href="assets/sweetalert.css">
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
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav" style="background-color: black">
          <div class="container">
            <div class="navbar-header"> <!-- Logo Starts -->
              <a class="navbar-brand" href="home.php"> 
              <img src="images/logoboth.jpg" alt="Smiley face" style="width: 50%"></a> <!-- #Logo Ends -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
              </button>
            </div>

            
            <div class="navbar-collapse collapse"> <!-- Nav Starts -->
              <ul class="nav navbar-nav navbar-right cl-effect-21">
                 <li class="hidden">  <a href="#page-top"> </a>
                 <li class="page-scroll"><a href="home.php">Home</a></li>
                 <li class="page-scroll"><a href="profile.php"> Profile</a></li>
                 <li class="current"><a href="gallery.php">Gallery</a></li>
                 <li class="page-scroll"><a href="#" class="mb-control" data-box="#message-box-default">Log Out</a></li>
                 </ul>
            </div>  <!-- #Nav Ends -->
          </div>
        </div>
      </div>
    </div>




<!-- ****** DISPLAY ORDER START ***** -->
<p> </p>
<div id="order"  class="container spacer about"> 
  <p> </p> <p> </p>  <p> </p>  
  
  <h2 class="text-center wowload fadeInUp"> SHIRT DETAILS</h2> 
<br> <br>
    <div class="row">
    
   

      <div class="container contactform center responsive">

  
               
            <div class="picture1">
                      <div class="col-md-6"> 
                           <?php echo '<img src="System/pages/admin/uploads/'.$data['picture'].'" style="width:400px; height:400px;">'; ?>
                      </div>
                    </div>


           
            <div class="picture2">
                <div class="row">
                      <div class="col-md-9">

                      <table class="table table-bordered" id="dataTables-example">
               <col width="100" style="background-color: #F0F0F0;"> <col width="200">
             <tbody> 

             <tr> <td> Design ID </td> <td> <span id="catalog_ID"> <?php echo $data['catalog_ID']; ?> </span> </td> </tr>

             <tr> <td> Design Code </td> <td> <span id="design_code"> <?php echo $data['design_code']; ?> </span> </td> </tr>

             <!-- <tr> <td> Shape </td> <td> <?php echo $data['ctlg_shape'];?> </td> </tr> -->

             <!-- <tr> <td> Size </td> <td> <?php echo $data['ctlg_size'];?> </td> </tr> -->

             <!-- <tr> <td> Flavor </td> <td> <?php echo $data['ctlg_flavor'];?></td> </tr> -->

             <tr> <td> Shirt Color </td> <td> <?php echo $data['ctlg_frostcolor'];?> </td> </tr>

             <tr> <td> Shirt Type </td> <td> <?php echo $data['ctlg_frosttype'];?> </td> </tr>

             <!-- <tr> <td> Accessories</td> <td> <?php echo $data['ctlg_acces'];?>  </td> </tr> -->

             <tr> <td> Price </td> <td> <span id="ctlg_price"> <?php echo $data['ctlg_price'];?> </span> </td> </tr>

             </tbody>
            </table>


                      </div>
                </div>
            </div>


            

              </div>
            </div>
          <center><h4>
          Pick-up at Kiffi Arts Print Shop main branch is from 9AM-5PM.</h4>
             <br> </br> 


            <form role="form" id="catalog_order" name="catalog_order" method="POST" action="process/catalog_ordersent.php"> 
             <h4> <table style="width:1200px; border-color: #fff;">
             <col width="50"> <col width="300">
              <tbody>
              <tr> <td> <label for="schedule"> Pick-up Date: </label> <input type="text" id="schedule" name="schedule" placeholder="MM-DD-YYYY" />   </td>
                <td> <label for='shirtsize'> Shirt Size:
                  <select id='shirtsize' name='shirtsize'>
                    <option value='Extra Small'>XS</option>
                    <option value='Small'>S</option>
                    <option value='Medium'>M</option>
                    <option value='Large'>L</option>
                    <option value='Extra Large'>XL</option>
                    <option value='XX Large'>XXL</option>
                  </select> </td>

                <?php if($data['ctlg_frostcolor']=='Any')
                  echo "<td> <label for='shirtcolor'> Shirt Color:
                  <select id='shirtcolor' name='shirtcolor'>
                    <option value='White'>White</option>
                    <option value='Black'>Black</option>
                    <option value='Blue'>Blue</option>
                    <option value='Red'>Red</option>
                  </select> </td>"; ?>
              
                    <!-- <td> <label for="figurine_select"> Figurine/s: </label> <select name="figurine_sel" id="figurine_select"> 

                              <option selected value="">-- None --</option>
                              <option value="spongebob">Spongebob</option>
                              <option value="dora">Dora</option>
                              <option value="angrybird">Angry Bird</option>
                              <option value="princess">Princess</option>
                              <option value="cars">Cars</option>
                              <option value="elsa">Elsa</option>
                              <option value="ppf">PowerPuff Girls</option>
                              <option value="o">Other</option>  </select> 

                        <span id="o" class="design" style="display: none;">
                        <input type="text" size="10" id="other_figurine" name="figurine_sel_other" placeholder="Please Specify"></span> </td> --> </tr> 

                        

              <tr> <td>  <label for="dedicatalog"> Quantity: </label> <input type="text" name="dedicatalog" id="dedicatalog" size="20" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Number of Shirts" />
              <!-- <div class="datepicker dropdown-menu show-calendar"> <div> --> </td>
              <td> </td>
              </tr>
                             
            </tbody>
            </table> </h4>

                      
            <hr> </hr>
            <input type="submit" id="submit" class="btn btn-orange" value="Order Now" disabled />

            <a href="gallery.php"> <input type="button" class="btn btn-default" data-dismiss="modal" value="Close" /> </a> </center>
        </div>
        </form>
                  
        </div>
    </div>

      <!-- 2nd column -->
<!-- ********* #DISPLAY ORDER Ends ********* -->



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
        </div> <!-- end default -->
        

    </div>
</div>      


<script src="js/jquery.min.js"></script>
<script src="js/datepicker.js"></script>
<script src="js/jquery_validate.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="assets/wow/wow.min.js"></script><!-- wow script -->
<script src="assets/script.js"></script><!-- custom script -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script><!-- boostrap -->
<script src="js/actions.js"></script><!-- message alert box -->
<script src="js/sweetalert/sweetalert-dev.js"></script>
<script src="js/sweetalert/sweetalert.js"></script>




<script type="text/javascript">
    function submit_order(catalog_ID, design_code, ctlg_price, $form) {
    $.ajax({
      url   : "process/catalog_ordersent.php", 
      type  : "POST",
      cache : false,
      data  : $form.serialize() + '&catalog_ID=' + catalog_ID + '&design_code=' + design_code + '&ctlg_price=' + ctlg_price,
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
            // console.log($('#ctlg_price').html());
            submit_order($('#catalog_ID').html(), $('#design_code').html(), $('#ctlg_price').html(), $('#catalog_order'));
            //swal("Deleted!", "Your imaginary file has been deleted.", "success");
          } 
        });

        return false;
      });
  </script>

  <script type="text/javascript">

$(function(){
     $("#schedule").datepicker({
         minDate: 3, //1 week before
         dateFormat: "yy-m-d",
         changeMonth: true,
         numberOfMonths: 1,
         changeYear: true,         
     }).on('change', function() {
      if($('#schedule').val() != "")
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
</html>
