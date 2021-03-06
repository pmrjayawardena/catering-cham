      <?php
      
      include '../common/dbconnection.php';
      include '../model/usermodel.php';
      include '../common/functions.php';
      include '../model/categorymodel.php';
      include '../model/rolemodel.php';
      include '../model/itemmodel.php';
      include '../common/sessionhandling.php';
      
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

      <h3 class="text-primary">ADD CATEGORY</h3> </div>
      <div class="col-md-7 align-self-center">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/user_management.php">User Management</a></li>
          <li class="breadcrumb-item active">Add Category</li>
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
               Use the form below to add new category. You can add Category name, description, upload image.
             </div>
             <h4 class="card-title" align="center">Add a New Category</h4>

             <div class="card-body m-t-15">
              <form method="post" action="../controller/categorycontroller.php?action=add" enctype="multipart/form-data" name="RegForm" onsubmit="return GEEKFORGEEKS()">


              </div>
              <div class="clearfix">&nbsp;</div>

              <div class="row" >
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-2">Category Title</div>
                <div class="col-md-3">
                 <input type="text" id="cat_name" name="cat_name" class="form-control">
                 <div id="cnerror" class="error">*</div>
               </div>
               <div class="col-md-1">&nbsp;</div>

             </div>
             <div class="clearfix">&nbsp;</div>
             <div class="row" >
              <div class="col-md-1">&nbsp;</div>
              <div class="col-md-2">Category Image</div>
              <div class="col-md-3">
               <input type="file" name="cat_image" id="cat_image" placeholder="Category Image" class="form-control" onchange="readURL(this)" />
             </div>
             <div class="col-md-1">&nbsp;</div>

           </div>


           <div class="clearfix">&nbsp;</div>
           <div class="row" >
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-2">Item Description</div>
            <div class="col-md-8">
              <textarea id="cat_des" name="cat_des" class="form-control">&nbsp;</textarea>

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
                    <button type="submit" class="btn btn-info">Add Category</button>
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
<script>
  function GEEKFORGEEKS()                                   
  {
    var cat_name = document.forms["RegForm"]["cat_name"]; 
    var cat_image = document.forms["RegForm"]["cat_image"];              
    
    var cat_des = document.forms["RegForm"]["cat_des"]; 
    

    if (cat_name.value == "")                              
    {
      window.alert("Please Enter a Category");
      cat_name.focus();
      return false;
    }
    
    if (cat_image.value == "")                                 
    {
      window.alert("Please Select An Image");
      cat_image.focus();
      return false;
    }
    

    
    if (cat_des.value == "")                                  
    {
      window.alert("Please Enter a description");
      cat_des.focus();
      return false;
    }
    
    
    
    
    return true;
  }

</script>
</body>

</html>
