<?php
// To report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//Starting session
if(!isset($_SESSION)){
	session_start();
}

// To avoid loading pages without a user logged in
$no=count($_SESSION['userinfo']);
if($no==0){
	$msg="Please Login";
	header("Location:../user_management/user_login.php?msg=$msg");
	exit();	
}

//Set default time zone
date_default_timezone_set("Asia/Colombo");


//Include database connection


$userinfo=$_SESSION['userinfo'];
$user_id=$userinfo['user_id'];

//Retrieve backup information from backup table


?>


<!DOCTYPE html>
<html>
<head>


</head>

<body onload="msg_display()">
    <div id="content-container" >
 
        
        
        <div id="section_1"  >
            <img src="../../images/notifications_management/box_3.png" id="box_3" />
            <img src="../../images/notifications_management/ribbon_3.png" id="ribbon_3" />
            <div id="current_projects" >BACKUP MANAGEMENT</div>
            
            <div id="backup_button" >
            <a href="backupdb.php">
            <button type="button" class="btn btn-success " ><i class="glyphicon glyphicon-hdd" ></i> Backup Database </button></a>
            </div>
        
       		<div id="data_section_1" class="scroll"> 
                <table id="table_1" border="1" >
                              
                <tr>
                <th style="height:30px;">&nbsp;Backup ID</th>
                <th>&nbsp;Backup By</th>
                <th>&nbsp;Backup Date</th>
                <th>&nbsp;Backup Time</th>
                <th>&nbsp;Backup Reference</th>
                <th></th>
                </tr>
                
				
    
    <!-- retrieve error/success message for user actions and store in input -->
    <input type="hidden" value="<?php echo $_REQUEST['id'] ?>" id="msg" />

</body>
</html>