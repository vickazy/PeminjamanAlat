		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Data Petugas/Guru Jurusan <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link" href="<?php echo base_url('master/Petugas'); ?>">Lihat Data</a>
					<a class="nav-link active" href="<?php echo base_url('master/Petugas/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="col-12">
				<form action="<?php echo base_url('master/Petugas/tambah'); ?>" class="card form-type-material" method="post" data-provide="validation">
					<h4 class="card-title"><strong>Tambah Petugas</strong></h4>

					<div class="card-body row">

						<div class="col-md-6">
							<div class="form-group">
								<label>ID Petugas</label>
								<input class="form-control" type="text" name="id_petugas" value="<?php echo $kode; ?>" readonly>
							</div>

							<div class="form-group">
								<label class="required">Nama Lengkap</label>
								<input class="form-control" type="text" name="nama_petugas" required>
							</div>

							<div class="form-group">
								<label>No. HP</label>
								<input type="text" class="form-control" data-format="+62 {{999}}-{{9999}}-{{9999}}" name="no_hp">
							</div>

							<div class="col">
								<label class="required">Jenis Kelamin</label>

								<div class="custom-controls-stacked form-group">
									<label class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="jk" value="L" required>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Laki-Laki</span>
									</label>

									<label class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" name="jk" value="P" required>
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description">Perempuan</span>
									</label>
								</div>
							</div>

							<div class="form-group">
								<label class="required">Tempat Lahir</label>
								<input class="form-control" type="text" name="tmpt_lahir" required>
							</div>

							<div class="input-group">
								<div class="input-group-input">
									<input type="text" class="form-control" name="tgl_lahir" aria-describedby="basic-addon1" data-provide="datepicker" data-date-format="yyyy-mm-dd">
									<label>Tanggal Lahir</label>
								</div>
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
							</div>
						</div>


						<div class="col-md-6">
							<div class="form-group">
								<label class="required">Nama Pengguna</label>
								<input class="form-control" type="text" name="username" id="username" required>
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

							<div class="form-group">
								<textarea name="alamat" class="form-control" rows="6"></textarea>
								<label>Alamat</label>
							</div>

							<div class="form-group form-type-material">
								<select class="form-control show-tick" name="jabatan" data-provide="selectpicker">
									<option value="Admin">Admin</option>
									<option value="Petugas">Petugas</option>
								</select>

								<label>Jabatan</label>
							</div>
						</div>
					</div>

					<footer class="card-footer text-right">
						<button class="btn btn-secondary" type="reset">Batal</button>
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
					</footer>
				</form>
			</div>
		</div>