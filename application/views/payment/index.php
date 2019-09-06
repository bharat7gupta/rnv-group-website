
<?php echo link_tag('assets/css/lib/google-font.css') ?>
<?php echo link_tag('assets/css/lib/bootstrap.min.css') ?>
<?php echo link_tag('assets/css/lib/ionicons/css/ionicons.min.css') ?>
<?php echo link_tag('assets/css/lib/font-awesome/css/font-awesome.min.css') ?>
<?php echo link_tag('assets/css/common.css') ?>
<?php echo link_tag('assets/css/style.css') ?>

<link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?php echo PAGE_TITLE ?> - Payment</title>

<?php
	// Get list of apps/services
	$queryAllAppsAndServices = $this->db->query('select `id`, `name` from apps_and_services order by name;');
?>

<?php $selectedAppId = $this->input->post_get('application-to-pay-for'); ?>
<?php $userKeyFieldValue = $this->input->post_get('key-field-value'); ?>

<div id="payments">
		<div class="container">

			<form id="paymentForm" class="form paymentForm" name="paymentForm" novalidate="novalidate" method="post">

			<!-- App Select Row -->
			<div class="row" style="margin-top: 20px;">
				<div class="col-md-5">
					<label>
						<div class="text">Select Application:</div>
						<sub class="sub-label">(application/service you want to pay for)</sub>
					</label>
				</div>

				<div class="col-md-7">
					<div class="form-group">
						<select id="application-to-pay-for" name="application-to-pay-for" class="form-control">
							<option value="">Select Application</option>
							<?php 
								foreach($queryAllAppsAndServices->result() as $app) {
							?>
								<option value="<?=$app->id ?>" <? echo $app->id == $selectedAppId ? 'selected': '' ?>><?=$app->name ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
			</div>

			<?php
				if($selectedAppId) {

					$querySelectedAppDetails = $this->db->query("select `id`, `name`, `keyField`, `keyFieldDisplayName`, `keyFieldExampleValue`, `otherFields`, `otherFieldsDisplayNames`, `amountField` from apps_and_services where id='".$selectedAppId."'");
					$querySelectedAppDetailsRow = $querySelectedAppDetails->row();
					$keyField = $querySelectedAppDetailsRow->keyField;
					$keyFieldDisplayName = $querySelectedAppDetailsRow->keyFieldDisplayName;
					$keyFieldExampleValue = $querySelectedAppDetailsRow->keyFieldExampleValue;

			?>
					<div class="row">
						<div class="col-md-5">
							<label>
								<div class="text">Enter <?=$keyFieldDisplayName ?>:</div>
								<sub class="sub-label">(Example: <?=$keyFieldExampleValue ?>)</sub>
							</label>
						</div>

						<div class="col-md-7">
							<div class="form-group">
								<div class="input-group">
									<input id="key-field-value" name="key-field-value" class="form-control" value="<?= $userKeyFieldValue ?>"/>
									<div id="key-field-value-check" class="input-group-append" style="cursor: pointer;" data-field-name="<?=$keyFieldDisplayName ?>">
										<span class="input-group-text">Check</span>
									</div>
								</div>
							</div>
						</div>
					</div>
			</form>

				<?php

					if ($userKeyFieldValue) {
						$selectedAppName = $querySelectedAppDetails->row()->name;
						$customerName = 'Krishna';
						$customerEmail = 'krishna@brindavan.com';
						$customerPhone = '8105479727';
						$amountToPay = 500;
				?>

						<form method="post" action="<?php echo base_url('payment/request'); ?>">
							<!-- TODO:  Use `HttpClient` to get all fields to be displayed -->
							<br>
							<h4>Check your details below and confirm payment.</h4>
							<div class="user-info-fields">
								<div class="row field">
									<div class="field-name col-md-3">User ID:</div>
									<div class="field-value col-md-9">101</div>
								</div>

								<div class="row field">
									<div class="field-name col-md-3">User Name:</div>
									<div class="field-value col-md-9">Krishna</div>
								</div>

								<div class="row field">
									<div class="field-name col-md-3">Amount To Pay:</div>
									<div class="field-value col-md-9"><?=RUPEE_SYMBOL?> <?=$amountToPay?></div>
								</div>
							</div>

							<div class="row payment-row">
								<button class="btn btn-primary text-center">Make Payment</button>
							</div>

							<input type="hidden" name="rnvAppId" value='<?php echo $selectedAppId; ?>'/>
							<input type="hidden" name="rnvAppName" value='<?php echo $selectedAppName; ?>'/>
							<input type="hidden" name="userEnteredKeyField" value='<?php echo $userKeyFieldValue; ?>'/>
							<input type="hidden" name="userEnteredKeyValue" value='<?php echo $userKeyFieldValue; ?>'/>

							<input type="hidden" name="customerName" value='<?php echo $customerName; ?>'/>
							<input type="hidden" name="customerEmail" value='<?php echo $customerEmail; ?>'/>
							<input type="hidden" name="customerPhone" value='<?php echo $customerPhone; ?>'/>
							<input type="hidden" name="orderAmount" value='<?php echo $amountToPay; ?>'/>
						</form>
			<?php 
					}
				} 
			?>
		</div>
	</form>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/payment-form.js') ?>"></script>
