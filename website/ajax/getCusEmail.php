<?php
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/loginmodel.php';

$obcuslogin= new login();
$email=$_GET['q'];

$patemail='/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/';
if(preg_match($patemail, $email)){
$n=$obcuslogin->checkCusEmail($email);
    if($n==1){
        echo "<i class='alert-danger'>Not available</i>";
        $status=1;
    }else{
        echo "<i class='alert-sucess'>Available<i>";
         $status=0;
    }


}else{
    echo "<i class='text-danger'>Invalid Email Address</i>";
     $status=1;
}
?>
<input type="hidden" name="hid" id="hid" value="<?php echo $status?>" />