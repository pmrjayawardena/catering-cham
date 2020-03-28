<?php

?>


<div class="modal-header">
	
</div>
<div class="col-md-12">
	<form method="post" action="../view/addorder.php">

    <div class="form-body">
      <div class="form-group row">

        <label class="control-label text-right col-md-3">First Name</label>
                               <div class="row" >
                  <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2">Delivery City</div>
                  <div class="col-md-3">
             <input type="text" id="suitable_for" name="suitable_for" class="form-control">
                </div>

                <div class="col-md-1">&nbsp;</div>

              </div>         
   <div class="col-lg-8 col-md-offset-2">
    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Check</button>
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