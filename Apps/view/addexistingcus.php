<?php


include '../common/dbconnection.php';
include '../common/functions.php';
include '../common/sessionhandling.php';
include '../model/customermodel.php';
$obcus= new customer();

$result = $obcus->viewAllCustomer(); //get all customer details
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
              $arr=array("rating","stock","cart","feedback");
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
               <a href="../view/viewcustomer.php?cus_id=<?php echo $row ['cus_id']; ?>">
                <button type="button" class="btn btn-info">View</button>
              </a>
            <?php if($count==0){ ?>
               <a href="../../website/controller/customercontroller.php?cus_id=<?php echo $row ['cus_id'];?>&action=Delete1">
                  <button type="button" class="btn btn-danger"  onclick="return confirmation('Delete','A Item')">
                    Delete
                  </button>
                </a>
<?php } ?>
            </td>

          </tr>
        <?php } ?>


      </tbody>
    </table>
	<div class="modal-footer">					
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
	</div>

</div>
