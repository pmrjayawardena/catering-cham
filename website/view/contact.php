<?php

include '../common/session.php';


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/express-favicon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>RedCaynne Re</title>
<link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
        <!-- Icon css link -->
        <link href="../vendors/material-icon/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../vendors/linears-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="../vendors/bootstrap-selector/bootstrap-select.css" rel="stylesheet">
        <link href="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link href="../vendors/owl-carousel/assets/owl.carousel.css" rel="stylesheet">
        <link href="../vendors/js-calender/zabuto_calendar.min.css" rel="stylesheet">
        
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
<script src="../../Apps/js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../Apps/css/iziToast.min.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
          <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }


       .mapContainer{
    width:50%;
    position: relative;
}
.mapContainer a.direction-link {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 100010;
    color: #FFF;
    text-decoration: none;
    font-size: 15px;
    font-weight: bold;
    line-height: 25px;
    padding: 8px 20px 8px 50px;
    background: #6B92FB;
    background-image: url('direction-icon.png');
    background-position: left center;
    background-repeat: no-repeat;
}
.mapContainer a.direction-link:hover {
    text-decoration: none;
    background: #0072ab;
    color: #FFF;
    background-image: url('direction-icon.png');
    background-position: left center;
    background-repeat: no-repeat;
}
    </style>
    </head>
    <body>
                 <?php 
            if(isset($_GET['msg'])){

              $message=$_GET['msg'];

              if($message==5)

                echo "<script type='text/javascript'>iziToast.success({

                  message: 'Successfully Sent Messege!',
                });</script>";
              }


              ?>

                               <?php 
            if(isset($_GET['msg'])){

              $message=$_GET['msg'];

              if($message==6)

                echo "<script type='text/javascript'>iziToast.success({

                  message: 'Successfully Sent Messege!',
                });</script>";
              }


              ?>
       
       <div id="preloader">
            <div class="loader absolute-center">
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
                <div class="loader__box"><b class="top"></b></div>
            </div>
        </div>
       
        <!--================ Frist hader Area =================-->
   <?php if($noc){ 
        ?>

        
        <?php include_once('../common/firstheaderloggedin.php'); ?>

    <?php }else{ ?> 

       <?php include_once('../common/firstheader.php'); ?> 

   <?php }?> 
        <!--================End Footer Area =================-->
        
        <!--================End Footer Area =================-->
 <?php include_once('../common/mainheader.php'); ?>  
        <!--================End Footer Area =================-->
        
        <!--================Banner Area =================-->
          <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
      <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
      <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>


     <div class="mapContainer">
    <a class="direction-link" target="_blank" href="//maps.google.com/maps?f=d&amp;daddr=6.916860,80.038055&amp;hl=en"> Get Directions</a>
    
</div>
<div id="map"></div>
        <!--================End Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_details">
                            <h3 class="contact_title">Contact Info</h3>
                            <p>Thank you for visiting the Southern Lanka Catering website</p>
