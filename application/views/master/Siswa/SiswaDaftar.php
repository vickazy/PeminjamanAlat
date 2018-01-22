<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Halaman Daftar</title>

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
<body>

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
			<div class="card card-shadowed px-50 py-30 w-800px mx-auto" style="max-width: 100%">
				<h5 class="text-uppercase">Daftar</h5>
				<br>
				<form action="<?php echo base_url('master/Siswa/Daftar'); ?>" method="post" class="form-type-material" data-provide="validation">
					<div class="card-body row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="nis" name="nis" required>
								<label class="required" for="nis">NIS / NISN</label>
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="nama" name="nama" required>
								<label class="required" for="nama">Nama Lengkap</label>
							</div>

							<div class="form-group">
								<input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
								<label class="required" for="nama_ortu">Nama Orang Tua</label>
							</div>

							<div class="form-group">
								<label class="required">No. HP</label>
								<input type="text" class="form-control" data-format="+62{{999}}-{{9999}}-{{9999}}" name="no_hp" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group form-type-material">
								<select class="form-control show-tick" name="kelas" data-provide="selectpicker" data-live-search="true">
									<?php
										foreach($kelas as $kls){
									?>
										<option value="<?php echo $kls->id_kelas ?>"><?php echo $kls->nama_kelas ?></option>
									<?php
										}
									?>
								</select>

								<label class="label-floated required">Kelas</label>
							</div>

							<div class="form-group">
								<label class="required">Kata Sandi</label>
								<input class="form-control" id="input-pass" type="password" name="password1" data-minlength="6" data-error="Kata Sandi Minimal 6 Huruf." required>
								<div class="invalid-feedback"></div>
							</div>

							<div class="form-group">
								<label class="required">Kata Sandi (Ulang)</label>
								<input class="form-control" id="input-pass-confirm" data-match="#input-pass" data-error="Kata Sandi Tidak Sesuai." type="password" name="password2" required>
								<div class="invalid-feedback"></div>
							</div>

						</div>

					</div>

					<div class="form-group flexbox flex-column flex-md-row">
						<label class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" required>
							<span class="custom-control-indicator"></span>
							<span class="custom-control-description">Saya Setuju dengan <a class="text-primary" href="#">Persyaratan</a> yang Berlaku.</span>
						</label>
					</div>


					<div class="form-group">
						<input class="btn btn-bold btn-block btn-primary" type="submit" name="submit" value="Daftar Akun">
					</div>
				</form>
			</div>

			<p class="text-center text-muted fs-13 mt-20">Siswa Sudah Mempunyai Akun? <a class="text-primary fw-500" href="<?php echo base_url('login') ?>">Masuk Disini</a></p>
		</div>

		<footer class="col-12 align-self-end text-center fs-13">
			<p class="mb-0"><small>Copyright © <?php echo date("Y"); ?> <a href="<?php echo base_url(); ?>">Animasi SMKN 2 Cimahi</a>. All rights reserved.</small></p>
		</footer>
	</div>

	<!-- Scripts -->
	<script src="<?php echo base_url('assets/js/core.min.js'); ?>" data-provide="sweetalert"></script>
	<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/script.min.js'); ?>"></script>

</body>
</html>