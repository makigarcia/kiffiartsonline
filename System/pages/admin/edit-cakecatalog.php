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
                     <i class="fa  fa-shopping-cart"></i><span>Delivered Orders/Picked-Up</span>
                     </a>  
                  </li>
                  <li class="treeview">
                     <a href="pricelist.php">
                     <i class="fa fa-user-md"></i><span>Price List</span>
                     </a>  
                  </li>
                  <li class=" active treeview">
                     <a href="#">
                     <i class="fa fa-edit"></i> <span>Manage Ready-Made Designs</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="cake-catalog.php"><i class="fa fa-circle-o"></i> Add Ready-Made Design</a></li>
                        <li class="active"><a href="edit-cakecatalog.php"><i class="fa fa-circle-o"></i> Edit Ready-Made Design</a></li>
                     </ul>
                  </li>
                     <li class="treeview">
                  <a href="#">
                  <i class="fa fa-edit"></i> <span>Report List</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class=" active treeview-menu">
                     <li ><a href="daily_report.php"><i class="fa fa-circle-o"></i> Daily Succesful Report</a></li>
                     <li ><a href="daily_report1.php"><i class="fa fa-circle-o"></i> Daily Unsuccesful Report</a></li>
                     <li><a href="monthly_report.php"><i class="fa fa-circle-o"></i> Monthly Succesful Report</a></li>
                     <li><a href="monthly_report1.php"><i class="fa fa-circle-o"></i> Monthly Unsuccesful Report</a></li>
                  </ul>
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
               <h1>
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Edit Ready-Made Designs</li>
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
                              <h3>Update Ready-Made Designs</h3>
                              <p>Edit details.</p>
                           </div>
                           <div class="form-top-right">
                              <i class="fa fa-laptop "></i>
                           </div>
                        </div>
                        <div class="col-lg-12" style="margin-top: 10px;">
                           <div class="box border" style="border-top: 3px solid #a54c18;">
                              <div class="box-header"><b>List of Ready-Made Designs</b></div>
                              <div class="box-body table-responsive no-padding">
                                 <table class="table table-hover">
                                    <th>Design ID </center></th>
                                    <th>Design Code</center></th>
                                    <th class="hidden">
                                       <center>Shape</center>
                                    </th>
                                    <th class="hidden">
                                       <center>Size</center>
                                    </th>
                                    <th class="hidden">
                                       <center>Frost Color</center>
                                    </th>
                                    <th class="hidden">
                                       <center>Frost Type</center>
                                    </th>
                                    <th class="hidden">
                                       <center>Accesories</center>
                                    </th>
                                    <th class="hidden">
                                       <center>Time</center>
                                    </th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                    <?php echo '<th>';?>
                                    <?php echo '</th>';?>
                                    </tr>
                                    <?php
                                       $bi = mysql_query("SELECT Count(`catalog_ID`) FROM `cakecatalog`");
                                       $b1 = mysql_fetch_array($bi);
                                       $b1=$b1[0];
                                       
                                       
                                       $query3 = "SELECT `catalog_ID`,`design_code`, `ctlg_shape`, `ctlg_size`, `ctlg_flavor`, `ctlg_frostcolor`,`ctlg_frosttype`, `ctlg_acces`, `ctlg_time`, `ctlg_price`, `status`, `picture` FROM `cakecatalog`";
                                       $r3 = @mysql_query($query3, $dbc); 
                                       while ($row3 = mysql_fetch_array($r3, MYSQL_ASSOC)) {
                                           $storeArray2[][] =  $row3;
                                       }
                                       
                                       for($c=0;  $c<$b1;$c++){
                                         $catalog_ID=$storeArray2[$c][0]['catalog_ID'];
                                         $DC=$storeArray2[$c][0]['design_code'];
                                         $CS = $storeArray2[$c][0]['ctlg_shape'];
                                         $CSS = $storeArray2[$c][0]['ctlg_size'];
                                         $CF = $storeArray2[$c][0]['ctlg_flavor'];
                                         $CFC = $storeArray2[$c][0]['ctlg_frostcolor'];
                                         $FT = $storeArray2[$c][0]['ctlg_frosttype'];
                                         $CCA = $storeArray2[$c][0]['ctlg_acces'];
                                         $CT = $storeArray2[$c][0]['ctlg_time'];
                                         $CP = $storeArray2[$c][0]['ctlg_price'];
                                         $S = $storeArray2[$c][0]['status'];
										 $img = $storeArray2[$c][0]['picture'];
                                       
                                            echo '<tr>';
                                            echo '<td>'.$storeArray2[$c][0]['catalog_ID'].'</td>';
                                            echo '<td>'.$storeArray2[$c][0]['design_code'].'</td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['ctlg_shape'].'</td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['ctlg_size'].' </td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['ctlg_flavor'].' php </td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['ctlg_frostcolor'].'</td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['ctlg_frosttype'].'</td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['ctlg_acces'].'</td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['ctlg_time'].' </td>';
                                            echo '<td>'.$storeArray2[$c][0]['ctlg_price'].' php</td>';
                                            echo '<td class="hidden">'.$storeArray2[$c][0]['status'].'</td>';
                                       
                                           
                                       ?>
                                    <?php
                                       if($storeArray2[$c][0]['status']=="Available"){
                                       ?>
                                    <?php echo '<td>';?>
                                    <form method=POST id="form2_<?php echo $c;?>" action="results.php">
                                       <?php echo '<input type="hidden" name="catalog_ID" value="' .$catalog_ID. '" >';?>
                                       <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                       <?php echo'<input type="hidden" name="url" value="13" >'; ?>
                                       <a href="#" onclick="confirm_pres1(<?php echo $c;?>)" class="btndashboard" style="background: #DD4B39;"> Mark as Unavailable</a></td>
                                    </form>
                                    <?php echo '</td>';?>
                                    <?php
                                       }else{
                                       ?>
                                    <?php echo '<td>';?>
                                    <form method=POST id="form3_<?php echo $c;?>" action="results.php">
                                       <?php echo '<input type="hidden" name="catalog_ID" value="' .$catalog_ID. '" >';?>
                                       <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                                       <?php echo'<input type="hidden" name="url" value="14" >'; ?>
                                       <a href="#" onclick="confirm_pres2(<?php echo $c;?>)" class="btndashboard" style="background: #00A65A;"> Mark as Available</a></td>
                                    </form>
                                    <?php echo '</td>';?>
                                    <?php
                                       }
                                       ?>
                                    <?php echo '<td>';?>
                                    <form method=POST id="form4_<?php echo $c;?>" action="edit-cakecatalog.php">
                                       <?php echo '<input type="hidden" name="catalog_ID" value="' .$catalog_ID. '" >';?>
                                       <a href="#" class="btndashboard edittreat" 
                                          data-dcode="<?php echo $DC; ?>" 
                                          data-shape="<?php echo $CS;?>" 
                                          data-size="<?php echo $CSS; ?>" 
                                          data-flavor="<?php echo $CF; ?>" 
                                          data-color="<?php echo $CFC;?>" 
                                          data-frost="<?php echo $FT; ?>" 
                                          data-ac="<?php echo $CCA; ?>" 
                                          data-ct="<?php echo $CT;?>" 
                                          data-price="<?php echo $CP; ?>" 
                                          data-code="<?php echo $catalog_ID; ?>"
										  data-img="<?php echo $img; ?>"
                                          style="background: #F39C12;" data-toggle="modal" data-target=".edit-treat"> Edit</a></td>
                                    </form>
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
                  </div>
                  <!--end of second col-->
               </div>
               <!--end of row -->
         </div>
         <!--end of form bottom-->
         </fieldset>
      </div>
      </div>
      
      <!-- ** EDIT TREATMENT-->
      <div class="modal fade edit-treat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" style="text-align:center;">Edit Cake Catalog</h4>
      </div>
      <div class="modal-body">
      <!-- content goes here -->
     <h3> <p style="text-align:center">Please fill out the fields. </p>
      <form method="post" action="results.php" id="form4_<?php echo $c;?>" enctype="multipart/form-data">
      <label class="sr-only" for="form-code">Catalog ID</label>
      <input type="hidden" name="form-code" placeholder="Treatment Code" class="form-code1 form-control" id="form-code">
      <div class="form-group">
      Design Code:
      <label class="sr-only" for="form-dcode">Design Code Shape</label>
      <input type="text" name="form-dcode" placeholder="Catalog Size" class="form-dcode1 form-control" id="form-dcode">
      </div>     
      <!-- Catalog Shape:                 
      <div class="form-group">
      <label class="sr-only" for="form-shape">Catalog Shape</label>
      <input type="text" name="form-shape" placeholder="Catalog Size" class="form-shape1 form-control" id="form-shape">
      </div>   
      Catalog Size:
      <div class="form-group">
      <label class="sr-only" for="form-size">Catalog Size</label>
      <input type="text" name="form-size" placeholder="Catalog Size" class="form-size1 form-control" id="form-size">
      </div> -->  
      Shirt Color:
      <div class="form-group">
      <label class="sr-only" for="form-color">Catalog Frost Color</label>
      <input type="text" name="form-color" placeholder="Catalog Frost Color" class="form-color1 form-control" id="form-color">
      </div>    
      Shirt Type:
      <div class="form-group">
      <label class="sr-only" for="form-frost">Catalog Frost Type</label>
      <input type="text" name="form-frost" placeholder="Catalog Frost Type" class="form-frost1 form-control" id="form-frost">
      </div>    
      <!-- Catalog Accesories:
      <div class="form-group">
      <label class="sr-only" for="form-ac">Catalog Accesories</label>
      <input type="text" name="form-ac" placeholder="Catalog Accesories" class="form-ac1 form-control" id="form-ac">
      </div>  
      Catalog Time:
      <div class="form-group">
      <label class="sr-only" for="form-ct">Catalog Time</label>
      <input type="text" name="form-ct" placeholder="Catalog Size" class="form-ct1 form-control" id="form-ct">
      </div> -->  
      Price
      <div class="form-group">
      <label class="sr-only" for="form-price">Shirt Price</label>
      <input type="text" name="form-price" placeholder="Shirt Price" class="form-price1 form-control" id="form-price">
      </div>  </h3>
	  
	  <img src="uploads/unknowncake.png" style="width:100%; max-height:100%;" class="cakeimage"/>                         
		<div class="form-group">
									<div class="input-group">
										<input type="file" onChange="view_image(this, '.cakeimage');" name="form-image1" class="form-image1 form-control" placeholder="Select Image" id="form-image">
										<span class="input-group-btn">
										  <button class="btndashboard" onClick="removeimage('.cakeimage','.form-image1');"  type="button">Remove</button>
										</span>
									</div>
								  
								  <code class="messageError" style="display:none;"></code>
                              </div>
	  
      <?php echo'<input type="hidden" name="url" value="17" >'; ?>
      <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
      </div>
      <div class="modal-footer">
     <center> <button type="button" class="btndashboard" data-dismiss="modal">Back</button>            
      <button type="submit" class="btndashboard">Submit</button></center>
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
         var answer = confirm("Are you sure you want to mark this service as Available?")
             if (answer)
             {
               var mi='form3_'+mine;
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
             
			 var imagespot='';
          function view_image(simg, imagehtml) {
			file_selected = $(simg).val();
			if(file_selected!="" || file_selected!=""){			
				var file = simg.files[0];
				var imagefile = file.type;
				var match = ["image/jpeg","image/png","image/jpg","image/gif"];		
				if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])|| (imagefile==match[3]))){
					$(".messageError").css('display', 'block');
					$(".messageError").html("Invalid file format! "+"<b>Note:</b>"+"Only jpeg, jpg, gif and png Images type allowed");
					$(simg).val("");
					return false;
				} else {
					imagespot=imagehtml;
					$(".messageError").html('');
					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(simg.files[0]);			
				}
			}else {	
				$('.messageError').html("");
			}
		}
		 function imageIsLoaded(e) {
				$(imagespot).attr('src', e.target.result);
			}
			function removeimage(img, slcimg) {
				$(slcimg).val('');
				$(img).attr("src","uploads/unknowncake.png");
			}
      </script>
      <script>
         $(document).on( "click", '.edittreat',function(e) {
         
                 var code = $(this).data('code');
                 var dcode = $(this).data('dcode');
                 var shape = $(this).data('shape');
                 var size = $(this).data('size');
                 var flavor = $(this).data('flavor');
                 var color = $(this).data('color');
                  var frost = $(this).data('frost');
                 var ac = $(this).data('ac');
                 var ct = $(this).data('ct');
                 var price = $(this).data('price');
				 var img = $(this).data('img');
			 
                 $(".form-code1").val(code);
                 $(".form-dcode1").val(dcode);
                 $(".form-shape1").val(shape);
                 $(".form-size1").val(size);
                 $(".form-flavor1").val(flavor);
                  $(".form-color1").val(color);
                 $(".form-frost1").val(frost);
                 $(".form-ac1").val(ac);
                 $(".form-ct1").val(ct);
                 $(".form-price1").val(price);
				 $('.cakeimage').attr("src","uploads/"+img);
                  
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