<p>You have found your catering team for all occasions! Our website is designed to assist those who are planning Corporate Events, Weddings, Private Parties and Barbecues. Within, there is a wealth of information to help you plan your festive affair.</p>
                            <h3>Store Hours: Monday to Friday 9:00 am – 4:30pm </h3>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Address</h4>
                                    <h5>453/A Southen Lanka Catering Service</h5>
                                    <h5>Ranala</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Phone</h4>
                                    <h5>+94770503433</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Email</h4>
                                    <h5>southernlanka123@gmail.com</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row contact_form_area">
                            <h3 class="contact_title">Ask for Custom Packages</h3>
                            
                            <form action="../controller/customercontroller.php?action=addother" method="post" id="contactForm">
                             <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="name" name="firstname" placeholder="First Name*">
                                </div>
                                <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="last" name="lastname" placeholder="Last Name*">
                                </div>
                               
                                <div class="form-group col-md-12">
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Your Email*">
                                </div>
                                 <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone Number">
                                </div>
                                  <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="event_type" name="event_type" placeholder="Event Type">
                                </div>
                                   <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="no_of_guests" name="no_of_guests" placeholder="No of guests">
                                </div>
                                 <div class="form-group col-md-12">
                                  <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                                </div>

                                <div class="form-group col-md-12">Event date</div>
                                 <div class="form-group col-md-12">
                                  <input type="date" class="form-control" id="event_date" name="event_date" placeholder="Location">
                                </div>
                                <div class="form-group col-md-12">
                                  <textarea class="form-control" id="message" name="type_of_food" placeholder="Type of food"></textarea>
                                </div>
                            
                                <div class="form-group col-md-12">
                                    <button class="btn btn-default submit_btn" type="submit">Send Message</button>
                                 </div>
                            </form>
                            <div id="success">
                                <p>Your text message sent successfully!</p>
                            </div>
                            <div id="error">
                                <p>Sorry! Message not sent. Something went wrong!!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Contact Area =================-->
        
        <!--================Map Area =================-->
    

        <!--================End Map Area =================-->
        
        <!--================End Recent Blog Area =================-->
               <footer class="footer_area">
            <div class="footer_widget_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <aside class="f_widget about_widget">
                                <div class="f_w_title">
                                    
                                    <h4>ABOUT Southern Lanka Catering</h4>
                                </div>
                                <p>Southern Lanka is a household name dominant in Ranala and suburbs well over a decades.The name itself will stimulate the salivary glands of the customers who have enjoyed our food even once. 
</p>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-3">
                            <aside class="f_widget contact_widget">
                                <div class="f_w_title">
                                    <h4>CONTACT US</h4>
                                </div>
                                <p>Have questions, comments or just want to say hello:</p>
                                <ul>
                                    <li><a><i class="fa fa-envelope"></i>southernlanka@gmail.com</a></li>
                                    <li><a><i class="fa fa-phone"></i>+77 0503433</a></li>
                                    <li><a><i class="fa fa-map-marker"></i>453/A Southen Lanka Catering Service
<br /> Ranala</a></li>
                                </ul>
                            </aside>
                        </div>

                        <div class="col-md-3">
                            <aside class="f_widget gallery_widget">
                                <div class="f_w_title">
                                    <h4>Gallery On Flickr</h4>
                                </div>
                                <ul>
                                    <li><a href="#"><img src="../img/gallery/f-w-gallery/f-w-gallery-1.jpg" alt=""><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><img src="../img/gallery/f-w-gallery/f-w-gallery-2.jpg" alt=""><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><img src="../img/gallery/f-w-gallery/f-w-gallery-3.jpg" alt=""><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><img src="../img/gallery/f-w-gallery/f-w-gallery-4.jpg" alt=""><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><img src="../img/gallery/f-w-gallery/f-w-gallery-5.jpg" alt=""><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><img src="../img/gallery/f-w-gallery/f-w-gallery-6.jpg" alt=""><i class="fa fa-search"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
            <div class="copy_right_area">
                <div class="container">
                    <div class="pull-left">
                        <h5><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p></h5>
                    </div>
       
                </div>
            </div>
        </footer>
        <!--================End Recent Blog Area =================-->
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="../js/jquery-2.1.4.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- Extra plugin js -->
        <script src="../vendors/bootstrap-selector/bootstrap-select.js"></script>
        <script src="../vendors/bootatrap-date-time/bootstrap-datetimepicker.min.js"></script>
        <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="../vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="../vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="../vendors/countdown/jquery.countdown.js"></script>
        <script src="../vendors/js-calender/zabuto_calendar.min.js"></script>

            <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 6.916860, lng: 80.038055};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 18, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>


        <!--gmaps Js-->
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>
     
        
        <!-- contact js -->
        <script src="../js/jquery.form.js"></script>
        <script src="../js/jquery.validate.min.js"></script>

         <script src="../js/contact.js"></script>
        <script src="../js/video_player.js"></script>
        <script src="../js/theme.js"></script>
    </body>
</html>