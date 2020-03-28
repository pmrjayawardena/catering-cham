<?php
include '../common/dbconnection.php';
include '../model/itemmodel.php';

$cat_id = $_GET['q1'];
echo $brand_id=$_GET['q2'];
$model=$_GET['q3'];

$obitem=new item();
echo "sss";

if($cat_id!="" && $brand_id=="" && $model==""){
    $id=$cat_id;
    $feild="cat_id";
    $status=1;
}

if($cat_id == "" && $brand_id != "" && $model == ""){
    $id=$brand_id; 
    $feild="brand_id";
    $status=1;
}

if($cat_id == "" && $brand_id == "" && $model != ""){
    $id=$model;
    $feild="model";
    $status=1;
}

if($cat_id!="" && $brand_id!="" && $model==""){
    $id1=$cat_id; $id2=$brand_id;
    $feild1="cat_id"; $feild2="brand_id"; 
    $status=2;
}

if($cat_id != "" && $brand_id == "" && $model != ""){
    $id1=$cat_id;$id2=$model;
    $feild1="cat_id";$feild2="model";
    $status=2;
}

if($cat_id == "" && $brand_id != "" && $model != ""){
    $id1=$brand_id; $id2=$model;
    $feild1="brand_id";  $feild2="model";
    $status=2;
}

if($cat_id == "" && $brand_id != "" && $model != ""){
    $id1=$brand_id; $id2=$model;
    $feild1="brand_id";  $feild2="model";  $feild3="cat_id";
    $status=3;
}


if($status==1){
    $result=$obitem->getItemsfeild1($feild, $id);
}
if($status==2){
    $result=$obitem->getItemsfeild2($feild1,$feild2, $id1,$id2);
}

if($status==3){
    $result=$obitem->getItemsfeild3($feild1,$feild2,$feild3,$id1,$id2,$id3);
}


?>

          <table id="example23" class="table table-hover" cellspacing="0" width="100%"">
            <thead class="table-secondary">
              <tr>
                <th style="height:40px">Item Image &nbsp;</th>
                <th style="height:40px">Item Name</th>
                <th style="height:40px">Category</th>
                <th style="height:40px">Item Price</th>
                <th style="height:40px">Status</th>
                <th style="height:40px">Action</th>
                
              </tr>
            </thead>
            <tfoot class="table-active">
             <th style="height:40px">Item Image &nbsp;</th>
             <th style="height:40px">Item Name</th>
             <th style="height:40px">Category</th>
             <th style="height:40px">Item Price</th>
             <th style="height:40px">Status</th>
             <th style="height:40px">Action</th>

           </tfoot>
           
           <tbody>
             <?php
             while ($row = $result->fetch(PDO::FETCH_BOTH)) {
              $arr=array("item_category","cart","feedback");
              $item_id=$row['item_id'];
              $count=0;
              foreach ($arr as $v) {
               $count+=checkDelete($v,"item_id",$item_id);
               
             }
             $resultimage=$obitem->viewItemImage($item_id);
             $noi=$resultimage->rowCount();

             if ($noi) {
              $rowwall=$resultimage->fetchAll();
              foreach ($rowwall as $k => $v) {
                $im=$v['ii_name'];
              }
              $path='../images/item_images/'.$im;
            }else {
              $path='../images/bi.png';

            }


            ?>

            <tr>
             <td style="height:45px"><img src="<?php echo $path;?>" height="60px" width="80px"></td>


             <td style="height:45px"><?php echo $row['item_name']; ?></td>
             <td style="height:45px"><?php echo $row['cat_name']; ?></td>
             <td style="height:45px"><?php echo $row['item_price']; ?></td>
             <td style="height:45px"><?php echo $row['item_status']; ?></td>
             <td style="height:45px">
               <a href="../view/addaitemcategory.php?item_id=<?php echo $row ['item_id']; ?>">
                <button type="button" class="btn btn-mdb-color" data-toggle="tooltip" data-placement="top" title="View Item Details">Add</button>
              </a>


            </td>

          </tr>
        <?php } ?>


      </tbody>
    </table>