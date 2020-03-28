      <?php
      
      include '../common/sessionhandling.php';
      $role_id=$userinfo['role_id'];
      include '../common/dbconnection.php';
      include '../model/usermodel.php';
      include '../common/functions.php';
      include '../model/categorymodel.php';
      include '../model/rolemodel.php';
      include '../model/itemmodel.php';

      
      $obcat=new category();
      $resultcat=$obcat->displayAllCategory();
      $obitem=new item();

      $resulti=$obitem->viewAllItems();

      function fill_unit_select_box()
      { 
       $output = '';
       $obitem=new item();

       $resulti=$obitem->viewAllItems();
       $result = $resulti->fetchAll();
       foreach($result as $row)
       {
        $output .= '<option value="'.$row["item_id"].'">'.$row["item_name"]." / ".$row["suitable_for"]."people".'</option>';
      }
      return $output;

      print_r($output);
    }
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

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

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

      <h3 class="text-primary">ADD PACKAGE</h3> </div>
      <div class="col-md-7 align-self-center">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="../view/package_management.php">Package Management</a></li>
          <li class="breadcrumb-item active">Add Package</li>
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
               Use the form below to add new package. You can add package title, description, upload images, and price based on meal size.
             </div>
             <h4 class="card-title" align="center">Add a Package</h4>

             <div class="card-body m-t-15">
              <form method="post" action="../controller/packagecontroller.php?action=add" enctype="multipart/form-data" name="RegForm" onsubmit="return GEEKFORGEEKS()">

                <div class="clearfix">&nbsp;</div>

                


                

                


                <div class="col-md-1">&nbsp;</div>
                <div class="clearfix">&nbsp;</div>
                <div class="row" >
                  <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2">Select Items</div>
                  <div class="col-md-8">
                   <div class="table-repsonsive">
                    <span id="error"></span>
                    <table class="table table-bordered" id="item_table">
                      <tr>
                        <th>Select Unit</th>
                        <th>Enter Quantity</th>
                        
                        
                        
                        <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                      </tr>
                    </table>
                    
                  </div>

                </div>

                <div class="col-md-1">&nbsp;</div>

              </div>
            </div>

            <div class="row" >
              <div class="col-md-1">&nbsp;</div>
              <div class="col-md-2">Package Title</div>
              <div class="col-md-3">
                <input type="text" id="package_name" name="package_name" class="form-control">
              </div>

              <div class="col-md-1">&nbsp;</div>

            </div>

            <div class="clearfix">&nbsp;</div>
            <div class="row" >
              <div class="col-md-1">&nbsp;</div>
              <div class="col-md-2">Package Price</div>
              <div class="col-md-2">
               <div class="input-group">
                 <span class="input-group-addon">$</span>


                 <input type="text" class="form-control" id="package_price" name="package_price">
                 
               </div>

             </div>

             <div>Suitable For</div>
             <div class="col-md-2">
              <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>


               <input type="text" class="form-control" id="suitable_for" name="suitable_for">
               
             </div>
           </div>

           <div class="col-md-1">Image</div>
           <div class="col-md-3">
            <input type="file" id="package_image" name="package_image" class="form-control form-control-lg">
          </div>
          <div class="col-md-1">&nbsp;</div>

        </div>


        <div class="clearfix">&nbsp;</div>
        <div class="row" >
          <div class="col-md-1">&nbsp;</div>
          <div class="col-md-2">Package Description</div>
          <div class="col-md-8">
            <textarea id="package_des" name="package_des" class="form-control" required>&nbsp;</textarea>

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
                  <button type="submit" class="btn btn-info">Add Package</button>
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
  $(document).ready(function(){
    
    $(document).on('click', '.add', function(){
      var html = '';
      html += '<tr>';
      html += '<td><select name="item_unit[]" class="form-control form-control-lg" required ><option value="" required>Select Unit</option><?php echo fill_unit_select_box(); ?></select></td>';
      html += '<td><input type="text" name="item_quantity[]" class="form-control number_only item_quantity" required /></td>';

      

      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-trash"></span></button></td></tr>';
      $('#item_table').append(html);
    });
    
    $(document).on('click', '.remove', function(){
      $(this).closest('tr').remove();
    });
    
  });
</script>
<script>
  $(document).ready(function(){
    $(document).on('keypress', '.number_only', function(e){
      return isNumbers(e, this);      
    });
    function isNumbers(evt, element) 
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      if (
(charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
(charCode < 48 || charCode > 57))
        return false;
      return true;
    }
  });
</script>


<script>
  function GEEKFORGEEKS()                                   
  {
    var package_name = document.forms["RegForm"]["package_name"]; 
    var package_price = document.forms["RegForm"]["package_price"];              
    
    var suitable_for = document.forms["RegForm"]["suitable_for"]; 
    var package_image = document.forms["RegForm"]["package_image"]; 
    var package_des = document.forms["RegForm"]["package_des"]; 


    if (package_name.value == "")                              
    {
      window.alert("Please Enter a Package Name");
      package_name.focus();
      return false;
    }
    
    if (package_price.value == "")                                 
    {
      window.alert("Please Enter a Price");
      package_price.focus();
      return false;
    }
    if (suitable_for.value == "")                                 
    {
      window.alert("Please Enter a value");
      suitable_for.focus();
      return false;
    }

    
    if (package_image.value == "")                                  
    {
      window.alert("Please Select an Image");
      package_image.focus();
      return false;
    }
    if (package_des.value == "")                                  
    {
      window.alert("Please Enter a Description");
      package_des.focus();
      return false;
    }
    
    
    
    return true;
  }

</script>
</body>

</html>
