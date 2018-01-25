<?php


  $link = mysql_connect('localhost', 'root', '');
  if (!$link) { die('Could not connect: ' . mysql_error()); }
  if (!mysql_select_db('kiffiarts')) {  die('Could not select database: ' . mysql_error()); }

  session_start();

 // Start the session

        
            $customer_ID = $_SESSION['customer_ID'];

            $cake_theme = $_POST['cake_theme'];
            $cake_shape = $_POST['cake_shape'];
            $cake_size = $_POST['cakesize'];
            $cake_layer = $_POST['cake_layer_num'];
            $cake_coat_color = $_POST['cake_color']; 
            //$cake_frost = $_POST['cake_frost']; 
            //$cake_flavor = $_POST['cake_flavor'];
            //$figurine_other = $_POST['figurine_other'];
            //$dedicationT = $_POST['dedicationT'];
            $candle_selection = $_POST['candle_selection'];
            $cake_quant = $_POST['cake_quant'];
            $other_concerns = $_POST['other_concerns'];
            $cake_price = $_POST['totalPrice_cake'];

            $cake_created = date('Y/m/d');
            $cake_created = strtotime($cake_created);
            $cake_created = date("Ymd", $cake_created);
            
            $cake_duedate = $_POST['service_date']; // $totalPrice = $_POST['totalPrice'];
            $cake_time = $_POST['service_time'];
            $del_venue = $_POST['del_venue'];
            $branch_name = $_POST['branch_name'];
            
            $savecanvas = str_replace(' ', '+', $_POST['canvas']); //IMAGE CODE 
            
            
            
            //figurine_select, figurine_other,  '$figurine_select', '$figurine_other', 
            //removed customer_ID
            $query1 = "INSERT INTO  customized_cake (customer_ID, cake_theme, cake_shape, cake_size, cake_layer, cake_coat_color, candle_selection,  cake_quant, other_concerns, cake_price, cake_created, cake_duedate, cake_time, branch_name, del_venue, canvas) VALUES ('$customer_ID', '$cake_theme', '$cake_shape', '$cake_size', '$cake_layer', '$cake_coat_color', '$candle_selection', '$cake_quant', '$other_concerns', '$cake_price', '".$cake_created."', '$cake_duedate', '$cake_time', '$branch_name', '$del_venue','$savecanvas')";

            // echo $cake_size;

            if(@mysql_query($query1,$link))
              {     echo "Done!"; 
          }  
            
            else {  print '<p> <h1> Somethings wrong, failed to connect!!!. GAD WHY!?! </h1> '.mysql_error().'</p>';  }

?>