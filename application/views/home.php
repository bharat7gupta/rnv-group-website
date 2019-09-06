<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo PAGE_TITLE ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="RNV Group" name="keywords">
	<meta content="RNV Group Website" name="description">
	<!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
	<meta property="og:title" content="">
	<meta property="og:image" content="">
	<meta property="og:url" content="">
	<meta property="og:site_name" content="">
	<meta property="og:description" content="">
	<!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:image" content="">

	<link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">

	<?php echo link_tag('assets/css/lib/google-font.css') ?>
	<?php echo link_tag('assets/css/lib/bootstrap.min.css') ?>
	<?php echo link_tag('assets/css/lib/ionicons/css/ionicons.min.css') ?>
	<?php echo link_tag('assets/css/lib/font-awesome/css/font-awesome.min.css') ?>
	<?php echo link_tag('assets/css/common.css') ?>
	<?php echo link_tag('assets/css/style.css') ?>

</head>

<body>
	<div id="preloader"></div>

	<?php $this->load->view('header') ?>
	<?php $this->load->view('social-icons') ?>
	<?php $this->load->view('home-main') ?>
	<?php $this->load->view('about-us') ?>
	<?php $this->load->view('portfolio') ?>
	<?php $this->load->view('services') ?>
	<?php $this->load->view('subscribe') ?>
	<?php $this->load->view('testimonials') ?>
	<?php $this->load->view('team') ?>
	<?php $this->load->view('contact') ?>
	<?php $this->load->view('get-quote') ?>
	<?php $this->load->view('footer') ?>

	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

	<!-- Required JavaScript Libraries -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lib/popper.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lib/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/lib/isotope.pkgd.min.js') ?>"></script>

	<!-- Template Specisifc Custom Javascript File -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/common.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/formUtils.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/contact-form.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/quote-form.js') ?>"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onReCaptchaLoadCallback&render=explicit" async defer></script>

</body>

</html>
