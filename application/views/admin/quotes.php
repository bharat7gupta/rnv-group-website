<?php

	$query = $this->db->query('select `name`, `emailID`, `phone`, `company`, `website`, `enquiryType`, `enquiry`, `quoteDateTime` from user_quotes order by quoteDateTime desc;');

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

<div id="quotes" class="container box">
	<div class="header">
		<h3 class="text-info">Quotes</h3>
	</div>

	<div class="row">
		<div class="col-md-12">
				<?php 
					foreach($query->result() as $row) {
				?>
					<div class="user-message">
						<div class="message-field-container">

						<div class="message-field row">
							<div class="message-field-name col-md-2">Quote Asked By:</div>
							<div class="message-field-value col-md-10"><?= $row->name ?></div>
						</div>

						<div class="message-field row">
							<div class="message-field-name col-md-2">Enquiry Type:</div>
							<div class="message-field-value col-md-10"><?= $row->enquiryType ?></div>
						</div>

						<div class="message-field row">
							<div class="message-field-name col-md-2">Quote Date Time:</div>
							<div class="message-field-value col-md-10"><?= $row->quoteDateTime ?></div>
						</div>

						<div class="message-field row">
							<div class="message-field-name col-md-2">Email ID:</div>
							<div class="message-field-value col-md-10"><?= $row->emailID ?></div>
						</div>

						<div class="message-field row">
							<div class="message-field-name col-md-2">Phone Number: </div>
							<div class="message-field-value col-md-10"><?= $row->phone ?></div>
						</div>

						<div class="message-field row">
							<div class="message-field-name col-md-2">Company:</div>
							<div class="message-field-value col-md-10"><?= $row->company ?></div>
						</div>

						<div class="message-field row">
							<div class="message-field-name col-md-2">Website: </div>
							<div class="message-field-value col-md-10"><?= $row->website ?></div>
						</div>

						</div>

						<br/>
						<div class="row" style="padding-left: 15px;">
							<h5 class="col-md-12">Enquiry:</h5>
						</div>

						<div class="row" style="padding-left: 15px;">
							<pre class="col-md-12"><?= $row->enquiry ?></pre>
						</div>

					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer') ?>