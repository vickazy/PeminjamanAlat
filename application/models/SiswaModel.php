<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

	function siswaDaftar(){
		$nis			= $this->input->post('nis');
		$nama_siswa		= $this->input->post('nama');
		$nama_ortu		= $this->input->post('nama_ortu');
		$no_hp			= $this->input->post('no_hp');
		$kelas	 		= $this->input->post('kelas');
		$password 		= $this->input->post('password1');

		$data = array(
			'nis' 		=> $nis,
			'nama' 		=> $nama_siswa,
			'nama_ortu' => $nama_ortu,
			'no_hp'		=> $no_hp,
			'id_kelas' 	=> $kelas,
			'password' 	=> md5($password)
		);

		$this->db->insert('siswa', $data);
	}

	function tambah() {
		$data1 = array(
			'id_peminjam' => $this->auto()
		);

		$this->db->where('nis', $this->session->userdata('username'));
		$this->db->where('tgl_req_peminjaman', date('Y-m-d'));
		$this->db->where('id_peminjam', '');
		$this->db->update('peminjam_detail', $data1);

		$data = array(
			'id_peminjam'				=> $this->auto(),
			'nama_peminjam'				=> $this->input->post('nama_peminjam'),
			'nis'						=> $this->input->post('nis'),
			'id_keperluan'				=> $this->input->post('keperluan'),
			'id_kelas'					=> $this->input->post('kelas'),
			'no_hp'						=> $this->input->post('no_hp'),
			'tgl_peminjaman'			=> $this->input->post('tgl_peminjaman'),
			'tgl_req_peminjaman'		=> date('Y-m-d'),
			'tgl_pengembalian_rencana'	=> $this->input->post('tgl_pengembalian_rencana'),
			'catatan'					=> $this->input->post('catatan'),
			'status'					=> 0,
			'status_acc'				=> 0
		);

		return $this->db->insert('peminjam', $data);
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

	function inputDetail(){
		$this->db->where('nis', $this->session->userdata('username'));
		$this->db->where('tgl_req_peminjaman', date('Y-m-d'));
		$this->db->where('id_peminjam', '');
		$this->db->where('status', 0);
		$this->db->where('id_alat', $this->input->post('id_alat'));
		$query = $this->db->get('peminjam_detail');

		if ($query->num_rows() <> 0) {
			$jumlah = $query->row();
			$jumlahBaru = intval($jumlah->jumlah) + $this->input->post('jumlah_detail');
			$data = array(
				'jumlah'		=> $jumlahBaru
			);

			$this->db->where('nis', $this->session->userdata('username'));
			$this->db->where('tgl_req_peminjaman', date('Y-m-d'));
			$this->db->where('id_peminjam', '');
			$this->db->where('status', 0);
			$this->db->where('id_alat', $this->input->post('id_alat'));
			return $this->db->update('peminjam_detail', $data);
		} else {
			$data = array(
				'id_detail'				=> $this->autoDetail(),
				// 'id_peminjam'			=> $this->input->post('id_peminjam'),
				'nis'					=> $this->session->userdata('username'),
				'id_alat'				=> $this->input->post('id_alat'),
				'tgl_req_peminjaman'	=> date('Y-m-d'),
				'jumlah'				=> $this->input->post('jumlah_detail'),
				'status'				=> 0
			);

			return $this->db->insert('peminjam_detail', $data);
		}
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
		$this->db->order_by('id_detail','DESC');
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
		return $viewcode;
		// $autoId = array('kode' => $viewcode);
		// return json_encode($autoId);
	}

	function bacaDetailPinjam($nis){
		$this->db->select('peminjam_detail.id_detail, peminjam_detail.id_peminjam, peminjam_detail.nis, peminjam_detail.id_alat, alat.nama_alat, peminjam_detail.jumlah, peminjam_detail.tgl_req_peminjaman')
		->join('alat','peminjam_detail.id_alat = alat.id_alat');
		$this->db->where('id_peminjam', '');
		$this->db->where('nis', $nis);
		$this->db->where('tgl_req_peminjaman', date('Y-m-d'));
		$this->db->where('status', 0);
		$this->db->order_by('id_detail', 'asc');
		return $this->db->get('peminjam_detail');
	}

	function bacaKelas(){
		return $this->db->get('kelas');
	}

	function bacaKeperluan(){
		return $this->db->get('keperluan');
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

}