<?php
include '../common/sessionhandling.php';
include '../common/dbconnection.php';
include '../model/customermodel.php';
//index.php
$obcus=new customer();


$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{

include '../phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'southernlanka123@gmail.com';
$mail->Password = 'southernlanka1@';

$mail->setFrom('southernlanka123@gmail.com', 'Southern Lanka Catering');
$mail->addAddress($_POST["email"]);
$mail->Subject = 'Regarding'."".$_POST["event_type"];
$mail->Body =$_POST["message"];

  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $error = '<label class="text-success">Reply has been Sent</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 
}


$c_id=$_REQUEST['c_id'];

$resultc=$obcus->viewAInquiry($c_id);

$rowcus=$resultc->fetch(PDO::FETCH_BOTH);


?>
<?php include_once('../common/header.php'); ?><html>
<head>
  <meta charset="utf-8">
  <title>sos</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <title>Ela - Bootstrap Admin Dashboard Template</title>
  <!-- Bootstrap Core CSS -->
  <link href="../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../css/helper.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->

  <script src="https:oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https:oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" />
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../sweetalert/sweetalert.min.js" ></script>
<link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">


<!-- you can add images to div call bgimg to class -->
<style type="text/css">
.bgimg {
  background-image: url('../images/wow.jpg'); 
}
</style>
<!-- use smooth scrolling -->
<script src="../js/smoothscroll.js"></script>

<?php if(isset($_GET['msg1'])){ 


 echo "<script type='text/javascript'> swal('Success!', 'New Item Added Successfully', 'success');</script>";

 
} ?>

<p align="center">Modules</p>
<li>
 <?php include_once('../common/modules.php'); ?>

</li>
</li>
<li class="nav-label"></li> 

</div>
<!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
  <!-- Bread crumb -->
  <div class="row page-titles">
    <div class="col-lg-12 align-self-center">
    </div>
    <div class="col-lg-12 align-self-center">
     <img src="../images/sendreply.jpg" alt="homepage" class="dark-logo" width="200px" height="100px" align="center" />&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> SEND REPLIES</span>
     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Home</a></li>
      <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="../view/customer_management.php">Customer Management</a></li>
      <li class="breadcrumb-item active">Send Reply</li>
    </ol>
  </div>

</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
  <!-- Start Page Content -->


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  



<!-- user table -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
       <div>

<div class="container">
   <div class="row">
    <div class="col-md-8" style="margin:0 auto; float:none;">
     <div class="alert alert-info"><h3 align="center">Send Emails To Inquiries</h3></div>
     <br />
     <?php echo $error; ?>
     <form method="post">
      <div class="form-group">
       <label>First Name</label>
       <input type="text" name="cus_fname" class="form-control" value="<?php echo $rowcus['firstname']; ?>" readonly />
      </div>
         <div class="form-group">
       <label>Last Name</label>
       <input type="text" name="cus_fname" placeholder="Enter Name" class="form-control" value="<?php echo $rowcus['lastname']; ?>"readonly />
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="text" name="cus_email" class="form-control" placeholder="Enter Email" value="<?php echo $rowcus['email']; ?>" readonly />
      </div>
      <div class="form-group">
       <label>Event Type</label>
       <input type="text" name="cus_subject" class="form-control" placeholder="Enter Subject" value="<?php echo $rowcus['event_type']; ?>"/>
      </div>
        <div class="form-group">
       <label>No of Guests</label>
       <input type="text" name="cus_subject" class="form-control" placeholder="Enter Subject" value="<?php echo $rowcus['event_type']; ?>"/>
      </div>
          <div class="form-group">
       <label>Location</label>
       <input type="text" name="cus_subject" class="form-control" placeholder="Enter Subject" value="<?php echo $rowcus['location']; ?>"/>
      </div>
                <div class="form-group">
       <label>Event Date</label>
       <input type="date" name="cus_subject" class="form-control" placeholder="Enter Subject" value="<?php echo $rowcus['event_date']; ?>"/>
      </div>
      <div class="form-group">
       <label>Type of foods</label>
       <textarea name="message" class="form-control" readonly=""><?php echo $rowcus['type_of_food']; ?></textarea>
      </div>


       <div class="form-group">
       <label>Your Reply</label>
       <textarea name="message" class="form-control"></textarea>
      </div>


      <div class="form-group" align="center">
     
          <input type="submit" name="submit" value="Send" class="btn btn-primary btn-md btn-block" />
    </div>
   
     </form>

     <a href="../view/customer_management.php"><button class="btn btn-warning" />Go back</button></a>
    </div>
   </div>
  </div>
     </div>
  </div>
</div>
</div>
<!-- End PAge Content -->

</div>


<!-- footer -->
</div>

<?php include_once('../common/footer.php'); ?>



<script src="../js/lib/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../js/lib/bootstrap/js/popper.min.js"></script>


<!--Custom JavaScript -->
<script src="../js/scripts.js"></script>


<script src="../js/lib/datatables/datatables.min.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="../js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="../js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="../js/lib/datatables/datatables-init.js"></script>
<script src="../js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


<!--Custom JavaScript -->
<script src="../js/scripts.js"></script>

</script>
<script type="text/javascript">

  function confirmation (str) {

    var r=confirm("Do you want to" +str+ "Item ?");

    if(!r){

      return false;
    }
  }

</script> 