
<link rel="icon" type="image/png" href="../../Apps/images/icons/slweb.ico"/>
<header class="main_menu_area">
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../img/southernlankac.png" alt="" width="250px" height="30px"></a><br>
                 <a class="navbar-brand" href="#"><img src="../img/slcatering.png" alt="" width="100px" height="30px"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>

        <li><a href="../view/items.php">Items</a></li>
                    <li><a href="../view/packages.php">Packages</a></li>
               

                    <li><a href="../view/contact.php">Contact US</a></li>
                    <li><a href="../view/special.php">Special</a></li>
   <?php if($noc){ 
        ?>

                                            <li class="dropdown submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">

                                    
                                    <li><a href="../view/profilemai.php">Profile</a></li>
  <li><a href="../view/viewpurchasehistory.php">Purchase History</a></li>
                                               <li><a href="../view/logout.php">Logout</a></li>
                                </ul>
                            </li>   
                             <?php }?>  
                    <li><a href="../view/cart1.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

