<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

	function tambah(){
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

}