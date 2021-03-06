<?php
    $link = mysql_connect('localhost', 'root', '');
    mysql_select_db("kiffiarts", $link);

    $query="SELECT * FROM pricelist";
    $myData = @mysql_query($query, $link);

    date_default_timezone_set("Asia/Manila");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kiffi Arts Print Shop Shirt Design</title>

  <!-- CSS -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/form-elements.css">
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/widgets.css">
  <link rel="stylesheet" href="assets/css/sweetalert.css">
  <link rel="stylesheet" href="style.css">

  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <script type="text/javascript" src="js/jquery.min.js">
    function disablebackbutton (){  window.history.forward();  } disablebackbutton();
  </script>
  

</head>

<body>
  <!-- Top menu -->
  <nav class="navbar navbar-inverse navbar-no-bg" role="navigation" style="background-color: black">
   <div class="container">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="/kiffiarts/home.php"> <img src="images/logoboth.jpg" alt="Smiley face" style="width: 25%; float: left"></a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="top-navbar-1">

 </div>
</nav>

<!-- Top content -->
<div class="top-content">
    <div class="container">
    <form role="form"  id="cakechoices" name="cakechoices" method="post" class="f1" style="width:1400px;">
        <div class="row" >
            <div class="col-sm-12 form-box">
            <div class="f1-buttons"> <a href="/kiffiarts/home.php" class="btn btn-primary">  Close </a> </div>
               <center>
                   <h3> <b> Tentative Amount: ₱ <span class="totalPrice_cake" id="totalPrice_cake" name="totalPrice_cake"> </span> </b> </h3>
                   <!-- Layer Number
                   <type class="layer_display" height="80px" width="500p">
                   </type> = ₱ <span class="layer_amt"></span> -->
                </center>
             


                <fieldset>
                    <div class="form-group"><br>
                    <center> <h3> <b> <p>
                            Type of Shirt and Printing </p> </b> </h3> </center>
                        <table class="table">
                            <tbody>
                                <?php  while($record=mysql_fetch_array($myData)){  ?>
                                <tr><h4> <b>Choose a Shirt </b> </h4> </tr>
                                <tr> 
                                    <td><div class="button"><input type="radio" id="theme1" name="shirt_typenew" onchange="updateTotal()" value="Election Shirt = <?php echo $record['election_price']; ?>" />  
                                        <label for="theme1"> <!-- <img src="images/buttons/wedding.png" alt="wed_icon"/> --> </label> </div>
                                        <p>Election Shirt <span id="wedding_id"> <?php  echo "₱".$record['election_price']."";  ?>  </p>
                                    </td>
                                    
                                    <td><div class="button"><input type="radio" id="theme2" name="shirt_typenew" onchange="updateTotal()"  value="Cotton Shirt =<?php echo $record['cotton_price']; ?>" />
                                      <label for="theme2"> <!-- <img src="images/buttons/bday.png" alt="wed_icon"/> --> </label> </div> 
                                      <p> Cotton Shirt <span id="birthday_id"> <?php echo "₱".$record['cotton_price'].""; ?> </span></p></td>
                                    
                                    <td><div class="button"> <input type="radio" id="theme3" name="shirt_typenew" onchange="updateTotal()" value="Election Shirt (Own) =<?php echo $record['ownelec_price']; ?>" />
                                      <label for="theme3"> <!-- <img src="images/buttons/dedi.png" alt="wed_icon"/> --> </label> </div>
                                      <p> Own (Election Shirt) <span id="dedi_id"> <?php echo "₱".$record['ownelec_price'].""; ?> </span> </p></td>
                                    
                                    <td><div class="button"> <input type="radio" id="theme4" name="shirt_typenew" onchange="updateTotal()" value="Cotton Shirt (Own) =<?php echo $record['owncot_price']; ?>" />
                                      <label for="theme4"> <!-- <img src="images/buttons/occ.png" alt="wed_icon"/> --> </label> </div>
                                      <p> Own (Cotton Shirt) <span id="occ_id"> <?php echo "₱".$record['owncot_price'].""; ?> </span></p>  
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>





                    <div class="form-group">
                        <table class="table">
                            <tbody>
                                <tr><h4><b> Choose Type of Printing </b> </h4> </tr>
                                <tr><td><br>
                                <div class="col-xs-5">

                                  <div class="button">
                                <input type="radio" id="shape0" name="cake_shape" value="<?php echo $record['circle_default_price']; ?>" onchange="updateTotal()" />
                                    <label for="shape0">Textile Paint <!-- <img src="images/buttons/circle.png" alt="circle_icon"/> --> </label> </div>


                                <div class="button">
                                <input type="radio" id="shape1" name="cake_shape" value="circle" onchange="updateTotal()" />
                                    <label for="shape1">Rubber Vinyl <!-- <img src="images/buttons/circle.png" alt="circle_icon"/> --> </label> </div>
                                    <select class="form-control circle_select off" id="size_select_C" name="cake_size" onchange="updateTotal()">
                                        <option selected name=" "  placeholder="choose circle size" value="<?php //echo $record['blank_price']; ?>">Select One</option>
                                        <option name="Default Size 1 = 14 dm x 2.5 =<?php echo $record['circle_default_price']; ?>" value="<?php echo $record['circle_default_price']; ?>">Ordinary Rubber Vinyl = <?php echo $record['circle_default_price']; ?>
                                        </option>
                                        <option name="Small Size 1 =  9 diameter x 2.5 =<?php echo $record['circle_small1_price']; ?>" value="<?php echo $record['circle_small1_price']; ?>">Reflectorized = <?php echo $record['circle_small1_price']; ?>
                                        </option>
                                        <option name="Small Size 2 = 7 diameter x 3.5 =<?php echo $record['circle_small2_price']; ?>" value="<?php echo $record['circle_small2_price']; ?>">Glow-in-the-Dark = <?php echo $record['circle_small2_price']; ?>
                                        </option>
                                        <!-- <option name="Semi-Double Size=16 diameter x 2.5 =<?php echo $record['circle_semi1_price']; ?>" value="<?php echo $record['circle_semi1_price']; ?>">Semi-Double Size=16" dm x 2.5"= <?php echo $record['circle_semi1_price']; ?>
                                        </option>
                                        <option name="Semi-Double Size=16 diameter x 3 =<?php echo $record['circle_semi2_price']; ?>" value="<?php echo $record['circle_semi2_price']; ?>">Semi-Double Size=16" dm x 3"= <?php echo $record['circle_semi2_price']; ?>
                                        </option>
                                        <option name="Semi-Double Size= 16 =<?php echo $record['circle_semi3_price']; ?>" value="<?php echo $record['circle_semi3_price']; ?>">Semi-Double Size= 16"= <?php echo $record['circle_semi3_price']; ?>
                                        </option> -->
                                    </select>
                                    <script>
                                      $(document).ready(function() {
                                        $(':radio').on('change', function() {
                                            var title = $(this).val(); // Get radio value
                                            if ($(this).attr('id') === 'shape1') {//...status of radio is on...
                                              $('.circle_select').addClass('l').removeClass('off');
                                            } else { //...otherwise status of radio is off
                                              $('.circle_select').removeClass('l').addClass('off'); }
                                            });
                                      });
                                    </script>



                                    <div class="button">
                                <input type="radio" id="shape2" name="cake_shape" value="rectangle" onchange="updateTotal()" />
                                    <label for="shape2">Sublimation <!-- <img src="images/buttons/rectangle.png" alt="rect_icon"/> --> </label> </div>
                                    <select class="form-control rect_select off hidden" id="size_select_R" name="cake_size" onchange="updateTotal()" hidden>
                                        <option name=" "  placeholder="choose rectangle size" value="<?php //echo $record['blank_price']; ?>"> </option>
                                        <option name="Default Size = 14 x 10 x 2.5 =<?php echo $record['rect_default_price']; ?>" value="<?php echo $record['rect_default_price']; ?>">Sublimation = <?php echo $record['rect_default_price']; ?> 
                                        </option>
                                        <option name="Small Size = 12.5 x 10 x 2 =<?php echo $record['rect_small_price']; ?>" value="<?php echo $record['rect_small_price']; ?>" >Small Size=12.5 x 10” x 2”= <?php echo $record['rect_small_price']; ?>
                                        </option>
                                        <option name="Semi-Double Full=17 x  12 x 3 =<?php echo $record['rect_semi1_price']; ?>" value="<?php echo $record['rect_semi1_price']; ?>">Semi-Double Full=17”x12” x 3”= <?php echo $record['rect_semi1_price']; ?>
                                        </option>
                                        <option name="Semi-Double 2X=24 x 17 x 2.5 =<?php echo $record['rect_semi2_price']; ?>" value="<?php echo $record['rect_semi2_price']; ?>" >Semi-Double 2X=24”x17” x 2.5”= <?php echo $record['rect_semi2_price']; ?>
                                        </option>
                                        <option name="Double Size=20 x 14 x 2.50 =<?php echo $record['rect_double1_price']; ?>" value="<?php echo $record['rect_double1_price']; ?>" >Double Size=20” x 14” x 2.50”= <?php echo $record['rect_double1_price']; ?> 
                                        </option>
                                        <option name="Double Full=20 x 14 x 3 = <?php echo $record['rect_double2_price']; ?>" value="<?php echo $record['rect_double2_price']; ?>" >Double Full=20” x 14” x  3”= <?php echo $record['rect_double2_price']; ?>
                                        </option>
                                        <option name="Double Full 2X=28 x 20 x2.5 or 3 (full) = <?php echo $record['rect_double3_price']; ?>" value="<?php echo $record['rect_double3_price']; ?>" >Double Full 2X=28” x 20” x  2.5”= <?php echo $record['rect_double3_price']; ?>
                                        </option>
                                    </select>
                                    <script>
                                        $(function(){
                                            $(':radio').on('change', function() {
                                                var title = $(this).val(); // Get radio value
                                                  if ($(this).attr('id') === 'shape2') {//...status of radio is on...
                                                    $('.rect_select').addClass('l').removeClass('off');
                                                } else { 
                                                 $('.rect_select').removeClass('l').addClass('off');
                                             }
                                            });
                                        });
                                    </script>

                                    <div class="button">
                                <input type="radio" id="shape3" name="cake_shape" value="heart" onchange="updateTotal()" />
                                    <label for="shape3">Transfer Paper <!-- <img src="images/buttons/heart.png" alt="heart_icon"/> -->  </label> </div>
                                    <select class="form-control heart_select off hidden" id="size_heart" name="cake_size" onchange="updateTotal()">
                                        <<option name=" " placeholder="choose heart size" value="<?php //echo $record['blank_price']; ?>"> </option>
                                        <option name="Default Size =13.5 x 12.5 = <?php echo $record['heart_price']; ?>" value="<?php echo $record['heart_price']; ?>" >Transfer Paper = <?php echo $record['heart_price']; ?> 
                                        </option>
                                    </select>
                                    <script>
                                        $(function(){
                                          $(':radio').on('change', function() {
                                            var title = $(this).val(); // Get radio value
                                              if ($(this).attr('id') === 'shape3') {//...status of radio is on...
                                                $('.heart_select').addClass('l').removeClass('off');  } 
                                                else {  $('.heart_select').removeClass('l').addClass('off'); }
                                              });
                                        });
                                    </script> </br>
                                </div>
                                </td> </tr>
                                <tr class="hidden"><td>  <h4> <b> Cake Layers </b> </h4>
                                    <b> Note: </b> Each layer cost each ₱150.00.

                                    <div class="input-group col-xs-3">
                                       <input type="number" class="form-control input-sm" placeholder="1" min="1" name="cake_layer_num" id="cake_layer"/>
                                       <span class="input-group-btn">
                                            <input type="button" class="btn btn-default btn-sm" value="Pick" id="choose"/></br>
                                       </span>
                                    </div>
                                    <script>
                                        $('#choose').on('click', function() {
                                            var cakeLayerValue = $('#cake_layer').val();
                                            $('.layer_display').html(cakeLayerValue);
                                            $('.layer_amt').html(cakeLayerValue * 150);
                                            updateTotal();
                                        });
                                    </script>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                   
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-next">Next</button>
                    </div>
                </fieldset>




                <!-- STEP 2 CHOOSE FLAVOR and LAYER -->
                <fieldset>
                <br>
                <center> <h3> <b><p>
                             Shirt Color </p> </b> </h3> </center>
                    <table class="table">
                    <tbody hidden>
                        <!-- <tr> <h4> <b> Choose Flavor </b> </h4> </tr> -->
                        <tr>
                        <td><div class="form-group">
                           <div class="flavor_but"> <input type="radio" id="flavor1" name="cake_flavor" value="orange" onchange="updateTotal()"/>
                             <label for="flavor1"> <img src="images/flavor/orange.png" alt="orange_icon"/> </label> </div> 
                             <p> Orange (No Charges)   </p> 
                           </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <div class="flavor_but"> <input type="radio" id="flavor2" name="cake_flavor" value="chocolate" onchange="updateTotal()"/>
                             <label for="flavor2"> <img src="images/flavor/chocolate.png" alt="choco_icon"/> </label> </div> 
                             <p> Chocolate (No Charges) </p>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <div class="flavor_but"> <input type="radio" id="flavor3" name="cake_flavor" value="caramel"  onchange="updateTotal()"/>
                             <label for="flavor3"> <img src="images/flavor/caramel.png" alt="caramel_icon"/> </label> </div> 
                             <p> Caramel (No Charges)  </p>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <div class="flavor_but">  <input type="radio" id="flavor4" name="cake_flavor" onchange="updateTotal()" value="Ordinary Rubber Vinyl = <?php echo $record['ordinaryrv']; ?>" />
                             <label for="flavor4"> <img src="images/flavor/vanilla.png" alt="vanilla_icon"/> </label> </div> 
                             <p> Ordinary Rubber Vinyl <span id="vanilla_id">  <?php echo "₱".$record['ordinaryrv'].""; ?> </span> </p>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                            <div class="flavor_but">  <input type="radio" id="flavorchiff" name="cake_flavor" onchange="updateTotal()" value="chiffon = <?php echo $record['flavor_chiffon_price']; ?>" />
                             <label for="flavorchiff"> <img src="images/flavor/chiffon.png" alt="chiffon_icon"/> </label> </div> 
                             <p> Chiffon <span id="chiff_id">  <?php echo "₱".$record['flavor_chiffon_price'].""; ?> </span> </p>
                            </div>
                        </td>


                        </tr>


                        <tr style="border-color: #fff;"> 
                            <td>
                                <div class="form-group">
                                <div class="flavor_but">  <input type="radio" id="flavorblue" name="cake_flavor" onchange="updateTotal()" value="Sublimation = <?php echo $record['sublimation']; ?>" />
                                 <label for="flavorblue"> <img src="images/flavor/blueberry.png" alt="blue_icon"/> </label> </div> 
                                 <p> Sublimation <span id="blue_id">  <?php echo "₱".$record['sublimation'].""; ?> </span> </p>
                                </div>
                            </td>

                            <td>
                                <div class="form-group">
                                <div class="flavor_but"> <input type="radio" id="flavor5" name="cake_flavor" onchange="updateTotal()" value="Reflectorized =<?php echo $record['reflectorized']; ?>" />
                                    <label for="flavor5"> <img src="images/flavor/ube.png" alt="orange_icon"/> </label> </div> 
                                    <p> Reflectorized <span id="ube_id"> <?php echo "₱".$record['reflectorized'].""; ?> </span>   </p> 
                               </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <div class="flavor_but"> <input type="radio" id="flavor6" name="cake_flavor" onchange="updateTotal()" value="Transfer Paper = <?php echo $record['transferpaper']; ?>" />
                                    <label for="flavor6"> <img src="images/flavor/strawberry.png" alt="choco_icon"/> </label> </div> 
                                    <p> Transfer Paper <span id="strawberry_id"> <?php echo "₱".$record['transferpaper'].""; ?> </span> </p>
                               </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <div class="flavor_but"> <input type="radio" id="flavor7" name="cake_flavor" onchange="updateTotal()" value="Glow-in-the-Dark = <?php echo $record['glowinthedark']; ?>" />
                                    <label for="flavor7"> <img src="images/flavor/redvelvet.png" alt="caramel_icon"/> </label> </div> 
                                    <p> Glow-in-the-Dark <span id="redvelvet_id"> <?php echo "₱".$record['glowinthedark'].""; ?> </span> </p>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <div class="flavor_but"> <input type="radio" id="flavor8" name="cake_flavor" onchange="updateTotal()" value="Gamuza = <?php echo $record['gamuza']; ?> " />
                                    <label for="flavor8"> <img src="images/flavor/coffee.png" alt="vanilla_icon"/> </label> </div> 
                                    <p> Gamuza <span id="coffee_id"> <?php echo "₱".$record['gamuza'].""; ?> </span> </p>
                               </div>
                             </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <tbody>
                            <tr> <h4> <b> Choose Shirt Color</h4> </b> </tr> 
                            <tr> 
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color1" name="cake_color" value="cream"/>
                                    <label for="color1"> <img src="images/color/cream.png" alt="cream_icon"/> </label> </div>  
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color2" name="cake_color" value="blue"/>
                                    <label for="color2"> <img src="images/color/blue.png" alt="blue_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color3" name="cake_color" value="violet"/>
                                    <label for="color3"> <img src="images/color/violet.png" alt="violet_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color4" name="cake_color" value="green"/>
                                    <label for="color4"> <img src="images/color/green.png" alt="green_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                   <div class="color_but"> <input type="radio" id="color5" name="cake_color" value="red"/>
                                    <label for="color5"> <img src="images/color/red.png" alt="red_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color6" name="cake_color" value="pink"/>
                                    <label for="color6"> <img src="images/color/pink.png" alt="pink_icon"/> </label> </div>  
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color7" name="cake_color" value="orange"/>
                                    <label for="color7"> <img src="images/color/orange.png" alt="orange_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color8" name="cake_color" value="yellow"/>
                                    <label for="color8"> <img src="images/color/yellow.png" alt="yellow_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color9" name="cake_color" value="brown"/>
                                    <label for="color9"> <img src="images/color/brown.png" alt="brown_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color10" name="cake_color" value="black"/>
                                    <label for="color10"> <img src="images/color/black.png" alt="black_icon"/> </label> </div> 
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <div class="color_but"> <input type="radio" id="color11" name="cake_color" value="white"/>
                                    <label for="color11"> <img src="images/color/white.png" alt="white_icon"/> </label> </div> 
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table" hidden>
                    <tbody>
                    <!-- <tr> <h4> <b> Choose Frost Type</h4> </b> </tr> -->
                    <tr> 
                        <td>
                            <div class="form-group">
                                <div class="frost_but"> <input type="radio" id="frosting1" name="cake_frost" onchange="updateTotal()" value="sugar = <?php echo $record['frost_sugar_price']; ?>" /> 
                                    <label for="frosting1"> <img src="images/color/sugar.png" alt="sugar_icon"/> </label>
                                    <p> <span id="sugar_id"> <?php echo "₱".$record['frost_sugar_price'].""; ?> </span> </p> 
                                </div>  
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="frost_but"> <input type="radio" id="frosting2" name="cake_frost" onchange="updateTotal()" value="buttercream = <?php echo $record['frost_bcream_price']; ?>"/> 
                                    <label for="frosting2">  <img src="images/color/buttercream.png" alt="bcream_icon"/> </label>
                                    <p> <span id="bcream_id"> <?php echo "₱".$record['frost_bcream_price'].""; ?> </span> </p> 
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="frost_but"> <input type="radio" id="frosting3" name="cake_frost" onchange="updateTotal()" value="marshmallow = <?php echo $record['frost_mmallow_price']; ?>" /> 
                                    <label for="frosting3">  <img src="images/color/marsh.png" alt="marsh_icon"/> </label>
                                    <p><span id="mallow_id"> <?php echo "₱".$record['frost_mmallow_price'].""; ?> </span> </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="frost_but"> <input type="radio" id="frosting4" name="cake_frost" onchange="updateTotal()" value="Textile Paint = <?php echo $record['textilepaint']; ?>"/> 
                                    <label for="frosting4">  <img src="images/color/fondant.png" alt="fon_icon"/> </label>
                                    <p><span id="fondant_id"><?php echo "₱".$record['textilepaint']."";?></span></p></div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                    
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" class="btn btn-next">Next</button>
                    </div>
                </fieldset>


                <!-- Step 3  -->
                <fieldset>
                 <br>  
                   <center> <h3> <b><p>
                            Pick-Up/Delivery Details </p></b> </h3> </center>

                    <h4> <b> Shirt Quantity </b> </h4>
                    <div class="form-group col-xs-3">
                        <input type="number" class="form-control input-sm" placeholder="1" min="1" name="shirt_quantitynew" id="quantity_cake"/> 
                    </div>

                    <br>
                    <hr> </hr>
                    
                    <h4><b>Pick-Up/Delivery Details</b></h4>

                    <?php unset($_SESSION['service_date']); ?>  

                    <div class="form-group form-inline">                            
                        <label for="service_date"><b>Date: </b></label>
                        <input type="text" class="form-control input-sm" id="service_date" name="service_date" value="DD/MM/YYYY"/>

                        <label for="service_time"> <b> Time: </b>
                        <select class="form-control" id="service_time" name="service_time" /> 
                            <option disabled selected value>-Time-</option>
                            <option value="9:00 AM"> 9:00 AM </option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="12:00 AM">12:00 PM</option>
                            <option value="1:00 PM">1:00 PM</option>
                            <option value="2:00 PM">2:00 PM</option>
                            <option value="3:00 PM">3:00 PM</option>
                            <option value="4:00 PM">4:00 PM</option>
                            <option value="5:00 PM">5:00 PM</option>
                            <option value="6:00 PM">6:00 PM</option>
                            <option value="7:00 PM">7:00 PM</option>
                        </select>
                        </label>
                        <br><br>

                        <label for="branch_selection"> <b> Branch:</b></label>
                        <select class="form-control" name="branch_name" id="branch_selection" /> 
                            <option selected value=" ">-- Select one --</option>
                            <option value="Suterville Branch">Suterville Branch </option>
                            <option value="San Jose Gusu Branch">San Jose Gusu Branch </option>
                        </select>
                    </div>

                     <br> <label for="wedding_delivery"> Delivery Venue : <textarea rows="0.5" cols="20"  type="text" name="del_venue" id="wed_venue" placeholder="Wedding Cakes Only"> </textarea> </label>
                    <hr> </hr> 

                    <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" class="btn btn-next">Next</button>
                        
                    </div>


                </fieldset>



                <!-- STEP 4 - DESIGN THE CAKE -->
                <fieldset>
                <br>
                 <center> <h3> <b><p>
                            Design </p></b> </h3> </center>
                <br>

                <div class="row">
                    <div id="myWidget" class="ui-widget">
                        <div class="left column">
                            <div class="ui-widget-header ui-corner-top">Logos (Drag and drop)</div>
                            <div class="ui-widget-content ui-corner-bottom">
                                <ul id="fig_list">
                                    
                                    <span id="circle_pattern">
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/circle_des1.png" onclick="addPattern('circle','images/pattern/circle_des1.png')" title="circle_des1"></div></li>
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/circle_des2.png" onclick="addPattern('circle','images/pattern/circle_des2.png')" title="circle_des2"></div></li>
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/circle_des3.png" onclick="addPattern('circle','images/pattern/circle_des3.png')" title="circle_des3"></div></li>
                                    </span>
                                    <span class="hidden" id="rectangle_pattern">
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/rect_des1.png" onclick="addPattern('rectangle' ,'images/pattern/rect_des1.png')" title="rect_des1"></div></li>
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/rect_des2.png" onclick="addPattern('rectangle' ,'images/pattern/rect_des2.png')" title="rect_des2"></div></li>
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/rect_des3.png" onclick="addPattern('rectangle' ,'images/pattern/rect_des3.png')" title="rect_des3"></div></li>
                                    </span>
                                    <span class="hidden" id="heart_pattern">
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/heart_des1.png" onclick="addPattern('heart','images/pattern/heart_des1.png')" title="rect_des1" title="heart_des1"></div></li>
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/heart_des2.png" onclick="addPattern('heart','images/pattern/heart_des2.png')" title="rect_des1" title="heart_des2"></div></li>
                                      <li><div class="fig_image overlay_pattern" data-image-src="images/pattern/heart_des3.png" onclick="addPattern('heart','images/pattern/heart_des3.png')" title="rect_des1" title="heart_des3"></div></li>
                                    </span>
                                    <li><i id="btn_remove_pattern" style="visibility: hidden;" class="fa fa-times-circle-o fa-3x" aria-hidden="true" onclick="removePattern()"></i></li>
                                    <!-- <li><div class="fig_image" data-image-src="images/pattern/pat_1.png" title="star"></div></li>
                                    <li><div class="fig_image" data-image-src="images/pattern/pat_2.png" title="heart"></div></li>
                                    <li><div class="fig_image" data-image-src="images/pattern/pat_5.png" title="circle"></div></li>
                                    <li><div class="fig_image" data-image-src="images/pattern/pat_4.png" title="flake"></div></li>
                                    <li><div class="fig_image" data-image-src="images/pattern/pat_6.png" title="floral"></div></li>
                                    <li><div class="fig_image" data-image-src="images/pattern/pat_8.png" title="square"></div></li>
                                    <li><div class="fig_image" data-image-src="images/pattern/pat_9.png" title="dia"></div></li> -->
                                </ul>
                            </div>


                            <div class="ui-widget-header ui-corner-top"> Images (Drag and drop) <!-- <input type="text" size="20" id="other_figurine" name="figurine_other" placeholder="Others please specify"> --></div> 

                            <div class="ui-widget-content ui-corner-bottom">
                                <ul id="fig_list">
                                    <li><div class="fig_image" data-image-src="images/figurine/angrybird.png" title="angrybird"></div></li>
                                    <li><div class="fig_image" data-image-src="images/figurine/cars.png" title="cars"></div></li>
                                    <li><div class="fig_image" data-image-src="images/figurine/barbie.png" title="powerpuff"></div></li>
                                    <li><div class="fig_image" data-image-src="images/figurine/dora.png" title="dora"></div></li>
                                    <li><div class="fig_image" data-image-src="images/figurine/spongebob.png" title="spongebob"></div></li>
                                    <li><div class="fig_image" data-image-src="images/figurine/elsa.png" title="elsa"></div></li>
                                    <li><div class="fig_image" data-image-src="images/figurine/pooh.png" title="pooh"></div></li>
                                    
                                </ul>
                            </div>

                            <div class="ui-widget-header ui-corner-top hidden"> Icings</div>
                            <div class="ui-widget-content ui-corner-bottom hidden">
                                <ul id="fig_list">
                                    <li><div class="fig_image" data-image-src="images/icing/f_1.png" title="flowerPink"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_2.png" title="flowerRed"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_3.png" title="flowerblue"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_4.png" title="flowerorange"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_5.png" title="flowervio"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_6.png" title="flowerWhite"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_1.png" title="floweryellow"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_2.png" title="flowerblur"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_3.png" title="flowerpink"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_4.png" title="flowerpinkyelow"></div></li>
                                    
                                </ul>
                            </div>
                            <div class="ui-widget-content ui-corner-bottom hidden">
                                <ul id="fig_list">
                                    
                                    <li><div class="fig_image" data-image-src="images/icing/f_18.png" title="flow1"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_19.png" title="flow2"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_20.png" title="flow3"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_21.png" title="flow4"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_22.png" title="flow5"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_23.png" title="flow6"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_24.png" title="flow7"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_7.png" title="flow8"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_6.png" title="flow9"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_5.png" title="flow10"></div></li>
                                </ul>
                            </div>

                            <div class="ui-widget-content ui-corner-bottom hidden">
                                <ul id="fig_list">
                                    
                                    <li><div class="fig_image" data-image-src="images/icing/d_1.png" title="flow1"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/d_2.png" title="flow2"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/d_3.png" title="flow3"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/d_4.png" title="flow4"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/d_6.png" title="flow5"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/d_7.png" title="flow6"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_9.png" title="flow7"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_10.png" title="flow8"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_11.png" title="flow9"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_12.png" title="flow10"></div></li>
                                </ul>
                            </div>

                            <div class="ui-widget-content ui-corner-bottom hidden">
                                <ul id="fig_list">
                                    
                                    <li><div class="fig_image" data-image-src="images/icing/of_13.png" title="flow1"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/of_14.png" title="flow2"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/s_1.png" title="flow3"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/s_2.png" title="flow4"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/s_3.png" title="flow5"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/s_4.png" title="flow6"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/s_5.png" title="flow7"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_10.png" title="flow8"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_16.png" title="flow9"></div></li>
                                    <li><div class="fig_image" data-image-src="images/icing/f_17.png" title="flow10"></div></li>
                                </ul>
                            </div>


                            <div class="ui-widget-header ui-corner-top"> </div>
                            <div class="ui-widget-content ui-corner-bottom">
                                <div class="disp_dedi">
                                    <form id="dedi_form">
                                        <input type="text" id="dedi_text" name="dedicationT" placeholder="Enter Text">
                                        <select id="dedi_color">
                                          <option>Red</option>
                                          <option>Green</option>
                                          <option>Violet</option>
                                          <option>Gray</option>
                                          <option>Yellow</option>
                                          <option>Orange</option>
                                          <option>Blue</option>
                                          <option>Black</option>
                                           <option>Pink</option>
                                        </select>
                                        <a href="" id="add_dedi_text" placeholder="dedication" name="dedicationT" class="button default">Add</a>

                                        <p>
                                        <select class="choice_candle hidden" name="candle_selection" id="candle_select"/> 
                                          <option value=" ">-- Candles --</option>
                                          <option value="sparkle">Sparkle (only 1)</option>
                                          <option value="stick">Stick (only 1)</option></select> </p>
                                    </form>
                                </div>
                            </div>

                            <!--div class="ui-widget-header ui-corner-top"> <a id="clear_display" class="button">Clear All</a> </div-->
                        </div>

                        <div class="right column" style="background-color: #fff;">
                            <div class="ui-widget-header ui-corner-top">Display Shirt (do not go beyond the rectangle border)</div>
                              <div class="ui-widget-content ui-corner-bottom">
                                <div id="disp_card" class="disp_temp" style="width: 100%;border: none; z-index: 1;">  </div>
                              </div>
                              <!--canvas id="show_image" width="600" height="400" style="margin: 0 auto;"></canvas-->
                        </div>

                            <div class="ui-widget-header ui-corner-top"> Additional Concerns </div>
                            <div class="ui-widget-content ui-corner-bottom">
                    <p><textarea rows="1" cols="40"  type="text" name="other_concerns" id="cake_concerns"> </textarea> </p> 
                            </div>                        

                        <div class="clear: both;"></div>
                    </div>
                </div>
            
                    

                <hr> </hr>
                    <div class="f1-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" name="btn" class="btn btn-primary" id="submitBtn" data-toggle="modal" data-target="#confirm-submit">Review Order </button>
                    </div>
                  </div> <!-- row class --> 
                
                </fieldset>


                    <script type="text/javascript">
                      $('#submitBtn').click(function () 
                        {  /* when the button in the form, display the entered values in the modal */
                        $('#shirt_typenew').html($('input[name="shirt_typenew"]:checked').val()); //theme
                        $('#cake_shape').html($('input[name="cake_shape"]:checked').val());
                        $('#cake_size_C').html($('#size_select_C option:selected').text());
                        $('#cake_size_R').html($('#size_select_R option:selected').text());
                        $('#cake_size_heart').html($('#size_heart option:selected').text());
                        $('#cake_layer_num').html($('#cake_layer').val());
                        $('#shirt_colornew').html($('input[name="cake_color"]:checked').val());
                        $('#cake_frost').html($('input[name="cake_frost"]:checked').val());
                        $('#cake_flavor').html($('input[name="cake_flavor"]:checked').val());
                        $('#cake_fig_other').html($('#other_figurine').val());
                        $('#cake_candle').html($('#candle_select').val());
                        $('#other_concerns').html($('#cake_concerns').val()); //ID concern1
                        $('#date').html($('#service_date').val()); 
                        $('#time').html($('#service_time').val());  
                        $('#quantity').html($('#quantity_cake').val());
                        $('#branch').html($('#branch_selection').val());  
                        $('#delivery').html($('#wed_venue').val());
                        $('#totalPrice').html($('#totalPrice_cake').text());
                        });
                    </script>

                </div>
            </div>
        </div>
                  
      </div>
                <?php
                  }
                ?>
                



