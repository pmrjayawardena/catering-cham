<?php
session_start(); //Start a session
date_default_timezone_set("Asia/colombo");


include '../../Apps/model/loginmodel.php';
include '../../Apps/model/logmodel.php';
include '../../Apps/common/dbconnection.php';
include '../../Apps/common/functions.php';

$con=$GLOBALS['con'];


//Validate Email and Password in db
$cus_email=$_POST['cus_email'];
$cus_pwd=sha1($_POST['cus_pwd']); //one way encryption

$obcuslogin=new login(); //to create an object
$r=$obcuslogin->cuslogin($cus_email, $cus_pwd);  //asign the values taken from userLogin() to variable $r
$nor=$r->rowCount();  //get the rowCount

if($nor){
    $row=$r->fetch(PDO::FETCH_BOTH);
    
    $log_status="login";
    $log_ip=  get_ip_address();
    $cus_id=$row['cus_id'];
    $time_id=  time();//Time Stamp
    $session_id=$time_id."_".$cus_id;
    $obcuslog=new log();
    $obcuslog->addcuslog($log_status, $log_ip, $cus_id,$session_id); //Insert date into log table
    array_push($row, $session_id);
   
    $_SESSION['cusinfo']=$row;            //asign session values to variable $row

  //Redirection 

    $url=$_SESSION['url'];

    header("Location:$url");   
}else{
    
    $msg=base64_encode("Invalid Email or Password");
    header("Location:../view/login.php?msg=$msg");//Redirection    
}


?>


