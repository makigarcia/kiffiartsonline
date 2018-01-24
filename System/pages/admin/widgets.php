<!DOCTYPE html>
<html lang="en">
  
    <head>


    </head>



       <?php
        include ('configuration.php');
        $retrieve_batch = mysql_query("SELECT * from reviewee_class where status = 'c'");
        $read_batch = mysql_fetch_array($retrieve_batch);
        $batch_stat = $read_batch['batch_number'];

        ?>


            <div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-shopping-basket fa-4x"></i>
    <div class="content">
      <div class="title">Sale Today</div>
      <div class="value"><span class="sign">$</span>420</div>
    </div>
  </div>
</a>
                <!-- **********************End Pending Application box************************ -->


                <!-- *********************Start of Confirmed students************************** -->
                <div class="col-md-4 col-sm-3 col-xs-3 no-right-padding">
                  <a href="temporary_applications.php" class="text-widget color-3">
                    <?php
                        $result=mysql_query("SELECT count(*) as total from reviewee where status='c'");
                        $data=mysql_fetch_assoc($result);
                        echo  '<header>' . $data['total'] . ' Confirmed' .'</header>';
                        ?>
                    <small class="hidden-xs hidden-sm">ORDERS with pending payment(s)</small>
                    <span class="icon"><i class="ti-money"></i></span>
                  </a>
                </div>
                <!-- *********************End of Confirmed students**************************** -->

                <!-- ********************************Start of reviewees with balance**************************************************** -->
                 <div class="col-md-4 col-sm-3 col-xs-3 no-right-padding">
                  <a href="report_balance.php" class="text-widget color-4">
                    <?php
                      $get_bnum = mysql_query("SELECT batch_number, year, tuition from reviewee_class where status = 'c'");
                      $row = mysql_fetch_assoc($get_bnum);
                      $batch = $row['batch_number'];

                      $getids = mysql_query("SELECT reviewee_idnumber, status from reviewee where reviewee_idnumber in 
                                           (SELECT reviewee_idnumber FROM application WHERE batch_number = '$batch')");
                      $get_tuition = mysql_query("SELECT tuition from reviewee_class where status = 'c'");
                      $rowa = mysql_fetch_assoc($get_tuition);
                      $tuition = $rowa['tuition'];
                      $i = 0;

                        while ($rowb = mysql_fetch_assoc($getids)) {
                          if( $rowb['status']=='p' ){ 
                            $reviewee_id = $rowb['reviewee_idnumber'];

                            $read_balance = mysql_query("SELECT SUM(payment_amount) as TOTAL FROM payment WHERE reviewee_idnumber = '$reviewee_id'");
                            $rowc  = mysql_fetch_array($read_balance);
                            $reviewee_totpayment = $rowc['TOTAL'];

                              if($reviewee_totpayment!= $tuition){
                                $i = $i+1;
                              }
                          }
                        }

                         echo "<header><strong></strong>" .$i ." order(s)</header>";
                    ?>
                    <small>with balance</small>
                    <span class="icon"><i class="ti-cloud-down"></i></span>
                  </a> 
                </div>
                <!-- ******************************************End of reviewees with balance************************************************ -->

              </div> <!-- /row-->


              <div class="row">



               


         
                 <!-- *****************************End of no. payments weekly*************************************** -->

              </div> <!-- /row-->

             
              </div> <!-- /row-->


          </div><!-- /col-md-12-->

</html>