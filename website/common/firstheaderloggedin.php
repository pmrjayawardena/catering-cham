        <div class="first_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="header_contact_details">
                            <a href="#"><i class="fa fa-phone"></i>+9477(050)3433</a>
                            <a href="#"><i class="fa fa-envelope-o"></i>+9477(050)3433</a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="event_btn_inner">

                            <a class="event_btn" href="../view/contact.php"><i class="fa fa-calendar" aria-hidden="true"></i>Custom Packages</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="event_btn_inner">

                        </div>
                    </div>
                    <div class="col-md-4">

                     <?php $customerdetails=$_SESSION['cusinfo']; 


                     ?>
                     <h3>now you are logged In</h3>
                     <h4><?php echo $customerdetails['cus_fname']." ".$customerdetails['cus_lname']; ?></h4>

                 </div>
             </div>
         </div>
     </div>