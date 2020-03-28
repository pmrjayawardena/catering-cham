<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../common/functions.php';
include '../model/packagemodel.php';

$package_id = $_REQUEST['package_id'];
$order_id = $_REQUEST['order_id'];//To take the user id of the particular person
$cus_id=$_REQUEST['cus_id'];
$obp=new package();
$resultpackage = $obp->viewAPackage($package_id);
$rowpackage=$resultpackage->fetch(PDO::FETCH_BOTH);
//echo $rowitem['item_name'];
?>
<form method="post" action="../controller/ordercontroller.php?action=addpackage&package_id=<?php echo $rowpackage['package_id'];?>&order_id=<?php echo $order_id ?>&cus_id=<?php echo $cus_id ?>" enctype="multipart/form-data">
  <div class="row modal-body">

   <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
       <div align="center"> <?php 
       if($rowpackage['package_image']==""){
                                   $package_image="../images/item.png";//if an image does not exist view a default image 
                                 }else{
                                   $package_image="../images/package_images/".$rowpackage['package_image'];//if the image exists view the particular image for the particular row
                                 }
                                 ?>
                                 <img src="<?php echo $package_image; ?>" width="250px" height="250px"/>
                               </div>
                               <div class="col-md-6">
                                &nbsp;


                              </div>
                              <div class="clearfix">&nbsp;</div>

                              <div class="row">
                                <div class="col-md-6" align="center">Package Name</div>
                                <div class="col-md-6">
                                 <?php echo $rowpackage['package_name']; ?>
                               </div>
                             </div>
                             <div class="clearfix">&nbsp;</div>
                             <div class="row">
                              <div class="col-md-6" align="center">Package Price</div>
                              <div class="col-md-6">
                                <?php echo $rowpackage['package_price']; ?>
                                
                              </div>
                            </div>

                            <div class="clearfix">&nbsp;</div>

                            <div class="row">
                              <div class="col-md-6" align="center">Package Des</div>
                              <div class="col-md-6">
                               <?php echo $rowpackage['package_des']; ?>
                               <input type="hidden" id="package_price" name="package_price" value="<?php echo $rowpackage['package_price']; ?>" />
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
