<!-- Admin Menu -->
<nav>
	<ul class="admin-menu">
		<li><a href="<?php echo base_url() ?>">Home</a></li>
		<li><a href="<?php echo base_url('jobs') ?>">Jobs</a></li>
		<li><a href="<?php echo base_url('payment') ?>">Payments</a></li>
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
