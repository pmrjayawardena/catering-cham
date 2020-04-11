<?php 
include '../Apps/common/dbconnection.php';

include '../Apps/model/itemmodel.php';
include '../Apps/model/categorymodel.php';
$obitem = new item();
$result = $obitem->viewAllItems();
$obcat=new category;
$resultc=$obcat->displayAllCategory();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Canteen &mdash; Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800|DM+Serif+Display:400,400i&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    
    <header role="banner">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="index.php">Serving healthy foods for healthy children</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="recipes.php">Recipes</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="services.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="services.php">Delicious Food</a>
                  <a class="dropdown-item" href="services.php">Enjoy Drinks</a>
                  <a class="dropdown-item" href="services.php">Eat All You Can</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="news.php">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>

            
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    
    <div class="slider-wrap">
      <div class="slider-item" style="background-image: url('img/hero_1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 ">
              <h1 data-aos="fade-up">Our Recipes</h1>
              <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Healthy delicious and tasty food</p>
              <p data-aos="fade-up" data-aos-delay="200"><a href="#" class="btn btn-white btn-outline-white">Get Started</a></p>
            </div>
          </div>
        </div>

      </div>
    <!-- END slider -->
    </div> 
    

    <section class="section bg-light pt-0 bottom-slant-gray">

      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row" data-aos="fade">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Our Recipes</h2>
            </div>
          </div>
        </div>
      </div>


      <div class="items-wrapper">
      
      <?php
             while ($row = $result->fetch(PDO::FETCH_BOTH)) {

                if($row['item_image']==""){
              $cimage="../Apps/images/foodwow.png";
            }else{
              $cimage="../Apps/images/item_images/".$row['item_image'];
            }

            ?>
      <div class="item-card">
          <div class="item-img"><img src="<?php echo $cimage;?>" alt=""></div>    
          <div class="item-des">
          
          <h3><?php echo $row['item_name']; ?>   <span>Price : Rs <?php echo $row['item_price']; ?></h3>

          <p><?php echo $row['item_des']; ?></p>
          </div>
      </div>

      <?php  }  ?>
      
      </div>
    </section> <!-- .section -->
    

   

    <footer class="site-footer" role="contentinfo">
      
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 mb-5">
            <h3>About Us</h3>
            <p class="mb-5">To manage College's lunch smoothly and enble to select the menu for you staying "online" which increases realiablity and enhance satisfaction of yours.
<br>
Feel Canteen as hygeinic family like kitchen...</p>
            <ul class="list-unstyled footer-link d-flex footer-social">
              <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
            </ul>

          </div>
          <div class="col-md-5 mb-5">
            <div class="mb-5">
              <h3>Opening Hours</h3>
              <p><strong class="d-block font-weight-normal text-black">Sunday-Friday</strong> 9AM - 7PM</p>
            </div>
            <div>
              <h3>Contact Info</h3>
              <ul class="list-unstyled footer-link">
                <li class="d-block">
                  <span class="d-block text-black">Address:</span>
                  <span>171/A,Raymond Road,Colombo 03.</span></li>
                <li class="d-block"><span class="d-block text-black">Phone:</span><span>+94 71 934 4183</span></li>
                <li class="d-block"><span class="d-block text-black">Email:</span><span>cdhundred@gmail.com</span></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Quick Links</h3>
            <ul class="list-unstyled footer-link">
              <li><a href="#">About</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
          
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-md-center text-left">
            <p>
            
 &copy;<script>document.write(new Date().getFullYear());</script> Canteen Management System


            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#cf1d16"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    

    <script src="js/main.js"></script>
    
  </body>
</html>