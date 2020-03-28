<?php 
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/customermodel.php';
include '../../Apps/model/loginmodel.php';

$obc=new customer();
$action=$_REQUEST['action'];

switch ($action){
 case "add" :
 $arr=$_POST;

 print_r($arr);
 $cus_id=$obc->addCustomer($arr);
 $msg='not';

 $obcuslogin=new login();
         if($cus_id){//If user has been added then
          $cus_pwd=sha1('123');
          $obcuslogin->addcuslogin($_POST['cus_email'], $cus_pwd, $cus_id);
            if($_FILES['cus_image']['name']!=""){//if image is not empty
                $cus_image=$_FILES['cus_image']['name'];//name off the image
                $cus_tmp=$_FILES['cus_image']['tmp_name'];//temp location
                $cus_image_new=time()."_".$cus_id."_".$cus_image;
                $r=$obc->updateCusImage($cus_id, $cus_image_new, $cus_tmp);
               // print_r($r);

              }


              header("Location:../view/index.php?msg4");
            }else{

              header("Location:../view/index.php?msg5");
            }
            break;
            case "add1" :
            $arr=$_POST;

            print_r($arr);
            $cus_id=$obc->addCustomer($arr);
            $msg='not';

            $obcuslogin=new login();
         if($cus_id){//If user has been added then
          $cus_pwd=sha1('123');
          $obcuslogin->addcuslogin($_POST['cus_email'], $cus_pwd, $cus_id);
            if($_FILES['cus_image']['name']!=""){//if image is not empty
                $cus_image=$_FILES['cus_image']['name'];//name off the image
                $cus_tmp=$_FILES['cus_image']['tmp_name'];//temp location
                $cus_image_new=time()."_".$cus_id."_".$cus_image;
                $r=$obc->updateCusImage($cus_id, $cus_image_new, $cus_tmp);
               // print_r($r);

              }


              header("Location:../../Apps/view/addorder.php?msg4");
            }else{

              header("Location:../../Apps/view/addorder.php?msg5");
            }
            break;

            
            case "add2" :
            $arr=$_POST;

            print_r($arr);
            $cus_id=$obc->addCustomer($arr);
            $msg='not';

            $obcuslogin=new login();
         if($cus_id){//If user has been added then
          $cus_pwd=sha1('123');
          $obcuslogin->addcuslogin($_POST['cus_email'], $cus_pwd, $cus_id);
            if($_FILES['cus_image']['name']!=""){//if image is not empty
                $cus_image=$_FILES['cus_image']['name'];//name off the image
                $cus_tmp=$_FILES['cus_image']['tmp_name'];//temp location
                $cus_image_new=time()."_".$cus_id."_".$cus_image;
                $r=$obc->updateCusImage($cus_id, $cus_image_new, $cus_tmp);
               // print_r($r);

              }


              header("Location:../../Apps/view/addpackageorder.php?msg4");
            }else{

              header("Location:../../Apps/view/addpackageorder.php?msg5");
            }
            break;
            case "updateloggedcustomer":

            include '../common/sessionhandling.php';
            $arr=$_POST;
            $cus_id=$cusinfo['cus_id'];


            $result=$obc->updateLoggedCustomer($arr,$cus_id);
            if($result){
              $msg="A record has been updated";
              $status="success";
              
               if($_FILES['cus_image']['name']!=""){//if image is not empty

                   //to remove previous image
                $resultcus=$obc->viewACustomer($cus_id);
                $rowcus=$resultcus->fetch(PDO::FETCH_BOTH);
                $cus_pimage=$rowcus['cus_image'];
                $oldpath="../img/cus_images/".$cus_pimage;
                unlink($oldpath);

                $cus_image=$_FILES['cus_image']['name'];//name off the image
                $cus_tmp=$_FILES['cus_image']['tmp_name'];//temp location
                $cus_image_new=time()."_".$cus_id."_".$cus_image;
                $r=$obc->updateCusImage($cus_id, $cus_image_new, $cus_tmp);

                


              }
              header("Location:../view/profilemain.php?msg=4");

              

            }  else {
              header("Location:../view/profilemain.php?msg=5");
            }


            break;

            case "updateloggedcustomerAddress":
            $arr=$_POST;
            $cus_id=$cusinfo['cus_id'];


            $result=$obc->updateloggedcustomerAddress($arr,$cus_id);
            if($result){
              echo 'hi';
            }

            else {
              echo 'bye';
            }


            break;


            case "Delete":

            $cus_id=$_REQUEST['cus_id'];
            $r=$obc->deleteACustomer($cus_id);

            if($r){


              $msg = base64_encode("A record has $msg  been added");
              header("$item_id record has been deleted");
            }else{


              $msg = base64_encode("A record has $msg  been added");
              header("$item_id record has  not been deleted");
            }

            $msg= base64_encode($msg);
            header("Location:../view/item_management.php?msg=$msg");
            break;
            case "Delete1":

            $cus_id=$_REQUEST['cus_id'];
            $r=$obc->deleteACustomer($cus_id);

            if($r){
            header("Location:../../Apps/view/customer_management.php?msg=5");
            }else{
 header("Location:../../Apps/view/customer_management.php?msg=6");
            }
        
           
            break;

            case "addother" :
            $arr=$_POST;


            $r=$obc->addCustomerOther($arr);


            if($r){
              header("Location:../view/contact.php?msg=5");

            } else{

              header("Location:../view/contact.php?msg=6");
            }
            break;

 case "ACDAC":                  // new case for active deactive 

      $cus_id=$_REQUEST['cus_id']; //get the user id from the url
      $status=$_REQUEST['status'];   //get the status from the url

      if($status){

        $cus_status="Deactive";

      }else{

        $cus_status="Active";

      }
      $r=$obc->updateCustomerStatus($cus_id,$cus_status);

if($r){

header("Location:../../Apps/view/customer_management.php?msg=4&cus_id=$cus_id");

}


break;
          } 

          ?>