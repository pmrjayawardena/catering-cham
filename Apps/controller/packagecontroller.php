<?php
include '../common/dbconnection.php';
include '../model/packagemodel.php';
$action = $_REQUEST['action'];
$obp=new package();
switch ($action) {

 case "add":
 $arr = $_POST;
    $package_id=$obp->addPackage($arr); //add the package details to db

         if($package_id){//If user has been added then
            if($_FILES['package_image']['name']!=""){//if image is not empty
                $package_image=$_FILES['package_image']['name'];//name off the image
                $package_tmp=$_FILES['package_image']['tmp_name'];//temp location
                $package_image_new=time()."_".$package_id."_".$package_image;
                $r=$obp->updatePackageImage($package_id, $package_image_new, $package_tmp);
                
              }
              $msg1=  base64_encode("A record has $msg been added");         
             header("Location:../view/package_management.php?msg1=$msg1");  //redirection to package management page with a message
           }else{
             $msg2=  base64_encode("A record has $msg been added");
             header("Location:../view/package_management.php?msg2=$msg2"); //redirection to package management page with a message
           }

           if(isset($_POST["item_unit"]))
           {
 $connect = new PDO("mysql:host=localhost;dbname=ocs", "root", "");   //database connection

for($count = 0; $count < count($_POST["item_quantity"]); $count++)  //for loop 
{  
  $query = "INSERT INTO item_package
  (package_id,item_id,item_quantity) 
  VALUES (:package_id,:item_unit, :item_quantity)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
     ':package_id'   => $package_id,
     ':item_quantity' => $_POST["item_quantity"][$count], 
     ':item_unit'  => $_POST["item_unit"][$count]
   )
 );
}
$result = $statement->fetchAll();
if(isset($result))
{
  header("Location:../view/package_management.php?msg1=$msg1");
}else{


  header("Location:../view/package_management.php?msg2=$msg2");
}
}

break;
case "Delete": //delete a package

$package_id=$_REQUEST['package_id']; //get the package id
$r=$obp->deleteAPackage($package_id); //delete a perticular package using package id

if($r){ //if the package is deleted 

 header("Location:../view/package_management.php?msg=4"); //redirect with a message
}else{

        header("Location:../view/package_management.php?msg=7"); //redirect with a message
      }



      break;


           case "ACDAC":                  // new case for active deactive 

           $package_id=$_REQUEST['package_id']; //request the package id
         $status=$_REQUEST['status']; //request the status of the package

           if($status){ //if the status is 1 set the package status to deactive

            $package_status="Deactive";
            

          }else{

            $package_status="Active";  //if the package status is 0 set the package status to active
          }

        $r=$obp->updatePackageStatus($package_id,$package_status); //update the package status
        if($r){

 header("Location:../view/package_management.php?msg=6&package_id=$package_id"); //redirection
}



break;
}



?>
