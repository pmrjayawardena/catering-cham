<?php
include '../common/dbconnection.php';
include '../model/ordermodel.php';
if ($_POST['rowid']) {
    $order_id = $_POST['rowid']; //escape string
    $ob = new order();
    $result = $ob->displayAllOrder($order_id);
    $roworder = $result->fetch(PDO::FETCH_BOTH);
    // Run the Query
    // Fetch Records
    // Echo the data you want to show in modal
    // 
   
   $resultitemorders=$ob->viewOrderItems($order_id);

   $roworderitems=$resultitemorders->fetch(PDO::FETCH_BOTH);
}
?>







<div class="modal-header">
	<a class="close" data-dismiss="modal">×</a>
	<h5> Order ID &nbsp;<?php echo $roworder['order_id']; ?></h5>
	
</div>
<form id="contactForm" name="contact" role="form">
	<div class="modal-body">				
		<div class="form-group">
			<label for="name">Order ID:</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $roworder['order_id']; ?></div>
		</div>
		<div class="form-group">
			<label for="email">Date & Time</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $roworder['order_date']; ?></div>
		</div>
		<div class="form-group">
			<label for="email">Customer Name</label>
			<div class="form-control" readonly></b>&nbsp;&nbsp;<?php echo $roworder['cus_fname']; ?>&nbsp;<?php echo $roworder['cus_lname']; ?></div>
		</div>
		<div class="form-group">
			<label for="email">Customer Telephone</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $roworder['cus_tel']; ?></div>
		</div>
					
	</div>
	<div class="modal-footer">					
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
	</div>
</form>
