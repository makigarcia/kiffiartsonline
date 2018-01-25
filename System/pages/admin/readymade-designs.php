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
   <script type="text/javascript">
      function validateform1(){
        var a=document.forms["Form"]["form-dcode"].value;
        var b=document.forms["Form"]["form-shape"].value;
        var b=document.forms["Form"]["form-size"].value;
        var c=document.forms["Form"]["form-flavor"].value;
        var d=document.forms["Form"]["form-color"].value;
        var e=document.forms["Form"]["form-frost"].value;
        var f=document.forms["Form"]["form-ac"].value;
        var g=document.forms["Form"]["form-ct"].value;
        var h=document.forms["Form"]["form-price"].value;
        
      
      if(a==null||a=="", b==null||b=="", c==null||c=="", d==null||d=="", e==null||e=="", f==null||f=="", g==null||g=="", h==null||h==""){
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
                     <li><a href="approved-orders.php"><i class="fa fa-circle-o"></i> Approve Orders</a></li>
                     <li><a href="pending-orders.php"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
                     <li><a href="deliver-orders.php"><i class="fa fa-circle-o"></i> Deliver Orders</a></li>
                  </ul>
               </li>
               <li class=" treeview">
                  <a href="customer-files.php">
                  <i class="fa fa-files-o"></i><span>Customer Files</span>
                  </a>
               </li>
               <li class="treeview">
                  <a href="billing.php">
                  <i class="fa  fa-shopping-cart"></i><span>Delivered/Picked-Up Orders</span>
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
                     <li class="active"><a href="readymade-designs.php"><i class="fa fa-circle-o"></i> Add Ready-Made Design</a></li>
                     <li><a href="edit-readymade.php"><i class="fa fa-circle-o"></i> Edit Ready-Made Design</a></li>
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
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <h1>
            </h1>
            <ol class="breadcrumb">
               <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li class="active">Add Ready-Made Design</li>
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
                        <h3>Ready-Made Design</h3>
                        <p>Add ready-made design details.</p>
                     </div>
                     <div class="form-top-right">
                     </div>
                  </div>
                  <div class="form-bottom">
                     <div class="row">
                        <form method="post" action="results.php" name="Form" onsubmit="return validateform1()" enctype="multipart/form-data">
                           <div class="col-lg-5 center" style="margin-top:10px;">
                           <br>
                              <div class="form-group">
                                 <label class="sr-only" for="form-dcode">Design Code</label>
                                 <h4>Design Code:</h4>
                                 <input type="text" name="form-dcode" placeholder="Design Code" class="form-dcode form-control" id="form-dcode">
                              </div>



                              <div class="form-group" hidden>
                                 <label class="sr-only" for="form-shape">Catalog Shape</label>
                                 <h4>Shape:</h4>
                                 <select name="form-shape" placeholder="Catalog Shape" class="form-shape form-control" id="form-shape" style="margin:auto;">
                                 <option value="None">Select Option</option>
                                  <option value="circle">Circle</option>
                        <option value="rectangle">Rectangle</option>
                        <option value="heart">Heart</option>
                     
                         </select>

                              </div>







                              <div class="form-group" hidden>
                                 <label class="sr-only" for="form-size">Catalog Size</label>
                                 <h4>Size:</h4>
                                 <select name="form-size" placeholder="Catalog Size" class="form-size form-control" id="form-size" style="margin:auto;">

                                 <option value="None">Select Option</option>
                                  <option value="Semi-Double 2X=24 x 17 x 2.5">Semi-Double 2X=24 x 17 x 2.5</option>
                        <option value="Small Size 1 =  9 diameter x 2.5">Small Size 1 =  9 diameter x 2.5</option>
                        <option value="Small Size 2 = 7 diameter x 3.5">Small Size 2 = 7 diameter x 3.5</option>
                        <option value="Small Size = 12.5 x 10 x 2">Small Size = 12.5 x 10 x 2</option>
                         </select>
                              </div>






                              <div class="form-group" hidden>
                                 <label class="sr-only" for="form-flavor">Catalog Flavor</label>
                                 <h4>Flavor:</h4>
                                 <input type="text" name="form-flavor" placeholder="Catalog Flavor" class="form-flavor form-control" id="form-flavor">
                              </div>
                              <div class="form-group">
                                 <label class="sr-only" for="form-color">Catalog Color</label>
                                 <h4>Shirt Color:</h4>
                                 <input type="text" name="form-color" placeholder="Shirt Color" class="form-color form-control" id="form-color">
                              </div>

                              <div class="form-group">
                                 <label class="sr-only" for="form-frost">Catalog Frost Type</label>
                                 <h4>Shirt Type:</h4>
                                 <select name="form-frost" placeholder="Catalog Frost Type" class="form-frost form-control" id="form-frost" style="margin:auto;">
                                 <option value="None">Select Option</option>
                                  <option value="Election Shirt">Election Shirt</option>
                                  <option value="Cotton Shirt">Cotton Shirt</option>
                        </select>
                              </div>




                              <div class="form-group" hidden>
                                 <label class="sr-only" for="form-ac">Catalog Accesories</label>
                                 <h4>Accesories:</h4>
                                 <input type="text" name="form-ac" placeholder="Catalog Accesories" class="form-ac form-control" id="form-ac">
                              </div>
                              <!--div class="form-group">
                                 <label class="sr-only" for="form-ct">Catalog Time</label>
                                 <h4>Time:</h4>
                                 <input type="text" name="form-ct" placeholder="Catalog Time" class="form-ct form-control" id="form-ct">
                              </div-->
                              <div class="form-group">
                                 <label class="sr-only" for="form-price">Catalog Price</label>
                                 <h4>Price:</h4>
                                 <input type="text" name="form-price" placeholder="Shirt Price" class="form-price form-control" id="form-price">
                              </div>

                              <img src="uploads/unknowncake.png" style="width:100%; max-height:100%;" class="cakeimage"/>
                              <div class="form-group">
                                 <div class="input-group">
                                    <input type="file" onChange="view_image(this, '.cakeimage');" name="form-image" class="form-image form-control" placeholder="Select Image" id="form-image">
                                    <span class="input-group-btn">
                                    <button class="btndashboard" onClick="removeimage('.cakeimage','.form-image');"  type="button">Remove</button>
                                    </span>
                                 </div>
                                 <code class="messageError" style="display:none;"></code>
                              </div>
                              <input type="hidden" name="url" value="9" >
                              <?php echo'<input type="hidden" name="usern" value="' .$usern. '" >'; ?>
                              <br>
                            <center>  <button type="submit" class="btndashboard" >Submit</button> </center>
                        </form>
                        </div> <!--end of first col-->
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
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
         
         ;
                 var num = $(this).data('num');
                 var code = $(this).data('code');
                 var shape = $(this).data('shape');
                 var size = $(this).data('size');
                 var flavor = $(this).data('flavor');
                 var color = $(this).data('color');
                 var typess = $(this).data('typess');
                 var acces = $(this).data('acces');
                 var time = $(this).data('time');
                 var price = $(this).data('price');
         
                 
                 $(".form-num1").val(num);
                 $(".form-code1").val(code);
                 $(".form-shape1").val(shape);
                 $(".form-size1").val(size);
                 $(".form-flavor1").val(flavor);  
                 $(".form-color1").val(color); 
                 $(".form-typess1").val(typess);
                 $(".form-acces1").val(acces);  
                 $(".form-time1").val(time); 
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