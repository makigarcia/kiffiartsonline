<?php

  $link = mysql_connect('localhost', 'root', '');
  if (!$link) { die('Could not connect: ' . mysql_error()); }
  if (!mysql_select_db('kiffiarts')) {  die('Could not select database: ' . mysql_error()); }

  date_default_timezone_set("Asia/Manila");

  session_start();






 if(isset($_POST["submitcart"]))  
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




 //display all data


                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                                if($values["sesh"]==$_SESSION['customer_ID'] ){

                                  $customer_ID = $_SESSION['customer_ID'];

                                  $_POST['pickdeldate'] = date('Y-m-d', strtotime( $_POST['pickdeldate'] ));
                                  $d_date = $_POST['pickdeldate'];

                                  $o_date  =date('Y-m-d H:i:s');


                                  $cart_id = $values["order"];
                                  $design_code = $values["item_name"];
                                  $sizecart = $values["item_size"];
                                  $colorcart = $values["item_color"];
                                  $quantitycart = $values["item_quantity"];
                                  $pricecart = $values["item_price"];
                                  $totalcart = number_format($values["item_quantity"] * $values["item_price"], 2);

                                  
                          ?>  
                          <tr>  
                               
                               <td><?php echo $cart_id; ?></td>  
                               <td><?php echo $design_code; ?></td>  
                               <td><?php echo $sizecart; ?></td> 
                               <td><?php echo $colorcart; ?></td> 
                               <td><?php echo $quantitycart; ?></td>  
                               <td><?php echo $pricecart; ?></td>  
                               <td><?php echo $totalcart; ?></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);

                                    $query0 = "INSERT INTO cart (customer_ID, cart_id, design_code, sizecart, colorcart, quantitycart, pricecart, totalcart, pickdeldatecart, orderdatecart, grandtotalcart) VALUES ('$customer_ID', '$cart_id', '$design_code', '$sizecart', '$colorcart', '$quantitycart', '$pricecart', '$totalcart', '$d_date', '$o_date', '$total')";
                                  }
                               }  
                          ?>  
                          <tr>  
                               <td colspan="5" align="right">Total</td>  
                               <td align="right"><?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          


//end display all data




            //$design_id = $_POST['design_id'];
            //$customer_ID = $_SESSION['customer_ID'];
            //$design_code = $_POST['design_code'];
            //$dedi_catalog = $_POST['dedicatalog'];
            //$shirt_price = $_POST['shirt_price'] * $_POST['dedicatalog'];
            // $picture = $_POST['picture'];
            //if(isset($_POST['shirtcolor'])){
            //$shirtcolor = $_POST['shirtcolor'];
          //}
           // $shirtsize = $_POST['shirtsize'];
            //$_POST['pickdeldate'] = date('Y-m-d', strtotime( $_POST['pickdeldate'] ));
            //$d_date = $_POST['pickdeldate'];

            //$o_date  =date('Y-m-d H:i:s');
            //$o_date  =strtotime($o_date);
            //$o_date  =date("Ymd", $o_date);
            
            //if(isset($shirtcolor)){
            //$query1 = "INSERT INTO rmd_orderlist (design_id, customer_ID, design_code, dedi_catalog, shirt_price, shirtcolor, shirtsize, d_date, o_date) VALUES ( '$design_id', '$customer_ID', '$design_code', '$dedi_catalog', '$shirt_price', '$shirtcolor', '$shirtsize', '$d_date', '$o_date')";
          //}
          //else{
            //$query1 = "INSERT INTO rmd_orderlist (design_id, customer_ID, design_code, dedi_catalog, shirt_price, shirtsize, d_date, o_date) VALUES ( '$design_id', '$customer_ID', '$design_code', '$dedi_catalog', '$shirt_price', '$shirtsize', '$d_date', '$o_date')";
          //}

            //$query1 = "INSERT INTO cart (customer_ID, pickdeldatecart, orderdatecart) VALUES ( '$customer_ID', '$d_date', '$o_date')";

            if(@mysql_query($query0,$link))
            {   echo "THANK YOU FOR ORDERING!!";  }  
             else{  print '<p> <h1> Somethings wrong, failed to connect!!!. GAD WHY!?! </h1> '.mysql_error().'</p>';  }
            
?>