<?php
class payment{
    function displayAllItemPayment(){
        global $con;
        $r=$con->prepare("SELECT * FROM payment p WHERE p.order_id NOT IN (SELECT op.order_id FROM order_package op WHERE p.order_id=op.order_id  )");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }
    function displayAllPackagePayment(){
        global $con;
        $r=$con->prepare("SELECT * FROM payment p WHERE p.order_id NOT IN (SELECT oi.order_id FROM order_item oi WHERE p.order_id=oi.order_id ORDER BY p.payment_id DESC )");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

    function getTotalTransactions(){
        global $con;
        $r=$con->prepare("SELECT * FROM payment ORDER BY payment_id DESC");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

        public function viewOrderBystatus($status){ //view users by their status
            global $con;
            $r=$con->prepare("SELECT * FROM cus_order  WHERE order_status=?");
            $r->execute(array($status));
            return $r;

        }

        public function getSum(){ 
            global $con;
            $r=$con->prepare("SELECT SUM(total_amount) as tm FROM payment");
            $r->execute();
            return $r;

        }



        public function addPayment1asasasa($cus_id) {
            global $con;
            
            $r=$con->prepare("INSERT INTO cus_order(order_date,cus_id) VALUES (now(),$cus_id)");
            $r->execute(array($cus_id));
            $order_id=$con->lastinsertId();
            return $order_id;
            
        }


        // public function addPayment($pay,$deliverycharge,$order_id,$trasaction_id,$dis,$payment_type) {
        //     global $con;
            
        //     $r=$con->prepare("INSERT INTO payment(payment_date,total_amount,delivery_charges,order_id,payment_status,trasaction_id,discount,payment_type) VALUES (now(),?,?,?,?,?,?,?)");
        //     $r->execute(array($pay,$deliverycharge,$order_id,"Paid",$trasaction_id,$dis,$payment_type));
        //     $payment_id=$con->lastinsertId();
        //     return $payment_id;

        // }


        public function addPaymentmanual($order_id,$total) {
            global $con;
            $r=$con->prepare("INSERT INTO payment(order_id,total_amount,payment_status) VALUES ($order_id,?,?)");
            $r->execute(array($total,"Pending"));
            $payment_id=$con->lastinsertId();
            return $payment_id;

        }
        public function selectpayment($order_id) {
            global $con;
            
            $r=$con->prepare("SELECT * FROM payment WHERE order_id='$order_id'");
            $r->execute(array($order_id));
            
            return $r;
            

        }

                public function getpaymentdetailsforcashondeliverydriver($order_id) {
            global $con;
            
            $r=$con->prepare("SELECT * FROM payment p,cus_order co WHERE p.order_id=co.order_id AND co.order_id='$order_id'");
            $r->execute(array($order_id));
            
            return $r;
            

        }

        public function addPayment1($pay,$deliverycharge,$order_id,$trasaction_id,$dis,$payment_type) {
            global $con;
            
            $r=$con->prepare("INSERT INTO payment(payment_date,total_amount,delivery_charges,order_id,payment_status,trasaction_id,discount,payment_type) VALUES (now(),?,?,?,?,?,?,?)");
            $r->execute(array($pay,$deliverycharge,$order_id,"Paid",$trasaction_id,$dis,$payment_type));
            $payment_id=$con->lastinsertId();
            return $payment_id;
            

        }
        

        public function updateCategoryImage($cat_id,$cat_image_new,$cat_tmp){
            global $con;
            $r=$con->prepare("UPDATE category SET cat_image=? WHERE cat_id=?");
            $r->execute(array($cat_image_new,$cat_id));
            if($r){
                $path="../images/cat_images/".$cat_image_new;
                move_uploaded_file($cat_tmp, $path);
            }
            if($r->errorCode() != 0){
                $errors = $r->errorinfo();
                echo $errors[2];
            }
            return $r;
        }

        public function  updateCategoryStatus($cat_id,$cat_status){
            global $con;
            $r=$con->prepare("UPDATE category SET  cat_status=?  WHERE cat_id=?");
            $r->execute(array($cat_status,$cat_id));



            if($r->errorCode()!=0){
                $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
        return $r;

    }
    public function  updatemanualpayment($total_amount,$deliverycharge,$transaction_id,$discount,$payment_type,$payment_id){
        global $con;
        $r=$con->prepare("UPDATE payment SET  payment_date=now(),total_amount='$total_amount',delivery_charges='$deliverycharge',payment_status='Paid',trasaction_id='$transaction_id',discount='$discount',payment_type='$payment_type' WHERE payment_id='$payment_id'");
        $r->execute(array($total_amount,$deliverycharge,$transaction_id,$discount,$payment_type,$payment_id));



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
        return $r;

    }



                    public function addPaymentcashondeliverywebsite($pay,$deliverycharge,$order_id,$trasaction_id,$dis,$payment_type) {
            global $con;
            
            $r=$con->prepare("INSERT INTO payment(payment_date,total_amount,delivery_charges,order_id,payment_status,trasaction_id,discount,payment_type) VALUES (now(),?,?,?,?,?,?,?)");
            $r->execute(array($pay,$deliverycharge,$order_id,"Pending",$trasaction_id,$dis,$payment_type));
            $payment_id=$con->lastinsertId();
            return $payment_id;
            

        }
    function displayAllPaymentByPaymentID($payment_id){
        global $con;
        $r=$con->prepare("SELECT * FROM payment p,order_item o,item i WHERE p.order_id=o.order_id AND i.item_id=o.item_id AND p.payment_id=$payment_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

    function getAllpaymentbyPaymentIDpackage($payment_id){
        global $con;
        $r=$con->prepare("SELECT * FROM payment p,order_package o,package pp WHERE p.order_id=o.order_id AND pp.package_id=o.package_id AND p.payment_id=$payment_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }


    function getEmail($payment_id){
        global $con;
        $r=$con->prepare("SELECT * FROM payment p,cus_order o,checkout_address ca WHERE p.order_id=o.order_id AND o.cus_id=ca.cus_id AND p.payment_id=$payment_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }


    function displayAllPackagePaymentByPaymentID($payment_id){
        global $con;
        $r=$con->prepare("SELECT * FROM payment p,order_package op,package pp WHERE pp.package_id=op.package_id AND p.order_id=op.order_id AND p.payment_id=$payment_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }



        public function viewPaymentBystatus($status,$payment_id){ //view users by their status
            global $con;
            $r=$con->prepare("SELECT * FROM payment  WHERE invoice_status=? AND payment_id=?");
            $r->execute(array($status,$payment_id));
            return $r;
        }
        public function updateInvoiceStatus($invoice_status,$payment_id){
            global $con;
            
            $r=$con->prepare("UPDATE payment SET invoice_status=? WHERE payment_id=?");
            $r->execute(array($invoice_status,$payment_id));
            
            return $r;

        }


        public function getpendingpaymentts(){ //view users by their status
            global $con;
            $r=$con->prepare("SELECT * FROM payment  WHERE payment_status='Pending' ORDER BY payment_id DESC");
            $r->execute();
            return $r;
        }

            public function getpaidpaymentts(){ //view users by their status
                global $con;
                $r=$con->prepare("SELECT * FROM payment  WHERE payment_status='Paid' ORDER BY payment_id DESC");
                $r->execute();
                return $r;
            }

            function checkitemorpackage($order_id){
                global $con;
                $r=$con->prepare("SELECT * FROM payment p WHERE p.order_id IN(SELECT oi.order_id FROM order_item oi WHERE p.order_id=oi.order_id AND p.order_id=$order_id )");
                $r->execute();



                if($r->errorCode()!=0){
                    $errors=$r->errorInfo();
                    echo $errors[2];

                }

                return  $r;

            }

        }



