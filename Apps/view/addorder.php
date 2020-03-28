<?php

include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/itemmodel.php';
include '../model/ordermodel.php';
include '../model/customermodel.php';
$obcus= new customer();
$oborder=new order();
$obitem = new item();


$result = $obitem->viewAllItems(); //view all items
$resulttemp = $obitem->viewtempItems(); //get the temp items

$sid=$_SESSION['sid']; //get the session id 


$rorder = $oborder->checkOrder($sid); //check the cus order table for session id
$rowr=$rorder->fetch(PDO::FETCH_BOTH);
$order_id2 = $rowr['order_id']; //get the order id

$resulttemp=$oborder->viewTempOrderItems($order_id2); //view the temp order items

$cus_id = $_REQUEST['cus_id']; //request the cus id from url
$order_id = $_REQUEST['order_id']; //get the order id from url

$resultcus=$obcus->viewACustomer1($cus_id); //get the customer details
$rowcus=$resultcus->fetch(PDO::FETCH_BOTH);


?>
<?php include_once('../common/header.php'); ?><html>
<head>
  <meta charset="utf-8">
  <title>sos</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>Ela - Bootstrap Admin Dashboard Template</title>
  <!-- Bootstrap Core CSS -->
  <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../css/helper.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->

  <script src="https:oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https:oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../sweetalert/sweetalert.min.js" ></script>
<link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
<script src="../js/iziToast.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../css/iziToast.min.css">

<?php 
if(isset($_GET['msg'])){

  $message=$_GET['msg'];

  if($message==8)

    echo "<script type='text/javascript'>iziToast.warning({
      title: 'Removed!',
      message: 'Item Removed From Cart',
    });</script>";
  }


  ?>

  <?php 
  if(isset($_GET['msg'])){

    $message=$_GET['msg'];

    if($message==7)

      echo "<script type='text/javascript'>iziToast.success({
        title: 'Added!',
        message: 'Item Added to cart Successfully',
      });</script>";
    }


    ?>
    <!-- you can add images to div call bgimg to class -->
    <style type="text/css">
    .bgimg {
      background-image: url('../images/wow.jpg'); 
    }
  </style>
  <!-- use smooth scrolling -->
  <script src="../js/smoothscroll.js"></script>

  <?php if(isset($_GET['msg1'])){ 


   echo "<script type='text/javascript'> swal('Success!', 'New Item Added Successfully', 'success');</script>";


 } ?>

 <p align="center">Modules</p>
 <li>
   <?php include_once('../common/modules.php'); ?>

 </li>
</li>
<li class="nav-label"></li> 

</div>
<!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
  <!-- Bread crumb -->

  <!-- End Bread crumb -->
  <!-- Container fluid  -->
  <div class="container-fluid">
    <!-- Start Page Content -->


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">









    <div class="alert alert-info">
      <!-- user table -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <!-- type heere -->

              <div class="form-actions">
                <div class="row">

                  <div class="col-12">
                    <div class="card">
                      <div class="alert alert-success">
                        <div class="card-body">

                          <?php if(isset($_REQUEST['cus_id'])==""){ ?>
                            <button type="button" class="btn btn-info" onclick="addnewcus()" data-toggle="modal" data-target="#addnewcus">
                             <i class="fas fa-utensils"></i>
                             Add New Customer
                           </button>

                           <button type="button" class="btn btn-info" onclick="addexistingcus()" data-toggle="modal" data-target="#addexistingcus">
                             <i class="fas fa-utensils"></i>
                             Add Existing Customer
                           </button>
                         <?php } ?>
                         <?php if(isset($_REQUEST['cus_id'])){ ?>
                          <div class=" row col-md-12">
                            <div class="col-md-6"><h4>Customer Name :  <?php echo $rowcus['cus_fname']." ".$rowcus['cus_lname']; ?></h4>
                              <h4>Customer Address : <?php if ($rowcus['cus_add']==""){ 

                                echo "Pickup from store";

                              } else{

                                echo $rowcus['cus_add'];
                              }
                              ?>
                            </h4>

                          </div>.
                          <div class="col-md-4"><h4>Order Id : <?php echo $_REQUEST['order_id']; ?></h4>


                          </div>.  
                        </div>


                      <?php } ?>

