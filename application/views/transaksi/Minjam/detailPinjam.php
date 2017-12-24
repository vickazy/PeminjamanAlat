							<table class="table table-bordered table-condensed table-hover table-striped" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th width="60">No.</th>
										<th>Nama Alat</th>
										<th>Jumlah</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no = 1;
										foreach($detailPinjam as $u){ 
									?>
									<tr>
										<td><?php echo $no ?></td>
										<td><?php echo $u->nama_alat ?></td>
										<td><?php echo $u->jumlah ?></td>
										<td><a class="btn btn-sm btn-danger" id="delDetail" data-id="<?php echo $u->id_detail; ?>" data-id-alat="<?php echo $u->id_alat; ?>" data-jumlah-alat="<?php echo $u->jumlah ?>" href="javascript:void(0)"><i class="material-icons">delete_forever</i></a></td>
									</tr>
									<?php 
										$no++;
										} 
									?>
								</tbody>
							</table>