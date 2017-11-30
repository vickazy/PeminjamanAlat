<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Halaman <?php echo $this->session->userdata("jabatan"); ?></title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

	<!-- Styles -->
	<link href="<?php echo base_url('assets/css/core.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/apple-touch-icon.png'); ?>">
	<link rel="icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
</head>
<body>

	<!-- Preloader -->
	<div class="preloader">
		<div class="spinner-dots">
			<span class="dot1"></span>
			<span class="dot2"></span>
			<span class="dot3"></span>
		</div>
	</div>

	<!-- Sidebar -->
		<?php
			if ($this->session->userdata("jabatan") == "Admin") {
				$this->load->view("Layout/menuAdmin");
			} else {
				$this->load->view("Layout/menuPetugas");
			}
		?>
	<!-- END Sidebar -->

	<!-- Topbar -->
		<?php $this->load->view('Layout/topbar'); ?>
	<!-- END Topbar -->

	<!-- Main container -->
	<main>
		<div class="main-content">

			<div class="card">
				<h4 class="card-title">Halaman Utama</h4>

				<div class="card-body">
					<?php echo $contentnya; ?>
				</div>
			</div>

		</div><!--/.main-content -->

		<!-- Footer -->
			<?php echo $footernya; ?>
		<!-- END Footer -->
	</main>
	<!-- END Main container -->

    <!-- Scripts -->
	<script src="<?php echo base_url('assets/js/core.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.min.js'); ?>"></script>

</body>
</html>