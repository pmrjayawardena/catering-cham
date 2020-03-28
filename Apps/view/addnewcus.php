<?php

?>


<div class="modal-header">
	
</div>
<div class="col-md-12">
	<form method="post" action="../../website/controller/customercontroller.php?action=add1" enctype="multipart/form-data" name="RegForm" onsubmit="return GEEKFORGEEKS()">

    <div class="form-body">
      <div class="form-group row">

        <label class="control-label text-right col-md-3">First Name</label>

        <div class="col-md-9">
         <input type="text" name="cus_fname" id="cus_fname" placeholder="Customer First Name" class="form-control" />
         <div id="uferror" class="error">*</div>
         <small class="form-control-feedback"> </small> </div>
       </div>
       <div class="form-group row">
        <label class="control-label text-right col-md-3">Last Name </label>
        <div class="col-md-9">
         <input type="text" name="cus_lname" id="cus_lname" placeholder="Customer Last Name" class="form-control" />
         <div id="ulerror" class="error">*</div>
         <small class="form-control-feedback"> </small> </div>
       </div>
       
       
       <div class="form-group row">
        <label class="control-label text-right col-md-3">Email</label>
        <div class="col-md-9">
         <input type="text" name="cus_email" id="cus_email" placeholder="Customer Email" class="form-control" onkeyup="checkCusEmail(this.value)" />
         <span id="showEmail"></span>
         <div id="ueerror" class="error">*</div>
         <div id="tid" class="error"></div>
       </div>
     </div>
     <div class="form-group row">
      <label class="control-label text-right col-md-3">Telephone</label>
      <div class="col-md-9">
       <input type="text" name="cus_tel" id="cus_tel" placeholder="Customer Telephone" class="form-control" />
       <div id="uterror" class="error"></div>
     </div>
   </div>          
   <div class="col-lg-8 col-md-offset-2">
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Add Customer</button>
    <button type="reset" name="clear" value="clear" class="btn btn-primary">Clear </button>

  </div>
</div>
</form>


<div class="modal-footer">					
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  
</div>

</div>
<script>
  function GEEKFORGEEKS()                                   
  {
    var cus_fname = document.forms["RegForm"]["cus_fname"]; 
    var cus_lname = document.forms["RegForm"]["cus_lname"];              

    var cus_email = document.forms["RegForm"]["cus_email"]; 
    var cus_tel = document.forms["RegForm"]["cus_tel"]; 
    

    if (cus_fname.value == "")                              
    {
      window.alert("Please Enter first name");
      cus_fname.focus();
      return false;
    }

    if (cus_lname.value == "")                                 
    {
      window.alert("Please enter Last Name");
      cus_lname.focus();
      return false;
    }


    if (cus_email.value == "")                                  
    {
      window.alert("Please Enter an Email");
      cus_email.focus();
      return false;
    }

    if (cus_tel.value == "")                                  
    {
      window.alert("Please Enter Telephone");
      cus_tel.focus();
      return false;
    }
    

    return true;
  }

</script>