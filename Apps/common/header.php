<?php 
$con1=new mysqli("localhost", "root", "", "ocs");
include '../common/sessionhandling.php';

$user_id=$userinfo['user_id'];
$sqln="SELECT * FROM notification WHERE notification_status='Unseen' ORDER BY notification_id DESC";
$resultn=$con->query($sqln);



// get the notifications of the logged in user
$sqln="SELECT * FROM notification WHERE notification_id IN(SELECT notification_id FROM user_notification WHERE user_id=$user_id
) AND notification_status='Unseen'";
$resultnn=$con->query($sqln);
$norn=$resultnn->rowCount(); 


// get the new orders
$todaydate=date("Y-m-d");
$sqlp="SELECT * FROM cus_order WHERE dispatch_status!='Dispatched'AND order_date='$todaydate' ORDER BY order_id DESC";
$resultneworders=$con->query($sqlp);
$noofnew=$resultneworders->rowCount(); 

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    
    <title>Catering</title>
    <!-- Bootstrap Core CSS -->
    <!-- Custom CSS -->
    <link rel="icon" type="image/png" href="../images/icons/sl.ico"/>
    <link href="../css/helper.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/mystyle.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">



</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
         <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
     </div>
     <!-- Main wrapper  -->
     <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b><img src="../images/catering.png" alt="homepage" class="dark-logo" width="70px" height="70px" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                       
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                    </ul>

<!-- show new orders only to management and staff -->
                    <?php if($userinfo['role_id']!=2){ ?>
                        <ul class="navbar-nav my-lg-0">
                            <!-- Comment -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>&nbsp;<?php echo $noofnew; ?>
                                <div class="notify"> 

                                    <?php if($noofnew!==0){ ?>

                                        <span class="heartbit"></span> <span class="point"></span> </div>

                                    <?php }?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                    <ul>
                                        <li>

                                            <?php if($noofnew==0){ ?>
                                                <div class="drop-title">No orders today</div>

                                            <?php }else{?>
                                                <div class="drop-title"><?php echo $noofnew;?>&nbsp;Latest Orders Today</div>
                                            <?php }?>
                                        </li>
                                        <li>
                                            <div class="message-center">
                                                <!-- Message -->


                                                <?php while($rownew=$resultneworders->fetch(PDO::FETCH_BOTH)){ ?>
                                                    <a href="../view/vieworder.php?order_id=<?php echo $rownew['order_id'] ?>">
                                                        <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                        <div class="mail-contnet">
                                                            <h5>order id - <?php echo $rownew['order_id'] ?></h5> <span class="mail-desc"><?php echo $rownew['order_status'] ?>&nbsp;<i class="fa fa-check text-info"></i></span> <span class="time"><?php echo $rownew['order_date'] ?></span>
                                                        </div>
                                                    </a>
                                                    <!-- Message -->
                                                <?php }?>


                                            </div>
                                        </li>
                                        <li>
                                            <a class="nav-link text-center" href="../view/order_management.php""> <strong>Check all Orders</strong> <i class="fa fa-angle-right"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                        <?php }?>

                        <!-- User profile and search -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- Messages -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>&nbsp;<?php echo $norn; ?>
                                <div class='notification-num'> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have <?php echo $norn; ?> new messages</div>
                                    </li>

                                    <li>

                                       <div class="message-center">
                                        <!-- Message -->

                                        <?php while($rown=$resultnn->fetch(PDO::FETCH_BOTH)){ ?>

                                            <a href="../view/viewnotification.php?notification_id=<?php echo $rown['notification_id']; ?>">
                                                <div class="user-img"> <img src="../images/newmessage.png" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5><?php echo $rown['notification_category']; ?></h5> 
                                                    <h6>Notification ID <?php echo $rown['notification_id']; ?></h6>
                                                    <span class="mail-desc"><?php echo $rown['notification_comment']; ?></span> <span class="time"><?php echo $rown['notification_date']; ?></span>
                                                </div>
                                            </a>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="../view/notification_management.php"> <strong>See all Notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="style1" src="<?php echo $iname; ?>" width="40px" height="40px"></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="../view/profile.php"><i class="ti-user"></i> Profile</a></li>



                                    <img class="style1" src="<?php echo $iname; ?>" height="30px" width="30px">
                                    &nbsp;<?php echo   $userinfo['user_fname']; ?> | 
                                    <i class="fa fa-power-off"></i>&nbsp;<a class="a1" href="../view/logout.php">Logout</a> 
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label"></li>
                        <li class="nav-label"></li>