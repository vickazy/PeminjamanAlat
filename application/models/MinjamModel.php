<?php

class MinjamModel extends CI_Model{

	function bacaData(){
		$this->db->select('peminjam.id_peminjam, peminjam.nama_peminjam, peminjam.nis, keperluan.nama_keperluan, kelas.nama_kelas, peminjam.no_hp, peminjam.tgl_req_peminjaman, peminjam.tgl_peminjaman, peminjam.tgl_pengembalian_rencana, peminjam.catatan, peminjam.id_petugas, peminjam.`status`, peminjam.`status_acc`')
		->join('kelas', 'peminjam.id_kelas = kelas.id_kelas')
		->join('keperluan', 'peminjam.id_keperluan = keperluan.id_keperluan');
		$this->db->where('status_acc', 0);
		$this->db->order_by('id_peminjam', 'asc');
		$query = $this->db->get('peminjam');
		
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	function bacaBelumKembali(){
		$this->db->select('peminjam.id_peminjam, peminjam.nama_peminjam, peminjam.nis, keperluan.nama_keperluan, kelas.nama_kelas, peminjam.no_hp, peminjam.tgl_req_peminjaman, peminjam.tgl_peminjaman, peminjam.tgl_pengembalian_rencana, peminjam.catatan, peminjam.id_petugas, peminjam.`status`, peminjam.`status_acc`')
		->join('kelas', 'peminjam.id_kelas = kelas.id_kelas')
		->join('keperluan', 'peminjam.id_keperluan = keperluan.id_keperluan');
		$this->db->where('status', 0);
		$this->db->where('status_acc', 1);
		$this->db->order_by('id_peminjam', 'asc');
		$query = $this->db->get('peminjam');
		
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	function bacaDetailPinjam($where, $table){
		$this->db->select('peminjam_detail.id_detail, peminjam_detail.id_peminjam, peminjam_detail.id_alat, alat.nama_alat, peminjam_detail.jumlah')
		->join('alat','peminjam_detail.id_alat = alat.id_alat');
		$this->db->where($table, $where);
		$this->db->order_by('id_detail', 'asc');
		return $this->db->get('peminjam_detail');
	}

	function bacaKelas(){
		return $this->db->get('kelas');
	}

	function bacaKeperluan(){
		return $this->db->get('keperluan');
	}

	function bacaPinjamAcc($where){
		$this->db->select('peminjam.id_peminjam, peminjam_detail.id_detail, peminjam.nama_peminjam, peminjam_detail.id_alat, alat.nama_alat, peminjam_detail.jumlah')
		->join('peminjam_detail', 'peminjam.id_peminjam = peminjam_detail.id_peminjam')
		->join('alat', 'peminjam_detail.id_alat = alat.id_alat');
		$this->db->where('peminjam.id_peminjam', $where);
		$this->db->where('peminjam_detail.`status`', 0);
		return $this->db->get('peminjam');
	}

	function bacaPinjamAlat($where){
		$this->db->select('alat.id_alat, alat.nama_alat, alat_detail.kode_alat, alat_detail.kondisi, alat_detail.stok')
		->join('alat_detail', 'alat.id_alat = alat_detail.id_alat');
		$this->db->where('alat.id_alat', $where);
		$this->db->where_not_in('alat_detail.stok', 0);
		return $this->db->get('alat');
	}

	function tambah(){
		$data = array(
			'id_peminjam'				=> $this->input->post('id_peminjam'),
			'nama_peminjam'				=> $this->input->post('nama_peminjam'),
			'nis'						=> $this->input->post('nis'),
			'id_keperluan'				=> $this->input->post('keperluan'),
			'id_kelas'					=> $this->input->post('kelas'),
			'no_hp'						=> $this->input->post('no_hp'),
			'tgl_peminjaman'			=> $this->input->post('tgl_peminjaman'),
			'tgl_pengembalian_rencana'	=> $this->input->post('tgl_pengembalian_rencana'),
			'catatan'					=> $this->input->post('catatan'),
			'id_petugas'				=> $this->session->userdata('id_petugas'),
			'status'					=> 0
		);

		return $this->db->insert('peminjam', $data);
	}

	function tambahAcc(){
		$kode_alat = $this->input->post('selectAlatDiPinjam');
		foreach ($kode_alat as $key => $value) {
			$val = explode('|', $value);

			$alat_detail = array('stok' => 0);
			$this->db->where('kode_alat', $val[1]);
			$this->db->update('alat_detail', $alat_detail);

			$peminjam_detail = array(
				'status'	=> 1,
				'kode_alat' => $val[1]
			);
			$this->db->where('id_alat', $val[0]);
			$this->db->where('id_peminjam', $this->input->post('id_peminjam'));
			$this->db->update('peminjam_detail', $peminjam_detail);
		}


		$data = array(
			'status_acc' => 1,
			'id_petugas' => $this->session->userdata('id_petugas')
		);

		$this->db->where('id_peminjam', $this->input->post('id_peminjam'));
		return $this->db->update('peminjam', $data);
	}

	function tolak(){
		// $this->db->where('id_peminjam', $this->input->post('id_peminjam'));
		// $query = $this->db->get('peminjam_detail');
		// if ($query->num_rows() <> 0){
		// 	foreach ($query as $key => $value){
		// 		$id_alat = 'ALT0001';

		// 		$this->db->where('id_alat', $id_alat);
		// 		$query2 = $this->db->get('alat');
		// 		if ($query2->num_rows() <> 0){
		// 			$stok = $query2->row();
		// 			$stokBaru = intval($stok->stok) + 1;
		// 			$stokAlat = array('stok' => $stokBaru);
		// 			$this->db->where('id_alat', $id_alat);
		// 			$this->db->update('alat', $stokAlat);
		// 		}
		// 	}
		// }

		$kode_alat = $this->input->post('selectAlatDiPinjam');
		foreach ($kode_alat as $key => $value) {
			$val = explode('|', $value);

			$this->db->where('id_alat', $val[0]);
			$query = $this->db->get('alat');
			if($query->num_rows() <> 0){
				$data = $query->row();
				$stok = intval($data->stok)+1;

				$stokBaru = array('stok' => $stok);
				$this->db->where('id_alat', $val[0]);
				$this->db->update('alat', $stokBaru);
			}
		}

		$data = array(
			'status_acc' => 2,
			'id_petugas' => $this->session->userdata('id_petugas')
		);
		$data2 = array('status' => 2);

		$this->db->where('id_peminjam', $this->input->post('id_peminjam'));
		$this->db->update('peminjam_detail', $data2);

		$this->db->where('id_peminjam', $this->input->post('id_peminjam'));
		return $this->db->update('peminjam', $data);
	}

	function inputDetail(){
		$this->db->where('id_peminjam', $this->input->post('id_peminjam'));
		$this->db->where('id_alat', $this->input->post('id_alat'));
		$query = $this->db->get('peminjam_detail');

		if ($query->num_rows() <> 0) {
			$jumlah = $query->row();
			$jumlahBaru = intval($jumlah->jumlah) + $this->input->post('jumlah_detail');
			$data = array(
				'jumlah'		=> $jumlahBaru
			);

			$this->db->where('id_peminjam', $this->input->post('id_peminjam'));
			$this->db->where('id_alat', $this->input->post('id_alat'));
			return $this->db->update('peminjam_detail', $data);
		} else {
			$data = array(
				'id_detail'		=> $this->input->post('idDetail'),
				'id_peminjam'	=> $this->input->post('id_peminjam'),
				'id_alat'		=> $this->input->post('id_alat'),
				'jumlah'		=> $this->input->post('jumlah_detail'),
				'status'		=> 0
			);

			return $this->db->insert('peminjam_detail', $data);
		}
	}

	function hapusDetail($where, $table){
		$this->db->where($where);
		$this->db->delete($table);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function kurangStok(){
		$this->db->select('alat.stok');
		$this->db->where('id_alat', $this->input->post('id_alat'));
		$query1 = $this->db->get('alat');
		if($query1->num_rows() <> 0){
			$stok = $query1->row();
			$stokBaru = intval($stok->stok) - $this->input->post('jumlah_detail');
		}

		$data = array('stok' => $stokBaru);
		$this->db->where('id_alat', $this->input->post('id_alat'));
		return $this->db->update('alat', $data);
	}

	function tambahStok($where, $jumlah){
		$this->db->select('alat.stok');
		$this->db->where('id_alat', $where);
		$query1 = $this->db->get('alat');
		if($query1->num_rows() <> 0){
			$stok = $query1->row();
			$stokBaru = intval($stok->stok) + $jumlah;
		}

		$data = array('stok' => $stokBaru);
		$this->db->where('id_alat', $where);
		return $this->db->update('alat', $data);
	}

	function auto(){
		$this->db->select('RIGHT(peminjam.id_peminjam, 5) as kode');
		$this->db->order_by('id_peminjam','DESC');
		$this->db->limit(1);
		$query = $this->db->get('peminjam');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 5, "0", STR_PAD_LEFT);
		$viewcode="PJM".$maxcode;
		return $viewcode;
	}

	function autoDetail(){
		$this->db->select('RIGHT(peminjam_detail.id_detail, 6) as kode');
		$this->db->order_by('id_peminjam','DESC');
		$this->db->limit(1);
		$query = $this->db->get('peminjam_detail');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 6, "0", STR_PAD_LEFT);
		$viewcode="DTL".$maxcode;
		$autoId = array('kode' => $viewcode);
		return json_encode($autoId);
	}

}