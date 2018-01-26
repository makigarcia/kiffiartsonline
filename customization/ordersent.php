<?php


  $link = mysql_connect('localhost', 'root', '');
  if (!$link) { die('Could not connect: ' . mysql_error()); }
  if (!mysql_select_db('kiffiarts')) {  die('Could not select database: ' . mysql_error()); }

  session_start();

 // Start the session

        
            $customer_ID = $_SESSION['customer_ID'];

            $shirt_typenew = $_POST['shirt_typenew'];
            $cake_shape = $_POST['cake_shape'];
            $cake_size = $_POST['cakesize'];
            $cake_layer = $_POST['cake_layer_num'];
            $shirt_colornew = $_POST['cake_color']; 
            //$cake_frost = $_POST['cake_frost']; 
            //$cake_flavor = $_POST['cake_flavor'];
            //$figurine_other = $_POST['figurine_other'];
            //$dedicationT = $_POST['dedicationT'];
            $candle_selection = $_POST['candle_selection'];
            $shirt_quantitynew = $_POST['shirt_quantitynew'];
            $other_concerns = $_POST['other_concerns'];
            $pricenew = $_POST['totalPrice_cake'];

            $o_datenew = date('Y/m/d');
            $o_datenew = strtotime($o_datenew);
            $o_datenew = date("Ymd", $o_datenew);
            
            $d_datenew = $_POST['service_date']; // $totalPrice = $_POST['totalPrice'];
            $d_timenew = $_POST['service_time'];
            $del_venue = $_POST['del_venue'];
            $branch_name = $_POST['branch_name'];
            
            $savecanvas = str_replace(' ', '+', $_POST['canvas']); //IMAGE CODE 
            
            
            
            //figurine_select, figurine_other,  '$figurine_select', '$figurine_other', 
            //removed customer_ID
            $query1 = "INSERT INTO  order_list (customer_ID, shirt_typenew, cake_shape, cake_size, cake_layer, shirt_colornew, candle_selection,  shirt_quantitynew, other_concerns, pricenew, o_datenew, d_datenew, d_timenew, branch_name, del_venue, canvas) VALUES ('$customer_ID', '$shirt_typenew', '$cake_shape', '$cake_size', '$cake_layer', '$shirt_colornew', '$candle_selection', '$shirt_quantitynew', '$other_concerns', '$pricenew', '".$o_datenew."', '$d_datenew', '$d_timenew', '$branch_name', '$del_venue','$savecanvas')";

            // echo $cake_size;

            if(@mysql_query($query1,$link))
              {     echo "Done!"; 
          }  
            
            else {  print '<p> <h1> Somethings wrong, failed to connect!!!. GAD WHY!?! </h1> '.mysql_error().'</p>';  }

?>