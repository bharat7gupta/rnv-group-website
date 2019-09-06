<?php

	$query = $this->db->query('select `SN`, `name`, `type`, `description`, `fullDescription`, `imageFileName`, `brochureFileName` from portfolio order by orderSqNo');

?>

<?php echo link_tag('assets/css/lib/font-awesome/css/font-awesome.min.css') ?>
<?php echo link_tag('assets/css/lib/google-font.css') ?>
<?php echo link_tag('assets/css/lib/bootstrap.min.css') ?>
<?php echo link_tag('assets/css/style.css') ?>
<?php echo link_tag('assets/css/common.css') ?>

<link href="<?php echo base_url('/favicon.ico') ?>" rel="shortcut icon">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?=PAGE_TITLE?> - Products</title>

<div class="container" style="margin: 30px auto;">
	<div class="row">
		<div class="col-md-12" style="display: flex; justify-content: space-between;">
			<a href="<?php echo base_url('/') ?>">
				<img src="<?php echo base_url('assets/img/logo-dark.png') ?>" alt="RNV logo" width="60" style="margin: -15px 0 15px;" />
			</a>

			<h3 style="margin-left: 40px;">Products</h3>

			<a href="<?php echo base_url('/') ?>">
				<button type="button" class="btn btn-primary">
					Go to Home
				</button>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">

		<?php 
			foreach($query->result() as $row) {
		?>
			<div class="card" id="<?=$row->SN?>" style="margin-bottom: 30px;">
				<div class="card-header font-weight-bold">
					<?=$row->name?>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="image col-md-2">
							<img src="<?php echo base_url('assets/img/portfolio/'.$row->imageFileName) ?>" class="img-fluid" alt="<?=$row->name?>">
						</div>
						<div class="content col-md-10">
							<h5 class="card-title"><?=$row->description?></h5>
							<p class="card-text"><?=$row->fullDescription?></p>
						</div>
					</div>
				</div>

				<?php if($row->brochureFileName) { ?>
					<div class="card-footer text-center">
						<a href="<?php echo base_url('assets/brochures/'.$row->brochureFileName) ?>">
							<button class="btn btn-link">Download Brochure</button>
						</a>
					</div>
				<?php } ?>
			</div>
		
		<?php
			}
		?>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/lib/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/popper.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/lib/bootstrap.min.js') ?>"></script>	
<script type="text/javascript" src="<?php echo base_url('assets/js/common.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/custom.js') ?>"></script>
