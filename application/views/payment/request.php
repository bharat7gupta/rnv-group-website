<!DOCTYPE html>
<html>
<head>
  <link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?=PAGE_TITLE?> - Processing Payment</title>
</head>
<body onload="document.frm1.submit()">


<?php
$mode = PAYMENT_MODE;
$appId = $mode == "PROD" ? PAYMENT_PROD_APP_ID : PAYMENT_TEST_APP_ID;
$secretKey = $mode == "PROD" ? PAYMENT_PROD_SECRET_KEY : PAYMENT_TEST_SECRET_KEY;

// Generate new order id
$newOrderIdQuery = $this->db->query('call GET_NEXT_ORDER_ID()');
$newOrderId = $newOrderIdQuery->row()->newOrderId;

$orderCurrency = 'INR';
$orderNote = 'Payment towards apps/services received from RNV Software Services';

$returnUrl = base_url('/payment/status');
$notifyUrl = base_url('/payment/notify');

extract($_POST);

$postData = array(
  "rnvAppId" => $rnvAppId,
  "rnvAppName" => $rnvAppName,
  "userEnteredKeyField" => $userEnteredKeyField,
  "userEnteredKeyValue" => $userEnteredKeyValue,

  "appId" => $appId,
  "orderId" => $newOrderId,
  "orderAmount" => $orderAmount,
  "orderCurrency" => $orderCurrency,
  "orderNote" => $orderNote,
  "customerName" => $customerName,
  "customerPhone" => $customerPhone,
  "customerEmail" => $customerEmail,
  "returnUrl" => $returnUrl,
  "notifyUrl" => $notifyUrl
);

ksort($postData);

$signatureData = "";

foreach ($postData as $key => $value){
    $signatureData .= $key.$value;
}

$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
$signature = base64_encode($signature);

if ($mode == "PROD") {
  $url = "https://www.cashfree.com/checkout/post/submit";
} else {
  $url = "https://test.cashfree.com/billpay/checkout/post/submit";
}

?>
  <form action="<?php echo $url; ?>" name="frm1" method="post">
      <p>Please wait.......</p>
      <input type="hidden" name="rnvAppId" value='<?php echo $rnvAppId; ?>'/>
      <input type="hidden" name="rnvAppName" value='<?php echo $rnvAppName; ?>'/>
      <input type="hidden" name="userEnteredKeyField" value='<?php echo $userEnteredKeyField; ?>'/>
      <input type="hidden" name="userEnteredKeyValue" value='<?php echo $userEnteredKeyValue; ?>'/>

      <input type="hidden" name="appId" value='<?php echo $appId; ?>'/>
      <input type="hidden" name="orderId" value='<?php echo $newOrderId; ?>'/>
      <input type="hidden" name="orderAmount" value='<?php echo $orderAmount; ?>'/>
      <input type="hidden" name="orderCurrency" value='<?php echo $orderCurrency; ?>'/>
      <input type="hidden" name="orderNote" value='<?php echo $orderNote; ?>'/>
      <input type="hidden" name="customerName" value='<?php echo $customerName; ?>'/>
      <input type="hidden" name="customerPhone" value='<?php echo $customerPhone; ?>'/>
      <input type="hidden" name="customerEmail" value='<?php echo $customerEmail; ?>'/>
      
      <input type ="hidden" name="returnUrl" value='<?php echo $returnUrl; ?>'/>
      <input type ="hidden" name="notifyUrl" value='<?php echo $notifyUrl; ?>'/>
      <input type="hidden" name="signature" value='<?php echo $signature; ?>'/>
  </form>
</body>
</html>
