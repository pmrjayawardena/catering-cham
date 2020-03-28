<?php
include '../common/dbconnection.php';
include '../model/itemmodel.php';
$item_id2=$_GET['p'];
$item_id1=$_GET['q'];

$obitem=new item();
$resultitem=$obitem->displaynotselectedboth($item_id1,$item_id2);

?>

<div class="row">
 <div class="row">
  <div class="col-md-4">
    <select name="item_id3" id="item_id3" class="form-control form-control-lg"  style="margin-left:60px; width:200%;">

     <option value="">Select an item</option>
     option
     <?php   while($row=$resultitem->fetch(PDO::FETCH_BOTH)) { 


      ?> 
       <option value="<?php echo $row['item_id']; ?>"><?php echo $row['item_name']; ?></option>
     <?php }?>

   </select>
 </div>
</div>
</div>

