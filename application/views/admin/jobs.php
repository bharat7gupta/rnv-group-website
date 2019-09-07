<?php

	$query = $this->db->query('select `jobID`, `jobTitle`, `skillset`, `experience`, `jobDescription`, `createDateTime` from jobs order by createDateTime desc;');

?>

<?php echo link_tag('assets/css/lib/font-awesome/css/font-awesome.min.css') ?>
<?php echo link_tag('assets/css/lib/google-font.css') ?>
<?php echo link_tag('assets/css/lib/bootstrap.min.css') ?>
<?php echo link_tag('assets/css/common.css') ?>
<?php echo link_tag('assets/css/admin.css') ?>

<meta content="width=device-width, initial-scale=1.0" name="viewport">
<link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">
<title><?php echo PAGE_TITLE_ADMIN ?> - Jobs</title>

<div class="container box">
	<div class="row">
		<?php $this->load->view('admin/admin-menu.php') ?>
	</div>
</div>

<div id="jobs" class="container box">
	<div class="header">
		<h3 class="text-center text-info">Jobs</h3>
		<?php 
			if ($this->session->IS_ADMIN) { 
		?>
				<button id="new-job-button" type="button" style="border-color: #03C4EB; background: #03C4EB"
					class="btn btn-primary btn-lg btn-theme-colored btn-flat"
				>
					Post a new Job
				</button>
		<?php
			}
		?>
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php 
				foreach($query->result() as $row) {
			?>
				<div class="job">
					<div class="job-field-container">

						<div class="job-field row job-id">
							<div class="job-field-name col-md-3">Job ID:</div>
							<div class="job-field-value col-md-9"><?= $row->jobID ?></div>
						</div>

						<div class="job-field row job-title">
							<div class="job-field-name col-md-3">Job Title:</div>
							<div class="job-field-value col-md-9"><?= $row->jobTitle ?></div>
						</div>

						<div class="job-field row skillset">
							<div class="job-field-name col-md-3">Skillset:</div>
							<div class="job-field-value col-md-9"><?= $row->skillset ?></div>
						</div>

						<div class="job-field row experience">
							<div class="job-field-name col-md-3">Experience Required:</div>
							<div class="job-field-value col-md-9"><?= $row->experience ?></div>
						</div>

						<div class="job-field row">
							<div class="job-field-name col-md-3">Job Posted Date Time:</div>
							<div class="job-field-value col-md-9"><?= $row->createDateTime ?></div>
						</div>

					</div>

					<br/>
					<div class="row" style="padding-left: 15px;">
						<h5 class="col-md-12">Job Description:</h5>
					</div>

					<div class="row" style="padding-left: 15px;">
						<pre class="col-md-12 job-description"><?= $row->jobDescription ?></pre>
					</div>

					<?php 
						if ($this->session->IS_ADMIN) { 
					?>
						<div class="actions">
							<i title="Edit Job" class="fa fa-pencil fa-lg edit" data-job-id="<?= $row->jobID ?>"></i>
							<i title="Delete Job" class="fa fa-trash fa-lg delete" data-job-id="<?= $row->jobID ?>"></i>
						</div>
					<?php
						}
					?>

				</div>
			<?php
				}
			?>
		</div>
	</div>
</div>

<?php $this->load->view('footer') ?>

<!-- Create Job Modal -->
<div class="modal fade" id="jobModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Post a New Job</h4>
			</div>
			<div class="modal-body">
				<form id="jobForm" class="form jobForm" name="jobForm" novalidate="novalidate">
					<div class="form-error"></div>
					<div class="form-box">

						<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">

							<label>Job Title</label>
							<input id="job-title" name="job-title" class="form-control" placeholder="Enter Job Title" data-rule="required" data-msg="Please enter some job title">
							<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Skillset Required <small>(comma separated)</small></label>
							<input id="skillset" name="skillset" class="form-control" placeholder="Enter Skillset Required" data-rule="required" data-msg="Please enter required skillset">
							<div class="validation"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Experience <small>(in years)</small></label>
							<input id="experience" name="experience" class="form-control" placeholder="Enter Experience" data-rule="required" data-msg="Please enter experience">
							<div class="validation"></div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
							<label>Job Description</label>
							<textarea id="job-description" name="job-description" class="form-control required" rows="5" placeholder="Enter Job Description" data-rule="required" data-msg="Please write job description"></textarea>
							<div class="validation"></div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<button type="submit" id="job-submit" style="border-color: #03C4EB; background: #03C4EB" class="btn btn-primary btn-lg btn-theme-colored btn-flat">
								Post Job
							</button>
						</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/popper.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/bootstrap.min.js') ?>"></script>	
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/formUtils.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/post-job-form.js') ?>"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onReCaptchaLoadCallback&render=explicit" async defer></script>
