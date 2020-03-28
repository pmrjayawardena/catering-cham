<?php 
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/customermodel.php';
include '../../Apps/model/checkoutmodel.php';
include '../common/sessionhandling.php';
$obc=new checkout();
$action=$_REQUEST['action'];

switch ($action){
   case "checkout" :

   $cus_id=$cusinfo['cus_id'];
   $arr=$_POST;

   
   $id=$obc->addCusAdd($arr,$cus_id);


      header("Location:../view/viewdeliverydetails.php?id=$id");


       break;
       

       case "checkoutfinal" :
       
   echo '<script type="text/javascript">
   alert("click ok to transferring to you in paypal");

   setTimeout(function(){
       window.location="../view/paypal.php";
       },2000);

       </script>' ;
       break;
   } 

   ?>