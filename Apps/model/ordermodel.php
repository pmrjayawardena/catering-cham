<?php


class order{
    function displayAllOrder(){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c WHERE co.cus_id=c.cus_id AND co.order_status='Confirmed' ORDER BY co.order_id DESC ");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }
    function displayProcessingOrders(){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c WHERE co.cus_id=c.cus_id AND co.dispatch_status!='Dispatched' AND co.order_status='Confirmed' ORDER BY co.order_id DESC ");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

        function pendingorders(){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c WHERE co.cus_id=c.cus_id AND co.dispatch_status!='Dispatched' AND co.order_status='Pending' ORDER BY co.order_id DESC ");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }
        function displayAllOrderlatest(){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c WHERE co.cus_id=c.cus_id AND co.dispatch_status!='Dispatched' AND co.order_status!='Pending' ORDER BY order_id DESC LIMIT 5 ");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

        function dispatchedOrders(){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c WHERE co.cus_id=c.cus_id AND co.dispatch_status='Dispatched' AND co.order_status='Confirmed' ORDER BY co.order_id DESC ");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }
        function getDeliverydate($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order o,customer c,delivery d WHERE o.cus_id=c.cus_id AND d.order_id=o.order_id AND o.order_status='Confirmed' AND o.order_id='$order_id'");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

    function checkOrder($session_id){
        global $con;
        $r = $con->prepare("SELECT * FROM `cus_order` WHERE session_id=?");
        $r->execute(array($session_id));

        return $r;
        
        
    }

        function checkpackageOrder($session_id){
        global $con;
        $r = $con->prepare("SELECT * FROM `cus_order` WHERE session_id=?");
        $r->execute(array($session_id));

        return $r;
        
        
    }

            function getorderdetails($order_id){
        global $con;
        $r = $con->prepare("SELECT * FROM cus_order WHERE order_id=?");
        $r->execute(array($order_id));

        return $r;
        
        
    }


    function viewshoptake(){
        global $con;
        $r = $con->prepare("SELECT * FROM cus_order WHERE session_id=?");
        $r->execute(array($session_id));
            if($r->errorCode()!=0){
                $errors = $r->errorInfo();
                echo $errors[2];
            }
        return $r;
        
        
    }
        public function viewOrderBystatus($status){ //view users by their status
            global $con;
            $r=$con->prepare("SELECT * FROM cus_order  WHERE order_status=?");
            $r->execute(array($status));
            return $r;

        }

        
        public function addOrder($cus_id) {
        global $con;
        
        $r=$con->prepare("INSERT INTO cus_order(order_date,cus_id,order_status,checkout_type) VALUES (now(),$cus_id,'Confirmed','Home')");
        $r->execute(array($cus_id));
        $order_id=$con->lastinsertId();
        return $order_id;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }



            public function addOrder1($cus_id,$order_status,$sid) {
        global $con;
        echo $cus_id;
        echo $sid;
        $r=$con->prepare("INSERT INTO cus_order(order_date,cus_id,order_status,session_id) VALUES (now(),?,?,?)");
        $r->execute(array($cus_id,$order_status,$sid));
        $order_id=$con->lastinsertId();
        return $order_id;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }
    
    public function addItemOrder($order_id,$item_id,$quantity) {
        global $con;
        
        $r=$con->prepare("INSERT INTO order_item(order_id,item_id,item_quantity) VALUES (?,?,?)");
        $r->execute(array($order_id,$item_id,$quantity));
        
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }

        public function addItemOrdermanual($values,$order_id){
        global $con;
        
        $r=$con->prepare("INSERT INTO order_item(order_id,item_id,item_quantity) VALUES (?,?,?)");
        $r->execute(array($order_id,$values['item_id'],$values['quantity']));
        
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }

            public function addpackageOrdermanual($values,$order_id){
        global $con;
        
        $r=$con->prepare("INSERT INTO order_package(order_id,package_id,package_quantity) VALUES (?,?,?)");
        $r->execute(array($order_id,$values['package_id'],$values['quantity']));
        
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }
    
        public function addTempOrder1($order_id) {
        global $con;
        
        $r=$con->prepare("INSERT INTO temp_order(order_id) VALUES ($order_id)");
        $r->execute(array($order_id));
        
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }
    
    public function addTempOrder2($order_id,$item_id,$quantity,$order_price){
        global $con;
        
        $r=$con->prepare("INSERT INTO temp_order(order_id,item_id,quantity,order_price) VALUES ($order_id, $item_id,$quantity,$order_price)");
        $r->execute(array($order_id,$item_id,$quantity,$order_price));
        
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }
    function checktemporder($order_id,$item_id){
       
        global $con;
        $r=$con->prepare("SELECT * FROM temp_order WHERE order_id=? AND item_id=?"); 
        $r->execute(array($order_id,$item_id)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }

        public function addTemppackage($order_id,$package_id,$quantity,$order_price){
        global $con;
        
        $r=$con->prepare("INSERT INTO temp_package(order_id,package_id,quantity,order_price) VALUES ($order_id, $package_id,$quantity,$order_price)");
        $r->execute(array($order_id,$package_id,$quantity,$order_price));
        
        return $r;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }

        function updateTempOrder2($quantity,$order_price,$item_id,$order_id) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE temp_order SET quantity=quantity+?,order_price=order_price+? WHERE item_id=? AND order_id=?"); //here the names in the database are used
        $r->execute(array($quantity,$order_price,$item_id,$order_id)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }

            function updateTemppackage($quantity,$order_price,$package_id,$order_id) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE temp_package SET quantity=quantity+?,order_price=order_price+? WHERE package_id=? AND order_id=?"); //here the names in the database are used
        $r->execute(array($quantity,$order_price,$package_id,$order_id)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }

            function updateorderselect($checkout_type,$oder_id) { //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE cus_order SET checkout_type='$checkout_type' WHERE order_id='$oder_id'"); //here the names in the database are used
        $r->execute(array($checkout_type,$oder_id)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }

            public function orderDetails($values,$order_id) {
        global $con;
        
        $r=$con->prepare("INSERT INTO order_item(order_id,item_id,item_quantity) VALUES (?,?,?)");
        $r->execute(array($order_id,$values['item_id'],$values['item_quantity']));
        $order_id=$con->lastinsertId();
        return $order_id;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }

                public function orderPackageDetails($order_id,$package_id,$package_quantity) {
        global $con;
        
        $r=$con->prepare("INSERT INTO order_package(order_id,package_id,package_quantity) VALUES (?,?,?)");
        $r->execute(array($order_id,$package_id,$package_quantity));
        $package_id=$con->lastinsertId();
        return $package_id;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
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

            public function  updateorderstatusmanual($order_id,$order_status){
            global $con;
            $r=$con->prepare("UPDATE cus_order SET  order_status='$order_status'  WHERE order_id='$order_id'");
            $r->execute(array($order_id,$order_status));



            if($r->errorCode()!=0){
                $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
        return $r;

    }

        function viewOrderItems($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM order_item  WHERE order_id=$order_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

            function viewOrderpackage($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM order_package  WHERE order_id=$order_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }
    
    function viewTempOrderItems($order_id2){
        global $con;
        $r=$con->prepare("SELECT * FROM temp_order WHERE order_id=$order_id2");
        $r->execute(array($order_id2));


        return  $r;

    }

        function viewTempOrderpackage($order_id2){
        global $con;
        $r=$con->prepare("SELECT * FROM temp_package WHERE order_id=$order_id2");
        $r->execute(array($order_id2));


        return  $r;

    }

            public function totalpriceofmanualorder($order_id2){
        global $con;
        $r=$con->prepare("SELECT *, SUM(order_price) AS S FROM temp_order WHERE order_id='$order_id2' GROUP BY order_id");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                public function totalpriceofmanualorderpackage($order_id2){
        global $con;
        $r=$con->prepare("SELECT *, SUM(order_price) AS S FROM temp_package WHERE order_id='$order_id2' GROUP BY order_id");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }
    function deleteTempOrderItems($order_id,$item_id){
        global $con;
        $r=$con->prepare("DELETE FROM temp_order WHERE order_id=$order_id AND item_id=$item_id");
        $r->execute(array($order_id,$item_id));
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

        function deleteTempOrderpackage($order_id,$package_id){
        global $con;
        $r=$con->prepare("DELETE FROM temp_package WHERE order_id=$order_id AND package_id=$package_id");
        $r->execute(array($order_id,$package_id));
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }
            function viewAOrder($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c  WHERE co.cus_id=c.cus_id AND co.order_id=$order_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

            public function  viewAllOrderItems($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM order_item oi,item i WHERE oi.item_id=i.item_id AND oi.order_id=$order_id");
        $r->execute();
        return $r;

    }

                public function  viewAllPackagedetails($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order o,order_package op,package p WHERE o.order_id=op.order_id AND p.package_id=op.package_id AND o.order_id=$order_id");
        $r->execute();
        return $r;

    }
    public function  deleteAnOrder($order_id){
        global $con;
        $r=$con->prepare("DELETE FROM cus_order WHERE order_id=?");
        $r->execute(array($order_id));


        return $r;
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }


            function checktemppackage($order_id,$package_id){
       
        global $con;
        $r=$con->prepare("SELECT * FROM temp_package WHERE order_id=? AND package_id=?"); 
        $r->execute(array($order_id,$package_id)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }

                function getdeliverydetails($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c,delivery d  WHERE co.cus_id=c.cus_id AND d.order_id=co.order_id AND co.order_id=$order_id");
        $r->execute();



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];

        }

        return  $r;

    }

            function dispatched($order_id){ //this quan is the form variable
       
        global $con;
        $r=$con->prepare("UPDATE cus_order SET dispatch_status='Dispatched' WHERE order_id='$order_id'"); //here the names in the database are used
        $r->execute(array($order_id)); 
        if ($r-> errorCode()!=0){
            $errors = $r->errorInfo();
            echo $errors[2];
            
        }
        return $r;

    }
}


?>
