<?php
session_start();
if($_SESSION["pay"]=="")
{

    ?>
    <script type="text/javascript">
        window.location="../view/cart1.php";
    </script>

    <?php }
$_SESSION["paypalphp"]="yes";

?>
<h1>Please wait we are transferring you in paypal....</h1>
<?php

$paypal_url = 'https://www.sandbox.paypal.com/';
$pay=$_SESSION["fullamount"];


function convertCurrency($from, $to, $amount){
$url = file_get_contents('https://free.currencyconverterapi.com/api/v5/convert?q=' . $from . '_' . $to . '&compact=ultra');
$json = json_decode($url, true);
$rate = implode(" ",$json);
$total = $rate * $amount;
$rounded = round($total); //optional, rounds to a whole number
return $total; //or return $rounded if you kept the rounding bit from above
}
$usdtot=convertCurrency("lkr", "USD",$pay);
$result = preg_replace("/[^0-9][.]/", "", $usdtot);

?>
<form action="<?php echo $paypal_url;?>/cgi-bin/webscr" method="post" name="buyCredits" id="buyCredits">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="testing1995@gmail.com"> <!-- type business account email -->
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="item_name" value="payment for testing">
    <input type="hidden" name="item_number" value="1212">
    <input type="hidden" name="amount" value="<?php echo $result; ?>">
    <input type="hidden" name="return" value="http://localhost/my/website/view/payment_success.php"> <!-- Rediretion after the payment is success -->
</form>
<script type="text/javascript">
    document.getElementById("buyCredits").submit();
</script>