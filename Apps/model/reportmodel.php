<?php 

class report{
            


    public function bookingAnalysisByDate($f,$t){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order co,customer c WHERE co.cus_id=c.cus_id AND co.order_date BETWEEN '$f' AND '$t' ");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }
        public function feedbackAnalysisByDate($f,$t){
        global $con;
        $r=$con->prepare("SELECT *  FROM feedback f WHERE f.feedback_date BETWEEN '$f' AND '$t' GROUP BY f.feedback_date ");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

        public function getOrderItems($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM order_items WHERE order_id=$order_id");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }


        public function getCusCity($cus_id){
        global $con;
        $r=$con->prepare("SELECT * FROM customer c,checkout_address ca WHERE c.cus_id=ca.cus_id AND c.cus_id=$cus_id");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

        public function getDeliveryDate($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM delivery d,cus_order co WHERE co.order_id=d.order_id AND co.order_id=$order_id");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }


            public function feedbackAnalysisByDate_excellent($hd){
        global $con;
        $r=$con->prepare("SELECT *, COUNT(*) AS ce  FROM feedback f WHERE f.feedback_date='$hd' AND f.feedback_rating=5");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }
            public function feedbackAnalysisByDate_verygood($hd){
        global $con;
        $r=$con->prepare("SELECT *, COUNT(*) AS cg  FROM feedback f WHERE f.feedback_date='$hd' AND f.feedback_rating=4");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                public function feedbackAnalysisByDate_good($hd){
        global $con;
        $r=$con->prepare("SELECT *, COUNT(*) AS ch  FROM feedback f WHERE f.feedback_date='$hd' AND f.feedback_rating=3");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                    public function feedbackAnalysisByDate_bad($hd){
        global $con;
        $r=$con->prepare("SELECT *, COUNT(*) AS ci  FROM feedback f WHERE f.feedback_date='$hd' AND f.feedback_rating=2");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                        public function feedbackAnalysisByDate_verybad($hd){
        global $con;
        $r=$con->prepare("SELECT *, COUNT(*) AS cb  FROM feedback f WHERE f.feedback_date='$hd' AND f.feedback_rating=1");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }


    public function getitemname($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback f, item i WHERE f.item_id=i.item_id AND f.item_id=$item_id");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

        public function getyearFeedback_e($pat,$feedback){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_date LIKE '$pat%' AND feedback_rating='$feedback'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }

        public function getyearFeedback_excelent($pat,$feedback){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_date LIKE '$pat%' AND feedback_rating='$feedback'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }
      public function getyearFeedback_verygood($pat,$feedback){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_date LIKE '$pat%' AND feedback_rating='$feedback'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }
          public function getyearFeedback_good($pat,$feedback){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_date LIKE '$pat%' AND feedback_rating='$feedback'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }
              public function getyearFeedback_bad($pat,$feedback){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_date LIKE '$pat%' AND feedback_rating='$feedback'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }

                  public function getyearFeedback_verybad($pat,$feedback){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_date LIKE '$pat%' AND feedback_rating='$feedback'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }

    public function getMonthPayment($pat){
        global $con;
        $r=$con->prepare("SELECT * FROM payment WHERE payment_date LIKE '$pat%'AND payment_type='PayPal'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }

        public function getMonthPayment1($pat){
        global $con;
        $r=$con->prepare("SELECT * FROM payment WHERE payment_date LIKE '$pat%'AND payment_type='Cash'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }
        public function paymentAnalysisByDate($f,$t){
        global $con;
        $r=$con->prepare("SELECT DISTINCT payment_date FROM payment  WHERE payment_date BETWEEN '$f' AND '$t'");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }
        public function paymentAnalysisByDate_each($f,$t){
        global $con;
        $r=$con->prepare("SELECT *, COUNT(payment_date) AS ct, SUM(total_amount) AS S FROM payment WHERE payment_date BETWEEN '$f' AND '$t' GROUP BY payment_date");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

            public function getaverage($item_id,$pat){
        global $con;
        $r=$con->prepare("SELECT *, AVG(feedback_rating) AS average FROM feedback WHERE item_id=$item_id AND feedback_date LIKE '$pat%'");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

            public function paymentAnalysisByDatemonth($pat){
        global $con;
        $r=$con->prepare("SELECT *, COUNT(payment_date)  AS ct, SUM(total_amount) AS S FROM payment WHERE payment_date LIKE '$pat%' AND payment_status='Paid'");
        $r->execute(array($pat));
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }
            public function paymentAnalysisByDatemonthforbarchart($pat){
        global $con;
        $r=$con->prepare("SELECT  SUM(total_amount) FROM payment WHERE payment_date LIKE '$pat%' AND payment_status='Paid'");
        $r->execute(array($pat));
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }
            public function viewActiveUser(){
        global $con;
        $r=$con->prepare("SELECT * FROM user WHERE user_status='Active'");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                public function viewDriver(){
        global $con;
        $r=$con->prepare("SELECT * FROM driver");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                public function  viewUser($user_id){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r,login l WHERE u.user_id='$user_id' AND u.user_id=l.user_id and r.role_id=u.role_id");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                    public function  viewADriver($driver_id){
        global $con;
        $r=$con->prepare("SELECT * FROM driver WHERE driver_id='$driver_id'");
        $r->execute();
        
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $r;
        
    }

                    public function  getLogCount($user_id,$date){
        global $con;
        $r=$con->prepare("SELECT * FROM log WHERE log_in_date LIKE '$date%' AND user_id='$user_id'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }



        public function getdeliveryCount($pat,$did){
        global $con;
        $r=$con->prepare("SELECT * FROM delivery WHERE delivery_date LIKE '$pat%' AND delivered_by='$did'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }


    public function getMonthdelivery($pat){
        global $con;
        $r=$con->prepare("SELECT * FROM delivery WHERE delivery_date LIKE '$pat%'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }

            public function popularity($pat,$feedback,$item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM feedback WHERE feedback_date LIKE '$pat%' AND feedback_rating='$feedback' AND item_id='$item_id'");
        $r->execute();
        $count=$r->rowCount();
      
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }

    public function  getitemnamepopularity($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item i,category c WHERE i.cat_id=c.cat_id AND i.item_id='$item_id'"); 
        $r->execute(array($item_id));
        return $r;
        
    }
    function allocateAnalysisByDate($f,$t){
        $con=$GLOBALS['con'];
        
        //To get data from user, login, and role tables based on un and pwd
//        $sql="SELECT * FROM reservation r,customer c WHERE r.cus_id=c.cus_id AND r.date BETWEEN '$f' AND '$t' ";
        $sql="SELECT *, COUNT(*) AS co FROM reservation r WHERE r.date BETWEEN '$f' AND '$t' GROUP BY r.date"; 
        
        
        $result=$con->query($sql); //To execute the sql query by ob oriented method.
        
        //$no=$result->num_rows;
        //echo $no;
        return $result;
    }

    
    function allocateAnalysisByDate_a($date){
        $con=$GLOBALS['con'];
        
        //To get data from user, login, and role tables based on un and pwd
        $sql1="SELECT COUNT(*) AS c FROM allocate WHERE start_date='$date'"; 
        
         //To execute the sql query by ob oriented method.
        $result1=$con->query($sql1); //To execute the sql query by ob oriented method.
        //$no=$result->num_rows;
        //echo $no;
        return $result1;
    }
    

    
    

    function feedbackAnalysisByDate_acceptable($hd){
        $con=$GLOBALS['con'];
        
        //To get data from user, login, and role tables based on un and pwd
        $sql1="SELECT *, COUNT(*) AS ca  FROM feedback f WHERE f.hire_date='$hd' AND feedback='Acceptable'"; 
        
         //To execute the sql query by ob oriented method.
        $result1=$con->query($sql1); //To execute the sql query by ob oriented method.
        
        return $result1;
    }
    function feedbackAnalysisByDate_poor($hd){
        $con=$GLOBALS['con'];
        
        //To get data from user, login, and role tables based on un and pwd
        $sql1="SELECT *, COUNT(*) AS cp  FROM feedback f WHERE f.hire_date='$hd' AND feedback='Poor'"; 
        
         //To execute the sql query by ob oriented method.
        $result1=$con->query($sql1); //To execute the sql query by ob oriented method.
        
        return $result1;
    }

    


        public function getMonthBooking($pat){
        global $con;
        $r=$con->prepare("SELECT * FROM cus_order WHERE order_date LIKE '$pat%'");
        $r->execute();
        
      $count=$r->rowCount();
        
        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position
            
        }
        return $count;
        
    }

    function getMonthAllocation($pat){
        $con=$GLOBALS['con'];
        
        $sql="SELECT * FROM allocate WHERE start_date LIKE '$pat%'";
        $result=$con->query($sql);
        $count=$result->num_rows;
        return $count;
    }


    
    function driver_allocation($f,$t){
        $con=$GLOBALS['con'];
        
        //To get data from user, login, and role tables based on un and pwd
//        $sql="SELECT * FROM reservation r,customer c WHERE r.cus_id=c.cus_id AND r.date BETWEEN '$f' AND '$t' ";
        $sql="SELECT *, COUNT(*) AS coo FROM allocate a WHERE a.start_date BETWEEN '$f' AND '$t' GROUP BY a.start_date"; 
        
        
        $result=$con->query($sql); //To execute the sql query by ob oriented method.
        
        //$no=$result->num_rows;
        //echo $no;
        return $result;
    }
    
    function no_of_alllcations($date){
        $con=$GLOBALS['con'];
        
        //To get data from user, login, and role tables based on un and pwd
        $sql1="SELECT COUNT(*) AS coa FROM allocate WHERE start_date='$date'"; 
        
         //To execute the sql query by ob oriented method.
        $result1=$con->query($sql1); //To execute the sql query by ob oriented method.
        //$no=$result->num_rows;
        //echo $no;
        return $result1;
    }
}