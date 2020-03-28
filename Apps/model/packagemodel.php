<?php
class package{
    public function  viewAllPackage(){
        global $con;
        $r=$con->prepare("SELECT * FROM package ORDER BY package_id  DESC");
        $r->execute();
        return $r;

    }

        public function  viewAllPackageActive(){
        global $con;
        $r=$con->prepare("SELECT * FROM package WHERE  package_status='Active' ORDER BY package_id  DESC");
        $r->execute();
        return $r;

    }

        public function  viewAllPackageitems(){
        global $con;
        $r=$con->prepare("SELECT * FROM package p,item_package ip,item i WHERE p.package_id=ip.package_id AND i.item_id=ip.item_id ORDER BY p.package_id DESC");
        $r->execute();
        return $r;

    }
        public function  viewAllPackageitems1($package_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item_package ip,item i WHERE ip.item_id=i.item_id AND ip.package_id=$package_id");
        $r->execute();
        return $r;

    }

            public function  viewAllPackageitems2($order_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item_package ip,item i,order_package op WHERE ip.item_id=i.item_id AND op.package_id=ip.package_id AND op.order_id=$order_id");
        $r->execute();
        return $r;

    }

        public function addPackage($arr) {
        global $con;
        
        $r=$con->prepare("INSERT INTO package (package_name,package_price,package_des,package_image,suitable_for,package_status) VALUES (?,?,?,?,?,?)");
        $r->execute(array($arr['package_name'],$arr['package_price'],$arr['package_des'],"dsd",$arr['suitable_for'],"Active"));
        $package_id=$con->lastinsertId();
        return $package_id;
        
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
    }


     public function updatePackageImage($package_id,$package_image_new,$package_tmp){
        global $con;
        $r=$con->prepare("UPDATE package SET package_image=? WHERE package_id=?");
        $r->execute(array($package_image_new,$package_id));
        if($r){
            $path="../images/package_images/".$package_image_new;
            move_uploaded_file($package_tmp, $path);
        }
        if($r->errorCode() != 0){
            $errors = $r->errorinfo();
            echo $errors[2];
        }
        return $r;
    }

                   public function  deleteAPackage($package_id){
        global $con;
        $r=$con->prepare("DELETE FROM package  WHERE package_id=?");
        $r->execute(array($package_id));


        return $r;
         if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }

        public function  viewAPackage($package_id){
        global $con;
        $r=$con->prepare("SELECT * FROM package p,item_package ip WHERE p.package_id=ip.package_id AND p.package_id=?");
        $r->execute(array($package_id));
        return $r;

    }

    public function  viewItemImage($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item_image WHERE item_id=? LIMIT 1");
        
        $r->execute(array($item_id));
        return $r;

    }

    public function  viewSearchUserLimited($search,$start,$limit){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r WHERE u.role_id=r.role_id AND ( u.user_fname LIKE '%$search%' OR u.user_lname LIKE '%$search%' OR u.user_gender LIKE '$search%' OR r.role_name LIKE '$search%' OR u.user_status LIKE '$search%') ORDER BY user_id DESC LIMIT $start,$limit");
        //%search% wild card. Serch text can be in begining middle or end
        $r->execute(array($search));
        return $r;

    }

    public function  viewAItem($item_id){
        global $con;
        $r=$con->prepare("SELECT * FROM item i,category c WHERE i.cat_id=c.cat_id AND i.item_id=?");
        $r->execute(array($item_id));
        return $r;

    }

      public function  viewUserByStatus($status){
        global $con;
        $r=$con->prepare("SELECT * FROM user u WHERE user_status=?");
        $r->execute(array($status));
        return $r;

    }

    public function viewUserLimited($start,$limit){
        global $con;
        $r=$con->prepare("SELECT * FROM user u,role r WHERE u.role_id=r.role_id ORDER BY user_id DESC LIMIT $start,$limit");
        $r->execute();
        return $r;
    }


    public function  addItem($arr){
        global $con;
        $r=$con->prepare("INSERT INTO item(item_name,cat_id,item_price,item_des,item_status)VALUES(?,?,?,?,?)");

        print_r($arr);
        $r->execute(array($arr['item_name'],$arr['cat_id'],$arr['item_price'],$arr['item_des'],"Available"));

        $item_id=$con->lastinsertId();

         if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
          return $item_id;
    }

    public function  addImage($ii_name,$item_id){
        global $con;
        $r=$con->prepare("INSERT INTO item_image(ii_name,ii_status,item_id)VALUES(?,?,?)");
        $r->execute(array($ii_name,"Active",$item_id));

        return $r;
         if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }

    public function  updateItem($arr,$item_id){
        global $con;
        $r=$con->prepare("UPDATE item SET  cat_id=?,item_name=?,item_price=?,item_des=?  WHERE item_id=?");
        $r->execute(array($arr['cat_id'],$arr['item_name'],$arr['item_price'],$arr['item_des'],$item_id));


        return $r;
         if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }

     public function  updateItemStatus($item_id,$item_status){
        global $con;
        $r=$con->prepare("UPDATE item SET  item_status=?  WHERE item_id=?");
        $r->execute(array($item_status,$item_id));



         if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
        return $r;

    }


     public function updateItemImage($item_id, $item_image_new, $item_tmp){
        global $con;
        $r=$con->prepare("UPDATE item_image SET ii_image=? WHERE item_id=?");
        $r->execute(array($item_image_new,$item_id));
        if($r){
            $path="../images/item_images/".$item_image_new;
            move_uploaded_file($item_tmp,$path);//moving image to actual location
        }
        return $r;

    }

    public function  viewUserLog(){
        global $con;
        $r=$con->prepare("SELECT * FROM user u , log l WHERE u.user_id=l.user_id  ORDER BY l.log_id DESC");
        $r->execute();
        return $r;

    }

           public function  deleteAnItem($item_id){
        global $con;
        $r=$con->prepare("DELETE FROM item WHERE item_id=?");
        $r->execute(array($item_id));


        return $r;
         if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }

    }
    public function  updatePackageStatus($package_id,$package_status){
        global $con;
        $r=$con->prepare("UPDATE package SET  package_status=?  WHERE package_id=?");
        $r->execute(array($package_status,$package_id));



        if($r->errorCode()!=0){
            $errors=$r->errorInfo();
            echo $errors[2];// error is in array 2 means error namme position

        }
        return $r;

    }


         }

?>
