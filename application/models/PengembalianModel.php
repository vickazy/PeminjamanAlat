<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengembalianModel extends CI_Model {

	function pengembalianAlat($where){
		$updateStok = $this->updateStok($where);

		$data = array(
			'status' => 1
		);

		$this->db->where('id_peminjam', $where);
		$update = $this->db->update('peminjam', $data);

		$dataInsert = array(
			'id_pengembalian' => $this->auto(),
			'id_peminjam' => $this->input->post('id_peminjam'),
			'tgl_pengembalian' => $this->input->post('tgl_pengembalian')
		);
		$insert = $this->db->insert('pengembalian', $dataInsert);

		if ($update && $insert && $updateStok){
			return true;
		}else{
			return false;
		}

		// if ($this->db->update('peminjam', $data)){
		// 	$dataInsert = array(
		// 		'id_pengembalian' => $this->auto(),
		// 		'id_peminjam' => $this->input->post('id_peminjam'),
		// 		'tgl_pengembalian' => $this->input->post('tgl_pengembalian')
		// 	);
		// 	return $this->db->insert('pengembalian', $dataInsert);
		// }
	}

	function tampilData(){
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

	function tampilSudahdiKembalikan(){
		$this->db->select('pengembalian.id_pengembalian, pengembalian.id_peminjam, peminjam.nis, peminjam.nama_peminjam, peminjam.tgl_peminjaman, pengembalian.tgl_pengembalian')
		->join('peminjam', 'pengembalian.id_peminjam = peminjam.id_peminjam');
		$this->db->where('status', 1);
		$this->db->order_by('id_pengembalian', 'asc');
		$query = $this->db->get('pengembalian');
		
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	function updateStok($where){
		$this->db->where('id_peminjam', $where);
		$query = $this->db->get('peminjam_detail');

		if($query->num_rows() <> 0){
			foreach ($query as $key => $value) {
				$data = $query->row();
				$dataUpdate = array('stok' => 1);
				$this->db->where('kode_alat', $data->kode_alat);
				return $this->db->update('alat_detail', $dataUpdate);
			}
		}
	}

	function auto(){
		$this->db->select('RIGHT(pengembalian.id_pengembalian, 5) as kode');
		$this->db->order_by('id_pengembalian','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pengembalian');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 5, "0", STR_PAD_LEFT);
		$viewcode="PGB".$maxcode;
		return $viewcode;
	}

}