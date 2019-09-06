<!-- Side Nav Section -->
<nav id="nav-menu-container">
	<ul class="nav-menu">
		<li class="menu-active"><a href="#hero">Home</a></li>
		<li><a href="#about">About Us</a></li>
		<li><a href="#services">Services</a></li>
		<li><a href="#portfolio">Portfolio</a></li>
		<li><a href="#testimonials">Testimonials</a></li>
		<li><a href="#team">Team</a></li>
		<li><a href="<?php echo base_url('jobs') ?>">Jobs</a></li>
		<li><a href="<?php echo base_url('payment') ?>">Payments</a></li>
		<li><a href="#contact">Contact Us</a></li>
		<?php
			if ($this->session->IS_ADMIN) {
		?>
				<li><a href="<?php echo base_url('admin/messages') ?>">Messages</a></li>
				<li><a href="<?php echo base_url('admin/quotes') ?>">Quotes</a></li>
				<li><a href="<?php echo base_url('admin/logout') ?>">Logout</a></li>
		<?php
			}
		?>
	</ul>
</nav>
