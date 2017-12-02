		<header class="header bg-ui-general">
			<div class="header-info">
				<h1 class="header-title">
					Data Alat Jurusan <strong>Animasi SMKN 2 Cimahi</strong>
				</h1>
			</div>

			<div class="header-action">
				<nav class="nav">
					<a class="nav-link active" href="<?php echo base_url('master/Alat'); ?>">Lihat Data</a>
					<a class="nav-link" href="<?php echo base_url('master/Alat/tambah'); ?>">Tambah</a>
				</nav>
			</div>
		</header>

		<div class="main-content">
			<div class="card">
				<h4 class="card-title">Data Alat</h4>

				<div class="card-body">
					<table class="table table-striped table-bordered" cellspacing="0" data-provide="datatables">
						<thead>
							<tr>
								<th>ID Alat</th>
								<th>Nama Alat</th>
								<th>Stok</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID Alat</th>
								<th>Nama Alat</th>
								<th>Stok</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
								foreach($alat as $u){ 
							?>
							<tr>
								<td><?php echo $u->id_alat ?></td>
								<td><?php echo $u->nama_alat ?></td>
								<td><?php echo $u->stok ?></td>
								<td>
									<a href="<?php echo base_url('master/Alat/edit/').$u->id_alat; ?>" class="btn btn-float btn-sm btn-primary"><i class="ti-pencil"></i></a>&nbsp;&nbsp;&nbsp;
									<button id="delete" class="btn btn-float btn-sm btn-danger" data-id="<?php echo $u->id_alat ?>"><i class="ti-close"></i></button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>