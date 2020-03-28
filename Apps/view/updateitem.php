      <?php

      include '../common/sessionhandling.php';
      $role_id=$userinfo['role_id'];
      include '../common/dbconnection.php';
      include '../model/usermodel.php';
      include '../common/functions.php';
      include '../model/categorymodel.php';
      include '../model/rolemodel.php';
      include '../model/itemmodel.php';

      
$item_id = $_REQUEST['item_id'];//To take the user id of the particular person
$obi=new item();
$resultitem = $obi->viewAItem($item_id); //to get the specific user details
$rowitem=$resultitem->fetch(PDO::FETCH_BOTH);


$obcat=new category();
$resultcat=$obcat->displayAllCategory();

?>

<?php include_once('../common/header.php'); ?>  


<html>
<head>
  <meta charset="utf-8">
  <!-- bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
  <!-- font awesome version5 -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/checkbox.css">
  <link rel="stylesheet" href="https://github.com/ionic-team/ionicons.git">
  <!-- sweet alert -->
  <script src="../sweetalert/sweetalert.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
  <!-- JQuery 3.3.1 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- use smooth scrolling -->
  <script src="../js/smoothscroll.js"></script>
<script src="../js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/iziToast.min.css">
  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==4)

                  echo "<script type='text/javascript'>iziToast.success({

                    message: 'Item Updated Successfully',
                  });</script>";
                }


                ?>

                  <?php 
              if(isset($_GET['msg'])){

                $message=$_GET['msg'];

                if($message==5)

                  echo "<script type='text/javascript'>iziToast.warning({
    title: 'Deleted!',
    message: 'Customer Profile Deleted',
});</script>";
                }


                ?>


</head>



<p align="center">Modules</p>
<li>
 <?php include_once('../common/modules.php'); ?>        
 
</li>
<li class="nav-label"></li> 

</div>
<!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">

      <h3 class="text-primary">UPDATE ITEM</h3> </div>
      <div class="col-md-7 align-self-center">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/user_management.php">Item Management</a></li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
      </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">


      <!-- Start Page Content -->
      
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="alert alert-secondary" role="alert" align="center">
               Use the form below to add new item. You can add item name, description, upload images, and price based on meal size.
             </div>
             <h4 class="card-title" align="center">Update Item</h4>

             <div class="card-body m-t-15">
              <form method="post" action="../controller/itemcontroller.php?action=update&item_id=<?php echo $item_id ?>" enctype="multipart/form-data">
                <div class="row" >
                  <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2">Category</div>
                  <div class="col-md-3">
                    <select id="cat_id" name="cat_id" class="form-control form-control-lg">
                      <option value="">Select a category</option>
                      <?php
                      while ($rowcat=$resultcat->fetch(PDO::FETCH_BOTH)){?>
                        <option value="<?php echo $rowcat['cat_id']?>"  <?php if($rowcat['cat_id']==$rowitem['cat_id']){ echo "SELECTED";} ?>>

                         
                         <?php echo $rowcat['cat_name']; ?>
                       </option>
                     <?php }?>

                   </select>
                 </div>

                 <div class="col-md-1">&nbsp;</div>

               </div>
               <div class="clearfix">&nbsp;</div>

               <div class="row" >
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-2">Item name</div>
                <div class="col-md-3">
                 <input type="text" id="item_name" name="item_name" class="form-control" value="<?php echo $rowitem['item_name']; ?>">
               </div>
               <div class="col-md-1">&nbsp;</div>

             </div>
             <div class="clearfix">&nbsp;</div>
             <div class="row" >
              <div class="col-md-1">&nbsp;</div>
              <div class="col-md-2">Item Size</div>
              <div class="col-md-3">
               <select id="size_name" name="size_name" class="form-control form-control-lg">
                

                <option value="Large">Large</option>
                <option value="Medium">Medium</option>
                <option value="Small">Small</option>
              </select>
            </div>
            
            <div class="col-md-1">&nbsp;</div>

          </div>
          <div class="clearfix">&nbsp;</div>
          <div class="row" >
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-2">Item Price</div>
            <div class="col-md-3">
             <div class="input-group">
               <span class="input-group-addon">$</span>


               <input type="text" class="form-control" id="item_price" name="item_price" value="<?php echo $rowitem['item_price']; ?>">
               <span class="input-group-addon">.00</span>
             </div>

           </div>

           <div class="col-md-1">Item Image</div>
           <div class="col-md-4">
            <input type="file" id="item_image" name="item_image"  multiple class="form-control form-control-lg" onchange="readURL(this)">

            <?php 


            $item_id=$rowitem['item_id'];
            if($rowitem['item_image']==""){
              $item_image="../images/user_icon.png";
            }else{
              $item_image="../images/item_images/".$rowitem['item_image'];
            }
            ?>

            <div class="clearfix">&nbsp;</div>
            <img id="image_view"  src="<?php echo $item_image; ?>" style="width: 100px"/>
          </div>
          <div class="col-md-1">&nbsp;</div>

        </div>


        <div class="clearfix">&nbsp;</div>
        <div class="row" >
          <div class="col-md-1">&nbsp;</div>
          <div class="col-md-2">Item Description</div>
          <div class="col-md-8">
            <textarea id="item_des" name="item_des" class="form-control">&nbsp;<?php echo $rowitem['item_des']; ?></textarea>

          </div>

          <div class="col-md-1">&nbsp;</div>

        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>

        <div class="form-actions">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="offset-sm-3 col-md-9">
                  <button type="submit" class="btn btn-info">Update</button>
                  <input type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-flat" />






                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>














<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<?php include_once('../common/footer.php'); ?>




<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<!--jquery-->
<script type="text/javascript" src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!--External JS for validation-->

</body>

</html>
