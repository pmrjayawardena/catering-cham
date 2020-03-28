<?php


$order_id = $_REQUEST['order_id'];

$cus_id=$_REQUEST['cus_id'];


?>
<!-- <form method="post" action="../controller/ordercontroller.php?action=confirmorder&order_id=<?php //echo $order_id ?>&cus_id=<?php //echo $cus_id ?>" enctype="multipart/form-data"> -->
  <div class="form-group">

  </div>
</div>

<form method="post" action="../controller/ordercontroller.php?action=select&order_id=<?php echo $order_id ?>&cus_id=<?php echo $cus_id ?>" enctype="multipart/form-data">
  <div class="row modal-body">

    <div class="col-lg-4 col-md-offset-3">
      <div class="card">
        <div class="card-body">

         <div class="col-md-6">
          &nbsp;


        </div>
        <div class="clearfix">&nbsp;</div>

        <div class="row">
          <div class="col-md-6" align="center">Select Delivery Method</div>
          

          <select name="select" class="form-control-lg" >
            <option value="Shop" id="Shop">Shop</option>
            <option value="Home" id="Home">Home</option>

          </select>
        </div>

        <div class="col-md-4" align="right"> 
          <div class="col-md-4">
            <input type="submit"  class="btn btn-info" value="Add" />
            
            
          </div>           
        </div> 

      </div>
    </div>

  </div>
</div>


</form>