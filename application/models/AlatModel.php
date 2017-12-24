<?php

class AlatModel extends CI_Model{

	function read(){
		return $this->db->get('alat');
	}

	function readDetail(){
		$this->db->where_not_in('stok', 0);
		return $this->db->get('alat');
	}

	function tambah(){
		$id_alat = $this->input->post('id_alat');
		$nama_alat = $this->input->post('nama_alat');
		$stok = $this->input->post('stok');

		$data = array(
			'id_alat' 	=> $id_alat,
			'nama_alat' => $nama_alat,
			'stok'		=> $stok,
			'jumlah'	=> $stok
		);

		$this->db->insert('alat', $data);
	}

	function edit($where, $table){
		return $this->db->get_where($table, $where);
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function auto(){
		$this->db->select('RIGHT(alat.id_alat, 4) as kode');
		$this->db->order_by('id_alat','DESC');
		$this->db->limit(1);
		$query = $this->db->get('alat');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 4, "0", STR_PAD_LEFT);
		$viewcode="ALT".$maxcode;
		return $viewcode;
	}

}