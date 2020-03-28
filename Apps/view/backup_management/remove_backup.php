<?php
//output buffering
ob_start();

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//starting the session
if(!isset($_SESSION)){
	session_start();
}

$userinfo=$_SESSION['userinfo'];

//Include database connection

//01-Create a database connection
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="ocs";

$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(mysqli_connect_errno()){
	die("Database Connection Failed");
}


//Collect backup_reference_no passed to the current script through the URL parameters
$backup_reference_no=$_GET['backup_reference_no'];

//Delete the specific backup from backup table
$query="DELETE FROM backup WHERE backup_reference_no='$backup_reference_no'";
$result=mysqli_query($connection,$query);

$sqlfile="store/".$backup_reference_no.".sql";
$zip="store/".$backup_reference_no.".zip";

//Deleting files from store folder
unlink($sqlfile);
unlink($zip);

if($result){
	
	header("Location:../backup_management.php?msg=5");
}else{
	
	header("Location:../backup_management.php?msg=6");
}

?>
