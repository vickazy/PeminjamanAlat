<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Halaman Masuk</title>

	<!-- Fonts -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet"> -->

	<!-- Styles -->
	<link href="<?php echo base_url('assets/css/core.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="<?php echo base_url('assets/img/apple-touch-icon.png'); ?>">
	<link rel="icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
</head>
<body <?php if($this->session->flashdata('cekLogin')){ echo $this->session->flashdata('cekLogin'); }?>>

	<!-- Preloader -->
	<div class="preloader">
		<div class="spinner-dots">
			<span class="dot1"></span>
			<span class="dot2"></span>
			<span class="dot3"></span>
		</div>
	</div>

	<div class="row min-h-fullscreen center-vh p-20 m-0">
		<div class="col-12">
			<div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">
				<h5 class="text-uppercase">Masuk</h5>
				<br>
				<form action="<?php echo base_url('login/aksi_login'); ?>" method="post" class="form-type-material" data-provide="validation">
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" required>
						<label for="username">Nama Pengguna / NIS / NISN</label>
					</div>

					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" required>
						<label for="password">Kata Sandi</label>
					</div>

					<div class="form-group flexbox flex-column flex-md-row">
						<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" checked>
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Ingat Saya</span>
						</label>

						<a class="text-muted hover-primary fs-13 mt-2 mt-md-0" href="#">Lupa Kata Sandi?</a>
					</div>

					<div class="form-group">
						<button class="btn btn-bold btn-block btn-primary" type="submit">Masuk</button>
					</div>
				</form>
			</div>

			<p class="text-center text-muted fs-13 mt-20">Siswa Tidak Mempunyai Akun? <a class="text-primary fw-500" href="<?php echo base_url('master/Siswa/Daftar') ?>">Daftar Disini</a></p>
		</div>

		<footer class="col-12 align-self-end text-center fs-13">
			<p class="mb-0"><small>Copyright © <?php echo date("Y"); ?> <a href="<?php echo base_url(); ?>">Animasi SMKN 2 Cimahi</a>. All rights reserved.</small></p>
		</footer>
	</div>

	<!-- Scripts -->
	<script src="<?php echo base_url('assets/js/core.min.js'); ?>" data-provide="sweetalert"></script>
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.min.js'); ?>"></script>

	<script type="text/javascript">
		function flashData(data) {
			var text = '';
			var title = '';
			var type = '';

			if (data == 1){
				title = 'Kata Pengguna / Kata Sandi';
				text = 'Kata Pengguna / Kata Sandi Yang Anda Masukan Salah.';
				type = 'warning';
			} else if(data == 2){
				title = 'Warning!';
				text = 'Anda Belum Login.';
				type = 'warning';
			} else if (data == 3){
				title = 'Berhasil!';
				text = 'Akun Anda Berhasil dibuat.';
				type = 'success';
			}

			swal({
				title: title,
				text: text,
				type: type,
				timer: 3000
			})
		}
	</script>

</body>
</html>