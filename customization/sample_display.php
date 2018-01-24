<!DOCTYPE html>
<html lang="en">
<head>
<title>display!</title>
</head>


<body>
 SAMPLE DITO LANG IDIDISPLAY YUNG GENERATED CUSTOMIZATION CAKE
   <?php 

    $link = mysql_connect('localhost', 'root', '');
    mysql_select_db("myrnas", $link);

    $query="SELECT * FROM customized_cake";
    $myData = @mysql_query($query, $link);

    date_default_timezone_set("Asia/Manila");

    while($record=mysql_fetch_array($myData)){ 



   echo "<img src='".$record['canvas']."' />";

   } ?> 
 ////
   </body>

   </html>