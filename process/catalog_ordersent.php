<?php

  $link = mysql_connect('localhost', 'root', '');
  if (!$link) { die('Could not connect: ' . mysql_error()); }
  if (!mysql_select_db('kiffiarts')) {  die('Could not select database: ' . mysql_error()); }

  date_default_timezone_set("Asia/Manila");

session_start();

            $design_id = $_POST['design_id'];
            $customer_ID = $_SESSION['customer_ID'];
            $design_code = $_POST['design_code'];
            $dedi_catalog = $_POST['dedicatalog'];
            $shirt_price = $_POST['shirt_price'] * $_POST['dedicatalog'];
            // $picture = $_POST['picture'];
            if(isset($_POST['shirtcolor'])){
            $shirtcolor = $_POST['shirtcolor'];
          }
            $shirtsize = $_POST['shirtsize'];
            $d_date = $_POST['schedule'];

            $o_date  =date('Y/m/d');
            $o_date  =strtotime($o_date);
            $o_date  =date("Ymd", $o_date);
            
            if(isset($shirtcolor)){
            $query1 = "INSERT INTO rmd_orderlist (design_id, customer_ID, design_code, dedi_catalog, shirt_price, shirtcolor, shirtsize, d_date, o_date) VALUES ( '$design_id', '$customer_ID', '$design_code', '$dedi_catalog', '$shirt_price', '$shirtcolor', '$shirtsize', '$d_date', '$o_date')";
          }
          else{
            $query1 = "INSERT INTO rmd_orderlist (design_id, customer_ID, design_code, dedi_catalog, shirt_price, shirtsize, d_date, o_date) VALUES ( '$design_id', '$customer_ID', '$design_code', '$dedi_catalog', '$shirt_price', '$shirtsize', '$d_date', '$o_date')";
          }

            if(@mysql_query($query1,$link))
            {   echo "THANK YOU FOR ORDERING!!";  }  
             else{  print '<p> <h1> Somethings wrong, failed to connect!!!. GAD WHY!?! </h1> '.mysql_error().'</p>';  }
            
?>