<?php

$destination=$row['cus_city'];
$origin="Nawagamuwa";

$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyDQ_pJ2rpqt4NVTqk1dZlyIqqYqvi8kNUQ");
$data = json_decode($api);




$distance=((int)$data->rows[0]->elements[0]->distance->value / 1000); 

function getdeliveryfee($distance){



  if($distance<=6){

    return 0;
  }elseif ($distance<=11) {
    return 75;
  }elseif ($distance<=15) {
    return 150;
  }
}


?>

                    </div>
                  </div>
                </div>


                <?php 

                if($cus_id!=""){
                 ?> 
                 <div class="card">

                  <div class="card-body">
                    <div>
                      <a href="../view/additem.php" >
                        <button type="button" class="btn btn-info">
                         <i class="fas fa-utensils"></i>
                         Add Item
                       </button>
                     </a>
                   </div>
                 </div>
                 <div class="table-responsive m-t-40">
                  <table id="example23" class="table table-hover" cellspacing="0" width="100%"">
                    <thead class="table-secondary">
                      <tr>
                        <th style="height:40px">Item Image &nbsp;</th>
                        <th style="height:40px">Item Name</th>
                        <th style="height:40px">Category</th>
                        <th style="height:40px">Item Price</th>
                        <th style="height:40px">Status</th>
                        <th style="height:40px">Action</th>

                      </tr>
                    </thead>
                    <tfoot class="table-active">
                     <th style="height:40px">Item Image &nbsp;</th>
                     <th style="height:40px">Item Name</th>
                     <th style="height:40px">Category</th>
                     <th style="height:40px">Item Price</th>
                     <th style="height:40px">Status</th>
                     <th style="height:40px">Action</th>

                   </tfoot>

                   <tbody>
                     <?php
                     while ($row = $result->fetch(PDO::FETCH_BOTH)) {


                      $arr=array("feedback");
                      $item_id=$row['item_id'];
                      $count=0;
                      foreach ($arr as $v) {
                       $count+=checkDelete($v,"item_id",$item_id);

                     }




                     if($row['item_image']==""){
                      $cimage="../images/category.png";
                    }else{
                      $cimage="../images/item_images/".$row['item_image'];
                    }


                    ?>

                    <tr>
                     <td style="height:45px"><img src="<?php echo $cimage;?>" height="60px" width="80px"/></td>
                     <td style="height:45px"><?php echo $row['item_name']; ?></td>
                     <td style="height:45px"><?php echo $row['cat_name']; ?></td>
                     <td style="height:45px"><?php echo $row['item_price']; ?></td>
                     <td style="height:45px"><?php echo $row['item_status']; ?></td>
                     <td style="height:45px">

                      <button type="button" class="btn btn-light" onclick="addorderitem('<?php echo $row ['item_id']; ?>','<?php echo $order_id ?>','<?php echo $cus_id ?>')" data-toggle="modal" data-target="#additem">Order</button>

                    </td>

                  </tr>
                <?php } ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>

    <?php }?>


    <?php 

    if($cus_id!=""){
     ?>
     <!-- temp table -->
     <div class="card">

      <div class="card-body">
        <div class="table-responsive m-t-40">
          <table id="example23" class="table table-hover" cellspacing="0" width="100%"">

            <thead class="table-secondary">
              <tr>

                <th style="height:40px">Order ID</th>
                <th style="height:40px">Item ID</th>
                <th style="height:40px">Item Quantity</th>
                <th style="height:40px">Item Price</th>
                <th>action</th>                
              </tr>
            </thead>


            <tbody>
             <?php
             while ($rowtemp1 = $resulttemp->fetch(PDO::FETCH_BOTH)) {

              $bo=$rowtemp1['item_id'];
              ?>

              <tr>
               <td style="width:1005px" ><?php echo $rowtemp1['order_id']; ?></td>
               <td style="width:1005px"><?php echo $rowtemp1['item_id']; ?></td>
               <td style="width:1005px"><?php echo $rowtemp1['quantity']; ?></td>
               <td style="width:1005px"><?php echo $rowtemp1['order_price']; ?></td>


               <td>

                <a href="../controller/ordercontroller.php?action=remove&order_id=<?php echo $order_id ?>&item_id=<?php echo $rowtemp1['item_id']; ?>&cus_id=<?php echo $cus_id ?>">
                  <button type="button" class="btn btn-danger btn-rounded"><i class="fa fa-remove"></i></button> 

                </a>
              </td>

            </tr>
          <?php } ?>
          

        </tbody>
      </table>

      <?php if($bo!=0){ ?>
        <button type="button" class="btn btn-info btn-lg btn-block" onclick="confirmorder('<?php echo $order_id ?>','<?php echo $cus_id ?>')" data-toggle="modal" data-target="#confirmorder">Confirm Order</button>

      <?php }?>
    </form>
  </div>
</div>
</div>


<?php }?>

