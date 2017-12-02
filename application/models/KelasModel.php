<?php

class KelasModel extends CI_Model{

	function read(){
		return $this->db->get('kelas');
	}

	function tambah(){
		$id_kelas	= $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');

		$data = array(
			'id_kelas' 	=> $id_kelas,
			'nama_kelas' => $nama_kelas
		);

		$this->db->insert('kelas', $data);
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
		$this->db->select('RIGHT(kelas.id_kelas, 4) as kode');
		$this->db->order_by('id_kelas','DESC');
		$this->db->limit(1);
		$query = $this->db->get('kelas');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 4, "0", STR_PAD_LEFT);
		$viewcode="KLS".$maxcode;
		return $viewcode;
	}

}