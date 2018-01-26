<?php
    

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $cust_uname = $_POST['cust_uname'];
    $cust_pword = $_POST['cust_pword'];
    $con_password = $_POST['con_password'];

    $code=md5(uniqid(rand())); 

    if($cust_pword!=$con_password)
    {
            echo " <p> <h1> Password does not match! </h1> </p> ";
        }
    
    else{
    $dbc = @mysql_connect('localhost' , 'root', '');
    @mysql_select_db('kiffiarts', $dbc);

    session_start();

    $query = "INSERT INTO customer (fname, lname, address, phone_num, birthdate, email, cust_uname, cust_pword, active, email_verify) VALUES('$fname','$lname','$address','$phone_num','$birthdate','$email','$cust_uname','$cust_pword', 1, '$code')";

    

    if(@mysql_query($query,$dbc)){

      print '<p> <h1> You can now log in! </h1> </p> ';

      $_SESSION["email"] = $email;
      $email = $_SESSION['email'];

      $to = $email;
      $subject = 'Myrnas Bake House Online Personalized Cake Account | Registration';
      $header = "From:Myrnas Bake House(myrnascake.com)"."\r\n";
      $message = '<h3> <p>  You are now Registered on Myrnas Bake House! </p>

      Please click this link to activate your account:
      http://www.myrnasonlinecakecom.000webhostapp.com/index.php?email='.$email.'&code='.$code.'
      
      '; // Our message above including the link  

        }  
        else{
        print '<p> Oooppps, please register again!. '.mysql_error().'</p>';
        }
    }
?>
