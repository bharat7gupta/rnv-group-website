<?php

	$query = $this->db->query('select `SN`, `name`, `type`, `description`, `imageFileName`, `link` from portfolio order by orderSqNo limit 6;');

?>

<!--==========================
    Portfolio Section
============================-->
<section id="portfolio"  class="section-bg" >
	<div class="container">
		<header class="section-header">
			<h3 class="section-title">Our Portfolio</h3>
			<div class="section-title-divider"></div>
		</header>
		<div class="row">
			<div class="col-lg-12">
				<ul id="portfolio-flters">
				<li data-filter="*" class="filter-active">All</li>
				<li data-filter=".filter-app">App</li>
				<li data-filter=".filter-web">Web</li>
				</ul>
			</div>
		</div>

		<div class="row portfolio-container">

			<?php 
				foreach($query->result() as $row) {
			?>
					<div class="col-lg-4 col-md-6 portfolio-item filter-<?=$row->type ?> wow fadeInUp">
						<div class="portfolio-wrap">
						<figure>
							<img src="<?php echo base_url('assets/img/portfolio/'.$row->imageFileName) ?>" class="img-fluid" alt="<?=$row->name?>">
							<a href="<?php echo base_url('products/#'.$row->SN) ?>" class="link-details" title="More Details">
								<i class="ion ion-android-open"></i>
							</a>
						</figure>
						<div class="portfolio-info">
							<div class="icon">
								<a href='<?php echo base_url('products/#'.$row->SN) ?>'>
									<i class="ion-ios-eye-outline"></i>
								</a>
							</div>
							<h4><a href="<?php echo base_url('products/#'.$row->SN) ?>"><?=$row->name ?></a></h4>
							<p><?=$row->description ?></p>
						</div>
						</div>
					</div>
			<?php
				}
			?>

		</div>

		<div class="row view-all-products">
			<a href="<?php echo base_url('products') ?>">
				<button type="button" class="btn btn-light">View All Products</button>
			</a>
		</div>
	</div>
</section>
