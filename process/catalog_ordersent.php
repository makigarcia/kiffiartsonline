<?php

  $link = mysql_connect('localhost', 'root', '');
  if (!$link) { die('Could not connect: ' . mysql_error()); }
  if (!mysql_select_db('kiffiarts')) {  die('Could not select database: ' . mysql_error()); }

  date_default_timezone_set("Asia/Manila");

session_start();

            $catalog_ID = $_POST['catalog_ID'];
            $customer_ID = $_SESSION['customer_ID'];
            $catalog_code = $_POST['design_code'];
            $dedi_catalog = $_POST['dedicatalog'];
            $catalog_price = $_POST['ctlg_price'];
            // $picture = $_POST['picture'];
            if(isset($_POST['shirtcolor'])){
            $shirtcolor = $_POST['shirtcolor'];
          }
            $shirtsize = $_POST['shirtsize'];
            $duedate_catalog = $_POST['schedule'];

            $ordercat_created  =date('Y/m/d');
            $ordercat_created  =strtotime($ordercat_created);
            $ordercat_created  =date("Ymd", $ordercat_created);
            
            if(isset($shirtcolor)){
            $query1 = "INSERT INTO catalog_orderlist (catalog_ID, customer_ID, catalog_code, dedi_catalog, catalog_price, shirtcolor, shirtsize, duedate_catalog, ordercat_created) VALUES ( '$catalog_ID', '$customer_ID', '$catalog_code', '$dedi_catalog', '$catalog_price', '$shirtcolor', '$shirtsize', '$duedate_catalog', '$ordercat_created')";
          }
          else{
            $query1 = "INSERT INTO catalog_orderlist (catalog_ID, customer_ID, catalog_code, dedi_catalog, catalog_price, shirtsize, duedate_catalog, ordercat_created) VALUES ( '$catalog_ID', '$customer_ID', '$catalog_code', '$dedi_catalog', '$catalog_price', '$shirtsize', '$duedate_catalog', '$ordercat_created')";
          }

            if(@mysql_query($query1,$link))
            {   echo "THANK YOU FOR ORDERING!!";  }  
             else{  print '<p> <h1> Somethings wrong, failed to connect!!!. GAD WHY!?! </h1> '.mysql_error().'</p>';  }
            
?>