</div>


<!-- add item modal -->
<div class="modal" id="additem">
  <div class="modal-dialog modal-body">

    <div class="modal-content container-fluid">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add A Item</h4>

      </div>

      <!-- Modal body -->
      <div id="viewitem"> 

      </div>
    </div>
  </div>
</div>
<div class="modal" id="confirmorder">
  <div class="modal-dialog modal-body">

    <div class="modal-content container-fluid">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order Confirmation</h4>

      </div>

      <!-- Modal body -->
      <div id="confirmorder"> 

      </div>
    </div>
  </div>
</div>
<div class="modal" id="addnewcus">
  <div class="modal-dialog modal-body">

    <div class="modal-content container-fluid">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add A New Customer</h4>

      </div>

      <!-- Modal body -->
      <div id="addcusform"> 

      </div>
    </div>
  </div>
</div>



<div class="modal" id="addexistingcus">
  <div class="modal-content modal-body">

    <div class="modal-content container-fluid">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add An Existing Customer</h4>

      </div>

      <!-- Modal body -->
      <div id="addexistcusform"> 
        <?php



        $result = $obcus->viewAllCustomer();


        $resultc = $obcus->selectContactDetails();


        include '../model/districtmodel.php';
        $dis_id=$rowcus['dis_id'];
        $obdis = new district();
        $resultdis = $obdis->displayDistrict($dis_id);
        $rowdis = $resultdis->fetch(PDO::FETCH_BOTH);

        ?>

        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>


        </div>
        <div class="col-md-12">
         <table id="example231" class="table table-hover" cellspacing="0" width="100%">

          <thead class="table-secondary">
            <tr>
              <th style="height:40px">Customer Image &nbsp;</th>
              <th style="height:40px">Customer Name</th>
              <th style="height:40px">Gender</th>
              <th style="height:40px">Telephone</th>
              <th style="height:40px">Status</th>
              <th style="height:40px">Action</th>
            </tr>
          </thead>
          <tfoot class="table-active">
            <tr>
              <th style="height:40px">Customer Image &nbsp;</th>
              <th style="height:40px">Customer Name</th>
              <th style="height:40px">Gender</th>
              <th style="height:40px">Telephone</th>
              <th style="height:40px">Status</th>
              <th style="height:40px">Action</th>

            </tr>
          </tfoot>
          <tbody>
            <?php while($row=$result->fetch(PDO::FETCH_BOTH)) { 
              $arr=array("feedback");
              $cus_id=$row['cus_id'];
              $count=0;
              foreach ($arr as $v) {
               $count+=checkCusDelete($v,"cus_id",$cus_id);

             }


             if($row['cus_image']==""){
              $cimage="../images/category.png";
            }else{
              $cimage="../../website/img/cus_images/".$row['cus_image'];
            }
            if($row['cus_status']== "Active"){
              $status=1;
              $sname="Deactivate";
              $style="danger";
            }  else {
              $status=0;
              $sname="Activate";
              $style="success";
            }

            ?>

            <tr>
             <td style="height:45px"><img src="<?php echo $cimage; ?>" class="style1" width="50px" height="50px" /></td>


             <td style="height:45px"><?php echo $row['cus_fname']." ".$row['cus_lname']; ?></td>
             <td style="height:45px"><?php echo $row['cus_gender']; ?></td>
             <td style="height:45px"><?php echo $row['cus_tel']; ?></td>
             <td style="height:45px"><?php echo $row['cus_add']." ".$rowdis['name_en']; ?></td>
             <td style="height:45px">
               <a href="../controller/ordercontroller.php?action=add&cus_id=<?php echo $row ['cus_id']; ?>">
                <button type="button" class="btn btn-info">Add</button>
              </a>

            </td>

          </tr>
        <?php } ?>


      </tbody>
    </table>
    <div class="modal-footer">					
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    </div>

  </div>