<!--  *********  M  O  D  A  L   ********* -->

<!--  ***** DISPLAY REVIEW CHOICES *******8  -->
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 1200px;">
        <div class="modal-content">
            <div class="modal-header"> </div>
            <div class="modal-body"> <!-- We display the details entered by the user here , 18 rows-->
            
            <div class="row">
              <div class="col-md-5"> <h4> Confirm Order </h4>
                <table class="table table-bordered" style="border-color:#303030 ">
                  <col width="150" height="30" style="background-color: #F0F0F0;">
                  <col width="250">
                    <tbody>
                    
                    <tr><td>Shirt Type</td> <td><span id="shirt_typenew" name="shirt_typenew"> </span> </td></tr>
                    <!-- <tr><td> Cake Shape </td> <td> <type id="cake_shape" name="cake_shape"> </type> </td></tr> -->

                    <tr><td> Type of Printing </td><td> 
                      <type id="cake_size" name="cake_size"> </type>
                      <type id="cake_size_C" name="cake_size"> </type> 
                      <type id="cake_size_R" name="cake_size"> </type> 
                      <type id="cake_size_heart" name="cake_size"> </type> 
                    </td></tr>

                    <!-- <tr> <td> Cake Layer/s </td><td> <type id="cake_layer_num" name="cake_layer_num"> </type> </td></tr> -->
                    <tr><td> Shirt Color </td><td> <type id="shirt_colornew" name="shirt_colornew"> </type> 
                    <p> <type id="cake_frost" name="cake_frost"> </type> </p> </td></tr>
                    <!-- <tr><td> Cake Flavor </td> <td> <type id="cake_flavor" name="cake_flavor"> </type>   <type id="cake_flavor_other" name="cake_flavor_other"> </type></td></tr> 
                    <tr><td> Candle</td> <td> <type id="cake_candle" name="cake_candle"> </type> </td></tr>
                    <tr><td> Other Figurine </td> <td> <type id="cake_fig_other" name="cake_fig_other"> </type></td></tr> -->
                    <tr><td> Quantity </td> <td> <type id="quantity"> </type> </td></tr>
                    <tr><td> Other Concerns </td> <td> <type id="other_concerns"> </type> </td></tr>
                    <tr> <td> Date and Time </td> <td> <type id="date">  </type>
                     <br> <p> </p>  <type id="time"> </type> </td> </tr>
                    <tr> <td> Branch/Venue</td> <td> <p> Branch: <type id="branch"> </type> </p> <p> Delivery Venue: <type id="delivery"> </type> </td> </p>
                    </tbody>
                </table> </div>



              <div class="col-md-7"> <center> 
                <h4> Shirt Display </h4> 
                <h4> Tentative Amount: ₱ <?php echo "<span class='totalPrice' id='totalPrice' name='totalPrice'>"; ?>  </span> </h4>

                    <div id="savecanvas"> 
                      <canvas id="preview_image" width="600" height="500" style="margin: 0 auto;"></canvas>
                    </div>

                 </center>
                </div>
            </div>



              <div class="modal-footer">
                <button type="button" class="btn btn-previous" data-dismiss="modal">Back</button>
                <button type="submit" id="submit" name="order" class="btn btn-primary" value="Order Now">Order Now</button>
              </div> 

            </div> <!-- row class --> 
        </div>
    </div>

