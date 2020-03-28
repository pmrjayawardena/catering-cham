<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/itemmodel.php';

$item_id = $_REQUEST['item_id']; //get the item id from the url
$order_id = $_REQUEST['order_id']; //get the order id from the url
$cus_id=$_REQUEST['cus_id']; //get the customer id from the url 

$obi=new item();
$resultitem = $obi->viewAItem($item_id); //view an item
$rowitem=$resultitem->fetch(PDO::FETCH_BOTH);
//echo $rowitem['item_name'];
?>
<form method="post" action="../controller/ordercontroller.php?action=additem&item_id=<?php echo $rowitem ['item_id'];?>&order_id=<?php echo $order_id ?>&cus_id=<?php echo $cus_id ?>" enctype="multipart/form-data">
  <div class="row modal-body">

   <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
       <div align="center"> <?php 
       if($rowitem['item_image']==""){
                                   $item_image="../images/item.png";//if an image does not exist view a default image 
                                 }else{
                                   $item_image="../images/item_images/".$rowitem['item_image'];//if the image exists view the particular image for the particular row
                                 }
                                 ?>
                                 <img src="<?php echo $item_image; ?>" width="250px" height="250px"/>
                               </div>
                               <div class="col-md-6">
                                &nbsp;

                                
                              </div>
                              <div class="clearfix">&nbsp;</div>
                              
                              <div class="row">
                                <div class="col-md-6" align="center">Item Name</div>
                                <div class="col-md-6">
                                 <?php echo $rowitem['item_name']; ?>
                               </div>
                             </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="row">
                              <div class="col-md-6" align="center">Category Name</div>
                              <div class="col-md-6">
                                <?php echo $rowitem['cat_name']; ?>
                                
                              </div>
                            </div>
                            
                            <div class="clearfix">&nbsp;</div>

                            <div class="row">
                              <div class="col-md-6" align="center">Item Price</div>
                              <div class="col-md-6">
                               <?php echo $rowitem['item_price']; ?>
                               <input type="hidden" id="item_price" name="item_price" value="<?php echo $rowitem['item_price']; ?>" />
                             </div>
                           </div>
                           <div class="clearfix">&nbsp;</div>
                           <div class="row">
                            <div class="col-md-6" align="center">Quantity</div>
                            <div class="col-md-6">
                              <input id="quantity" name="quantity" type="number" />
                            </div>
                          </div>
                          <div class="clearfix">&nbsp;</div>                         

                        </div>
                      </div>

                    </div>
                  </div>
                  <div style="margin-top: -30px; margin-bottom: -20px;" class="modal-footer">
                    <input type="submit"  class="btn btn-info form-control" value="Add" />
                    <input type="reset" class="btn btn-danger form-control" />    
                    <!--<button type="submit" value="submit" class="btn btn-info form-control">Submit</button>-->
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal" class="form-control" >Close</button>
                  </div>
                </form>
                