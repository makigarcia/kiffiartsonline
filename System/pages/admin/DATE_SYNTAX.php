<?php      $ai = mysql_query("SELECT Count(`order_ID`) FROM `order_cake` WHERE MONTH(service_date)=MONTH(CURDATE())"); //syntaxt for current month
<?php      $ai = mysql_query("SELECT Count(`order_ID`) FROM `order_cake` WHERE  TO_DAYS(service_date) = TO_DAYS(NOW()+1)"); // syntax for month for tomorrow
