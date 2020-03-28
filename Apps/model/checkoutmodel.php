<?php
class checkout{
    public function viewAllCustomer(){  //view all user data
        global $con;
        $r=$con->prepare("SELECT * FROM customer WHERE cus_id");
        $r->execute();
        return $r;
    }


    public function addCusAdd($arr,$cus_id) {
        global $con;
        
        $r=$con->prepare("INSERT INTO checkout_address(cus_fname,cus_lname,cus_email,cus_add,cus_city,zip_code,cus_tel,cus_id,delivery_date) VALUES (?,?,?,?,?,?,?,?,?)");
        $r->execute(array($arr['cus_fname'],$arr['cus_lname'],$arr['cus_email'],$arr['cus_add'],$arr['cus_city'],$arr['zip_code'],$arr['cus_tel'],$cus_id,$arr['delivery_date']));
        $id=$con->lastinsertId();
        return $id;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }

    public function addCusAddmanual($arr,$cus_id,$order_id2) {
        global $con;
        
        $r=$con->prepare("INSERT INTO checkout_address(cus_fname,cus_lname,cus_email,cus_add,cus_city,zip_code,cus_tel,cus_id,delivery_date,order_id) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $r->execute(array($arr['cus_fname'],$arr['cus_lname'],$arr['cus_email'],$arr['cus_add'],$arr['cus_city'],$arr['zip_code'],$arr['cus_tel'],$cus_id,$arr['delivery_date'],$order_id2));
        $id=$con->lastinsertId();
        return $id;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }
    public function getLastInsertedAddress(){  //view all user data
        global $con;
        $r=$con->prepare("SELECT * FROM checkout_address ca,customer c WHERE ca.cus_id=c.cus_id ORDER BY ca.id DESC LIMIT 1 ");
        $r->execute();
        return $r;
    }

    public function updatecheckoutorder($order_id,$address) {
        global $con;
        
        $r=$con->prepare("UPDATE checkout_address SET order_id=$order_id WHERE id=$address");
        $r->execute(array($order_id,$address));
        
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }

        public function viewAnAddress($order_id){  //view all user data
            global $con;
            $r=$con->prepare("SELECT * FROM checkout_address WHERE order_id=$order_id");
            $r->execute();
            return $r;
        }

    public function viewaddressdetails($id){  //view all user data
        global $con;
        $r=$con->prepare("SELECT * FROM checkout_address WHERE id=$id ");
        $r->execute();
        return $r;
    }


}

?>