</div> 
                    <script type="text/javascript">
                       $('#submit').click(function () { 
                        var canvas1 = document.getElementById('preview_image');
                        var ctxSource = canvas1.getContext('2d');
                            ctx.drawImage(canvas1, 0, 0); //convert canvas to image
                       });
                    </script>
                    <!-- Process of getting the canvas code store in image -->
                    <script type="text/javascript"> 
                        
                        // merge the two canvas to be displayed as image.
                        // var canvasall = document.getElementById('preview_image');
                        // var context = canvasall.getContext('2d');
                            
                        var base64="";
                           $(function () {  // gets the binary code of the canvas to save in the database
                            $("#submit").bind("click", function() {
                              base64 = $('#preview_image')[0].toDataURL("image/png");
                              $("#show_canvas").attr("src", base64);
                              $("#show_canvas").show();
                            });
                          });
                    </script>


</form>

    <!-- Javascript -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/html2canvas.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/calcudisplaycake.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/retina-1.1.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="sweetalert/sweetalert-dev.js"></script>
    <script src="sweetalert/sweetalert.js"></script>






    <script type="text/javascript">
        $(function() { // Init
            var $imageContent = $([]);
            /*$(".button").button(); //tried submit but meh.
            $("#card_modal").dialog({resizable: false,autoOpen: false, dialogClass: "small-title",
                modal: false,zIndex: 1051,width: 600, height: 580,
                buttons: [{text: "Order Now",}, {text: "Back",click: function() {$(this).dialog("close"); } }]
            });*/

            $(".fig_image").each(function() {
                var figSrc = $(this).data("image-src");
                $(this).css("background-image", "url('" + figSrc + "')");
            }).draggable({ containment: "#myWidget", helper: "clone", cursor: "move" });

            $("#disp_card").droppable({
                accept: ".fig_image", 
                drop: function(e, ui) { //console.log("Receving: ", ui.helper);
                    if (!ui.helper.hasClass("placed")) { addFigure(ui.helper);} }
            });

        function addDed(txt) { // Utility Functions
            var $close = $("<span>", {  class: "floating top right fa fa-times-circle-o", title: "Remove Image"
            }).click(function(e) { removeItem($(e.target).parent());
            });
            var $dedTxt = $("<div>", {
                id: "ded-" + ($(".text").length + 1), class: "placed text"
            }).html(txt).append($close).css({
                position: "absolute", top: "20px",left: "20px",
                "color": $("#dedi_color option:selected").val(),
                "min-width": "1em", "min-height": "20px","padding-right": "16px"  });
            makeDrag($dedTxt);
            makeResize($dedTxt);
            $dedTxt.disableSelection();
            $dedTxt.appendTo($("#disp_card")).fadeIn();  
        }

        function addFigure($item) {
            var dropPos = $item.position();
            var dropSrc = $item.data("image-src");
            var dropPlace = {
                top: dropPos.top - $("#disp_card").position().top,
                left: dropPos.left - $("#disp_card").position().left
            };

            var $close = $("<span>", {
                class: "floating top right fa fa-times-circle-o",title: "Remove Image"
            }).click(function(e) { removeItem($(e.target).parent());
             });

            var $image = $("<div>", {
                id: "fig-" + ($(".placed").length + 1), class: "placed image"
            }).data("image-source", dropSrc).css({
                "background-image": "url('" + dropSrc + "')","background-repeat": "no-repeat","background-size": "contain",
                width: "60px", height: "50px", position: "absolute", top: dropPlace.top + "px", left: dropPlace.left + "px"
            }).append($close);
            
            $item.fadeOut(function() {
                makeDrag($image);
                makeResize($image);
                $image.appendTo($("#disp_card")).fadeIn(); });
        }

        function makeDrag($item) { $item.draggable({ containment: "#disp_card" }); }

        function makeResize($item) {
            $item.resizable({
                containment: "#disp_card", minWidth: 50, aspectRatio: !$item.hasClass("text"),
                start: function(e, ui) {
                  if ($item.hasClass("text")) {
                    $item.css("border", "1px dashed #ccc");    }    },
                    resize: function(e, ui) {
                      if ($item.hasClass("text")) {
                       switch (true) {
                          case (ui.size.height < 16):
                          $item.css("font-size", "11pt");
                          break;
                          case (ui.size.height < 19):
                            $item.css("font-size", "12pt");
                            break;
                          case (ui.size.height < 24):
                            $item.css("font-size", "14pt");
                            break;
                          case (ui.size.height < 32):
                            $item.css("font-size", "18pt");
                            break;
                          case (ui.size.height < 48):
                            $item.css("font-size", "24pt");
                            break;
                          case (ui.size.height >= 48):
                            $item.css("font-size", "36pt");
                            break;
                        }
                      } else { $item.css("background-size", ui.size.width + "px" + ui.size.height + "px"); }
                    },
                    stop: function(e, ui) { if ($item.hasClass("text")) { $item.css("border", "0");  }
                    }
                  });
        }

        function removeItem($item) {  console.log("Remove Item:", $item); $item.fadeOut(function() { $item.remove(); });
        }

        function createPreview() {
            $imageContent = [];
            var canvas = document.getElementById('preview_image');
            var ctx = $("#preview_image")[0].getContext("2d");
            var diff_preview_design = 0; //44
            ctx.clearRect(0, 0, 600, 500);


            ctx.fillStyle = getColorHex(var_CoatingColor);
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            var $source = $("#disp_card");

            var bg = new Image();
            bg.src = document.getElementById('disp_card').getElementsByTagName('img')[0].src
            ctx.drawImage(bg, 0, 0);  // Draw cake shape

            var sd = new Image();
            var sd_doc = document.getElementById("side_decor");
            sd.src = sd_doc.style["background-image"].slice(4, -1).replace(/"/g, "");
            ctx.drawImage(sd, sd_doc.style["left"].slice(0, -2) - diff_preview_design, sd_doc.style["top"].slice(0, -2), sd_doc.style["width"].slice(0, -2), sd_doc.style["height"].slice(0, -2));  // Draw cake shape pattern

            var $text = $source.find(".text");  // Find and draw Text items
            var $det = {};
            var img;
            $text.each(function(ind, el) {
                $det.type = "Text";
                $det.top = parseInt($(el).css("top").slice(0, -2));
                $det.left = parseInt($(el).css("left").slice(0, -2));
                //$det.width = $(el).width();
                $det.width = $(el).css("width").slice(0, -2);
                $det.height = $(el).height();
                $det.content = $(el).text();
                $det.lineHeight =  $(el).css('line-height').slice(0, -2);
                $det.font = {};
                $imageContent.push($det);
                console.log("Adding text to Image: ", $det);
                ctx.fillStyle = el.style["color"];
                ctx.font = $(el).css('font-size') + " " + $(el).css('font-family');
                ctx.textAlign = $det.font.align;
                ctx.textBaseline = "top";
                console.log("el ", el);
                //ctx.fillText($det.content, $det.left, $det.top, $det.width);
                wrapText(ctx, $det.content, $det.left, $det.top, $det.width, $det.lineHeight);
                $det = {};
            });

            var $images = $source.find(".image"); // Find and draw Image items
            $det = {};
            $images.each(function(ind, el) {
                var $det = {};
                $det.type = "Image";
                $det.top = parseInt($(el).css("top").slice(0, -2));
                $det.left = parseInt($(el).css("left").slice(0, -2)) - diff_preview_design;  // 44 difference between preview and canvas size
                 //$det.left = parseInt($(el).css("left").slice(0, -2));
                $det.width = $(el).width();
                $det.height = $(el).height();
                $det.src = {};
                $det.src.url = $(el).data("image-source");
                $imageContent.push($det);
                img = new Image();
                img.src = $det.src.url;
                $det.src.width = img.width;
                $det.src.height = img.height;
                $det.ratio = $det.width / img.width;
                //$(img).on("load", function() {
                console.log("Adding to Image: ", $det);
                //ctx.drawImage(img, $det.left, $det.top, $det.src.width * $det.ratio, $det.src.height * $det.ratio);
                ctx.drawImage(img, $det.left, $det.top, getImageSizes($det).split("x")[0], getImageSizes($det).split("x")[1]);
                $det = {};
                //});
            });  //console.log($imageContent);
        }

        function wrapText(context, text, x, y, maxWidth, lineHeight) {
          var words = text.split(' ');
          var line = '';

          for(var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = context.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > maxWidth && n > 0) {
              line = words[n] + '';
              y += parseFloat(lineHeight);
            }
            else {
              line = testLine;
            }
            context.fillText(line, x, y);
          }       
        }

        function getColorHex(color) {
          if (color === undefined) {
              return("#FAFAFA");
          } else {
              hex = "";
              if (color == "cream") { hex = "#FBF9D3" }
              else if(color == "blue") { hex = "#468BCC" }
              else if(color == "violet") { hex = "#652D90" }
              else if(color == "green") { hex = "#3CB879" }
              else if(color == "red") { hex = "#F51A20" }
              else if(color == "pink") { hex = "#FD5E91" }
              else if(color == "orange") { hex = "#FBA13F" }
              else if(color == "yellow") { hex = "#FFEF03" }
              else if(color == "brown") { hex = "#8D6235" }
              else if(color == "black") { hex = "#212121" }
              return(hex);
          }
        }

        function getImageSizes(det) {
          var new_h, new_w; // the height and width of the actual image
          if (det.height <= det.width) {
            new_h = det.height;
            new_w = (det.height / det.src.height) * det.src.width;
          } else {
            new_w = det.width;
            new_h = (det.width / det.src.width) * det.src.height; }
          return(new_w + "x" + new_h);
        }

          //Button Action Functions
          $("#add_dedi_text").click(function(e) {
            e.preventDefault();
            addDed($("#dedi_text").val()); //$("#dedi_form").submit(); 
             });

          $("#dedi_form").submit(function(e) {  // Will catch when Enter / Return is hit in form
            e.preventDefault();
            addDed($("#dedi_text").val());
            $("#dedi_text").val("");   })

          $("#clear_dedi_text").click(function(e) {
            e.preventDefault();
            $("#dedi_text").val("");  }); 

          $("#submitBtn").click(function(e) { 
            e.preventDefault();
            createPreview();
            $("#card_modal").html(""); }); 

          $("#clear_display").click(function(e) {
            e.preventDefault();
            if (confirm("Are you sure you wish to clear everything?")) {
              $("#disp_card").html("");  }  });

          $("#add_img").click(function(e) {
              e.preventDefault();
              $("#disp_card").html(""); }); });

        //USER WILL UPLOAD AND ADD DESIGNS
          // $("#addImg").change(function(e){
          //   var files =  $(this)[0].files;
          //   var num = $(".fig_image").children().length;
          //   for (var i = 0, f; f = files[i]; i++) {
          //     var reader = new FileReader();

          //     reader.onloadend = function( response ){

          //       var image = response.target.result;
          //       var html = '<div class="fig_image" ';
          //       html += 'data-image-src="'+ image +'" style="height:50px; width: 50px; ; background-size:contain; background-position: center center;">';
                
          //       var div = $("<li></li>", {  html: html });
                
          //       $("#fig_list").append( div ); setTimeout(function(){ setAll();  }, 500);  };

          //     reader.readAsDataURL(f);
          //   }
            
          // });

    </script>


    
        <!-- ORDER PROCESS -->
    <script type="text/javascript">
        function submit_order($form, cakesize, total_Price) {
        $.ajax({
          url   : "ordersent.php", 
          type  : "POST",
          cache : false,
          data  : $form.serialize() + '&cakesize=' + cakesize + '&totalPrice_cake=' + total_Price + '&canvas=' +base64,
          success: function(response) {
     
          alert(response);
            if(response == "Done!")  {
                window.location.href = "/kiffiarts/home.php";
              } 
          }
        });
      }


      $('#submit').click(function(){  /* when the submit button in the modal is clicked, submit the form */
        swal({
          title: "ORDER SENT",
           text: "Thank you for ordering with us! You will recieve a confirmation call after 1-2 hours, have a great day!",
          //imageUrl: "images/cake_check.png"
        },

      function(isConfirm){
          if (isConfirm) {   
                var cakesize;
              if($('#size_select_C option:selected').attr("name") != undefined && $('#size_select_C option:selected').attr("name") != null) 
                cakesize = $('#size_select_C option:selected').attr("name");
              else if ($('#size_select_R option:selected').attr("name") != undefined && $('#size_select_R option:selected').attr("name") != null)
                cakesize = $('#size_select_R option:selected').attr("name");
              else if($('#size_heart option:selected').attr("name") != undefined && $('#size_heart option:selected').attr("name") != null)
                cakesize = $('#size_heart option:selected').attr("name");
                submit_order($('#cakechoices'), cakesize, $('.totalPrice').html());                           
              } 
            });
            return false;
          });
    </script>



    <script type="text/javascript">
        $(function(){
         $("#service_date").datepicker({
               minDate: 7, //1 week before
               dateFormat: "yy-m-d",
               changeMonth: true,
               numberOfMonths: 1,
               changeYear: true,   
          });
        });
    </script>

</body>
</html>