</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</form>

</div>
<!-- tab 3 -->
<!-- add if u like -->
</div>

</div>

</div>
</div>
</div>

<!-- End PAge Content -->


<!-- view item script -->
<script>
  function addorderitem(item_id, order_id, cus_id){
                                    //alert ("sss");
                                //document.getElementById('ItemId').innerHTML = id;
                                $.ajax({//using ajax send request to following url
                                  url: "../view/additemqua.php",
                                  method: "POST",
                                  data: {item_id:item_id , order_id : order_id, cus_id : cus_id},
                                  success: function (data) {
                                    $('#viewitem').empty();
                                                                        $('#viewitem').html(data); //refresh discatogory div with result
                                                                      }
                                                                    });
                              }
                            </script>

                            <!-- end of view item script -->

                            <script>
                              function confirmorder(order_id,cus_id){
                                    //alert ("sss");
                                //document.getElementById('ItemId').innerHTML = id;
                                $.ajax({//using ajax send request to following url
                                  url: "../view/confirmorder.php",
                                  method: "POST",
                                  data: {order_id : order_id, cus_id : cus_id},
                                  success: function (data) {
                                    $('#confirmorder').empty();
                                                                        $('#confirmorder').html(data); //refresh discatogory div with result
                                                                      }
                                                                    });
                              }
                            </script>

                            <!-- add new customer modal -->
                            <script>
                              function addnewcus(){
                                //document.getElementById('ItemId').innerHTML = id;
                                $.ajax({//using ajax send request to following url
                                  url: "../view/addnewcus.php",
                                  method: "POST",
                                  data: {},
                                  success: function (data) {
                                    $('#addcusform').empty();
                                                                        $('#addcusform').html(data); //refresh discatogory div with result
                                                                      }
                                                                    });
                              }


                            </script>



                            <!-- add existing customer  modal -->
                            <script>
                              function addexistingcus(){
                                    //alert ("sss");
                                //document.getElementById('ItemId').innerHTML = id;
                                $.ajax({//using ajax send request to following url
                                  url: "../view/addexisitingcus.php",
                                  method: "POST",
                                  data: {},
                                  success: function (data) {
                                    $('#addexistcusform').empty();
                                                                        $('#addexistcusform').html(data); //refresh discatogory div with result
                                                                      }
                                                                    });
                              }
                            </script>









                          </div>
                          <!-- footer -->
                        </div>

                        <?php include_once('../common/footer.php'); ?>



                        <script src="../js/lib/jquery/jquery.min.js"></script>
                        <!-- Bootstrap tether Core JavaScript -->
                        <script src="../js/lib/bootstrap/js/popper.min.js"></script>


                        <!--Custom JavaScript -->
                        <script src="../js/scripts.js"></script>


                        <script src="../js/lib/datatables/datatables.min.js"></script>
                        <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
                        <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
                        <script src="../js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
                        <script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
                        <script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
                        <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
                        <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
                        <script src="../js/lib/datatables/datatables-init.js"></script>
                        <script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
                        <!-- Bootstrap tether Core JavaScript -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


                        <!--Custom JavaScript -->
                        <script src="../js/scripts.js"></script>

                        <script type="text/javascript">

                          function confirmation (str) {

                            var r=confirm("Do you want to" +str+ "Item ?");

                            if(!r){

                              return false;
                            }
                          }

                        </script> 
                        <script type="text/javascript" src="../../website/js/validationcustomer.js"></script>

                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

                        <script>
                          $(document).ready(function() {
                            function disableBack() { window.history.forward() }

                            window.onload = disableBack();
                            window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
                          });
                        </script>