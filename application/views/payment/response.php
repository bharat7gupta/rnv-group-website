<!DOCTYPE html>
<html>
<head>
<link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">
	<title><?=PAGE_TITLE?> - Payment Gateway Response Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php echo link_tag('assets/css/lib/bootstrap.min.css') ?>
	<?php echo link_tag('assets/css/common.css') ?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lib/bootstrap.min.js') ?>"></script>
</head>
<body style="margin-top: 30px;">
	<h1 align="center">Payment Gateway Response</h1>
	<br>

	<?php
		 $mode = PAYMENT_MODE;
		 $secretkey = $mode == "PROD" ? PAYMENT_PROD_SECRET_KEY : PAYMENT_TEST_SECRET_KEY;
		 $orderId = $_POST["orderId"];
		 $orderAmount = $_POST["orderAmount"];
		 $referenceId = $_POST["referenceId"];
		 $txStatus = $_POST["txStatus"];
		 $paymentMode = $_POST["paymentMode"];
		 $txMsg = $_POST["txMsg"];
		 $txTime = $_POST["txTime"];
		 $signature = $_POST["signature"];
		 $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
		 $hash_hmac = hash_hmac('sha256', $data, $secretkey, true);
		 $computedSignature = base64_encode($hash_hmac);
		 if ($signature == $computedSignature) {
	 ?>
	<div class="container"> 
	<div class="panel panel-success">
	  <div class="panel-heading alert <?php echo $txStatus=='SUCCESS' ? 'alert-success' : 'alert-info' ?>">Payment Successful</div>
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
			      <tr>
			        <td>Order ID</td>
			        <td><?php echo $orderId; ?></td>
			      </tr>
			      <tr>
			        <td>Order Amount</td>
			        <td><?=RUPEE_SYMBOL?><?php echo $orderAmount; ?></td>
			      </tr>
			      <tr>
			        <td>Reference ID</td>
			        <td><?php echo $referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Status</td>
			        <td><?php echo $txStatus; ?></td>
			      </tr>
			      <tr>
			        <td>Payment Mode </td>
			        <td><?php echo $paymentMode; ?></td>
			      </tr>
			      <tr>
			        <td>Message</td>
			        <td><?php echo $txMsg; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Time</td>
			        <td><?php echo $txTime; ?></td>
			      </tr>
			    </tbody>
			</table>
		<!-- </div> -->

	   </div>
	</div>
	</div>
	 <?php   
	  	} else {
	 
	 ?>
	<div class="container"> 
	<div class="panel panel-danger">
	  <div class="panel-heading alert alert-warning">Payment to be verified. We will get back to you.</div>
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
			      <tr>
			        <td>Order ID</td>
			        <td><?php echo $orderId; ?></td>
			      </tr>
			      <tr>
			        <td>Order Amount</td>
			        <td><?=RUPEE_SYMBOL?><?php echo $orderAmount; ?></td>
			      </tr>
			      <tr>
			        <td>Reference ID</td>
			        <td><?php echo $referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Status</td>
			        <td><?php echo $txStatus; ?></td>
			      </tr>
			      <tr>
			        <td>Payment Mode </td>
			        <td><?php echo $paymentMode; ?></td>
			      </tr>
			      <tr>
			        <td>Message</td>
			        <td><?php echo $txMsg; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Time</td>
			        <td><?php echo $txTime; ?></td>
			      </tr>
			    </tbody>
			</table>
		<!-- </div> -->
	  </div>	
	</div>	
	</div>
	
	<?php	
	 	}
	 ?>


			<div class="row payment-success-actions" style="margin-top: 100px;">

		 		<a href="<?php echo base_url('/'); ?>">
					<button type="button" class="btn btn-primary">Go to Home</button>
				</a>

				<button type="button" class="btn btn-info" style="margin-left: 20px;" onClick="window.print();">Print Receipt</button>

			</div>

		 	<div class="row payment-success-actions" style="margin-top: 20px;">
				<a href="<?php echo base_url('/payment'); ?>" style="margin-left: 10px;">
					<button type="button" class="btn btn-link">Make another payment</button>
				</a>
			</div>
</body>
</html>



