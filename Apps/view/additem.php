      <?php
      include '../common/dbconnection.php';
      include '../model/usermodel.php';
      include '../common/functions.php';
      include '../common/sessionhandling.php';
      include '../model/categorymodel.php';
           //asign the module number 
      $role_id=$userinfo['role_id'];   //get the role of the logged in user



     $obcat=new category(); //create an object using category class
     $resultcat=$obcat->displayAllCategory(); //get the category details
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

      <h3 class="text-primary">ADD ITEM</h3> </div>
      <div class="col-md-7 align-self-center">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/user_management.php">User Management</a></li>
          <li class="breadcrumb-item active">Add Item</li>
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
             <h4 class="card-title" align="center">Add a New Item</h4>

             <div class="card-body m-t-15">
              <form method="post" action="../controller/itemcontroller.php?action=add" enctype="multipart/form-data" name="RegForm" onsubmit="return GEEKFORGEEKS()">
                <div class="row" >
                  <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2">Category</div>
                  <div class="col-md-3">
                    <select id="cat_id" name="cat_id" class="form-control form-control-lg" >
                      <option value="">Select a category</option>

                      <?php
                      while ($rowcat = $resultcat->fetch(PDO::FETCH_BOTH)) {
                        ?>
                        <option value="<?php echo $rowcat['cat_id']; ?>"><?php echo $rowcat['cat_name']; ?></option>
                      <?php } ?>
                    </select>

                    <div id="umerror" class="error"></div>
                    <small class="form-control-feedback"> </small>
                  </div>

                  <div class="col-md-1">&nbsp;</div>

                </div>
                <div class="clearfix">&nbsp;</div>

                <div class="row" >
                  <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2">Item name</div>
                  <div class="col-md-3">
                   <input type="text" id="item_name" name="item_name" class="form-control">
                   <div id="inerror" class="error">*</div>
                   <small class="form-control-feedback"> </small> </div>
                 </div>
                 <div class="row" >
                  <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2">Item Size</div>
                  <div class="col-md-3">
                   <select id="size_name" name="size_name" class="form-control form-control-lg">
                    <option value="">Select a Size</option>

                    <option value="Large">Large</option>
                    <option value="Medium">Medium</option>
                    <option value="Small">Small</option>
                  </select>
                </div>

                <div class="col-md-1">&nbsp;</div>

              </div>
<br>
                               <div class="row" >
                  <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2">Suitable For</div>
                  <div class="col-md-3">
             <input type="text" id="suitable_for" name="suitable_for" class="form-control">
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


                   <input type="text" class="form-control" id="item_price" name="item_price">
                   <span class="input-group-addon">.00</span>
                 </div>

               </div>

               <div class="col-md-1">Item Image</div>
               <div class="col-md-4">
                <input type="file" id="item_image" name="item_image"class="form-control form-control-lg" >
              </div>
              <div class="col-md-1">&nbsp;</div>

            </div>


            <div class="clearfix">&nbsp;</div>
            <div class="row" >
              <div class="col-md-1">&nbsp;</div>
              <div class="col-md-2">Item Description</div>
              <div class="col-md-8">
                <textarea id="item_des" name="item_des" class="form-control" ></textarea>

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
                      <button type="submit" class="btn btn-info">Add Item</button>
                      <button type="reset" name="clear" value="clear" class="btn btn-warning"><i class="fas fa-eraser"></i>&nbsp;Clear </button>

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
<script type="text/javascript" src="../js/validationitem.js"></script>

<script>
  function GEEKFORGEEKS()                                   
  {
    var cat_id = document.forms["RegForm"]["cat_id"]; 
    var item_name = document.forms["RegForm"]["item_name"];              

    var size_name = document.forms["RegForm"]["size_name"]; 
    var suitable_for = document.forms["RegForm"]["suitable_for"]; 
    var item_price =  document.forms["RegForm"]["item_price"]; 

    var item_des = document.forms["RegForm"]["item_des"]; 

    if (cat_id.value == "")                              
    {
      window.alert("Please Select a Category");
      cat_id.focus();
      return false;
    }

    if (item_name.value == "")                                 
    {
      window.alert("Please enter Item Name");
      item_name.focus();
      return false;
    }



    if (size_name.value == "")                                  
    {
      window.alert("Please Select a Size");
      size_name.focus();
      return false;
    }
    if (suitable_for.value == "")                                  
    {
      window.alert("Please Enter a Value");
      suitable_for.focus();
      return false;
    }
    if (item_price.value == "")                
    {
      window.alert("Please enter Price");
      item_price.focus();
      return false;
    }


    if (item_des.value == "")                          
    {
      window.alert("Please enter Item Description.");
      item_des.focus();
      return false;
    }


    return true;
  }

</script>
</body>

</html>
