<script type="text/javascript">
		$(document).ready(function(){

			$('#myModal').on('hidden.bs.modal', function (e) {
				$('#myForm')[0].reset();
				$('#checkboxAlatDipinjam').empty();
				$('#selectAlatDiPinjam').empty();
			});

			detailPinjam();

			$('#tampilData').on('click', '#lihatDataPinjam', function(){
				var id_peminjam = $(this).data('id');

				$('#myModal').modal('show');
				$('#myModal').find('.modal-title').text('Data Peminjam');
				$('#myForm').attr('action', '<?php echo base_url('transaksi/Minjam/tambahAcc/'); ?>');

				$.ajax({
					url: '<?php echo base_url('transaksi/Minjam/bacaPinjamAcc/'); ?>'+id_peminjam,
					dataType: 'json',
					success: function(response){
						$.each(response, function(i, item){
							$("#id_peminjam").val(item.id_peminjam);
							$("#nama_peminjam").val(item.nama_peminjam);
							$('<label class="custom-control custom-checkbox"></label>').html('<input type="checkbox" class="custom-control-input" id="cekBox'+item.id_detail+'" data-id="'+item.id_detail+'" data-idAlat="'+item.id_alat+'" data-jumlah="'+item.jumlah+'" name="cekBoxAlatDiPinjam[]">'+
								'<span class="custom-control-indicator"></span>'+
								'<span class="custom-control-description">'+item.jumlah+' '+item.nama_alat+'</span>').appendTo('#checkboxAlatDipinjam');
						});
					},
					error: function(){
						swal('Oops...', 'Something went wrong with ajax !', 'error');
					}
				});
			});

			$('#btnTerima').click(function(){
				var url = $('#myForm').attr('action');
				var data = $('#myForm').serialize();

				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					dataType: 'json',
					success: function(response){
						if (response.success){
							$('#myModal').modal('hide');

							$('#tampilData').DataTable().ajax.reload();
							$('#tampilBelumDiKembalikan').DataTable().ajax.reload();
						}else{
							swal('Oops...', 'Error!', 'error');
						}
					},
					error: function(){
						swal('Oops...', 'Something went wrong with ajax !', 'error');
					}
				});

			});

			$('#btnTolak').click(function(){
				var url = "<?php echo base_url('transaksi/Minjam/tolak/'); ?>";
				var data = $('#myForm').serialize();

				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					dataType: 'json',
					success: function(response){
						if (response.success){
							$('#myModal').modal('hide');

							$('#tampilData').DataTable().ajax.reload();
							$('#tampilBelumDiKembalikan').DataTable().ajax.reload();
						}else{
							swal('Oops...', 'Error!', 'error');
						}
					},
					error: function(){
						swal('Oops...', 'Harus Ceklis Semua Alatnya !', 'error');
					}
				});
			});

			$('#checkboxAlatDipinjam').on('click', 'input', function(){
				var id = $(this).data('id');
				var idalat = $(this).data('idalat');
				var jumlah = $(this).data('jumlah');

				if($("#cekBox"+id).is(':checked')){
					$.ajax({
						url: '<?php echo base_url('transaksi/Minjam/bacaPinjamAlat/'); ?>'+idalat,
						dataType: 'json',
						success: function(response){
							var multiple = '';
							if(jumlah!=1){
								multiple = 'multiple data-max-options="'+jumlah+'"';
							}

							// $('<div class="form-group" id="divSelect'+id+'"></div>').html('<label class="col-form-label">Nama Alat:</label>'+
							// 	'<select id="select'+id+'" class="form-control show-tick" name="selectAlatDiPinjam[]" '+multiple+'>'+
							// 	'</select>').appendTo('#selectAlatDiPinjam');

							$('<div class="form-group" id="divSelect'+id+'"></div>').html('<label class="col-form-label">Nama Alat:</label><br>'+
								'<select id="select'+id+'" data-provide="selectpicker" name="selectAlatDiPinjam[]" '+multiple+' data-width="100%" required>'+
								'</select>').appendTo('#selectAlatDiPinjam');

							$.each(response, function(i, item){
								$('<option value="'+item.id_alat+'|'+item.kode_alat+'">'+item.nama_alat+' | '+item.kode_alat+'</option>').appendTo('#select'+id);
							});
						},
						error: function(){
							swal('Oops...', 'Something went wrong with ajax !', 'error');
						}
					});
				}else{
					$("#divSelect"+id).remove();
					//$("#select"+id).remove();
				}
			});

			$(document).on('click', '#delDetail', function(e){
				var id_detail = $(this).data('id');
				var id_alat = $(this).data('id-alat');
				var jumlah = $(this).data('jumlah-alat');

				$.ajax({
					url: '<?php echo base_url('transaksi/Minjam/hapusDetail/'); ?>' +id_detail+ '/' +id_alat+ '/' +jumlah,
					dataType: 'json',
					success: function(response){
						if(response.success){
							detailPinjam();
						}else{
							swal('Oops...', 'Error!', 'error');
						}
					},
					error: function(){
						swal('Oops...', 'Something went wrong with ajax !', 'error');
					}
				});
				e.preventDefault();
			});

			$('#tambahDetail').click(function(){
				$('#myModal').modal('show');
				$('#myModal').find('.modal-title').text('Tambah Alat Yang di Pinjam');
				autoIdDetailPinjam();
				autoStokAlat();
				$('#myForm').attr('action', '<?php echo base_url('transaksi/Minjam/inputDetail/'); ?>');
			});

			$('#saveDetail').click(function(){
				var url = $('#myForm').attr('action');
				var data = $('#myForm').serialize();

				//validasi
				var jumlah = $('input[name=jumlah_detail]');
				var result = '';

				if(jumlah.val()==''){
					jumlah.addClass('is-invalid');
				}else{
					jumlah.removeClass('is-invalid');
					result ='ok';
				}

				if(result=='ok'){
					$.ajax({
						type: 'ajax',
						method: 'post',
						url: url,
						data: data,
						dataType: 'json',
						success: function(response){
							if(response.success){
								$('#myModal').modal('hide');

								detailPinjam();
							}else{
								swal('Oops...', 'Error!', 'error');
							}
						},
						error: function(){
							swal('Oops...', 'Gagal Menambahkan Alat', 'error');
						}
					});
				}
			});

		});

		function detailPinjam(){
			$('#load-detailPinjam').load('<?php echo base_url('transaksi/Minjam/bacaDetail/'); ?>');
		}

		function autoIdDetailPinjam(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url('transaksi/Minjam/autoDetail/'); ?>',
				dataType: 'json',
				success: function(data){
					$('#myModal').find('#idDetail').val(data.kode);
				},
				error: function(){
					alert('Gagal Auto ID Pegawai');
				}
			});
		}

		function autoStokAlat(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url('transaksi/Minjam/stokAlat/'); ?>',
				dataType: 'json',
				success: function(data){
					var html = '';
					for(var i=0; i<data.length; i++){
						html += '<option value="'+data[i].id_alat+'">'+data[i].nama_alat+' - Stok : '+data[i].stok+'</option>';
					}

					$('#selectStokAlat').html(html);
					/*$('#selectStokAlat').attr('data-provide', 'selectpicker');
					$('#selectStokAlat').attr('data-live-search', 'true');*/
				},
				error: function(){
					alert('Gagal Auto ID Pegawai');
				}
			});
		}
	</script>