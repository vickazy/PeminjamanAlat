<?php

class MinjamModel extends CI_Model{

	function bacaDetailPinjam($where, $table){
		$this->db->select('detail_peminjam.id_detail, detail_peminjam.id_peminjam, detail_peminjam.id_alat, alat.nama_alat, detail_peminjam.jumlah')
		->join('alat','detail_peminjam.id_alat = alat.id_alat');
		$this->db->where($table, $where);
		$this->db->order_by('id_detail', 'asc');
		return $this->db->get('detail_peminjam');
	}

	function bacaKelas(){
		return $this->db->get('kelas');
	}

	function bacaKeperluan(){
		return $this->db->get('keperluan');
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

	function inputDetail(){
		$data = array(
			'id_detail'		=> $this->input->post('idDetail'),
			'id_peminjam'	=> $this->input->post('id_peminjam'),
			'id_alat'		=> $this->input->post('id_alat'),
			'jumlah'		=> $this->input->post('jumlah_detail'),
			'status'		=> 0
		);

		return $this->db->insert('detail_peminjam', $data);
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
		$this->db->select('RIGHT(detail_peminjam.id_detail, 6) as kode');
		$this->db->order_by('id_peminjam','DESC');
		$this->db->limit(1);
		$query = $this->db->get('detail_peminjam');

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