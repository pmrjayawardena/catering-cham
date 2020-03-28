<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="../css/util.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('../images/img-02.jpg');">
      <div class="wrap-login100 p-t-190 p-b-30">




         <form action="../controller/logincontroller.php" method="post">
        <div class="login100-form-avatar">
            <img src="../images/10-512.png" alt="AVATAR">
          </div>
                                <span class="login100-form-title p-t-20 p-b-45">
            User 
          </span>
                <?php if(isset($_GET['msg'])){ ?>
        <div class="alert alert-danger" role="alert">
                <?php 
                    echo base64_decode($_GET['msg']);
                ?>
        </div>
        <?php } ?>                 
                             
            <div class="wrap-input100 validate-input m-b-10" >
               
                <label> Enter Username</label>
                <input name="txtEmail" type="txt" class="form-control" placeholder="Email">
                <span class="text-danger"></span>
            </div>   
 <div class="wrap-input100 validate-input m-b-10">
                <label> Enter Password</label>
               <input name="txtPassword" type="password" class="form-control" placeholder="Password">
                 <span class="text-danger"></span>
                
            </div>
        
                
                <div class="wrap-input100 validate-input m-b-10">
                                            <button class="login100-form-btn" name="insert" >
              Login
            </button>
             
            </div>
            <div class="text-center w-full p-t-25 p-b-230">
            <a href="#" class="txt1">
            
            </a>
          </div>  
                </div>

          <div class="text-center w-full">
            <a class="txt1" href="#">
          
              <i class="fa fa-long-arrow-right"></i>            
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  

<!--===============================================================================================-->  
  <script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../assets/vendor/bootstrap/js/popper.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../js/main.js"></script> 
 <script src="../plugins/iCheck/icheck.min.js"></script>
   <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

</body>
</html>