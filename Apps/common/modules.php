
<!-- customer management -->

<?php if($userinfo['role_id']!=2){ ?>
  <li><a href="../view/customer_management.php">
    <i class="glyphicon glyphicon-user"></i>
  &nbsp;&nbsp;Customer Management</a></li>
<?php } ?>


<!-- User management -->

<?php if($userinfo['role_id']==2){ ?>
  <li><a href="../view/user_management.php">
    <i class="glyphicon glyphicon-user"></i>
  &nbsp;&nbsp;User Management</a></li>
<?php } ?>


<!-- Item Management -->

<?php if($userinfo['role_id']!=2){ ?>
  <li><a href="../view/item_management.php">
    <i class="glyphicon glyphicon-gift"></i>
  &nbsp;&nbsp;Item Management</a></li>
<?php } ?>


<!-- Package Management -->

<!-- <?php //if($userinfo['role_id']!=2){ ?>
  <li><a href="../view/package_management.php">
    <i class="glyphicon glyphicon-folder-open"></i>
  &nbsp;&nbsp;Package Management</a></li>
<?php //} ?> -->



<!-- Order Management -->

<?php if($userinfo['role_id']!=2){ ?>
  <li><a href="../view/order_management.php">
    <i class="glyphicon glyphicon-shopping-cart"></i>
  &nbsp;&nbsp;Order Management</a></li>
<?php } ?>


<!-- Payment Management -->

<?php if($userinfo['role_id']!=2){ ?>
  <li><a href="../view/payment_management.php">
    <i class="glyphicon glyphicon-credit-card"></i>
  &nbsp;&nbsp;Payment Management</a></li>
<?php } ?>






<!-- Notification Management -->

  <li><a href="../view/notification_management.php">
    <i class="glyphicon glyphicon-envelope"></i>
  &nbsp;&nbsp;Notification Management</a></li>


<!-- Feedback Management -->

<?php if($userinfo['role_id']!=2) { ?>
  <li><a href="../view/feedback_management.php">
    <i class="glyphicon glyphicon-signal"></i>
  &nbsp;&nbsp;Feedback Management</a></li>
<?php } ?>


<!-- Reports Management -->

  <li><a href="../view/report_management.php">
    <i class="  glyphicon glyphicon-list-alt"></i>
  &nbsp;&nbsp;Reports Management</a></li>


<!-- Backup Management -->

<?php if($userinfo['role_id']==2) { ?>
  <li><a href="../view/backup_management.php">
    <i class="glyphicon glyphicon-refresh"></i>
  &nbsp;&nbsp;Backup Management</a></li>
<?php } ?> 



<!-- User Tracking -->

<?php if($userinfo['role_id']==2) { ?>
  <li><a href="../view/user_tracking.php">
    <i class="glyphicon glyphicon-screenshot"></i>
  &nbsp;&nbsp;User Tracking</a></li>
<?php } ?>  

<!-- Customer Tracking -->

<?php if($userinfo['role_id']==2) { ?>
  <li><a href="../view/customer_tracking.php">
    <i class="
    glyphicon glyphicon-eye-open"></i>
  &nbsp;&nbsp;Customer Tracking</a></li>
<?php } ?>  
<li><a href=""></a></li>
