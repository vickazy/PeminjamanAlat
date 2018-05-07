<script type="text/javascript">
		$(document).ready(function(){

			$('#table1').on('click', '#kembaliAlat', function(){
				var id_peminjam = $(this).data('id');

				swal({
					title: 'Konfirmasi Alat Sudah Dikembalikan',
					text: "Alat yang di pinjam sudah di kembalikan?",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Yakin!',
					cancelButtonText: 'Batal',
					showLoaderOnConfirm: true,
					allowOutsideClick: false,
					preConfirm: function(){
						return new Promise(function(resolve){
							var url = '<?php echo base_url('transaksi/Pengembalian/pengembalianAlat/'); ?>';

							$.ajax({
								type: 'ajax',
								method: 'post',
								url: url,
								data: {
									id_peminjam: id_peminjam,
									tgl_pengembalian: "<?php echo date('Y-m-d'); ?>"
								},
								dataType: 'json',
								success: function(response){
									if(response.success){
										swal('Berhasil', 'Data Sudah Dikembalikan', 'success');
										$('#table1').DataTable().ajax.reload();
										$('#table2').DataTable().ajax.reload();
									}else{
										swal('Oops...', 'Error!', 'error');
									}
								},
								error: function(){
									swal('Oops...', 'Something went wrong with ajax !', 'error');
								}
							});
						});
					}
				});
			});

		});
	</script>