<?php

include '../model/notificationmodel.php';
if ($_POST['rowid']) {
    $no_id = $_POST['rowid']; //escape string
    $ob = new notification();
    $result = $ob->displayNotifications($no_id);
    $rownotify = $result->fetch(PDO::FETCH_BOTH);
    // Run the Query
    // Fetch Records
    // Echo the data you want to show in modal
}
?>







<div class="modal-header">
	<a class="close" data-dismiss="modal">×</a>
	<h5> Details &nbsp;<?php echo $rownotify['notification_id']; ?><br>User ID &nbsp;<?php echo $rownotify['user_id']; ?></h5>
	
</div>
<form id="contactForm" name="contact" role="form">
	<div class="modal-body">				
		<div class="form-group">
			<label for="name">Notification ID:</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $rownotify['notification_id']; ?></div>
		</div>
		<div class="form-group">
			<label for="email">Date & Time</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $rownotify['notification_date']; ?></div>
		</div>
		<div class="form-group">
			<label for="email">Type</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $rownotify['notification_type']; ?></div>
		</div>
		<div class="form-group">
			<label for="email">Category</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $rownotify['notification_category']; ?></div>
		</div>
		<div class="form-group">
			<label for="email">Status</label>
			<div class="form-control" readonly></b>&nbsp&nbsp;<?php echo $rownotify['notification_status'];?></div>
		</div>

		<div class="form-group">
			<label for="message">Message</label>
			<textarea name="message" class="form-control"><?php echo $rownotify['notification_comment']; ?></textarea>
		</div>					
	</div>
	<div class="modal-footer">					
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		
	</div>
</form>
