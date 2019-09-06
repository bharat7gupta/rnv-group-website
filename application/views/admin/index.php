<?php echo link_tag('assets/css/lib/google-font.css') ?>
<?php echo link_tag('assets/css/lib/bootstrap.min.css') ?>
<?php echo link_tag('assets/css/common.css') ?>
<?php echo link_tag('assets/css/admin.css') ?>

<link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?php echo PAGE_TITLE_ADMIN ?></title>

<div class="container">
	<div id="account" class="row">
		<div class="col-md-12">
			<form id="login-form" class="form login-form" action="" method="post">
				<h3 class="text-center text-info">Login</h3>
				<div class="form-error"></div>
				<div class="form-group">
					<label for="username" class="text-info">Email ID:</label><br>
					<input type="text" name="email" id="email" class="form-control" data-rule="email" data-msg="Please enter a valid email">
					<div class="validation"></div>
				</div>
				<div class="form-group">
					<label for="password" class="text-info">Password:</label><br>
					<input type="password" name="password" id="password" class="form-control" data-rule="required" data-msg="Please enter a password">
					<div class="validation"></div>
				</div>
				<div class="form-group">
					<div id="login-captcha-container">
						<div id="login-captcha" class="g-recaptcha"></div>
						<div class="validation"></div>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
				</div>
				<div id="register-link">
					Don't have an admin account? 
					<a href="<?php echo base_url('admin/register') ?>" class="text-info">Register here</a>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('footer') ?>

<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/formUtils.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/login-form.js') ?>"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onReCaptchaLoadCallback&render=explicit" async defer></script>
