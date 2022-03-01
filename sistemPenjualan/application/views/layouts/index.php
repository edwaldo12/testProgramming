<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('layouts/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php $this->load->view('layouts/navbar') ?>

		<?php $this->load->view('layouts/sidebar') ?>


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<?php
			isset($_view) ? $this->load->view($_view) : "";
			?>
		</div>
		<!-- /.content-wrapper -->
	</div>
	<!-- ./wrapper -->

	<?php $this->load->view('layouts/scripts') ?>
</body>

</html>