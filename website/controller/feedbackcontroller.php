<?php

include '../../Apps/common/dbconnection.php';
include '../common/sessionhandling.php';
include '../../Apps/model/itemmodel.php';
include '../../Apps/model/feedbackmodel.php';
$obitem= new item();
$obfeedback= new feedback();


$action = $_REQUEST['action'];
$item_id=$_REQUEST['item_id'];
$cus_id=$cusinfo['cus_id'];

switch ($action) {


    case "add":
    $arr = $_POST;

$r=$obfeedback->addFeedback($arr,$item_id,$cus_id);

  if($r){
        $msg="Feedback Added";
            $id=1;
    }else{
        $msg="Something went wrong";
                $id=0;
              
    }
      $m=base64_encode($msg);
       header("Location:../view/addafeedback.php?msg=$m&id=$id&item_id=$item_id");
break;
case "Delete":

$feedback_id=$_REQUEST['feedback_id'];
$r=$obfeedback->deleteAFeedback($feedback_id);

if($r){

        header("Location:../../Apps/view/feedback_management.php?msg=9&feedback_id=$feedback_id");
}else{


        header("Location:../../Apps/view/feedback_management.php?msg=9&feedback_id=$feedback_id");
}


break;

case "Delete1":

$feedback_id=$_REQUEST['feedback_id'];
$item_id=$_REQUEST['item_id'];
$r=$obfeedback->deleteAFeedback($feedback_id);

if($r){


  $msg = base64_encode("A record has $msg  been added");
        header("$item_id record has been deleted");
}else{


  $msg = base64_encode("A record has $msg  been added");
        header("$item_id record has  not been deleted");
}

$msg= base64_encode($msg);
        header("Location:../view/addafeedback.php?item_id=$item_id");
break;

case "update":
          $arr=$_POST;
          $feedback_id=$_REQUEST['feedback_id'];
          $item_id=$_REQUEST['item_id'];
         $result=$obfeedback->updateFeedback($arr,$feedback_id);
        

  if($result){
        $msg="Feedback Updated";
            $id=1;
    }else{
        $msg="Something went wrong";
                $id=0;
              
    }
      $m=base64_encode($msg);
       header("Location:../view/item_feedback.php?msg=$m&id=$id&item_id=$item_id");
          
          break;
}



?>
