<?php

 include('server.php');
 
  session_start();

  if(!empty($_SESSION['msg'])){

    $msg = $_SESSION['msg'];
  }


    ?>


<?php
if(isset($_POST["name2check"]) && $_POST["name2check"] != ""){

    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['name2check']); 
    $sql_uname_check = mysql_query("SELECT UserName FROM patient WHERE UserName='$username' LIMIT 1"); 
    $uname_check = mysql_num_rows($sql_uname_check);
    if (strlen($username) < 4) {
        echo '<div style="color:red;">**4 - 15 characters please.</div>';
        exit();
    }
    if (is_numeric($username[0])) {
        echo '<div style="color:red;">**First character must be a letter.</div>';
        exit();
    }
    if ($uname_check < 1) {
        echo '<div style="color:green;">** <strong>' . $username . '</strong> is available. </div>';
        exit();
    } else {
        echo '<div style="color:red;">**<strong>'. $username . '</strong> is already taken. </div>';
        exit();
    }
}
?>

<?php
if(isset($_POST["p2check"]) && $_POST["p2check"] != ""){


    $pass = preg_replace('#[^a-z0-9]#i', '', $_POST['p2check']); 

    if((strlen($pass) < 8) || (strlen($pass) > 15)){

   echo '<div style="color:red;">**8 - 15 characters please.</div>';
   exit();
    }
    else{
    echo '<div style="color:green;">**password is valid.</div>';
    exit();
    }
}
?>

<?php
if(isset($_POST["email2check"]) && $_POST["email2check"] != ""){

    $email = $_POST['email2check'];
    $sql_uname_check = mysql_query("SELECT EmailAdd FROM patient WHERE EmailAdd='$email' LIMIT 1"); 
    $uname_check = mysql_num_rows($sql_uname_check);


    if (($uname_check < 1) && (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)) {
        echo '<div style="color:green;">** <strong>' . $email . '</strong> is available and valid. </div>';
        exit();
    } else {
        echo '<div style="color:red;">**<strong>'. $email . '</strong> is already taken or not valid. </div>';
        exit();
    }


}
?>

<?php
if(isset($_POST["cp2check"]) && $_POST["cp2check"] != ""){

    $cp = preg_replace('#[^a-z0-9]#i', '', $_POST['cp2check']); 


    if((ctype_alpha($cp)) || ( preg_match('/\s/',$cp))) {
        echo '<div style="color:red;">**Digits only please.</div>';
        exit();
    }



    else if ((strlen($cp) < 11) || (strlen($cp) > 11)) {
        echo '<div style="color:red;">**11 characters please.</div>';
        exit();
    
    }else{
        echo '<div style="color:green;">**Cellphone no. is valid.</div>';
      exit();
    }

}
?>


<?php
if(isset($_POST["tp2check"]) && $_POST["tp2check"] != ""){

    $tp = preg_replace('#[^a-z0-9]#i', '', $_POST['tp2check']); 


    if(ctype_alpha($tp)) {
        echo '<div style="color:red;">**Digits only please.</div>';
        exit();
    }


    if ((strlen($tp) < 7) || (strlen($tp) > 7)) {
        echo '<div style="color:red;">**7 characters please.</div>';
        exit();
    
    }else{
        echo '<div style="color:green;">**Telephonee no. is valid.</div>';
      exit();
    }


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    -->
<script>
function checkpass(){
    var status = document.getElementById("pstatus");
    var u = document.getElementById("form-password").value;
    if(u != ""){
        status.innerHTML = 'checking...';
        var hr = new XMLHttpRequest();
        hr.open("POST", "login.php", true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                status.innerHTML = hr.responseText;
            }
        }
        var v = "p2check="+u;
        hr.send(v);
    }
}

</script>

<script>
function checktp(){
    var status = document.getElementById("tpstatus");
    var u = document.getElementById("form-telephoneno").value;
    if(u != ""){
        status.innerHTML = 'checking...';
        var hr = new XMLHttpRequest();
        hr.open("POST", "login.php", true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                status.innerHTML = hr.responseText;
            }
        }
        var v = "tp2check="+u;
        hr.send(v);
    }
}

</script>

<script>
function checkcp(){
    var status = document.getElementById("cpstatus");
    var u = document.getElementById("form-cellphoneno").value;
    if(u != ""){
        status.innerHTML = 'checking...';
        var hr = new XMLHttpRequest();
        hr.open("POST", "login.php", true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                status.innerHTML = hr.responseText;
            }
        }
        var v = "cp2check="+u;
        hr.send(v);
    }
}

</script>


<script>
function checkusername(){
    var status = document.getElementById("usernamestatus");
    var u = document.getElementById("form-username").value;
    if(u != ""){
        status.innerHTML = 'checking...';
        var hr = new XMLHttpRequest();
        hr.open("POST", "login.php", true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                status.innerHTML = hr.responseText;
            }
        }
        var v = "name2check="+u;
        hr.send(v);
    }
}

</script>


<script>
function checkemail(){
    var status = document.getElementById("emailstatus");
    var u = document.getElementById("form-email").value;
    if(u != ""){
        status.innerHTML = 'checking...';
        var hr = new XMLHttpRequest();
        hr.open("POST", "login.php", true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                status.innerHTML = hr.responseText;
            }
        }
        var v = "email2check="+u;
        hr.send(v);
    }
}

</script>


<script>

function checkPass(){

var pass1 = document.getElementById('form-password');
var pass2 = document.getElementById('form-confirm-password');

var emailstatus = document.getElementById('passstatus');

if(pass1.value == pass2.value ){

  emailstatus.innerHTML= '<div style="color:green;">** Password match.</div>';
}else
{

  emailstatus.innerHTML = '<div style="color:red;">** Password do not match.</div>';
}

}



</script>



</head><!--/head-->

<body>

    <header id="header">
        
       
        
    </header><!--/header-->

      <div id="login-page">
        <div class="container">
         <?php 
                         if(isset($msg)){  
                           echo '<div id="wrap" class="statusmsg">'.$msg.'</div>'; 
                          } 
             ?>

              <form action="loginresults.php" method="post" class="form-login" name = "login"  method="POST">
                <h2 class="form-login-heading">ADMIN</h2>
                <div class="login-wrap">
                    <input type="text" name="lusername" required="required" class="form-control" placeholder="User ID" id="username" autofocus>
                    <br>
                    <input type="password" name="lpassword" required="required" class="form-control" placeholder="Password" id="password">
                    <br>
                    <br>
                    <button class="btn btn-theme btn-block" type="submit">
                                                             Sign in
                                                         </button>
                    
                    


                
              </form>
                    
                </div>
        
                 
                  <!-- modal -->
        
              </form>       
        
        </div>
   

            
                   
            </div>



        </div><!--/.container-->
    </section><!--/#feature-->



   

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/signup.js"></script>
    


<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js"></script>
 <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/mbh.jpg", {speed: 500});
    </script>

</body>
</html>