<?php
//To make sure authentication
session_start();
error_reporting(E_WARNING || E_ALL);
 $cusinfo=$_SESSION['cusinfo'];
 if(count($cusinfo)!=0){ //to check login or not
    if($cusinfo['cus_image']==""){
         $iname="../img/user_icon.png";
    }else{
        $iname="../img/cus_images/".$cusinfo['cus_image'];
    }
 }  else {
     $msg = base64_encode("Please login!!!");
     header("Location:../view/login.php?msg=$msg");
     exit();
     
 }    
 ?>