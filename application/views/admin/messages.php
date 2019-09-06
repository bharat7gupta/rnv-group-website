<?php

	$query = $this->db->query('select `name`, `emailID`, `mobileNumber`, `subject`, `message`, `messageDateTime` from user_messages order by messageDateTime desc;');

?>

<?php echo link_tag('assets/css/lib/google-font.css') ?>
<?php echo link_tag('assets/css/lib/bootstrap.min.css') ?>
<?php echo link_tag('assets/css/common.css') ?>
<?php echo link_tag('assets/css/admin.css') ?>

<link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?php echo PAGE_TITLE_ADMIN ?></title>

<div class="container box">
	<div class="row">
		<?php $this->load->view('admin/admin-menu.php') ?>
	</div>
</div>

<div id="messages" class="container box">
	<div class="header">
		<h3 class="text-center text-info">Messages</h3>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php 
				foreach($query->result() as $row) {
			?>
				<div class="user-message">
					<div class="message-field-container">

					<div class="message-field row">
						<div class="message-field-name col-md-2">Message From:</div>
						<div class="message-field-value col-md-10"><?= $row->name ?></div>
					</div>

					<div class="message-field row">
						<div class="message-field-name col-md-2">Subject:</div>
						<div class="message-field-value col-md-10"><?= $row->subject ?></div>
					</div>

					<div class="message-field row">
						<div class="message-field-name col-md-2">Sent Date Time:</div>
						<div class="message-field-value col-md-10"><?= $row->messageDateTime ?></div>
					</div>

					<div class="message-field row">
						<div class="message-field-name col-md-2">Email ID:</div>
						<div class="message-field-value col-md-10"><?= $row->emailID ?></div>
					</div>

					<div class="message-field row">
						<div class="message-field-name col-md-2">Mobile Number: </div>
						<div class="message-field-value col-md-10"><?= $row->mobileNumber ?></div>
					</div>

					</div>

					<br/>
					<div class="row" style="padding-left: 15px;">
						<h5 class="col-md-12">Message:</h5>
					</div>

					<div class="row" style="padding-left: 15px;">
						<pre class="col-md-12"><?= $row->message ?></pre>
					</div>

				</div>
			<?php
				}
			?>
		</div>
	</div>
</div>

<?php $this->load->view('footer') ?>