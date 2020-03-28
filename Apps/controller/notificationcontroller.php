<?php
include'../common/sessionhandling.php';
include '../model/notificationmodel.php';
$obj=new notification();

$action=$_REQUEST['action'];

switch ($action) {


	case "add":
	$arr = $_POST;
	$role_id=$_POST['role_id']; //get the role id from the select tag from form

	$rolee_id=$userinfo['role_id']; //get the role id from session

	$result=$obj->addNotification($arr,$rolee_id); //add the notification to db

	$no_id=$con->lastinsertId(); //get the last inserted notification id

	$resultu=$obj->getUsers($role_id); //get the users using role id if the role id is 0 select all users else select a perticular user using role id


	while ($rowu=$resultu->fetch(PDO::FETCH_BOTH)){

		$user_id=$rowu['user_id'];  //get the user IDs 
		$obj->addUserNotification($user_id,$no_id); //add data to user notification table


   if($result){ //if the data has been added


        $msg="Notification has been sent...";
            $id=1;
    }else{
        $msg="Something went wrong";
                $id=0;
    }

      $m=base64_encode($msg);
       header("Location:../view/notification_management.php?msg=$m&id=$id"); //redirection
	}
	break;


	case "addc": //add customer notifications
	$arr = $_POST; //get the form data
	$cus_id=$_POST['cus_id']; //get the customer id
	$rolee_id=$userinfo['role_id']; //get the role id of the one who sends the notification

	$result=$obj->addNotification($arr,$rolee_id); //add notification to notification table

	$no_id=$con->lastinsertId(); //get the last inserted notification id

	$resultu=$obj->getCustomers($cus_id); //get the customer details if the cus_id is 0 select all customers else select a perticular cusomer using cus id


	while ($rowu=$resultu->fetch(PDO::FETCH_BOTH)){
		$cus_id=$rowu['cus_id'];
		$obj->addCusNotification($cus_id,$no_id);


   if($result){ //if the data is added

        $msg="Notification has been sent...";
            $id=1;
    }else{
        $msg="Something went wrong";
                $id=0;
    }
      $m=base64_encode($msg);
       header("Location:../view/notification_management.php?msg=$m&id=$id"); //redirection
	}
	break;


	case "Delete": //delete a perticular notification from db

	$notification_id=$_REQUEST['notification_id']; //get the notification id from the url
	$r=$obj->deleteANotification($notification_id); //delete a notification using notification id

	if($r){ //if the notifiaction is deleted 

	header("Location:../view/notification_management.php?msg=6&notification_id=$notification_id");//redirection with the deleted notification id through the url

	}else{


	header("Location:../view/notification_management.php?msg=7");//redirection with the deleted notification id through the url

	}


	break;

	case "claim":  //claim an offer

	$notification_id=$_REQUEST['notification_id']; //request the notification id
	$r=$obj->updateoffer($notification_id); //update the notification offer status using notification id

	if($r){//if the result if true


	header("Location:../view/notification_management.php?msg=5"); //redirection
	}else{


		
	header("Location:../view/notification_management.php?msg=5"); //redirection
	}

	
	
	break;
}



?>


