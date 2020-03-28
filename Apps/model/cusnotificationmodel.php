<?php
class notification{

public function  deleteANotification($notification_id){
        global $con;
        $r=$con->prepare("DELETE FROM notification WHERE notification_id=?");
        $r->execute(array($notification_id));


        return $r;
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }

        public function  addCusNotification($cus_id,$no_id){
        global $con;
        $r=$con->prepare("INSERT INTO cus_notifications(cus_id,notification_id)VALUES(?,?)");
        $r->execute(array($cus_id,$no_id));

        return $r;
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }
        public function  viewCusNotificationunseen($cus_id){
        global $con;
        $r=$con->prepare("SELECT * FROM notification WHERE notification_id IN(SELECT notification_id FROM cus_notifications WHERE cus_id=$cus_id
) AND notification_status='Unseen'");
        $r->execute(array($cus_id));

        return $r;
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }

    public function  getCustomers($cus_id){
        global $con;
        if($cus_id==0){
          $r=$con->prepare("SELECT * FROM customer");

      }else{

       $r=$con->prepare("SELECT * FROM customer WHERE cus_id='$cus_id'");   
   }
   
   $r->execute();
   return $r;

}



function viewallCusNotification(){
    global $con;
    $r=$con->prepare("SELECT * FROM notification WHERE notification_status='Unseen' ORDER BY notification_id DESC");
    $r->execute();



    if($r->errorCode()!=0){
        $errors=$r->errorInfo();
        echo $errors[2];

    }

    return  $r;

}


function viewallNotificationbyCustomer($cus_id){
    global $con;
$r=$con->prepare(" SELECT * FROM notification,role  WHERE notification_id IN(SELECT notification_id FROM cus_notifications WHERE cus_id=$cus_id  AND role.role_id=notification.role_id
)");
    $r->execute();



    if($r->errorCode()!=0){
        $errors=$r->errorInfo();
        echo $errors[2];

    }

    return  $r;

}

function viewallNotificationbyCustomer1($cus_id,$notification_id){
    global $con;
    $r=$con->prepare(" SELECT * FROM notification,role  WHERE notification_id IN(SELECT notification_id FROM cus_notifications WHERE cus_id=$cus_id AND notification_id=$notification_id AND role.role_id=notification.role_id
)");
    $r->execute();



    if($r->errorCode()!=0){
        $errors=$r->errorInfo();
        echo $errors[2];

    }

    return  $r;

}

function displayNotifications($no_id){
    $con=$GLOBALS['con'];
    $sql="SELECT * FROM notification n, user_notification un WHERE n.notification_id=un.notification_id AND n.notification_id='$no_id'";
    $result=$con->query($sql);
    return $result;
}

    public function getUserNoti($user_id){ //view users by their status
        global $con;
        $r=$con->prepare("SELECT * FROM user_notification  WHERE user_id=?");
        $r->execute(array($user_id));
        return $r;
    }

    public function   updateResNot($notification_id){
        global $con;
        $r=$con->prepare("UPDATE notification SET  notification_status='Seen' WHERE notification_id='$notification_id'");
        $r->execute(array($notification_id));



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
        return $r;

    }
}
?>