<?php
include '../common/dbconnection.php';
include '../model/itemmodel.php';
$item_id=$_GET['q'];

$obitem=new item();
$resultitem=$obitem->displaynotselected($item_id)

?>

<div class="row">
 <div class="row">
  <div class="col-md-4">
    <select name="item_id2" id="item_id2" class="form-control form-control-lg" style="margin-left:60px; width:200%;"  onchange="displayitem2(document.getElementById('item_id1').value,this.value)">

     <option value="">Select an item</option>
     option
     <?php   while($row=$resultitem->fetch(PDO::FETCH_BOTH)) { ?> 
       <option value="<?php echo $row['item_id']; ?>"><?php echo $row['item_name']; ?></option>
     <?php }?>

   </select>
 </div>
</div>
</div>

