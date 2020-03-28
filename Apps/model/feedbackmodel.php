<?php


class feedback{
    public function  viewallFeedback(){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback f,customer c,item i WHERE f.cus_id=c.cus_id AND i.item_id=f.item_id ORDER BY feedback_id DESC");
        $r->execute();
        return $r;

    }

    public function  viewallFeedbackitem($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback f,item i WHERE  i.item_id=f.item_id AND i.item_id=$item_id ORDER BY feedback_id DESC");
        $r->execute();
        return $r;

    }

        public function  viewallFeedbackbycustomer($cus_id,$item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback f,customer c,item i WHERE f.cus_id=c.cus_id AND i.item_id=f.item_id AND c.cus_id=$cus_id AND i.item_id='$item_id' ORDER BY f.feedback_id DESC");
        $r->execute();
        return $r;

    }


            public function  displayFeedback($no_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_id='$no_id'");
        $r->execute($no_id);
        return $r;
       if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
    }

    public function  deleteAFeedback($feedback_id){
        global $con;
        $r=$con->prepare("DELETE FROM feedback WHERE feedback_id=?");
        $r->execute(array($feedback_id));


        return $r;
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }

    public function  viewAFeedback($feedback_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_id=?");
        $r->execute(array($feedback_id));
        return $r;

    }
    public function  addFeedback($arr,$item_id,$cus_id){
        global $con;
        $r=$con->prepare("INSERT INTO feedback(feedback_title,feedback_comment,feedback_date,feedback_rating,item_id,cus_id)VALUES(?,?,now(),?,?,?)");

        print_r($arr);
        $r->execute(array($arr['feedback_title'],$arr['feedback_comment'],$arr['feedback_rating'],$item_id,$cus_id));


        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
        return $r;
    }
        public function updateFeedback($arr,$feedback_id) {
        global $con;
        
        $r=$con->prepare("UPDATE feedback SET feedback_title=?,feedback_comment=?,feedback_rating=? WHERE feedback_id=?");
        $r->execute(array($arr['feedback_title'],$arr['feedback_comment'],$arr['feedback_rating'],$feedback_id));
       
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }


}

?>
