  <form method="post" action="../controller/paymentcontroller.php?action=add&order_id=<?php echo $order_id;?>&payment_id=<?php echo $payment_id;?>" enctype="multipart/form-data"  name="RegForm" onsubmit="return GEEKFORGEEKS()">
                   <input type="text" name="total_amount">
            <button type="submit" name="submit" class="btn btn-primary">Pay for the order</button>
   </form>