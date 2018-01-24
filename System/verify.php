<html>
<head>

<style text="css/text">
#wrap .statusmsg{
    font-size: px; /* Set message font size  */
    padding: 3px; /* Some padding to make some more space for our text  */
    background: #EDEDED; /* Add a background color to our status message   */
    border: 1px solid #DFDFDF; /* Add a border arround our status message   */
}

#wrap{
    background: #FFFFFF; /* Set content background to white */
    width: 615px; /* Set the width of our content area */
    margin: 0 auto; /* Center our content in our browser */
    margin-top: 50px; /* Margin top to make some space between the header and the content */
    padding: 10px; /* Padding to make some more space for our text */
    border: 1px solid #DFDFDF; /* Small border for the finishing touch */
    text-align: center; /* Center our content text */
}
 
 #header{
     /* Set header height */
    background: #151515; /* Set header background color */
}

</style>
</head>
<body>

<div id="header">
<img src="images/newlogo.png" alt="logo">
</div>

<div id="wrap">
	

<?php

include('server.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = ($_GET['email']); // Set email variable
    $hash = ($_GET['hash']); // Set hash variable
                 
    $search = mysql_query("SELECT EmailAdd, hash, active FROM patient WHERE EmailAdd='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
                 
    if($match > 0){
        // We have a match, activate the account
        mysql_query("UPDATE patient SET active='1' WHERE EmailAdd='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo '<div class="statusmsg">Your account has been activated, you can now login. <a href="login.php">Click here to login</a></div>';
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
    }
                 
}else{
    // Invalid approach
    echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}



?>

</div>
</body>
</html>