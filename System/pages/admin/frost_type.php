<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Kiffi Arts Admin Dashboard</title>
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
      <link rel="stylesheet" type="text/css" id="theme" href="../../assets/css/theme-default.css"/>
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <!--=========================  PHP CODE =========================-->
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
   <!-- <script type="text/javascript">
      function validateform1(){
        var a=document.forms["Form"]["form-code"].value;
        var b=document.forms["Form"]["form-shape"].value;
        \
      
      if(a==null||a=="", b==null||b==""){
        alert("Please fill all required field");
        return false;
      }
      
      }
      
      function validateform2(){
        var a=document.forms["Form1"]["ptitle"].value;
        var b=document.forms["Form1"]["pdes"].value;
      
      if(a==null||a=="", b==null||b==""){
        alert("Please fill all required field");
        return false;
      }
      
      }
      
      </script>
       -->
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="../../dashboard.php" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><img src="../../images/Title_myrnas1.jpg"></span>
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
                     <img src="../../images/Title_myrnas1.jpg" alt="User Image">
                  </div>
                  <div class="pull-left info" style="line-height: 17px; padding-top: 10px;">
                  </div>
               </div>
               <!-- search form -->
               <!-- sidebar menu: : style can be found in sidebar.less -->
               <ul class="sidebar-menu">
                  <li class="header">MAIN NAVIGATION</li>
                  <li class=" treeview">
                     <a href="dashboard.php">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                  </li>
                  <!--Account Information menu-->
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Orders</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="forms/general.html"><i class="fa fa-circle-o"></i> Approve Orders</a></li>
                        <li><a href="forms/advanced.html"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                        <li><a href="forms/editors.html"><i class="fa fa-circle-o"></i> Deliver Orders</a></li>
                     </ul>
                  </li>
                  <li class=" treeview">
                     <a href="customer-files.php">
                     <i class="fa fa-files-o"></i><span>Customer Files</span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="billing.php">
                     <i class="fa fa-usd"></i><span>Billing and Delivery</span>
                     </a>  
                  </li>
                  <li class="active treeview">
                     <a href="pricelist.php">
                     <i class="fa fa-user-md"></i><span>Price List</span>
                     </a>  
                  </li>
                  <li class="  treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Cake Catalog</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="cake-catalog.php"><i class="fa fa-circle-o"></i> Add Cake Catalog</a></li>
                        <li><a href="edit-cakecatalog.php"><i class="fa fa-circle-o"></i> Edit Cake Catalog</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="report_list.php">
                     <i class="fa fa-file-text-o"></i><span>Report</span>
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
               <h1>
               </h1>
               <ol class="breadcrumb">
                 
               </ol>
               <br>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="center col-lg-11">
                  <div class="box border">
                     <fieldset>
                        <div class="form-top" style="padding-bottom:0px;">
                           <div class="form-top-left">
                              <h3>Update Pricelist</h3>
                              <p>Edit details.</p>
                           </div>
                           <div class="form-top-right">
                              <i class="fa fa-laptop "></i>
                           </div>
                        </div>
                         <a href="pricelist.php"  class="btndashboard" style="background: #227da0;">back</a>
                        <div class="col-lg-12" style="margin-top: 10px;">
                           <div class="box border" style="border-top: 3px solid #a54c18;">
                              <div class="box-header"><b>List of Cake Catalogs</b></div>
                              <div class="box-body table-responsive no-padding">
                                 <table class="table table-hover">
                                    <th> </center></th>
                                    <th><h3>Occasion Price</h3></th>
                                    <th> <h3>Price</center></h3></th>
                                    <th></th>
                              
                                    <th></th>
                                    <th></th>
                                    <?php echo '<th>';?>
                                    <?php echo '</th>';?>
                                    </tr>
                                    <?php
                                       $bi = mysql_query("SELECT Count(`price_ID`) FROM `pricelist`");
                                       $b1 = mysql_fetch_array($bi);
                                       $b1=$b1[0];
                                       
                                       
                                       $query3 = "SELECT * FROM `pricelist`";
                                       $r3 = @mysql_query($query3, $dbc); 
                                       while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
                                           $storeArray2[][] =  $row3;
                                       }
                                       
                                       for($c=0;  $c<$b1;$c++){
                                         $price_ID=$storeArray2[$c][0]['price_ID'];
                                         $A=$storeArray2[$c][0]['frost_sugar_price'];
                                         $B = $storeArray2[$c][0]['frost_bcream_price'];
                                         $C = $storeArray2[$c][0]['frost_mmallow_price'];
                                         $D = $storeArray2[$c][0]['frost_fondant_price'];
                                       
                                       
                                       ?>
                                   
                                    <?php
                                
                                       
                                       
                                        echo '<center><tr>';
                                        echo '<td class="hidden">'.$storeArray2[$c][0]['price_ID'].'</td>';
                                        echo '<td></td>';
                                        echo '<td><h4>Forst Sugar Price</h4></td>';
                                        echo '<td><h3>'.$storeArray2[$c][0]['frost_sugar_price'].'</h3></td>'; ?>
                                  
                                    <?php
                                       echo '<td></td>';
                                       echo '</tr></center>';  

                                        echo '<tr>';
                                        echo '<td class="hidden">'.$storeArray2[$c][0]['price_ID'].'</td>';
                                        echo '<td></td>';
                                        echo '<td><h4>Frost Butter Cream Price</h4></td>';
                                        echo '<td><h3>'.$storeArray2[$c][0]['frost_bcream_price'].'</h3></td>'; ?>
                                    <?php echo '<td>';?>
                                   
                                    <?php
                                       echo '<td></td>';
                                       echo '</tr>';                         


                                        echo '<tr>';
                                        echo '<td class="hidden">'.$storeArray2[$c][0]['price_ID'].'</td>';
                                        echo '<td></td>';
                                        echo '<td> <h4>Frost Marshmallow Cream Price </h4></td>';
                                        echo '<td> <h3>'.$storeArray2[$c][0]['frost_mmallow_price'].' <h3></td>'; ?>
                                    <?php echo '<td>';?>

                                    <?php
                                       echo '<td></td>';
                                       echo '</tr>';                  


                                        echo '<tr>';
                                        echo '<td class="hidden">'.$storeArray2[$c][0]['occ_price'].'</td>';
                                        echo '<td></td>';
                                        echo '<td><h4>Frost Fondant Price</h4></td>';
                                        echo '<td><h3>'.$storeArray2[$c][0]['frost_fondant_price'].'</h3></td>'; ?>
                                    



                                    <?php
                                       echo '<td></td>';
                                       echo '</tr>';        
                                        echo '<td>';?>
                                   <center> <form method=POST id="form4_<?php echo $c;?>" action="secretary-prescription.php">
                                       <?php echo '<input type="hidden" name="price_ID" value="' .$price_ID. '" >';?>
                                       <a href="#" 
                                       data-one="<?php echo $A; ?>" 
                                          data-two="<?php echo $B; ?>"
                                          data-three="<?php echo $C; ?>" 

                                          data-four="<?php echo $D; ?>" 
                                          data-code="<?php echo $price_ID; ?>"
                                           data-toggle="modal" data-target=".edit-treat"> </a></td>
                                    </form></center>
                                    <?php echo '</td>';?>     
 <?php echo '<td>';?>
                                    <td> <form method=POST id="form4_<?php echo $c;?>" action="secretary-prescription.php">
                                       <?php echo '<input type="hidden" name="price_ID" value="' .$price_ID. '" >';?>
                                       <a href="#" class="btndashboard edittreat" 
                                       data-one="<?php echo $A; ?>" 
                                          data-two="<?php echo $B; ?>"
                                          data-three="<?php echo $C; ?>" 

                                          data-four="<?php echo $D; ?>" 
                                          data-code="<?php echo $price_ID; ?>"
                                          style="background: #F39C12;" data-toggle="modal" data-target=".edit-treat"> Edit</a>
                                    </form></td>
                                    <?php echo '</td>';?>
                                    <?php
                                       echo '<td></td>';
                                       echo '</tr>';                         

                                       
                                       }
                                       
                                       ?>
                                 </table>
                              </div>

                           </div>

                        </div>
                        
                                 </table>
                              </div>
                           </div>
                  </div>



                  <!--end of second col-->
               </div>
               <!--end of row -->
         </div>
         <!--end of form bottom-->
         </fieldset>
      </div>
    
      <!-- ** EDIT TREATMENT-->
      <div class="modal fade edit-treat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Edit Pricelist</h4>
      </div>
      <div class="modal-body">
      <!-- content goes here -->
      <h3><p style="text-align:center">Please fill out the fields. </p>
      <form method="post" action="results.php" id="form4_<?php echo $c;?>">
      <label class="sr-only" for="form-code">price ID</label>
      <input type="hidden" name="form-code" placeholder="Treatment Code" class="form-code1 form-control" id="form-code">
      <div class="form-group">
      Frost Sugar Price:
      <label class="sr-only" for="form-one">Wedding Price</label>
      <input type="text" name="form-one" placeholder="price" class="form-one1 form-control" id="form-one">
      </div>        
       <div class="form-group">
       Frost Butter Cream Price:
      <label class="sr-only" for="form-two">Wedding Price</label>
      <input type="text" name="form-two" placeholder="price" class="form-two1 form-control" id="form-two">
      </div>                     
       <div class="form-group">
       Frost Marshmallow Price:
      <label class="sr-only" for="form-three">Wedding Price</label>
      <input type="text" name="form-three" placeholder="price" class="form-three1 form-control" id="form-three">
      </div>         
       <div class="form-group">
       Frost Fondant Price:
      <label class="sr-only" for="form-four">Wedding Price</label>
      <input type="text" name="form-four" placeholder="price" class="form-four1 form-control" id="form-four">
      </div>        
      <?php echo'<input type="hidden" name="url" value="25" >'; ?>
      <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
      </div></h3>
      <div class="modal-footer">
      <center>
      <button type="button" class="btndashboard" data-dismiss="modal">Back</button>            
      <button type="submit" onclick="confirm_pres2(<?php echo $c;?>)" class="btndashboard">Submit</button></center>
      </form>
      </div>
      </div>
      </div>
      </div>
     



      </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!-- jQuery 2.1.4 -->
      <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="../../js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="../../plugins/fastclick/fastclick.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/app.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <script src="../../js/jquery.js"></script>
      <script src="../../js/signup.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.noConflict();  //Not to conflict with other scripts
         $.widget.bridge('uibutton', $.ui.button);
      </script>
      <script>
         function confirm_pres(mine) {
         var answer = confirm("Are you sure you want to add another prescription?")
             if (answer)
             {
               var mi='form1_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
         function confirm_pres1(mine) {
         var answer = confirm("Are you sure you want to mark this service as Unavailable?")
             if (answer)
             {
               var mi='form2_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
        
          function confirm_pres2(mine) {
         var answer = confirm("Are you sure you want to edit the price? ")

             if (answer)
             {
               var mi='form4_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         function confirm_pres3(mine) {
         var answer = confirm("Are you sure you want to Delete this Prescription?")
             if (answer)
             {
               var mi='form5_'+mine;
                 document.getElementById(mi).submit();
             }
         }
         
         
         function confirm_pres4(mine) {
         var answer = confirm("Are you sure you want to edit this Prescription?")
             if (answer)
             {
               var mi='form6_'+mine;
                 document.getElementById(mi).submit();
             }
         }
             
      </script>
      <script>
         $(document).on( "click", '.edittreat',function(e) {
         
                 var code = $(this).data('code');
                 var one = $(this).data('one');
                 var two = $(this).data('two');
                 var three = $(this).data('three');
                 var four = $(this).data('four');
                 var color = $(this).data('color');
                  var frost = $(this).data('frost');
                 var ac = $(this).data('ac');
                 var ct = $(this).data('ct');
                 var price = $(this).data('price');
         
                 $(".form-code1").val(code);
                 $(".form-one1").val(one);
                 $(".form-two1").val(two);
                 $(".form-three1").val(three);
                 $(".form-four1").val(four);
                  $(".form-color1").val(color);
                 $(".form-frost1").val(frost);
                 $(".form-ac1").val(ac);
                 $(".form-ct1").val(ct);
                 $(".form-price1").val(price);
                  
             });
         
      </script>
      <script>
         $(document).on( "click", '.editpres',function(e) {
         
                 var name = $(this).data('title');
                 var code = $(this).data('code');
                 var des = $(this).data('desc');
         
                 $(".form-pres-title").val(name);
                 $(".form-pres-code").val(code);
                 $(".form-pres-det").val(des);
         
         
             });
         
      </script>
   </body>
</html>